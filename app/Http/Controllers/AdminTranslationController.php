<?php

namespace App\Http\Controllers;

use App\Models\SiteMedia;
use App\Models\SiteTranslation;
use App\Support\CmsMedia;
use App\Support\CmsText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTranslationController extends Controller
{
    public function index()
    {
        $translations = SiteTranslation::orderBy('group')
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        $media = SiteMedia::orderBy('group')
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        return view('admin.translations.index', compact('translations', 'media'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'translations' => 'required|array',
            'translations.*.text_es' => 'nullable|string',
            'translations.*.text_en' => 'nullable|string',
        ]);

        $translations = SiteTranslation::whereIn('id', array_keys($data['translations']))
            ->get()
            ->keyBy('id');

        $updated = 0;

        foreach ($data['translations'] as $id => $values) {
            $translation = $translations->get((int) $id);

            if (! $translation) {
                continue;
            }

            $translation->fill([
                'text_es' => $values['text_es'] ?? '',
                'text_en' => $values['text_en'] ?? '',
            ]);

            if ($translation->isDirty(['text_es', 'text_en'])) {
                $translation->save();
                $updated++;
            }
        }

        CmsText::clearCache();

        return redirect()
            ->route('admin.traducciones.index')
            ->with('success', $updated > 0
                ? "Traducciones actualizadas correctamente ({$updated} cambios guardados)."
                : 'No habia cambios nuevos por guardar.');
    }

    public function updateMedia(Request $request, SiteMedia $siteMedia)
    {
        $data = $request->validate([
            'image' => ['required', 'file', 'image', 'mimes:webp,jpeg,jpg,png', 'max:12288'],
        ]);

        $extension = strtolower($data['image']->getClientOriginalExtension());
        $extension = in_array($extension, ['webp', 'jpg', 'jpeg', 'png'], true) ? $extension : 'webp';
        $filename = Str::slug($siteMedia->key).'-'.now()->format('YmdHis').'.'.$extension;
        $path = $data['image']->storeAs('site-media', $filename, 'public');

        abort_unless($path, 500, 'No se pudo guardar la imagen.');

        $siteMedia->update(['path' => $path]);
        CmsMedia::clearCache();

        return response()->json([
            'message' => 'Imagen optimizada y guardada.',
            'url' => $siteMedia->fresh()->url,
        ]);
    }
}

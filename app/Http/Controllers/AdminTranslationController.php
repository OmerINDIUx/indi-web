<?php

namespace App\Http\Controllers;

use App\Models\SiteTranslation;
use App\Support\CmsText;
use Illuminate\Http\Request;

class AdminTranslationController extends Controller
{
    public function index()
    {
        $translations = SiteTranslation::orderBy('group')
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        return view('admin.translations.index', compact('translations'));
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
}

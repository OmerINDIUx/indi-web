<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('quejas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|in:queja,denuncia,sugerencia',
            'description' => 'required|string',
            'evidence_path' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('evidence_path')) {
            $validated['evidence_path'] = $request->file('evidence_path')->store('evidences', 'public');
        }

        Complaint::create($validated);

        return redirect()->back()->with('success', 'Hemos recibido tu reporte de manera segura y confidencial.');
    }
}

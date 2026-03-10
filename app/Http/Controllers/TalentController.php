<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Talent;

class TalentController extends Controller
{
    public function create()
    {
        return view('talento.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'area_of_interest' => 'nullable|string|max:255',
            'resume_path' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'message' => 'nullable|string',
        ]);

        if ($request->hasFile('resume_path')) {
            $validated['resume_path'] = $request->file('resume_path')->store('resumes', 'public');
        }

        Talent::create($validated);

        return redirect()->back()->with('success', '¡Gracias por tu interés! Hemos recibido tu información.');
    }
}

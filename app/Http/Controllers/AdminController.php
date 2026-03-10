<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Talent;
use App\Models\Complaint;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function talents()
    {
        $talents = Talent::latest()->get();
        return view('admin.talents', compact('talents'));
    }

    public function complaints()
    {
        $complaints = Complaint::latest()->get();
        return view('admin.complaints', compact('complaints'));
    }

    public function downloadEvidence($filename)
    {
        $path = 'evidences/' . $filename;
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
            abort(404, 'La evidencia no fue encontrada o fue eliminada.');
        }
        return response()->file(\Illuminate\Support\Facades\Storage::disk('public')->path($path));
    }

    public function downloadResume($filename)
    {
        $path = 'resumes/' . $filename;
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
            abort(404, 'El CV no fue encontrado o fue eliminado.');
        }
        return response()->file(\Illuminate\Support\Facades\Storage::disk('public')->path($path));
    }
}

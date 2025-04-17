<?php

namespace App\Http\Controllers;

use App\Models\Formation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        return view('formations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'fichier' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $formation = new Formation();
        $formation->titre = $request->titre;
        $formation->description = $request->description;

        if ($request->hasFile('fichier')) {
            $formation->fichier = $request->file('fichier')->store('formations');
        }

        $formation->save();

        return redirect()->route('formations.index')->with('success', 'Formation créée avec succès.');
    }

    public function show(Formation $formation)
    {
        return view('formations.show', compact('formation'));
    }

    public function edit(Formation $formation)
    {
        return view('formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $formation->titre = $request->titre;
        $formation->description = $request->description;

        if ($request->hasFile('fichier')) {
            // Delete the old file if it exists
            if ($formation->fichier) {
                Storage::delete($formation->fichier);
            }
            $formation->fichier = $request->file('fichier')->store('formations');
        }

        $formation->save();

        return redirect()->route('formations.index')->with('success', 'Formation mise à jour avec succès.');
    }

    public function destroy(Formation $formation)
    {
        // Delete the file if it exists
        if ($formation->fichier) {
            Storage::delete($formation->fichier);
        }

        $formation->delete();

        return redirect()->route('formations.index')->with('success', 'Formation supprimée avec succès.');
    }
}

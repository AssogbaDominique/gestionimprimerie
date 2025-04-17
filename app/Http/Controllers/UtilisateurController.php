<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Commande;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:utilisateurs,email,$utilisateur->id",
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        $utilisateur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $utilisateur->password,
            'role' => $request->role,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        // Supprimer les commandes associées avant de supprimer l'utilisateur
        Commande::
            where('utilisateur_id', $utilisateur->id)
            ->delete();
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}

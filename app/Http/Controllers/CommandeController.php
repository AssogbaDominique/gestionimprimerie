<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
    }

    public function show($id)
    {
        $commande = Commande::find($id);
        if ($commande) {
            return view('commandes.show', compact('commande'));
        } else {
            return view('errors.404', ['message' => 'Commande not found']);
        }
    }

    public function store(Request $request)
    {
        $commande = Commande::create($request->all());
        return redirect()->route('commandes.index')->with('success', 'Commande created successfully.');
    }

    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);
        if ($commande) {
            $commande->update($request->all());
            return redirect()->route('commandes.show', $id)->with('success', 'Commande updated successfully.');
        } else {
            return view('errors.404', ['message' => 'Commande not found']);
        }
    }

    public function destroy($id)
    {
        $commande = Commande::find($id);
        if ($commande) {
            $commande->delete();
            return redirect()->route('commandes.index')->with('success', 'Commande deleted successfully.');
        } else {
            return view('errors.404', ['message' => 'Commande not found']);
        }
    }
}

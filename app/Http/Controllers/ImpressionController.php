<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impression;

class ImpressionController extends Controller
{
    public function index()
    {
        $impressions = Impression::all();
        return view('impressions.index', compact('impressions'));
    }

    public function show($id)
    {
        $impression = Impression::find($id);
        if ($impression) {
            return view('impressions.show', compact('impression'));
        } else {
            return view('errors.404', ['message' => 'Impression not found']);
        }
    }

    public function store(Request $request)
    {
        $impression = Impression::create($request->all());
        return redirect()->route('impressions.index')->with('success', 'Impression created successfully.');
    }

    public function update(Request $request, $id)
    {
        $impression = Impression::find($id);
        if ($impression) {
            $impression->update($request->all());
            return redirect()->route('impressions.show', $id)->with('success', 'Impression updated successfully.');
        } else {
            return view('errors.404', ['message' => 'Impression not found']);
        }
    }

    public function destroy($id)
    {
        $impression = Impression::find($id);
        if ($impression) {
            $impression->delete();
            return redirect()->route('impressions.index')->with('success', 'Impression deleted successfully.');
        } else {
            return view('errors.404', ['message' => 'Impression not found']);
        }
    }
}

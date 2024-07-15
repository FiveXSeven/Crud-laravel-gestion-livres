<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('livre.liste', [
            'livres' => $livres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livre.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'description' => 'required',
            'annee' => 'required',
        ]);

        $livre = Livre::create($data);

        return redirect()->route('livre.liste');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Livre::where('titre', 'LIKE', "%{$search}%")->get();
        return view('livre.result', [
            'search' => $results
        ]);
    }



    public function edit(Livre $id)
    {
        return view('livre.edit', [
            'livre' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $id)
    {
        $data = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'description' => 'required',
            'annee' => 'required',
        ]);

        $id->update($data);

        return redirect()->route('livre.liste');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $id)
    {
        $id->delete();

        return redirect()->route('livre.liste');
    }
}

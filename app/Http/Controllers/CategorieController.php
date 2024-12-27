<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CategorieController extends Controller
{
    public function index()
    {
        // User::create([
        //     'name' => 'Admin1',
        //     'email' => 'admin1@example.com',
        //     'password' => Hash::make('admin1'),
        // ]);
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }
    

    public function store(CategorieRequest $request)
    {
        Categorie::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    public function update(CategorieRequest $request, Categorie $categorie)
    {
        
        $categorie->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
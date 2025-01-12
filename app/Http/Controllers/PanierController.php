<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    //permet ajouter un produit au panier
    public function add(Request $request)
    {
        Panier::create([
            // 'user_id' => auth()->id(),
            // 'article_id' => $request->input('article'),
            // 'quantity' => $request->input('quantity'),
            'id' => 456, // inique row ID
            'name' => 'Sample Item',
            'prix' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        ]);

        return back()->with('success', 'Produit ajouté au panier.');
        // return redirect(route('panier_index'));
    }


    public function index()
    {
        $content = Panier::getContent();
        dd($content);
    }

}
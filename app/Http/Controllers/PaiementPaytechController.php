<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaiementPaytechRequest;
use App\Http\Requests\UpdatePaiementPaytechRequest;
use App\Models\Article;
use App\Models\PaiementPaytech;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class PaiementPaytechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaiementPaytechRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaiementPaytech $paiementPaytech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaiementPaytech $paiementPaytech)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaiementPaytechRequest $request, PaiementPaytech $paiementPaytech)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaiementPaytech $paiementPaytech)
    {
        //
    }




    public function paiement(StorePaiementPaytechRequest $request)
    {
        // Trouver l'article dans la base de données, en utilisant l'id ou une autre clé
        $article = Article::find($request->article_id); // Assurez-vous que `article_id` est passé dans la requête

        // Vérifier si l'article existe
        // dd( $article);
        if (!$article) {
            return redirect()->back()->with('error', 'Article non trouvé.');
        }

        // Générer un random string pour ref_command
        $randomString = Str::random(12);

        // Définir les paramètres de la requête avec les données de l'article
        $postfields = [
            'item_name' => $article->nom,            // Utilisation du nom de l'article
            'item_price' => $article->prix,          // Utilisation du prix de l'article
            'ref_command' => $randomString,          // Utilisation correcte de ref_command
            'command_name' => 'Paiement pour ' . $article->nom,  // Utilisation du nom de l'article
            'env' => 'test',                         // Assurez-vous d'utiliser l'environnement de test
            'ipn_url' => 'https://127.0.0.1:8000/ipn',  // URL de notification
            'success_url' => route('success'),  // URL de succès
            'cancel_url' => route('cancel'),  // URL d'annulation
        ];

        // Clés API PayTech
        $api_key = '944f0e779d81570154313e59c3576d05d229d2e25abee84ea472faa5052d4e57';  // Remplacez par votre clé API
        $api_secret = '39f52a38bbd56c1e2954ef45e45764da35ba26bbd4abf0d4aca901ea947351db';  // Remplacez par votre clé secrète

        // Envoyer la requête POST à PayTech
        $response = Http::withHeaders([
            'API_KEY' => $api_key,
            'API_SECRET' => $api_secret,
        ])->post('https://paytech.sn/api/payment/request-payment', $postfields);

        // Vérifier le statut de la réponse
        if ($response->status() == 200) {
            // Si la réponse est valide, rediriger l'utilisateur vers l'URL de redirection
            return redirect($response['redirect_url']);
        } else {
            // En cas d'erreur, afficher le statut et le message d'erreur
            dd($response->status(), $response->json());  // Affichez la réponse pour le débogage
        }
    }
    // public function success(Request $request)
    // {
    //     // Exemple de récupération du paiement via `ref_command` ou ID de la commande
    //     $payment = Payment::where('ref_command', $request->ref_command)->first();

    //     if ($payment) {
    //         // Mettre à jour le statut du paiement
    //         $payment->status = 'success';
    //         $payment->save();

    //         // Retourner un message de succès à l'utilisateur
    //         return redirect()->route('/')->with('success', 'Votre paiement a été effectué avec succès.');
    //     }

    //     return redirect()->route('/')->with('error', 'Impossible de trouver la transaction.');
    // }

    // public function cancel(Request $request)
    // {
    //     // Exemple de récupération du paiement via `ref_command` ou ID de la commande
    //     $payment = Payment::where('ref_command', $request->ref_command)->first();

    //     if ($payment) {
    //         // Mettre à jour le statut du paiement
    //         $payment->status = 'cancelled';
    //         $payment->save();

    //         // Retourner un message d'annulation à l'utilisateur
    //         return redirect()->route('/')->with('error', 'Le paiement a été annulé.');
    //     }

    //     return redirect()->route('/')->with('error', 'Impossible de trouver la transaction.');
    // }
}
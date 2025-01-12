<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paydunya\Checkout\CheckoutInvoice;
use Paydunya\Setup;

class PayDunyaController extends Controller
{
            public function cart()
            {
                $cartItems = session('cart', []); // Récupérer les articles du panier depuis la session
                return view('cart.index', compact('cartItems'));
            }

            public function initiatePayment(Request $request)
            {
                Setup::setMasterKey(env('PAYDUNYA_MASTER_KEY'));
                Setup::setPublicKey(env('PAYDUNYA_PUBLIC_KEY'));
                Setup::setPrivateKey(env('PAYDUNYA_PRIVATE_KEY'));
                Setup::setToken(env('PAYDUNYA_TOKEN'));
                Setup::setMode(env('PAYDUNYA_MODE'));

                $invoice = new CheckoutInvoice();

                // Ajouter les articles au panier PayDunya
                $cartItems = session('cart', []);
                foreach ($cartItems as $item) {
                    $invoice->addItem($item['name'], $item['quantity'], $item['unit_price'], $item['total_price']);
                }

                // Définir les informations du client
                $invoice->addCustomData('client', [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

                // Définir les informations de l'entreprise
                $invoice->setTotalAmount(array_sum(array_column($cartItems, 'total_price')));
                $invoice->setCallbackUrl(route('pay.callback')); // URL de callback après paiement
                $invoice->setCancelUrl(url('/cart'));           // URL en cas d'annulation

                if ($invoice->create()) {
                    return redirect($invoice->getInvoiceUrl());
                } else {
                    return back()->with('error', 'Erreur lors de la création de la facture PayDunya.');
                }
            }

            public function paymentCallback(Request $request)
            {
                // Vérifier le paiement auprès de PayDunya
                $invoiceToken = $request->token;

                $invoice = new CheckoutInvoice();
                if ($invoice->confirm($invoiceToken)) {
                    if ($invoice->getStatus() === 'completed') {
                        // Paiement réussi
                        session()->forget('cart'); // Vider le panier
                        return redirect('/cart')->with('success', 'Paiement effectué avec succès.');
                    }
                }

                return redirect('/cart')->with('error', 'Échec du paiement.');
            }
            public function addToCart(Request $request)
            {
                $cart = session()->get('cart', []);
                $cart[] = [
                    'name' => $request->name,
                    'quantity' => $request->quantity,
                    'unit_price' => $request->price,
                    'total_price' => $request->quantity * $request->price,
                ];

                session()->put('cart', $cart);

                return redirect()->route('cart.index')->with('success', 'Article ajouté au panier.');
            }



}
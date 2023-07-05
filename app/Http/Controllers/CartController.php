<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //calcul du caddie des éléments du tableau
    private function CalculTotal($cartItems){
        $total =0 ;
        foreach ($cartItems  as $cart) {

            $total = $total + ($cart->quantity * $cart->product->prix);
            // $total += ($cart->quantity * $cart->product->prix);

        }
        // calcul avec la TVA
        // $total *=1.085; 
    return $total;
    }

    //lister les produits du panier
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cartItems);
        $total = $this->CalculTotal($cartItems);
        return view('cart', compact('cartItems', 'total'));
    }
    // pour supprimer un élément du panier
    public function deleteOne(Cart $cart)
    {
        // effacer un élément
        $cart->delete();
        // on fait une redirection vers le panier
        return redirect(route('cart'));
    }

    public function delete()
    {
        // sélectionner les éléments de l'utilisateur dans son panier puis delete: pour effacer
        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect(route('cart'));
    }
    // update
    public function update(Cart $cart, $quantity = 1 /*Request $request*/)
    {
        $cart->update(['quantity' => $quantity/*$request->quantity*/]); //Maj de la quantité de base
    
        //lecture des éléments du caddies  : read all item cart user

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();



        return response()->json([
            'result' => true,
            'total' => $total
        ]); //message pour confirmer que tout c'est bien passer
    }
}

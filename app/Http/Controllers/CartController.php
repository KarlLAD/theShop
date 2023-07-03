<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }
    // pour supprimer un élément du panier
    public function deleteOne(Cart $cart)
    {
        // effacer un élément
        $cart->delete();
        // on fait une redirection vers le panier
        return redirect(route('cart'));
    }


}

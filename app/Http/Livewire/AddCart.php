<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddCart extends Component
{
    public $product;
    public $quantity = 1 ;
    

 public function add(Product $product = null)  {

    if (Auth::user() == null) {
        return redirect(route('login'));
    }

    // dd($product);
    //vérifions si le produit n'est pas existant dans la panier
    $cart = Cart::where('user_id', Auth::user()->id)
                    ->where('product_id', $this->product->id)
                    ->first();


                    if (isset($cart)) {
                        $cart->update([
                            'quantity' => $this->quantity
                        ]);
                        
                    } else {
                        Cart::create([
                            'user_id' => Auth::user()->id,
                            'product_id' => $this->product->id,
                            'quantity' => $this->quantity,
                            'prix' => $this->product->prix
                        ]);
                    }
                    

    
 }
public function onChange()  {
    dd($this->quantity);
    
}

    public function render()
    {

        return view('livewire.add-cart');
    }
}

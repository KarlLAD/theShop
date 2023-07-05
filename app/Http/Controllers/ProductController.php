<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($id=0)
    {
        //Lister les produits avec requête sql de db d'une catégorie
        if ($id !==0) {
            $products = Product::where('category_id',$id)
            ->orderBy('created_at' , 'desc')
            ->paginate(6);
        } else{
            // récupère tout les produits de la db
            $products = Product::orderBy('created_at' , 'desc')->paginate(6);
        }


        // dd( $products);
        //classer les produits 'where'

        return view('welcome', compact('products'));
    }
    //fct détail
    public function detail(Product $product = null) 
     {
        // dd($product);
        //créer la vue détail
        return view('detail',compact('product'));
    }
    /***
     *  methode recherche à partir du mot clé $keyword
     * 
     */
    public function search(String $keyword = '')  {
        $product = Product::where('name', 'LIKE', $keyword.'%')
                    ->limit(3)->get();

                    // dd($product);
                    return response()->json($product) ;
        
    }
}

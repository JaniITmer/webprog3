<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart; 
use App\Models\Product;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function mutat()
    {
        
        $kosarElemek = Cart::where('user_id', auth()->id())->get();
       
        $termekNevek = [];
        foreach ($kosarElemek as $elem) {
            $termek = Product::findOrFail($elem->product_id);
            $termekNevek[] = $termek->name;
        }
        
        
        return view('cart')->with('kosarElemek', $kosarElemek)->with('termekNevek', $termekNevek);
    }


    public function hozzaad(Request $request)
    {
        
        {
           
            $termekId = $request->input('termek_id');
            $mennyiseg = $request->input('mennyiseg');
            $userId = auth()->id(); 
    
            
            $kosarElem = Cart::where('user_id', $userId)
                             ->where('product_id', $termekId)
                             ->first();
    
            if ($kosarElem) {
                
                $kosarElem->update([
                    'mennyiseg' => $kosarElem->mennyiseg + $mennyiseg,
                ]);
            } else {
                
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $termekId,
                    'mennyiseg' => $mennyiseg,
                ]);
            }
    
           
            return back()->with('message', 'A termék sikeresen hozzá lett adva a kosárhoz!');
        }
}
}

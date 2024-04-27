<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      
        $rendezes = $request->query('rendezes', 'default');
    
       
        switch ($rendezes) {
            case 'ar_novekvo':
                $products = Product::orderBy('price', 'asc')->paginate(20);
                break;

                case 'nev_novekvo':
                    $products = Product::orderBy('name', 'asc')->paginate(20);
                    break;

                    case 'nev_csokkeno':
                        $products = Product::orderBy('name', 'desc')->paginate(20);
                        break;
            case 'ar_csokkeno':
                $products = Product::orderBy('price', 'desc')->paginate(20);
                break;
            default:
                $products = Product::paginate(20);
                break;
        }
    
        return view('home')->with('products', $products);
    }
}

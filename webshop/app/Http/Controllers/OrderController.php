<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class OrderController extends Controller
{
    public function showOrderForm()
    {
        return view('order');
    }

    public function submitOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Rendelés létrehozása
        $order = Order::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
        ]);

        // Kosárban lévő elemek törlése
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order.success')->with('message', 'A rendelés sikeresen leadva!');
    }

    public function orderSuccess()
    {
        return view('order_success');
    }
}
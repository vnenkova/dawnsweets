<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartProduct;
use App\Models\Cake;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(10);

        return view('pages.orders-index', compact('orders'));
    }

    public function store()
    {
        $user = Auth::user();

        $cart_items = CartProduct::with('cake')
            ->where('user_id', $user->id)
            ->get();

        if (!$cart_items) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = 0;

        foreach ($cart_items as $cart_item) {
            $total += $cart_item->cake->price * $cart_item->quantity;
        }

        $order = Order::create([
            'user_id'     => $user->id,
            'total_price' => $total,
            'status'      => 'pending'
        ]);

        foreach ($cart_items as $cart_item) {
            OrderItem::create([
                'order_id' => $order->id,
                'cake_id'  => $cart_item->cake->id,
                'quantity' => $cart_item->quantity,
                'price'    => $cart_item->cake->price
            ]);
        }

        CartProduct::where('user_id', $user->id)->delete();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}

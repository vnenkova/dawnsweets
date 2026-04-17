<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartProduct;
use App\Models\Cake;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart_products = CartProduct::with('cake')->where('user_id', Auth::user()->id)->paginate(12);

        $total = 0;

        foreach ($cart_products as $cart_product) {
            $total += $cart_product->cake->price * $cart_product->quantity;
        }

        return view('pages.cart-index', compact('cart_products', 'total'));
    }

    public function add(string $id)
    {
        $cake = Cake::where('id', $id)->first();

        if (!$cake) {
            return redirect()->back()->with('error', 'No such product found.');
        }

        $cartItem = CartProduct::where('cake_id', $cake->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartProduct::create([
                'cake_id' => $cake->id,
                'user_id' => Auth::user()->id
            ]);  
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(string $id) {
        $cartItem = CartProduct::where('id', $id)->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'No such item found.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}

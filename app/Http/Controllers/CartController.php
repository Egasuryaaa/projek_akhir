<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Tambahkan item ke cart (session, untuk web)
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Tampilkan keranjang (untuk web)
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart', compact('cartItems'));
    }

    // API: Tampilkan cart item dari database dalam format custom
    public function apiShow($cartId)
    {
        $cartItems = CartItem::with(['product.category'])
            ->where('cart_id', $cartId)
            ->get();

        $data = $cartItems->map(function($item) {
            return [
                'id' => $item->id,
                'cart_id' => $item->cart_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'product' => [
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'poster' => $item->product->images ? asset('storage/' . $item->product->images) : null,
                    'fishType' => $item->product->category?->name,
                ],
            ];
        })->values();

        return response()->json($data);
    }
}
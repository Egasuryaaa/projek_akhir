<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
{
    $cart = session()->get('cart', []);

    // Cek apakah produk sudah ada di keranjang
    if (isset($cart[$product->id])) {
        // Jika produk sudah ada, tambahkan kuantitasnya
        $cart[$product->id]['quantity']++;
    } else {
        // Jika produk belum ada, tambahkan produk ke keranjang dengan id sebagai kunci
        $cart[$product->id] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->image,  // Pastikan ini sesuai dengan field yang ada
        ];
    }

    // Simpan keranjang kembali ke session
    session()->put('cart', $cart);

    // Redirect ke halaman keranjang
    return redirect()->route('cart.index');
}


    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart', compact('cartItems'));
    }
}


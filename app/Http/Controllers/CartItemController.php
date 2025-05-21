<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartItemController extends Controller
{
    // Menambah item ke cart
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::create($validated);
        $cartItem->load('product.category');

        return response()->json([
            'id' => $cartItem->id,
            'cart_id' => $cartItem->cart_id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'product' => [
                'name' => $cartItem->product->name,
                'price' => $cartItem->product->price,
                'poster' => $cartItem->product->images ? asset('storage/' . $cartItem->product->images) : null,
                'fishType' => $cartItem->product->category?->name,
            ],
        ], 201);
    }

    // Menampilkan semua cart item (format custom, tanpa paginasi)
    public function index()
    {
        $cartItems = CartItem::with(['product.category'])->get();

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
public function show($id)
{
    $cartItem = \App\Models\CartItem::with(['product.category'])->findOrFail($id);

    return response()->json([
        'id' => $cartItem->id,
        'cart_id' => $cartItem->cart_id,
        'product_id' => $cartItem->product_id,
        'quantity' => $cartItem->quantity,
        'product' => [
            'name' => $cartItem->product->name,
            'price' => $cartItem->product->price,
            'poster' => $cartItem->product->images ? asset('storage/' . $cartItem->product->images) : null,
            'fishType' => $cartItem->product->category?->name,
        ],
    ]);
}
    // Tambahkan update dan destroy sesuai kebutuhan
}
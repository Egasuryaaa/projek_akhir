<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .cart {
            padding: 20px;
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .cart-item button {
            padding: 5px 10px;
            background-color: #ff6347;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .cart-item button:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>
    <div class="cart">
        <h1>Keranjang Belanja</h1>
        @if(count($cartItems) > 0)
            @foreach($cartItems as $item)
                <div class="cart-item">
                    <p>{{ $item['name'] }} x {{ $item['quantity'] }}</p>
                    <p>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                        @csrf
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
        <a href="{{ route('checkout') }}">Lanjutkan ke Pembayaran</a>
    </div>
</body>
</html>

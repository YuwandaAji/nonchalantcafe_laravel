<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nonchalant Coffee - Order System</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
</head>
<body>
    <div class="container">
        <header>
            <h1>☕ Nonchalant Coffee</h1>
            <p class="tagline">Where Every Sip Tells a Story</p>
        </header>

        <div class="content">
            <div class="menu-section" id="menu">
    @foreach(['Coffe' => '☕ Coffee Selection', 'Snack' => '🥐 Snacks', 'Signature' => '🌟 Signature Menu'] as $key => $title)
        <div class="category-group">
            <h2 class="category-title">{{ $title }}</h2>
            <div class="menu-grid">
                @foreach($products->where('product_category', $key) as $p)
                    <div class="menu-item">
                        <div class="image">
                            @if($key == 'Coffe') ☕ @elseif($key == 'Snack') 🥐 @else ✨ @endif
                        </div>
                        <h3>{{ $p->product_name }}</h3>
                        <p class="menu-desc">{{ $p->product_description }}</p>
                        <div class="price">Rp {{ number_format($p->product_price, 0, ',', '.') }}</div>
                        <button onclick="addToCart({{ $p->product_id }}, '{{ $p->product_name }}', {{ $p->product_price }})">
                            ADD TO CART
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

            <div class="cart-section">
                <h2>🛒 CART <span id="cartBadge"></span></h2>
                <div id="cart">
                    </div>
                <div class="total-section">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">Rp 0</span>
                    </div>
                    <div class="total" id="total">TOTAL: Rp 0</div>
                    <button id="checkoutBtn" class="checkout-btn">PLACE ORDER</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('css/cart.js') }}"></script>
</body>
</html>
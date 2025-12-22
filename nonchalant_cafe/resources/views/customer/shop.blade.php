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
                    <div class="payment-method" style="margin-top: 20px;">
</div>
                    <button id="checkoutBtn" class="checkout-btn">PLACE ORDER</button>
                </div>
            </div>
        </div>
    </div>

    <div id="paymentModal" class="modal" style="display:none; position:fixed; z-index:999; left:0; top:0; width:100%; height:100%; background: rgba(0,0,0,0.7);">
    <div class="modal-content" style="background:#fff; margin:10% auto; padding:20px; width:350px; border-radius:10px; text-align:center;">
        <h2>Total: <span id="modalTotalText">Rp 0</span></h2>
        <hr>
        <div style="margin: 15px 0; text-align:left;">
            <label>Metode Pembayaran:</label>
            <select id="pay_method" style="width:100%; padding:8px; margin-top:5px;">
                <option value="1">Cash</option>
                <option value="2">QRIS</option>
            </select>
        </div>
        <div style="margin: 15px 0; text-align:left;">
            <label>Uang Diterima:</label>
            <input type="number" id="cashAmount" placeholder="0" style="width:100%; padding:8px; margin-top:5px;">
        </div>
        <h3 style="color: green;">Kembalian: <span id="changeText">Rp 0</span></h3>
        <div style="display:flex; gap:10px; margin-top:20px;">
            <button onclick="closeModal()" style="flex:1; padding:10px; background:#ccc; border:none; cursor:pointer;">Batal</button>
            <button id="confirmPayBtn" style="flex:1; padding:10px; background:#d4af37; color:#white; border:none; cursor:pointer;">KONFIRMASI BAYAR</button>
        </div>
    </div>
</div>
    
    <script src="{{ asset('css/cart.js') }}"></script>
</body>
</html>
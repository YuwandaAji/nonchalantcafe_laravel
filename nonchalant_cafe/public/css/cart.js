// Inisialisasi keranjang kosong
let cart = {};

// 1. Fungsi Format Rupiah agar tampilan harga rapi
function formatRupiah(num) {
    return 'Rp ' + parseInt(num).toLocaleString('id-ID');
}

// 2. Fungsi Tambah ke Keranjang
// Fungsi ini dipanggil dari tombol "ADD TO CART" di file Blade kamu
window.addToCart = function(id, name, price) {
    if (cart[id]) {
        cart[id].quantity++;
    } else {
        cart[id] = {
            name: name,
            price: price,
            quantity: 1
        };
    }
    renderCart();
};

// 3. Fungsi Update Jumlah (Tambah/Kurang)
window.updateCart = function(id, qty) {
    qty = parseInt(qty);
    if (qty > 0) {
        cart[id].quantity = qty;
    } else {
        delete cart[id];
    }
    renderCart();
};

// 4. Fungsi Hapus Item dari Keranjang
window.removeFromCart = function(id) {
    delete cart[id];
    renderCart();
};

// 5. Fungsi Render (Menampilkan data ke HTML)
function renderCart() {
    const cartDiv = document.getElementById('cart');
    if(!cartDiv) return;

    cartDiv.innerHTML = '';
    let subtotal = 0, count = 0;

    Object.entries(cart).forEach(([id, item]) => {
        subtotal += item.price * item.quantity;
        count += item.quantity;
        
        const div = document.createElement('div');
        div.className = 'cart-item';
        div.innerHTML = `
            <div class="cart-item-header">
                <div style="flex:1;">
                    <div class="cart-item-name">${item.name}</div>
                    <div class="cart-item-price">${formatRupiah(item.price)} × ${item.quantity}</div>
                </div>
            </div>
            <div class="cart-controls">
                <button onclick="updateCart(${id}, ${cart[id].quantity - 1})">−</button>
                <input type="number" value="${item.quantity}" class="quantity-input" readonly>
                <button onclick="updateCart(${id}, ${cart[id].quantity + 1})">+</button>
            </div>
            <button class="remove-btn" onclick="removeFromCart(${id})">REMOVE</button>
        `;
        cartDiv.appendChild(div);
    });

    // Update elemen angka di UI
    document.getElementById('subtotal').textContent = formatRupiah(subtotal);
    document.getElementById('total').textContent = 'TOTAL: ' + formatRupiah(subtotal);
    
    const badge = document.getElementById('cartBadge');
    if(badge) badge.textContent = count > 0 ? count : '';
}

// 6. Logika Checkout (Kirim data ke Laravel Database)
document.getElementById('checkoutBtn').addEventListener('click', async () => {
    // Cek jika keranjang kosong
    if (Object.keys(cart).length === 0) {
        alert('Keranjang masih kosong, yuk pilih kopi dulu!');
        return;
    }

    // Ambil Token CSRF dari meta tag di HTML (Wajib untuk Laravel)
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        alert('Error: CSRF Token tidak ditemukan. Pastikan ada <meta name="csrf-token"> di HTML.');
        return;
    }

    // Susun data pesanan
    const orderData = {
        payment_id: 1, // Default ID Payment (sesuaikan dengan isi tabel payment kamu)
        items: Object.entries(cart).map(([id, item]) => ({
            id: id,
            price: item.price,
            qty: item.quantity
        }))
    };

    try {
        // Kirim data ke Route POST /order yang sudah kita buat
        const response = await fetch('/order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify(orderData)
        });

        const result = await response.json();

        if (response.ok) {
            alert('Mantap! Pesanan kamu sudah masuk ke database.');
            cart = {}; // Kosongkan keranjang setelah berhasil
            renderCart();
        } else {
            alert('Waduh, gagal simpan: ' + (result.message || 'Cek kembali data kamu.'));
        }
    } catch (error) {
        console.error('Error Checkout:', error);
        alert('Koneksi ke server bermasalah.');
    }
});
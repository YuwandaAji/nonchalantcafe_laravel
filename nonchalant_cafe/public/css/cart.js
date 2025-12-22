// 1. Inisialisasi State
let cart = {};
window.currentTotal = 0;

// 2. Fungsi Format Rupiah
function formatRupiah(num) {
    return 'Rp ' + parseInt(num).toLocaleString('id-ID');
}

// 3. Tambah ke Keranjang (Dipanggil dari tombol di Blade)
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

// 4. Update Quantity (Tambah/Kurang)
window.updateCart = function(id, qty) {
    qty = parseInt(qty);
    if (qty > 0) {
        cart[id].quantity = qty;
    } else {
        delete cart[id];
    }
    renderCart();
};

// 5. Hapus Item
window.removeFromCart = function(id) {
    delete cart[id];
    renderCart();
};

// 6. Render Tampilan Keranjang
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

    document.getElementById('subtotal').textContent = formatRupiah(subtotal);
    document.getElementById('total').textContent = 'TOTAL: ' + formatRupiah(subtotal);
    
    const badge = document.getElementById('cartBadge');
    if(badge) badge.textContent = count > 0 ? count : '';

    // Simpan subtotal ke global variable untuk modal
    window.currentTotal = subtotal;
}

// 7. Logika Modal Pembayaran
// Muncul saat klik tombol "PLACE ORDER"
document.getElementById('checkoutBtn').addEventListener('click', () => {
    if (Object.keys(cart).length === 0) {
        alert('Keranjang masih kosong!');
        return;
    }
    
    // Tampilkan Modal
    document.getElementById('modalTotalText').textContent = formatRupiah(window.currentTotal);
    document.getElementById('paymentModal').style.display = 'block';
    
    // Reset input uang
    document.getElementById('cashAmount').value = '';
    document.getElementById('changeText').textContent = 'Rp 0';
});

// Hitung Kembalian Otomatis (Input Event)
document.getElementById('cashAmount').addEventListener('input', (e) => {
    const cash = parseFloat(e.target.value) || 0;
    const change = cash - window.currentTotal;
    document.getElementById('changeText').textContent = formatRupiah(change > 0 ? change : 0);
});

// Tutup Modal
window.closeModal = function() {
    document.getElementById('paymentModal').style.display = 'none';
};

// 8. Konfirmasi & Simpan ke Database
document.getElementById('confirmPayBtn').addEventListener('click', async () => {
    const cash = parseFloat(document.getElementById('cashAmount').value) || 0;
    
    // Validasi uang cukup
    if (cash < window.currentTotal) {
        alert('Maaf, uang yang dimasukkan kurang!');
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const orderData = {
        payment_id: document.getElementById('pay_method').value,
        items: Object.entries(cart).map(([id, item]) => ({
            id: id,
            price: item.price,
            qty: item.quantity
        }))
    };

    try {
        const response = await fetch('/order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(orderData)
        });

        const result = await response.json();

        if (response.ok) {
            const kembalian = document.getElementById('changeText').textContent;
            alert('Transaksi Berhasil!\n' + kembalian);
            
            // Bersihkan data
            cart = {};
            renderCart();
            closeModal();
        } else {
            alert('Gagal: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Gagal terhubung ke server.');
    }
});
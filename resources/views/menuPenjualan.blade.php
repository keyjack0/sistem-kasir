@include('layouts.header')
<!-- Konten Utama -->
<main class="container-fluid mt-4">
    <div class="row px-3">
        <!-- Kolom Daftar Menu -->
        <div class="col-lg-7">
            <div id="menu-list" class="row g-3">
                <!-- Menu items will be loaded by JavaScript -->
            </div>
        </div>

        <!-- Kolom Keranjang -->
        <div class="col-lg-5 d-flex flex-column h-100">
            <div class="cart-section d-flex flex-column">
                <div id="cart-items-container" class="flex-grow-1">
                    <!-- Keranjang kosong akan ditampilkan di sini -->
                </div>
                <div class="cart-summary">
                    <p class="mb-2 fw-bold"><span id="total-items">0</span> Item</p>
                    <h4 class="fw-bold">Total : Rp <span id="total-price">0</span></h4>
                    <button id="pay-button" class="btn btn-pay mt-3">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Konfirmasi Pembayaran -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-5 w-100 text-center" id="paymentModalLabel">Konfirmasi Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table modal-table">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="modal-cart-items">
                            <!-- Item dari keranjang akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center align-items-center my-3 gap-2 modal-summary">
                    <span>Metode Pembayaran :</span>
                    <select class="form-select w-auto">
                        <option value="cash" selected>CASH</option>
                        <option value="qris">QRIS</option>
                        <option value="card">Kartu Debit/Kredit</option>
                    </select>
                </div>
                <p class="text-center fw-bold fs-5">Total Harga : Rp <span id="modal-total-price">0</span></p>
            </div>
            <div class="modal-footer border-0 justify-content-center gap-3">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-confirm-pay" id="confirm-payment-btn">Bayar</button>
            </div>
        </div>
    </div>
</div>


<!-- CDN untuk Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- JavaScript untuk Fungsionalitas -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data menu (bisa diambil dari database di aplikasi nyata)
        let menuData = [];

        fetch('/menu')
            .then(response => response.json())
            .then(data => {
                menuData = data;
                renderMenu(); // render setelah data tersedia
            });

        let cart = []; // State untuk keranjang
        const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));

        // Elemen DOM
        const menuListContainer = document.getElementById('menu-list');
        const cartItemsContainer = document.getElementById('cart-items-container');
        const totalItemsEl = document.getElementById('total-items');
        const totalPriceEl = document.getElementById('total-price');
        const payButton = document.getElementById('pay-button');
        const modalCartItemsContainer = document.getElementById('modal-cart-items');
        const modalTotalPriceEl = document.getElementById('modal-total-price');
        const confirmPaymentBtn = document.getElementById('confirm-payment-btn');

        // --- FUNGSI-FUNGSI ---
        function renderMenu() {
            menuListContainer.innerHTML = '';
            menuData.forEach(item => {
                menuListContainer.innerHTML += `
                        <div class="col-md-6 col-lg-4">
                            <div class="card menu-item" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">${item.name}</h5>
                                    <p class="card-text">Rp ${item.price.toLocaleString('id-ID')}</p>
                                </div>
                            </div>
                        </div>`;
            });
        }

        function renderCart() {
            cartItemsContainer.innerHTML = '';
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p class="text-center text-muted">Keranjang Anda kosong</p>';
            } else {
                cart.forEach(item => {
                    cartItemsContainer.innerHTML += `
                            <div class="cart-item">
                                <div class="cart-item-details">
                                    <span>${item.name}</span>
                                    <small class="d-block text-muted">Rp ${item.price.toLocaleString('id-ID')}</small>
                                </div>
                                <div class="quantity-controls">
                                    <button class="btn btn-qty" data-id="${item.id}" data-action="decrease">-</button>
                                    <span class="fw-bold mx-2">${item.quantity}</span>
                                    <button class="btn btn-qty" data-id="${item.id}" data-action="increase">+</button>
                                </div>
                            </div>`;
                });
            }
            updateSummary();
        }

        function updateSummary() {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            totalItemsEl.textContent = totalItems;
            totalPriceEl.textContent = totalPrice.toLocaleString('id-ID');
            payButton.disabled = cart.length === 0;
        }

        function populatePaymentModal() {
            modalCartItemsContainer.innerHTML = '';
            let finalTotal = 0;
            cart.forEach(item => {
                const total = item.price * item.quantity;
                finalTotal += total;
                modalCartItemsContainer.innerHTML += `
                        <tr>
                            <td>${item.name}</td>
                            <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                            <td>${item.quantity}</td>
                            <td>Rp ${total.toLocaleString('id-ID')}</td>
                        </tr>`;
            });
            modalTotalPriceEl.textContent = finalTotal.toLocaleString('id-ID');
        }

        function clearCart() {
            cart = [];
            renderCart();
        }

        // --- EVENT LISTENERS ---
        menuListContainer.addEventListener('click', function(e) {
            const menuItem = e.target.closest('.menu-item');
            if (!menuItem) return;
            const id = parseInt(menuItem.dataset.id);
            const existingItem = cart.find(item => item.id === id);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    id,
                    name: menuItem.dataset.name,
                    price: parseInt(menuItem.dataset.price),
                    quantity: 1
                });
            }
            renderCart();
        });

        cartItemsContainer.addEventListener('click', function(e) {
            if (!e.target.classList.contains('btn-qty')) return;
            const id = parseInt(e.target.dataset.id);
            const action = e.target.dataset.action;
            const itemInCart = cart.find(item => item.id === id);
            if (!itemInCart) return;
            if (action === 'increase') {
                itemInCart.quantity++;
            } else if (action === 'decrease') {
                itemInCart.quantity--;
                if (itemInCart.quantity <= 0) {
                    cart = cart.filter(item => item.id !== id);
                }
            }
            renderCart();
        });

        payButton.addEventListener('click', function() {
            if (cart.length > 0) {
                populatePaymentModal();
                paymentModal.show();
            }
        });

        confirmPaymentBtn.addEventListener('click', function() {
            // Di aplikasi nyata, di sini Anda akan memproses pembayaran
            // alert('Pembayaran berhasil!');
            const metode = document.querySelector('select').value;
            const totalHarga = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

            fetch('/pembayaran/simpan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                        // penting!
                    },
                    body: JSON.stringify({
                        metode: metode,
                        items: cart,
                        total: totalHarga
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pembayaran berhasil!',
                            text: '{{ session('success') }}'
                        });
                        paymentModal.hide();
                        clearCart();
                    } else {
                        Swal.fire({
                            icon: 'eror',
                            title: 'Gagal meyimpan transaksi',
                            text: '{{ session('success') }}'
                        });
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert('Terjadi kesalahan saat menyimpan transaksi.');
                });

            paymentModal.hide();
            clearCart();
        });

        // --- INISIALISASI ---
        renderMenu();
        renderCart();
    });
</script>

</body>

</html>

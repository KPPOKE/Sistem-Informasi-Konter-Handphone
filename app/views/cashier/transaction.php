<div class="transaction-layout">
    
    <div class="transaction-products">
        
        <div class="search-box">
            <input type="text" class="search-input" id="searchProduct" placeholder="Cari produk...">
        </div>

        <div class="products-grid" id="productGrid">
            <?php foreach($data['products'] as $product): ?>
            <div class="product-card <?= $product['stock'] <= 0 ? 'out-of-stock' : '' ?>" 
                 data-name="<?= strtolower($product['name']); ?>"
                 onclick='<?= $product['stock'] > 0 ? "addToCart(" . json_encode($product) . ")" : "" ?>'>
                <div class="product-icon">
                    <i class="fas fa-<?= $product['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>"></i>
                </div>
                <div class="product-name" title="<?= $product['name']; ?>"><?= $product['name']; ?></div>
                <div class="product-price">Rp <?= number_format($product['price'], 0, ',', '.'); ?></div>
                <div class="product-stock">
                    <?php if($product['stock'] <= 0): ?>
                        <span class="badge badge-danger">Habis</span>
                    <?php elseif($product['stock'] < 5): ?>
                        <span class="stock-badge stock-low"><?= $product['stock']; ?></span>
                    <?php else: ?>
                        Stok: <?= $product['stock']; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="cart-panel" id="cartPanel">
        <div class="cart-header">
            <h3>
                <i class="fas fa-shopping-cart"></i>
                Keranjang
                <span class="cart-count" id="cartCount">0</span>
            </h3>
        </div>

        <div class="cart-items" id="cartItems">
            
            <div class="cart-empty" id="emptyCartMsg">
                <i class="fas fa-shopping-basket"></i>
                <p>Keranjang kosong</p>
            </div>
        </div>

        <div class="cart-footer">
            <div class="cart-total">
                <span class="cart-total-label">Total</span>
                <span class="cart-total-value" id="totalAmount">Rp 0</span>
            </div>
            <button class="btn btn-primary btn-pay" id="btnCheckout" disabled onclick="showCheckoutModal()">
                <i class="fas fa-credit-card"></i>
                Bayar
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="checkoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="customerName" value="Umum" placeholder="Nama pelanggan (opsional)">
                </div>
                <div class="form-group">
                    <label class="form-label">Total Tagihan</label>
                    <div class="checkout-total" id="modalTotal">Rp 0</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Uang Diterima</label>
                    <input type="number" class="form-control cash-input" id="cashReceived" oninput="calculateChange()" placeholder="Masukkan nominal">
                </div>
                <div class="form-group mb-0">
                    <label class="form-label">Kembalian</label>
                    <div class="checkout-change text-success" id="changeAmount">Rp 0</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnProcess" disabled onclick="processTransaction()">
                    <i class="fas fa-check"></i>
                    Proses Transaksi
                </button>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary btn-cart-toggle" id="cartToggle" style="display: none; position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; border-radius: 50%; z-index: 1000;">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count" id="mobileCartCount" style="position: absolute; top: -5px; right: -5px;">0</span>
</button>

<script>
    let cart = [];

    function addToCart(product) {
        if(product.stock <= 0) {
            alert('Stok habis!');
            return;
        }
        
        const existingItem = cart.find(item => item.id == product.id);
        if(existingItem) {
            if(existingItem.qty < product.stock) {
                existingItem.qty++;
            } else {
                alert('Stok tidak mencukupi');
                return;
            }
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: parseInt(product.price),
                qty: 1,
                maxStock: product.stock
            });
        }
        renderCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        renderCart();
    }

    function updateQty(index, change) {
        const item = cart[index];
        const newQty = item.qty + change;
        
        if(newQty > 0 && newQty <= item.maxStock) {
            item.qty = newQty;
            renderCart();
        } else if (newQty <= 0) {
            removeFromCart(index);
        } else {
            alert('Stok maksimal tercapai');
        }
    }

    function renderCart() {
        const container = document.getElementById('cartItems');
        const emptyMsg = document.getElementById('emptyCartMsg');
        const btnCheckout = document.getElementById('btnCheckout');
        const totalEl = document.getElementById('totalAmount');
        const cartCount = document.getElementById('cartCount');
        const mobileCartCount = document.getElementById('mobileCartCount');

        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        cartCount.textContent = totalItems;
        if(mobileCartCount) mobileCartCount.textContent = totalItems;

        if(cart.length === 0) {
            container.innerHTML = `
                <div class="cart-empty" id="emptyCartMsg">
                    <i class="fas fa-shopping-basket"></i>
                    <p>Keranjang kosong</p>
                </div>
            `;
            btnCheckout.disabled = true;
            totalEl.innerText = 'Rp 0';
            return;
        }

        container.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const subtotal = item.price * item.qty;
            total += subtotal;
            
            const div = document.createElement('div');
            div.className = 'cart-item';
            div.innerHTML = `
                <div class="cart-item-header">
                    <span class="cart-item-name">${item.name}</span>
                    <button class="cart-item-remove" onclick="removeFromCart(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="cart-item-footer">
                    <div class="cart-item-qty">
                        <button onclick="updateQty(${index}, -1)">-</button>
                        <span>${item.qty}</span>
                        <button onclick="updateQty(${index}, 1)">+</button>
                    </div>
                    <span class="cart-item-subtotal">Rp ${new Intl.NumberFormat('id-ID').format(subtotal)}</span>
                </div>
            `;
            container.appendChild(div);
        });

        totalEl.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        btnCheckout.disabled = false;
    }

    document.getElementById('searchProduct').addEventListener('keyup', function(e) {
        const term = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.product-card');
        
        items.forEach(item => {
            const name = item.getAttribute('data-name');
            if(name && name.includes(term)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    function showCheckoutModal() {
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        document.getElementById('modalTotal').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        document.getElementById('cashReceived').value = '';
        const changeEl = document.getElementById('changeAmount');
        changeEl.innerText = 'Rp 0';
        changeEl.classList.remove('text-danger');
        changeEl.classList.add('text-success');
        document.getElementById('btnProcess').disabled = true;
        
        new bootstrap.Modal(document.getElementById('checkoutModal')).show();
    }

    function calculateChange() {
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        const cash = parseInt(document.getElementById('cashReceived').value) || 0;
        const change = cash - total;
        
        const changeEl = document.getElementById('changeAmount');
        const btn = document.getElementById('btnProcess');

        if(change >= 0) {
            changeEl.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(change);
            changeEl.classList.remove('text-danger');
            changeEl.classList.add('text-success');
            btn.disabled = false;
        } else {
            changeEl.innerText = '- Rp ' + new Intl.NumberFormat('id-ID').format(Math.abs(change));
            changeEl.classList.remove('text-success');
            changeEl.classList.add('text-danger');
            btn.disabled = true;
        }
    }

    function processTransaction() {
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        const cash = parseInt(document.getElementById('cashReceived').value);
        const change = cash - total;
        const customerName = document.getElementById('customerName').value || 'Umum';

        const data = {
            customer_name: customerName,
            total_amount: total,
            cash_received: cash,
            change_amount: change,
            items: cart
        };

        fetch('<?= BASEURL; ?>/CashierController/processTransaction', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if(result.status === 'success') {
                alert('Transaksi Berhasil!');
                window.location.reload();
            } else {
                alert('Transaksi Gagal: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan sistem');
        });
    }

    const cartToggle = document.getElementById('cartToggle');
    const cartPanel = document.getElementById('cartPanel');
    
    if(window.innerWidth < 992 && cartToggle) {
        cartToggle.style.display = 'flex';
        cartToggle.addEventListener('click', function() {
            cartPanel.classList.toggle('show');
        });
    }
</script>

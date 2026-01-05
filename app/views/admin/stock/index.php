<div class="page-header">
    <h2 class="page-title">Kelola Stok Barang</h2>
</div>

<script>
function incrementStock(btn) {
    const input = btn.parentElement.querySelector('input[name="stock"]');
    input.value = parseInt(input.value || 0) + 1;
}

function decrementStock(btn) {
    const input = btn.parentElement.querySelector('input[name="stock"]');
    const currentVal = parseInt(input.value || 0);
    if (currentVal > 0) {
        input.value = currentVal - 1;
    }
}
</script>
<style>
.stock-update-form {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.stock-update-form .number-input {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.stock-update-form .stock-input {
    width: 80px;
    text-align: center;
    padding: 8px 12px;
}

.stock-update-form .btn-icon {
    width: 32px;
    height: 32px;
    padding: 0;
}
</style>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Stok Saat Ini</th>
                <th>Update Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['products'])): ?>
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <i class="fas fa-cubes"></i>
                        <h3>Belum Ada Produk</h3>
                        <p>Tambahkan produk terlebih dahulu</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($data['products'] as $index => $product): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td>
                    <span class="badge badge-gray"><?= $product['category_name'] ?? '-'; ?></span>
                </td>
                <td class="fw-medium"><?= htmlspecialchars($product['name']); ?></td>
                <td>
                    <?php 
                    $stockClass = 'stock-high';
                    if($product['stock'] < 5) $stockClass = 'stock-low';
                    elseif($product['stock'] < 20) $stockClass = 'stock-medium';
                    ?>
                    <span class="stock-badge <?= $stockClass; ?>"><?= $product['stock']; ?></span>
                </td>
                <td>
                    <form action="<?= BASEURL; ?>/AdminController/updateStock" method="POST" class="stock-update-form">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <div class="number-input">
                            <button type="button" class="btn btn-icon btn-secondary" onclick="decrementStock(this)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" name="stock" class="form-control stock-input" value="<?= $product['stock']; ?>" min="0" required>
                            <button type="button" class="btn btn-icon btn-secondary" onclick="incrementStock(this)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="page-header">
    <h2 class="page-title">Kelola Produk</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        <i class="fas fa-plus"></i> Tambah Produk
    </button>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['products'])): ?>
            <tr>
                <td colspan="7">
                    <div class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <h3>Belum Ada Produk</h3>
                        <p>Klik tombol "Tambah Produk" untuk menambahkan produk baru</p>
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
                    <span class="badge <?= $product['type'] == 'hp' ? 'badge-primary' : 'badge-teal'; ?>">
                        <?= $product['type'] == 'hp' ? 'HP' : 'Aksesoris'; ?>
                    </span>
                </td>
                <td class="text-primary fw-medium">Rp <?= number_format($product['price'], 0, ',', '.'); ?></td>
                <td>
                    <?php 
                    $stockClass = 'stock-high';
                    if($product['stock'] < 5) $stockClass = 'stock-low';
                    elseif($product['stock'] < 20) $stockClass = 'stock-medium';
                    ?>
                    <span class="stock-badge <?= $stockClass; ?>"><?= $product['stock']; ?></span>
                </td>
                <td>
                    <div class="action-buttons">
                        <button class="btn btn-icon btn-edit" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product['id']; ?>" title="Edit">
                            <i class="fas fa-pen"></i>
                        </button>
                        <a href="<?= BASEURL; ?>/AdminController/deleteProduct/<?= $product['id']; ?>" class="btn btn-icon btn-delete" onclick="return confirm('Yakin hapus produk ini?');" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="editProductModal<?= $product['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="<?= BASEURL; ?>/AdminController/updateProduct" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <div class="form-group">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" name="category_id">
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php foreach($data['categories'] as $cat): ?>
                                        <option value="<?= $cat['id']; ?>" <?= $product['category_id'] == $cat['id'] ? 'selected' : ''; ?>><?= $cat['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tipe</label>
                                    <select class="form-select" name="type">
                                        <option value="hp" <?= $product['type'] == 'hp' ? 'selected' : ''; ?>>Handphone</option>
                                        <option value="accessories" <?= $product['type'] == 'accessories' ? 'selected' : ''; ?>>Aksesoris</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="price" value="<?= $product['price']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Stok</label>
                                    <input type="number" class="form-control" name="stock" value="<?= $product['stock']; ?>" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3"><?= $product['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= BASEURL; ?>/AdminController/addProduct" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" required placeholder="Masukkan nama produk">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($data['categories'] as $cat): ?>
                            <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tipe</label>
                        <select class="form-select" name="type">
                            <option value="hp">Handphone</option>
                            <option value="accessories">Aksesoris</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" required placeholder="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" required placeholder="0">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi produk (opsional)"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

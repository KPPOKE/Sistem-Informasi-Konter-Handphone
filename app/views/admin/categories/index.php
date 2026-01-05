<div class="page-header">
    <h2 class="page-title">Kelola Kategori</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="fas fa-plus"></i> Tambah Kategori
    </button>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['categories'])): ?>
            <tr>
                <td colspan="3">
                    <div class="empty-state">
                        <i class="fas fa-tags"></i>
                        <h3>Belum Ada Kategori</h3>
                        <p>Klik tombol "Tambah Kategori" untuk menambahkan kategori baru</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($data['categories'] as $index => $cat): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td class="fw-medium"><?= htmlspecialchars($cat['name']); ?></td>
                <td>
                    <div class="action-buttons">
                        <button class="btn btn-icon btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $cat['id']; ?>" title="Edit">
                            <i class="fas fa-pen"></i>
                        </button>
                        <a href="<?= BASEURL; ?>/AdminController/deleteCategory/<?= $cat['id']; ?>" 
                           class="btn btn-icon btn-delete" 
                           onclick="return confirm('Yakin hapus kategori ini?');" 
                           title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editCategoryModal<?= $cat['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="<?= BASEURL; ?>/AdminController/updateCategory" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $cat['id']; ?>">
                                <div class="form-group mb-0">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($cat['name']); ?>" required>
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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= BASEURL; ?>/AdminController/addCategory" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="name" placeholder="Contoh: Samsung, Apple, Aksesoris" required>
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

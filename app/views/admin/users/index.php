<div class="page-header">
    <h2 class="page-title">Kelola Kasir & User</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="fas fa-user-plus"></i> Tambah User Baru
    </button>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Terdaftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['users'])): ?>
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <h3>Belum Ada User</h3>
                        <p>Klik tombol "Tambah User Baru" untuk menambahkan user</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($data['users'] as $u): ?>
            <tr>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">
                            <?= strtoupper(substr($u['name'], 0, 1)); ?>
                        </div>
                        <span class="fw-medium"><?= htmlspecialchars($u['username']); ?></span>
                    </div>
                </td>
                <td><?= htmlspecialchars($u['name']); ?></td>
                <td>
                    <span class="badge <?= $u['role'] == 'admin' ? 'badge-primary' : 'badge-teal'; ?>">
                        <?= strtoupper($u['role']); ?>
                    </span>
                </td>
                <td class="text-muted"><?= date('d M Y', strtotime($u['created_at'])); ?></td>
                <td>
                    <?php if($u['username'] != 'admin'): ?>
                    <a href="<?= BASEURL; ?>/AdminController/deleteUser/<?= $u['id']; ?>" 
                       class="btn btn-icon btn-delete" 
                       onclick="return confirm('Yakin hapus user ini?');" 
                       title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                    <?php else: ?>
                    <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= BASEURL; ?>/AdminController/addUser" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role">
                            <option value="kasir">Kasir</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>

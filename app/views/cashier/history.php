<div class="page-header">
    <h2 class="page-title">Riwayat Transaksi</h2>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $history = $this->model('TransactionModel')->getHistory();
            if(empty($history)): ?>
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <i class="fas fa-receipt"></i>
                        <h3>Belum Ada Transaksi</h3>
                        <p>Transaksi yang Anda lakukan akan muncul di sini</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($history as $row): ?>
            <tr>
                <td>
                    <span class="id-badge">#<?= $row['id']; ?></span>
                </td>
                <td><?= date('d M Y H:i', strtotime($row['created_at'])); ?></td>
                <td><?= htmlspecialchars($row['customer_name']); ?></td>
                <td>
                    <span class="text-success fw-semibold">Rp <?= number_format($row['total_amount'], 0, ',', '.'); ?></span>
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="showDetail(<?= $row['id']; ?>)">
                        <i class="fas fa-eye"></i> Detail
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailContent">
                <p class="text-center text-muted">Memuat...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function showDetail(id) {
    document.getElementById('detailContent').innerHTML = `
        <div class="text-center">
            <p>Detail transaksi #${id}</p>
            <p class="text-muted">Fitur detail akan segera tersedia</p>
        </div>
    `;
    new bootstrap.Modal(document.getElementById('detailModal')).show();
}
</script>

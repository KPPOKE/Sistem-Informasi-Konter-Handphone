<div class="page-header">
    <h2 class="page-title">Riwayat Transaksi</h2>
    <button class="btn btn-secondary">
        <i class="fas fa-file-export"></i> Export ke Excel
    </button>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['transactions'])): ?>
            <tr>
                <td colspan="6">
                    <div class="empty-state">
                        <i class="fas fa-receipt"></i>
                        <h3>Belum Ada Transaksi</h3>
                        <p>Transaksi yang dilakukan akan muncul di sini</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($data['transactions'] as $trx): ?>
            <tr>
                <td>
                    <span class="id-badge">#<?= $trx['id']; ?></span>
                </td>
                <td><?= date('d M Y H:i', strtotime($trx['created_at'])); ?></td>
                <td class="fw-medium"><?= htmlspecialchars($trx['customer_name'] ?: 'Umum'); ?></td>
                <td>
                    <span class="text-success fw-semibold">Rp <?= number_format($trx['total_amount'], 0, ',', '.'); ?></span>
                </td>
                <td>Rp <?= number_format($trx['cash_received'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($trx['change_amount'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

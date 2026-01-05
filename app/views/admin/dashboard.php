
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon primary">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-content">
            <div class="stat-label">Total Produk</div>
            <div class="stat-value"><?= number_format($data['total_products']); ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon warning">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-content">
            <div class="stat-label">Stok Menipis</div>
            <div class="stat-value warning"><?= number_format($data['low_stock']); ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon primary">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stat-content">
            <div class="stat-label">Omset Hari Ini</div>
            <div class="stat-value primary"><?= formatRupiah($data['today_sales']); ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon success">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <div class="stat-label">Total Pendapatan</div>
            <div class="stat-value success"><?= formatRupiah($data['monthly_sales']); ?></div>
        </div>
    </div>
</div>

<div class="page-header mt-6">
    <h2 class="page-title">Quick Access</h2>
</div>

<div class="quick-actions quick-actions-left">
    <a href="<?= BASEURL; ?>/AdminController/products" class="quick-action-card">
        <i class="fas fa-box"></i>
        <span>Kelola Produk</span>
    </a>
    <a href="<?= BASEURL; ?>/AdminController/stock" class="quick-action-card">
        <i class="fas fa-cubes"></i>
        <span>Update Stok</span>
    </a>
    <a href="<?= BASEURL; ?>/AdminController/transactions" class="quick-action-card">
        <i class="fas fa-history"></i>
        <span>Riwayat Transaksi</span>
    </a>
    <a href="<?= BASEURL; ?>/AdminController/users" class="quick-action-card">
        <i class="fas fa-users"></i>
        <span>Kelola Kasir</span>
    </a>
</div>

<?php
function formatRupiah($number) {
    if ($number >= 1000000) {
        return 'Rp ' . number_format($number / 1000000, 1, ',', '.') . ' Jt';
    } elseif ($number >= 1000) {
        return 'Rp ' . number_format($number / 1000, 0, ',', '.') . ' Rb';
    }
    return 'Rp ' . number_format($number, 0, ',', '.');
}
?>

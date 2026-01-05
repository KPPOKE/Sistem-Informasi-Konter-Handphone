<div class="welcome-section">
    <h1 class="welcome-title">Selamat Datang, <?= $_SESSION['name']; ?>!</h1>
    <p class="welcome-subtitle">Dashboard Kasir Konter Handphone</p>
    
    <div class="quick-actions">
        <a href="<?= BASEURL; ?>/CashierController/transaction" class="quick-action-card primary">
            <i class="fas fa-cash-register"></i>
            <span>Mulai Transaksi</span>
        </a>
        <a href="<?= BASEURL; ?>/CashierController/history" class="quick-action-card">
            <i class="fas fa-history"></i>
            <span>Riwayat Transaksi</span>
        </a>
    </div>
</div>


<aside id="sidebar-wrapper">
    
    <div class="sidebar-logo">
        <h1>
            <i class="fas fa-mobile-alt"></i>
            GadgetHub
        </h1>
    </div>
    
    <nav class="sidebar-nav">
        <?php 
        $current_url = $_GET['url'] ?? ''; 
        function isActive($url, $target) {
            return (strpos($url, $target) !== false) ? 'active' : '';
        }
        ?>

        <?php if($_SESSION['role'] == 'admin'): ?>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController" class="nav-link <?= ($current_url == 'AdminController' || $current_url == '') ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController/products" class="nav-link <?= isActive($current_url, 'products') ?>">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController/categories" class="nav-link <?= isActive($current_url, 'categories') ?>">
                    <i class="fas fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController/stock" class="nav-link <?= isActive($current_url, 'stock') ?>">
                    <i class="fas fa-cubes"></i>
                    <span>Stok Barang</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController/transactions" class="nav-link <?= isActive($current_url, 'transactions') ?>">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Transaksi</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/AdminController/users" class="nav-link <?= isActive($current_url, 'users') ?>">
                    <i class="fas fa-users"></i>
                    <span>Data Kasir</span>
                </a>
            </div>
        <?php else: ?>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/CashierController" class="nav-link <?= ($current_url == 'CashierController' || strpos($current_url, 'CashierController') === 0 && !strpos($current_url, 'transaction') && !strpos($current_url, 'history')) ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/CashierController/transaction" class="nav-link <?= isActive($current_url, 'transaction') ?>">
                    <i class="fas fa-cash-register"></i>
                    <span>Transaksi Baru</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= BASEURL; ?>/CashierController/history" class="nav-link <?= isActive($current_url, 'history') ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Riwayat</span>
                </a>
            </div>
        <?php endif; ?>
    </nav>
    
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>

<div id="page-content-wrapper">
    
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="topbar-title"><?= $data['title']; ?></h1>
        </div>
        <div class="topbar-right">
            <div class="user-info">
                <div class="user-details">
                    <span class="user-name"><?= $_SESSION['name']; ?></span>
                    <span class="user-role <?= $_SESSION['role'] ?>"><?= strtoupper($_SESSION['role']); ?></span>
                </div>
                <div class="user-avatar">
                    <?= strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <?php Flasher::flash(); ?>

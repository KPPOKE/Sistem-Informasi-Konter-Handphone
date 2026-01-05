<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Booking - GadgetHub</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .navbar-home {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 16px 0;
        }
        
        .navbar-brand {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-600);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-link-home {
            color: var(--gray-600);
            font-weight: 500;
            padding: 8px 16px;
            transition: all 0.2s;
            border-radius: 8px;
        }
        
        .nav-link-home:hover {
            color: var(--primary-600);
            background: var(--primary-50);
        }
        
        .check-booking-section {
            padding: 120px 0 80px;
        }
        
        .search-box-container {
            background: #FFFFFF;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            margin: 0 auto 40px;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .search-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 32px;
            color: #FFFFFF;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
        }
        
        .search-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            text-align: center;
            margin-bottom: 12px;
        }
        
        .search-subtitle {
            color: var(--gray-600);
            text-align: center;
            margin-bottom: 32px;
            font-size: 15px;
        }
        
        .search-input-group {
            position: relative;
            margin-bottom: 16px;
        }
        
        .search-input-group input {
            padding: 16px 20px;
            font-size: 16px;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .search-input-group input:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 4px var(--primary-100);
        }
        
        .btn-search {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
        }
        
        .booking-result {
            background: #FFFFFF;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            margin-bottom: 24px;
            animation: fadeInUp 0.6s ease;
        }
        
        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--gray-100);
            margin-bottom: 24px;
        }
        
        .booking-code {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-900);
        }
        
        .booking-code span {
            color: var(--primary-600);
        }
        
        .status-badge {
            padding: 8px 20px;
            border-radius: 24px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background: var(--warning-100);
            color: var(--warning-700);
        }
        
        .status-confirmed {
            background: var(--primary-100);
            color: var(--primary-700);
        }
        
        .status-completed {
            background: var(--success-100);
            color: var(--success-700);
        }
        
        .status-canceled {
            background: var(--danger-100);
            color: var(--danger-700);
        }
        
        .booking-product {
            display: flex;
            gap: 20px;
            padding: 20px;
            background: var(--gray-50);
            border-radius: 12px;
            margin-bottom: 24px;
        }
        
        .product-icon-box {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-50), var(--primary-100));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--primary-600);
            flex-shrink: 0;
        }
        
        .product-details {
            flex: 1;
        }
        
        .product-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 8px;
        }
        
        .product-category {
            font-size: 13px;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        
        .product-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-600);
        }
        
        .booking-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }
        
        .info-item {
            padding: 16px;
            background: var(--gray-50);
            border-radius: 12px;
        }
        
        .info-label {
            font-size: 12px;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        
        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--gray-900);
        }
        
        .timeline {
            position: relative;
            padding-left: 40px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--gray-200);
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 24px;
        }
        
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        
        .timeline-dot {
            position: absolute;
            left: -29px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--gray-300);
        }
        
        .timeline-item.active .timeline-dot {
            background: var(--primary-500);
            box-shadow: 0 0 0 4px var(--primary-100);
        }
        
        .timeline-content {
            font-size: 14px;
            color: var(--gray-600);
        }
        
        .timeline-item.active .timeline-content {
            color: var(--gray-900);
            font-weight: 600;
        }
        
        .no-result {
            background: #FFFFFF;
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            animation: fadeInUp 0.6s ease;
        }
        
        .no-result i {
            font-size: 64px;
            color: var(--gray-300);
            margin-bottom: 20px;
        }
        
        .no-result h3 {
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 12px;
        }
        
        .no-result p {
            color: var(--gray-500);
            margin: 0;
        }
        
        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #FFFFFF;
            color: var(--primary-600);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255,255,255,0.3);
            transition: all 0.3s ease;
            margin-top: 24px;
        }
        
        .btn-back-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,255,255,0.4);
            color: var(--primary-700);
        }
        
        .whatsapp-contact {
            background: #25D366;
            color: #FFFFFF;
            padding: 16px 24px;
            border-radius: 12px;
            text-align: center;
            margin-top: 24px;
        }
        
        .whatsapp-contact a {
            color: #FFFFFF;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .whatsapp-contact a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-home fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">
                <i class="fas fa-mobile-alt"></i>GadgetHub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link-home" href="<?= BASEURL; ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-home" href="<?= BASEURL; ?>#katalog">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-home" href="<?= BASEURL; ?>/HomeController/checkBooking">
                            <i class="fas fa-search me-1"></i>Cek Booking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-home" href="https://wa.me/6281234567890" target="_blank">
                            <i class="fab fa-whatsapp me-1"></i>Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Check Booking Section -->
    <section class="check-booking-section">
        <div class="container">
            <!-- Search Box -->
            <div class="search-box-container">
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h1 class="search-title">Cek Status Booking</h1>
                <p class="search-subtitle">Masukkan kode booking atau nomor WhatsApp Anda untuk melihat status pesanan</p>
                
                <form method="POST" action="<?= BASEURL; ?>/HomeController/checkBooking">
                    <div class="search-input-group">
                        <input type="text" class="form-control" name="search_value" placeholder="Contoh: BK-20241226-0001 atau 08123456789" required>
                    </div>
                    <button type="submit" name="search" class="btn btn-primary btn-search">
                        <i class="fas fa-search me-2"></i>Cari Booking
                    </button>
                </form>
            </div>

            <!-- Results -->
            <?php if(isset($data['booking'])): ?>
                <?php if(!empty($data['booking'])): ?>
                    <?php foreach($data['booking'] as $booking): ?>
                    <div class="booking-result">
                        <!-- Header -->
                        <div class="booking-header">
                            <div class="booking-code">
                                Kode: <span><?= $booking['booking_code']; ?></span>
                            </div>
                            <div>
                                <?php
                                $statusClass = 'status-' . $booking['status'];
                                $statusText = [
                                    'pending' => 'Menunggu',
                                    'confirmed' => 'Dikonfirmasi',
                                    'completed' => 'Selesai',
                                    'canceled' => 'Dibatalkan'
                                ];
                                ?>
                                <span class="status-badge <?= $statusClass; ?>">
                                    <?= $statusText[$booking['status']] ?? $booking['status']; ?>
                                </span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="booking-product">
                            <div class="product-icon-box">
                                <i class="fas fa-<?= $booking['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>"></i>
                            </div>
                            <div class="product-details">
                                <div class="product-category"><?= $booking['category_name'] ?? 'Gadget'; ?></div>
                                <div class="product-name"><?= htmlspecialchars($booking['product_name']); ?></div>
                                <div class="product-price">Rp <?= number_format($booking['price'], 0, ',', '.'); ?></div>
                            </div>
                        </div>

                        <!-- Booking Info -->
                        <div class="booking-info">
                            <div class="info-item">
                                <div class="info-label">Nama Pemesan</div>
                                <div class="info-value"><?= htmlspecialchars($booking['customer_name']); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">No. WhatsApp</div>
                                <div class="info-value"><?= $booking['customer_phone']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Tanggal Booking</div>
                                <div class="info-value"><?= date('d M Y, H:i', strtotime($booking['created_at'])); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Status</div>
                                <div class="info-value"><?= $statusText[$booking['status']] ?? $booking['status']; ?></div>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <h6 style="font-weight: 700; margin-bottom: 20px; color: var(--gray-900);">
                            <i class="fas fa-clock me-2"></i>Timeline Status
                        </h6>
                        <div class="timeline">
                            <div class="timeline-item <?= in_array($booking['status'], ['pending', 'confirmed', 'completed']) ? 'active' : ''; ?>">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <strong>Booking Diterima</strong><br>
                                    Pesanan Anda telah kami terima
                                </div>
                            </div>
                            <div class="timeline-item <?= in_array($booking['status'], ['confirmed', 'completed']) ? 'active' : ''; ?>">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <strong>Dikonfirmasi</strong><br>
                                    Tim kami sedang memproses pesanan Anda
                                </div>
                            </div>
                            <div class="timeline-item <?= $booking['status'] == 'completed' ? 'active' : ''; ?>">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <strong>Selesai</strong><br>
                                    Transaksi telah selesai
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp Contact -->
                        <div class="whatsapp-contact">
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20menanyakan%20booking%20dengan%20kode%20<?= $booking['booking_code']; ?>" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                Hubungi Kami via WhatsApp
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-result">
                        <i class="fas fa-inbox"></i>
                        <h3>Booking Tidak Ditemukan</h3>
                        <p>Maaf, kami tidak menemukan booking dengan kode atau nomor yang Anda masukkan.</p>
                        <p style="margin-top: 8px;">Pastikan kode booking atau nomor WhatsApp sudah benar.</p>
                        <a href="<?= BASEURL; ?>" class="btn-back-home">
                            <i class="fas fa-home"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

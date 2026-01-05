<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['product']['name']; ?> - GadgetHub</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    
    <style>
        body {
            background-color: #F9FAFB;
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
        
        .product-detail-section {
            padding: 120px 0 80px;
        }
        
        .product-image-box {
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--primary-100) 100%);
            border-radius: 20px;
            padding: 0;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            position: relative;
            min-height: 450px;
            overflow: hidden;
        }
        
        .product-icon-wrapper {
            width: 100%;
            height: 100%;
            min-height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 40px;
        }
        
        .product-icon-wrapper i {
            font-size: 160px;
            color: var(--primary-600);
            filter: drop-shadow(0 8px 16px rgba(59, 130, 246, 0.3));
        }
        
        .stock-badge-detail {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            border-radius: 24px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 6px;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            pointer-events: none;
        }
        
        .stock-available {
            background: var(--success-500);
            color: #FFFFFF;
        }
        
        .stock-limited {
            background: var(--warning-500);
            color: #FFFFFF;
        }
        
        .stock-out {
            background: var(--danger-500);
            color: #FFFFFF;
        }
        
        .product-info-box {
            background: #FFFFFF;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .product-category-badge {
            display: inline-block;
            background: var(--primary-50);
            color: var(--primary-600);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }
        
        .product-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 16px;
        }
        
        .product-price {
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-800));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 24px;
        }
        
        .product-description {
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 32px;
            font-size: 15px;
        }
        
        .product-specs {
            background: var(--gray-50);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
        }
        
        .spec-item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-200);
        }
        
        .spec-item:last-child {
            border-bottom: none;
        }
        
        .spec-label {
            font-weight: 600;
            color: var(--gray-700);
            min-width: 140px;
        }
        
        .spec-value {
            color: var(--gray-600);
        }
        
        .btn-booking-detail {
            width: 100%;
            padding: 16px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 12px;
            margin-bottom: 12px;
        }
        
        .btn-back {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 12px;
        }
        
        .related-products-section {
            padding: 60px 0;
            background: #FFFFFF;
        }
        
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 32px;
            text-align: center;
        }
        
        .product-card-small {
            background: #FFFFFF;
            border: 1px solid var(--gray-200);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .product-card-small:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            border-color: var(--primary-300);
        }
        
        .product-card-small .product-image {
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--primary-100) 100%);
            padding: 32px;
            text-align: center;
        }
        
        .product-card-small .product-image i {
            font-size: 48px;
            color: var(--primary-600);
        }
        
        .product-card-small .product-info {
            padding: 20px;
        }
        
        .product-card-small .product-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 8px;
            min-height: 40px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-card-small .product-price {
            font-size: 16px;
            font-weight: 700;
            color: var(--primary-600);
            margin-bottom: 12px;
        }
        
        .footer-home {
            background: var(--gray-900);
            color: #FFFFFF;
            padding: 48px 0 24px;
        }
        
        .footer-text {
            color: var(--gray-400);
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    
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

    <section class="product-detail-section">
        <div class="container">
            <div class="row g-4">
                
                <div class="col-lg-5">
                    <div class="product-image-box">
                        <?php 
                        if($data['product']['stock'] > 10): 
                        ?>
                            <div class="stock-badge-detail stock-available">
                                <i class="fas fa-check-circle"></i>Ready Stock
                            </div>
                        <?php elseif($data['product']['stock'] > 0 && $data['product']['stock'] <= 10): ?>
                            <div class="stock-badge-detail stock-limited">
                                <i class="fas fa-exclamation-circle"></i>Stok Terbatas
                            </div>
                        <?php else: ?>
                            <div class="stock-badge-detail stock-out">
                                <i class="fas fa-times-circle"></i>Stok Habis
                            </div>
                        <?php endif; ?>
                        
                        <div class="product-icon-wrapper">
                            <i class="fas fa-<?= $data['product']['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="product-info-box">
                        <span class="product-category-badge"><?= $data['product']['category_name'] ?? 'Gadget'; ?></span>
                        <h1 class="product-title"><?= htmlspecialchars($data['product']['name']); ?></h1>
                        <div class="product-price">Rp <?= number_format($data['product']['price'], 0, ',', '.'); ?></div>
                        
                        <p class="product-description">
                            <?= $data['product']['description'] ? nl2br(htmlspecialchars($data['product']['description'])) : 'Produk berkualitas tinggi dengan garansi resmi. Dapatkan penawaran terbaik untuk kebutuhan gadget Anda.'; ?>
                        </p>

                        <div class="product-specs">
                            <h5 style="font-weight: 700; margin-bottom: 16px; color: var(--gray-900);">
                                <i class="fas fa-list-ul me-2"></i>Spesifikasi
                            </h5>
                            <div class="spec-item">
                                <div class="spec-label">Kategori:</div>
                                <div class="spec-value"><?= $data['product']['category_name'] ?? 'Gadget'; ?></div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Tipe:</div>
                                <div class="spec-value"><?= $data['product']['type'] == 'hp' ? 'Handphone' : 'Aksesoris'; ?></div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Stok:</div>
                                <div class="spec-value"><?= $data['product']['stock']; ?> Unit</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Garansi:</div>
                                <div class="spec-value">Garansi Resmi Distributor</div>
                            </div>
                        </div>

                        <?php if($data['product']['stock'] > 0): ?>
                        <button class="btn btn-primary btn-booking-detail" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            <i class="fas fa-shopping-bag me-2"></i>Booking Sekarang
                        </button>
                        <?php else: ?>
                        <button class="btn btn-secondary btn-booking-detail" disabled>
                            <i class="fas fa-ban me-2"></i>Stok Habis
                        </button>
                        <?php endif; ?>
                        
                        <a href="<?= BASEURL; ?>" class="btn btn-outline-secondary btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(!empty($data['related_products'])): ?>
    <section class="related-products-section">
        <div class="container">
            <h2 class="section-title">Produk Terkait</h2>
            <div class="row g-4">
                <?php foreach($data['related_products'] as $product): ?>
                <div class="col-md-3">
                    <a href="<?= BASEURL; ?>/HomeController/detail/<?= $product['id']; ?>" class="text-decoration-none">
                        <div class="product-card-small">
                            <div class="product-image">
                                <i class="fas fa-<?= $product['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>"></i>
                            </div>
                            <div class="product-info">
                                <div class="product-name"><?= htmlspecialchars($product['name']); ?></div>
                                <div class="product-price">Rp <?= number_format($product['price'], 0, ',', '.'); ?></div>
                                <span class="btn btn-sm btn-outline-primary w-100">Lihat Detail</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <div class="modal fade" id="bookingModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-lg mb-4" style="background: var(--gray-50);">
                        <div style="width: 48px; height: 48px; background: var(--primary-100); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-<?= $data['product']['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>" style="color: var(--primary-600);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;"><?= htmlspecialchars($data['product']['name']); ?></div>
                            <div style="color: var(--primary-600); font-weight: 700;">Rp <?= number_format($data['product']['price'], 0, ',', '.'); ?></div>
                        </div>
                    </div>
                    <form id="bookingForm" action="<?= BASEURL; ?>/HomeController/book" method="POST">
                        <input type="hidden" name="product_id" value="<?= $data['product']['id']; ?>">
                        <div class="form-group mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="customer_name" required placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">Nomor WhatsApp</label>
                            <input type="text" class="form-control" name="customer_phone" required placeholder="08xxxxxxxxxx">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="bookingForm">Konfirmasi Booking</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-home">
        <div class="container">
            <p class="footer-text">&copy; 2024 GadgetHub. All rights reserved.</p>
        </div>
    </footer>

    <?php if(isset($_GET['booking']) && $_GET['booking'] == 'success' && isset($_SESSION['booking_success'])): ?>
    <div class="modal fade" id="bookingSuccessModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-0">
                    
                    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 40px 32px; text-align: center; color: white;">
                        <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: scaleIn 0.5s ease;">
                            <i class="fas fa-check-circle" style="font-size: 48px;"></i>
                        </div>
                        <h3 style="font-size: 28px; font-weight: 700; margin-bottom: 8px;">Booking Berhasil!</h3>
                        <p style="opacity: 0.95; margin: 0;">Pesanan Anda telah kami terima</p>
                    </div>

                    <div style="padding: 32px;">
                        <div style="background: var(--gray-50); border-radius: 12px; padding: 20px; margin-bottom: 24px;">
                            <div style="text-align: center; margin-bottom: 16px;">
                                <div style="font-size: 13px; color: var(--gray-600); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Kode Booking Anda</div>
                                <div style="display: flex; align-items: center; justify-content: center; gap: 12px;">
                                    <div id="bookingCode" style="font-size: 24px; font-weight: 700; color: var(--primary-600); font-family: 'Courier New', monospace; letter-spacing: 1px;">
                                        <?= $_SESSION['booking_success']['code']; ?>
                                    </div>
                                    <button onclick="copyBookingCode()" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;" title="Copy kode">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div id="copyFeedback" style="font-size: 12px; color: var(--success-600); margin-top: 8px; opacity: 0; transition: opacity 0.3s;">
                                    <i class="fas fa-check"></i> Kode berhasil dicopy!
                                </div>
                            </div>
                            
                            <div style="border-top: 1px solid var(--gray-200); padding-top: 16px; margin-top: 16px;">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; font-size: 14px;">
                                    <div>
                                        <div style="color: var(--gray-500); margin-bottom: 4px;">Nama</div>
                                        <div style="font-weight: 600; color: var(--gray-900);"><?= htmlspecialchars($_SESSION['booking_success']['customer_name']); ?></div>
                                    </div>
                                    <div>
                                        <div style="color: var(--gray-500); margin-bottom: 4px;">No. WhatsApp</div>
                                        <div style="font-weight: 600; color: var(--gray-900);"><?= $_SESSION['booking_success']['customer_phone']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="background: var(--warning-50); border-left: 4px solid var(--warning-500); padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                            <div style="display: flex; gap: 12px;">
                                <i class="fas fa-info-circle" style="color: var(--warning-600); font-size: 20px; flex-shrink: 0; margin-top: 2px;"></i>
                                <div style="font-size: 14px; color: var(--gray-700); line-height: 1.6;">
                                    <strong>Simpan kode booking ini!</strong><br>
                                    Gunakan kode ini untuk cek status pesanan Anda. Tim kami akan menghubungi Anda segera via WhatsApp.
                                </div>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <a href="<?= BASEURL; ?>/HomeController/checkBooking" class="btn btn-outline-primary" style="border-radius: 12px; padding: 12px; font-weight: 600;">
                                <i class="fas fa-search me-2"></i>Cek Status
                            </a>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20baru%20booking%20dengan%20kode%20<?= $_SESSION['booking_success']['code']; ?>" target="_blank" class="btn btn-success" style="border-radius: 12px; padding: 12px; font-weight: 600; background: #25D366; border: none;">
                                <i class="fab fa-whatsapp me-2"></i>Chat Admin
                            </a>
                        </div>

                        <button type="button" class="btn btn-light w-100 mt-3" data-bs-dismiss="modal" style="border-radius: 12px; padding: 12px; font-weight: 500;">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <script>
         
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = document.getElementById('bookingSuccessModal');
            if(successModal) {
                var modal = new bootstrap.Modal(successModal);
                modal.show();
                
                setTimeout(function() {
                    copyBookingCode();
                }, 500);
            }
        });

        function copyBookingCode() {
            var bookingCode = document.getElementById('bookingCode').innerText;
            navigator.clipboard.writeText(bookingCode).then(function() {
                var feedback = document.getElementById('copyFeedback');
                feedback.style.opacity = '1';
                setTimeout(function() {
                    feedback.style.opacity = '0';
                }, 2000);
            });
        }
    </script>
    <?php 
     
    unset($_SESSION['booking_success']);
    endif; 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

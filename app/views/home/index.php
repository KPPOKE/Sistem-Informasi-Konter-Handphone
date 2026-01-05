<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetHub - Pusat Handphone & Aksesoris</title>
    
    <!-- Google Fonts - Inter -->
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
            background-color: #FFFFFF;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        html {
            overflow-x: hidden;
        }
        
        .navbar-home {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 16px 0;
            transition: all 0.3s ease;
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
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0 0 100px;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulseGlow 8s ease-in-out infinite;
        }
        
        .hero-title {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 24px;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero-subtitle {
            font-size: 20px;
            opacity: 0.95;
            margin-bottom: 40px;
            max-width: 550px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        .hero-illustration {
            position: relative;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .phone-mockup {
            position: relative;
            z-index: 2;
            animation: float 3s ease-in-out infinite !important;
            will-change: transform;
        }
        
        .phone-mockup i {
            font-size: 280px;
            opacity: 0.15;
            filter: drop-shadow(0 20px 40px rgba(255, 255, 255, 0.3));
        }
        
        .floating-icon {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #FFFFFF;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .floating-icon:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: scale(1.2) !important;
            box-shadow: 0 12px 48px rgba(255, 255, 255, 0.3);
        }
        
        .floating-icon-1 {
            top: 10%;
            right: 20%;
            animation: floatIcon1 4s ease-in-out infinite !important;
            will-change: transform;
        }
        
        .floating-icon-2 {
            top: 30%;
            right: 5%;
            animation: floatIcon2 5s ease-in-out infinite !important;
            will-change: transform;
        }
        
        .floating-icon-3 {
            bottom: 30%;
            right: 15%;
            animation: floatIcon3 4.5s ease-in-out infinite !important;
            will-change: transform;
        }
        
        .floating-icon-4 {
            bottom: 15%;
            right: 35%;
            animation: floatIcon4 5.5s ease-in-out infinite !important;
            will-change: transform;
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) scale(1);
            }
            50% { 
                transform: translateY(-30px) scale(1.05);
            }
        }
        
        @keyframes floatIcon1 {
            0%, 100% { 
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(20px, -25px) rotate(10deg);
            }
            50% { 
                transform: translate(0, -50px) rotate(0deg);
            }
            75% {
                transform: translate(-20px, -25px) rotate(-10deg);
            }
        }
        
        @keyframes floatIcon2 {
            0%, 100% { 
                transform: translate(0, 0) rotate(0deg) scale(1);
            }
            33% {
                transform: translate(-25px, 30px) rotate(-15deg) scale(1.2);
            }
            66% { 
                transform: translate(25px, -30px) rotate(15deg) scale(0.8);
            }
        }
        
        @keyframes floatIcon3 {
            0%, 100% { 
                transform: translate(0, 0) scale(1);
            }
            50% { 
                transform: translate(-30px, -40px) scale(1.3);
            }
        }
        
        @keyframes floatIcon4 {
            0%, 100% { 
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(-20px, 30px) rotate(-15deg);
            }
            50% { 
                transform: translate(0, 60px) rotate(0deg);
            }
            75% {
                transform: translate(20px, 30px) rotate(15deg);
            }
        }
        
        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1) translate(0, 0);
                opacity: 0.2;
            }
            50% {
                transform: scale(1.5) translate(-80px, 80px);
                opacity: 0.6;
            }
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
        
        .btn-hero {
            background: #FFFFFF;
            color: var(--primary-600);
            font-weight: 600;
            padding: 16px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            color: var(--primary-700);
        }
        
        .features-section {
            padding: 80px 0;
            background: #FFFFFF;
        }
        
        .feature-card {
            text-align: center;
            padding: 32px 24px;
            border-radius: 16px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #FFFFFF;
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }
        
        .feature-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 12px;
        }
        
        .feature-text {
            font-size: 14px;
            color: var(--gray-600);
            line-height: 1.6;
        }
        
        .catalog-section {
            padding: 80px 0;
            background: linear-gradient(180deg, var(--gray-50) 0%, #FFFFFF 100%);
        }
        
        .section-title {
            font-size: 40px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 12px;
        }
        
        .section-subtitle {
            color: var(--gray-600);
            font-size: 18px;
            margin-bottom: 56px;
        }
        
        .product-card-home {
            background: #FFFFFF;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            border: 1px solid var(--gray-100);
        }
        
        .product-card-home:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(0,0,0,0.12);
            border-color: var(--primary-200);
        }
        
        .product-image {
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--primary-100) 100%);
            padding: 48px 40px;
            text-align: center;
            position: relative;
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .product-image i {
            font-size: 72px;
            color: var(--primary-600);
            filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.2));
        }
        
        .product-info {
            padding: 24px;
        }
        
        .product-category {
            font-size: 11px;
            color: var(--primary-600);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
            background: var(--primary-50);
            padding: 4px 12px;
            border-radius: 20px;
        }
        
        .product-name-home {
            font-size: 17px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 12px;
            min-height: 48px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-price-home {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-800));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }
        
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-800) 100%);
            color: #FFFFFF;
            text-align: center;
        }
        
        .cta-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        
        .cta-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 32px;
        }
        
        .footer-home {
            background: var(--gray-900);
            color: #FFFFFF;
            padding: 64px 0 24px;
        }
        
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .footer-text {
            color: var(--gray-400);
            font-size: 15px;
            line-height: 1.6;
        }
        
        .footer-link {
            color: var(--gray-400);
            text-decoration: none;
            font-size: 15px;
            display: block;
            margin-bottom: 12px;
            transition: all 0.2s;
        }
        
        .footer-link:hover {
            color: #FFFFFF;
            padding-left: 4px;
        }
        
        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: 32px;
            margin-top: 48px;
            text-align: center;
            color: var(--gray-500);
            font-size: 14px;
        }
        
        .badge-new {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #FF4757;
            color: #FFFFFF;
            padding: 8px 14px;
            border-radius: 24px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 3;
            box-shadow: 0 2px 8px rgba(255, 71, 87, 0.4);
        }
        
        .search-filter-box {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 8px;
        }
        
        .search-filter-box .form-control:focus {
            box-shadow: none;
            border-color: var(--gray-200);
        }
        
        .category-filter .btn {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
            margin: 0 4px;
            transition: all 0.3s ease;
        }
        
        .category-filter .btn.active {
            background: var(--primary-500);
            color: white;
            border-color: var(--primary-500);
        }
        
        .stock-badge-home {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 8px 14px;
            border-radius: 24px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 3;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .stock-badge-home i {
            font-size: 10px;
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
        
        .floating-whatsapp {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }
        
        .floating-whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }
        
        .floating-whatsapp i {
            font-size: 28px;
            color: white;
        }
        
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            }
            50% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.8);
            }
        }
        
        .testimonial-section {
            padding: 80px 0;
            background: white;
        }
        
        .testimonial-card {
            background: var(--gray-50);
            border-radius: 16px;
            padding: 32px;
            text-align: center;
            height: 100%;
        }
        
        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--primary-100);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 32px;
            color: var(--primary-600);
        }
        
        .testimonial-stars {
            color: #FFC107;
            margin-bottom: 16px;
        }
        
        .testimonial-text {
            font-style: italic;
            color: var(--gray-600);
            margin-bottom: 16px;
            line-height: 1.6;
        }
        
        .testimonial-name {
            font-weight: 600;
            color: var(--gray-900);
        }
    </style>
</head>
<body id="top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-home fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#top">
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

    <!-- Hero Section -->
    <header class="hero-section" style="padding-top: 80px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Gadget Impian,<br>Harga Teman 🚀</h1>
                    <p class="hero-subtitle">Temukan koleksi handphone terbaru dan aksesoris original dengan garansi resmi. Belanja mudah, aman, dan cepat dengan harga terbaik!</p>
                    <a href="#katalog" class="btn btn-lg btn-hero">
                        <i class="fas fa-shopping-bag me-2"></i>Lihat Katalog
                    </a>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="hero-illustration text-center position-relative" style="position: relative; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        <div class="phone-mockup" style="position: relative; z-index: 2; animation: float 3s ease-in-out infinite; will-change: transform;">
                            <i class="fas fa-mobile-screen-button" style="font-size: 280px; opacity: 0.15; filter: drop-shadow(0 20px 40px rgba(255, 255, 255, 0.3));"></i>
                        </div>
                        <div class="floating-icon floating-icon-1" style="position: absolute; top: 10%; right: 20%; width: 60px; height: 60px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #FFFFFF; box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); animation: floatIcon1 4s ease-in-out infinite; will-change: transform;">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="floating-icon floating-icon-2" style="position: absolute; top: 30%; right: 5%; width: 60px; height: 60px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #FFFFFF; box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); animation: floatIcon2 5s ease-in-out infinite; will-change: transform;">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="floating-icon floating-icon-3" style="position: absolute; bottom: 30%; right: 15%; width: 60px; height: 60px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #FFFFFF; box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); animation: floatIcon3 4.5s ease-in-out infinite; will-change: transform;">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="floating-icon floating-icon-4" style="position: absolute; bottom: 15%; right: 35%; width: 60px; height: 60px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #FFFFFF; box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.3); animation: floatIcon4 5.5s ease-in-out infinite; will-change: transform;">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Garansi Resmi</h3>
                        <p class="feature-text">Semua produk dilengkapi garansi resmi dari distributor</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <h3 class="feature-title">Pengiriman Cepat</h3>
                        <p class="feature-text">Proses cepat dan pengiriman ke seluruh Indonesia</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="feature-title">Support 24/7</h3>
                        <p class="feature-text">Tim support siap membantu Anda kapan saja</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 class="feature-title">Harga Terbaik</h3>
                        <p class="feature-text">Dapatkan harga kompetitif dan promo menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section id="katalog" class="catalog-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Katalog Produk</h2>
                <p class="section-subtitle">Pilihan terbaik untuk kebutuhan gadget Anda</p>
            </div>

            <!-- Search & Filter -->
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto">
                    <div class="search-filter-box">
                        <div class="input-group">
                            <span class="input-group-text" style="background: white; border-right: 0;">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control" id="searchProduct" placeholder="Cari produk yang Anda inginkan..." style="border-left: 0; padding: 14px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="text-center mb-4">
                <div class="btn-group category-filter" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-category="all">
                        <i class="fas fa-th me-1"></i>Semua
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-category="APPLE">
                        <i class="fab fa-apple me-1"></i>Apple
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-category="SAMSUNG">
                        <i class="fas fa-mobile-alt me-1"></i>Samsung
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-category="XIAOMI">
                        <i class="fas fa-mobile-alt me-1"></i>Xiaomi
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-category="accessories">
                        <i class="fas fa-headphones me-1"></i>Aksesoris
                    </button>
                </div>
            </div>

            <div class="row g-4" id="productGrid">
                <?php foreach($data['products'] as $product): ?>
                <div class="col-md-6 col-lg-3" data-category="<?= strtoupper($product['category_name'] ?? 'OTHER'); ?>" data-type="<?= strtolower($product['type']); ?>" data-name="<?= strtolower($product['name']); ?>">
                    <div class="product-card-home">
                        <div class="product-image">
                            <?php 
                            if($product['stock'] > 10): 
                            ?>
                                <span class="stock-badge-home stock-available">
                                    <i class="fas fa-check-circle"></i>Ready
                                </span>
                            <?php elseif($product['stock'] > 0 && $product['stock'] <= 10): ?>
                                <span class="stock-badge-home stock-limited">
                                    <i class="fas fa-exclamation-circle"></i>Terbatas
                                </span>
                            <?php else: ?>
                                <span class="stock-badge-home stock-out">
                                    <i class="fas fa-times-circle me-1"></i>Habis
                                </span>
                            <?php endif; ?>
                            
                            <?php if($product['stock'] > 20): ?>
                            <span class="badge-new">New</span>
                            <?php endif; ?>
                            <i class="fas fa-<?= $product['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>"></i>
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?= $product['category_name'] ?? 'Gadget'; ?></div>
                            <h3 class="product-name-home"><?= htmlspecialchars($product['name']); ?></h3>
                            <div class="product-price-home">Rp <?= number_format($product['price'], 0, ',', '.'); ?></div>
                            <a href="<?= BASEURL; ?>/HomeController/detail/<?= $product['id']; ?>" class="btn btn-outline-primary w-100 mb-2" style="border-radius: 12px; padding: 10px;">
                                <i class="fas fa-info-circle me-2"></i>Lihat Detail
                            </a>
                            <?php if($product['stock'] > 0): ?>
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#bookingModal<?= $product['id']; ?>" style="border-radius: 12px; padding: 12px;">
                                <i class="fas fa-shopping-bag me-2"></i>Booking Sekarang
                            </button>
                            <?php else: ?>
                            <button class="btn btn-secondary w-100" disabled style="border-radius: 12px; padding: 12px;">
                                <i class="fas fa-ban me-2"></i>Stok Habis
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Booking Modal -->
                <div class="modal fade" id="bookingModal<?= $product['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Booking Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center gap-3 p-3 rounded-lg mb-4" style="background: var(--gray-50);">
                                    <div style="width: 48px; height: 48px; background: var(--primary-100); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-<?= $product['type'] == 'hp' ? 'mobile-alt' : 'headphones'; ?>" style="color: var(--primary-600);"></i>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;"><?= htmlspecialchars($product['name']); ?></div>
                                        <div style="color: var(--primary-600); font-weight: 700;">Rp <?= number_format($product['price'], 0, ',', '.'); ?></div>
                                    </div>
                                </div>
                                <form id="bookingForm<?= $product['id']; ?>" action="<?= BASEURL; ?>/HomeController/book" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                    <div class="form-group">
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
                                <button type="submit" class="btn btn-primary" form="bookingForm<?= $product['id']; ?>">Konfirmasi Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Apa Kata Mereka?</h2>
                <p class="section-subtitle">Testimoni dari pelanggan setia kami</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Pelayanan cepat dan produk original! Harga juga sangat kompetitif. Recommended banget!"</p>
                        <div class="testimonial-name">Budi Santoso</div>
                        <small class="text-muted">Jakarta</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Sudah langganan di sini. Admin responsif dan barang selalu ready stock. Top!"</p>
                        <div class="testimonial-name">Siti Nurhaliza</div>
                        <small class="text-muted">Bandung</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Proses booking mudah, pengiriman cepat. Puas belanja di GadgetHub!"</p>
                        <div class="testimonial-name">Ahmad Rizki</div>
                        <small class="text-muted">Surabaya</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Siap Upgrade Gadget Anda?</h2>
            <p class="cta-subtitle">Dapatkan penawaran terbaik dan konsultasi gratis dari tim kami</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-lg" style="background: #FFFFFF; color: var(--primary-600); font-weight: 600; padding: 16px 40px; border-radius: 12px;">
                <i class="fab fa-whatsapp me-2"></i>Hubungi Kami
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <i class="fas fa-mobile-alt"></i> GadgetHub
                    </div>
                    <p class="footer-text">Pusat penjualan handphone dan aksesoris terlengkap dengan harga bersaing dan kualitas terjamin.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h6 style="font-weight: 600; margin-bottom: 16px;">Navigasi</h6>
                    <a href="#top" class="footer-link">Beranda</a>
                    <a href="#katalog" class="footer-link">Katalog</a>
                    <a href="https://wa.me/6281234567890" class="footer-link" target="_blank">Kontak Kami</a>
                </div>
                <div class="col-lg-4 offset-lg-2 col-md-8">
                    <h6 style="font-weight: 600; margin-bottom: 16px;">Hubungi Kami</h6>
                    <p class="footer-text"><i class="fas fa-map-marker-alt me-2"></i> Jl. Teknologi No. 123, Jakarta</p>
                    <p class="footer-text"><i class="fas fa-phone me-2"></i> 0812-3456-7890</p>
                    <p class="footer-text"><i class="fas fa-envelope me-2"></i> info@gadgethub.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <div>&copy; 2025 GadgetHub. All rights reserved.</div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20GadgetHub,%20saya%20ingin%20bertanya%20tentang%20produk" target="_blank" class="floating-whatsapp" title="Chat WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Booking Success Modal -->
    <?php if(isset($data['booking_success'])): ?>
    <div class="modal fade" id="bookingSuccessModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-0">
                    <!-- Success Header -->
                    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 40px 32px; text-align: center; color: white;">
                        <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: scaleIn 0.5s ease;">
                            <i class="fas fa-check-circle" style="font-size: 48px;"></i>
                        </div>
                        <h3 style="font-size: 28px; font-weight: 700; margin-bottom: 8px;">Booking Berhasil!</h3>
                        <p style="opacity: 0.95; margin: 0;">Pesanan Anda telah kami terima</p>
                    </div>

                    <!-- Booking Info -->
                    <div style="padding: 32px;">
                        <div style="background: var(--gray-50); border-radius: 12px; padding: 20px; margin-bottom: 24px;">
                            <div style="text-align: center; margin-bottom: 16px;">
                                <div style="font-size: 13px; color: var(--gray-600); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Kode Booking Anda</div>
                                <div style="display: flex; align-items: center; justify-content: center; gap: 12px;">
                                    <div id="bookingCode" style="font-size: 24px; font-weight: 700; color: var(--primary-600); font-family: 'Courier New', monospace; letter-spacing: 1px;">
                                        <?= $data['booking_success']['code']; ?>
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
                                        <div style="font-weight: 600; color: var(--gray-900);"><?= htmlspecialchars($data['booking_success']['customer_name']); ?></div>
                                    </div>
                                    <div>
                                        <div style="color: var(--gray-500); margin-bottom: 4px;">No. WhatsApp</div>
                                        <div style="font-weight: 600; color: var(--gray-900);"><?= $data['booking_success']['customer_phone']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Important Info -->
                        <div style="background: var(--warning-50); border-left: 4px solid var(--warning-500); padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                            <div style="display: flex; gap: 12px;">
                                <i class="fas fa-info-circle" style="color: var(--warning-600); font-size: 20px; flex-shrink: 0; margin-top: 2px;"></i>
                                <div style="font-size: 14px; color: var(--gray-700); line-height: 1.6;">
                                    <strong>Simpan kode booking ini!</strong><br>
                                    Gunakan kode ini untuk cek status pesanan Anda. Tim kami akan menghubungi Anda segera via WhatsApp.
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <a href="<?= BASEURL; ?>/HomeController/checkBooking" class="btn btn-outline-primary" style="border-radius: 12px; padding: 12px; font-weight: 600;">
                                <i class="fas fa-search me-2"></i>Cek Status
                            </a>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20baru%20booking%20dengan%20kode%20<?= $data['booking_success']['code']; ?>" target="_blank" class="btn btn-success" style="border-radius: 12px; padding: 12px; font-weight: 600; background: #25D366; border: none;">
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
        // Auto show modal on page load
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = document.getElementById('bookingSuccessModal');
            if(successModal) {
                var modal = new bootstrap.Modal(successModal);
                modal.show();
                
                // Auto copy booking code
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
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#top') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offsetTop = target.offsetTop - 70;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.product-card-home, .feature-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar-home');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            } else {
                navbar.style.boxShadow = '0 1px 3px rgba(0,0,0,0.1)';
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.shiftKey && e.key === 'L') {
                e.preventDefault();
                window.location.href = '<?= BASEURL; ?>/AuthController';
            }
        });

        let clickCount = 0;
        let clickTimer = null;
        document.querySelector('.navbar-brand').addEventListener('click', (e) => {
            clickCount++;
            if (clickCount === 5) {
                e.preventDefault();
                window.location.href = '<?= BASEURL; ?>/AuthController';
                clickCount = 0;
                return;
            }
            clearTimeout(clickTimer);
            clickTimer = setTimeout(() => {
                clickCount = 0;
            }, 2000);
        });

        const searchInput = document.getElementById('searchProduct');
        const productGrid = document.getElementById('productGrid');
        const products = productGrid.querySelectorAll('[data-category]');
        const categoryButtons = document.querySelectorAll('.category-filter .btn');

        let currentCategory = 'all';

        searchInput.addEventListener('input', function() {
            filterProducts();
        });

        categoryButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                categoryButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.getAttribute('data-category');
                filterProducts();
            });
        });

        function filterProducts() {
            const searchTerm = searchInput.value.toLowerCase();
            
            products.forEach(product => {
                const productName = product.getAttribute('data-name');
                const productCategory = product.getAttribute('data-category');
                const productType = product.getAttribute('data-type');
                
                const matchesSearch = productName.includes(searchTerm);
                
                // Check if filter matches category name OR product type
                let matchesCategory = currentCategory === 'all' || 
                                     productCategory === currentCategory ||
                                     productType === currentCategory.toLowerCase();
                
                if (matchesSearch && matchesCategory) {
                    product.style.display = 'block';
                    setTimeout(() => {
                        product.style.opacity = '1';
                        product.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    product.style.opacity = '0';
                    product.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        product.style.display = 'none';
                    }, 300);
                }
            });
        }
    </script>
</body>
</html>

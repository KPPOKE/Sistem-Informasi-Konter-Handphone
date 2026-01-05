# GadgetHub - Sistem Informasi Konter Handphone

![GadgetHub](https://img.shields.io/badge/GadgetHub-v1.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap)

**GadgetHub** adalah sistem informasi manajemen konter handphone berbasis web dengan desain modern dan user-friendly. Aplikasi ini memudahkan pengelolaan produk, transaksi, stok, dan booking pelanggan.

## Fitur Utama

### Landing Page (Public)
- Katalog produk untuk customer
- Sistem booking produk dengan WhatsApp
- Desain modern dan responsive
- Hero section yang menarik

### Admin Panel
- Dashboard dengan statistik real-time
- Manajemen produk (CRUD)
- Manajemen kategori
- Manajemen stok dengan inline editing
- Manajemen user (kasir)
- Laporan transaksi dengan export

### Kasir Panel
- Dashboard kasir dengan quick actions
- Interface transaksi yang intuitif
- Product grid dengan search
- Cart panel dengan real-time calculation
- Riwayat transaksi
- Sistem pembayaran dengan kembalian otomatis

## Design System

- **Theme**: Professional Blue, Flat Modern, Light Mode
- **Primary Color**: #3B82F6 (Blue)
- **Font**: Inter (Google Fonts)
- **UI Framework**: Bootstrap 5.3
- **Icons**: Font Awesome 6.4

## Teknologi

- **Backend**: PHP 7.4+ (MVC Pattern)
- **Database**: MySQL 8.0+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework**: Bootstrap 5.3
- **Icons**: Font Awesome 6.4
- **Fonts**: Google Fonts (Inter)

## Instalasi

### Prerequisites
- PHP 7.4 atau lebih tinggi
- MySQL 8.0 atau lebih tinggi
- Apache/Nginx Web Server
- Composer (optional)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/yourusername/gadgethub.git
   cd gadgethub
   ```

2. **Setup Database**
   - Buat database baru di MySQL
   - Import file `database.sql`
   ```sql
   mysql -u root -p < database.sql
   ```

3. **Konfigurasi Database**
   - Edit file `app/config/config.php`
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'gadgethub_db');
   ```

4. **Setup Web Server**
   - Arahkan document root ke folder `public/`
   - Atau gunakan PHP built-in server:
   ```bash
   php -S localhost:8000 -t public/
   ```

5. **Akses Aplikasi**
   - Landing Page: `http://localhost:8000`
   - Login Admin/Kasir: `http://localhost:8000/AuthController`

## Default Login

### Admin
- **Username**: `admin`
- **Password**: `admin123`

### Kasir
- **Username**: `kasir`
- **Password**: `kasir123`

## Struktur Project

```
gadgethub/
├── app/
│   ├── config/
│   │   └── config.php          # Konfigurasi database & base URL
│   ├── controllers/
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── CashierController.php
│   │   └── HomeController.php
│   ├── core/
│   │   ├── App.php             # Router
│   │   ├── Controller.php      # Base Controller
│   │   ├── Model.php           # Base Model
│   │   └── Flasher.php         # Flash Messages
│   ├── models/
│   │   ├── BookingModel.php
│   │   ├── CategoryModel.php
│   │   ├── ProductModel.php
│   │   ├── TransactionModel.php
│   │   └── UserModel.php
│   └── views/
│       ├── admin/              # Admin views
│       ├── auth/               # Login view
│       ├── cashier/            # Kasir views
│       ├── home/               # Landing page
│       └── templates/          # Header, Sidebar, Footer
├── public/
│   ├── css/
│   │   └── style.css           # Custom CSS dengan Design Tokens
│   ├── js/
│   │   └── utils.js            # Utility functions & Property Tests
│   ├── img/                    # Images
│   └── index.php               # Entry point
├── .kiro/
│   └── specs/
│       └── ui-redesign-modern/ # Spec documentation
├── database.sql                # Database schema
└── README.md
```

## Testing

Aplikasi ini menggunakan **Property-Based Testing** untuk memastikan correctness:

### Property Tests
1. **formatRupiah** - Format angka ke Rupiah Indonesia
2. **getStockLevel** - Klasifikasi level stok (low/medium/high)
3. **calculateCartTotal** - Kalkulasi total keranjang

### Menjalankan Tests
```bash
node -e "const utils = require('./public/js/utils.js'); utils.runAllPropertyTests();"
```

## 📸 Screenshots

### Landing Page
![Landing Page](docs/screenshots/landing.png)

### Admin Dashboard
![Admin Dashboard](docs/screenshots/admin-dashboard.png)

### Kasir Transaction
![Kasir Transaction](docs/screenshots/kasir-transaction.png)

## Fitur Mendatang

- [ ] Export laporan ke PDF
- [ ] Notifikasi WhatsApp otomatis untuk booking
- [ ] Multi-branch support
- [ ] Dashboard analytics yang lebih detail
- [ ] Mobile app (React Native)

## Kontribusi

Kontribusi selalu welcome! Silakan:
1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request


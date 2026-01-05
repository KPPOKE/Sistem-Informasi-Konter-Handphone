-- Update untuk menambahkan fitur Detail Produk dan Cek Status Booking

-- Tambah kolom specifications ke products table untuk detail spesifikasi
ALTER TABLE `products` 
ADD COLUMN `specifications` TEXT AFTER `description`,
ADD COLUMN `features` TEXT AFTER `specifications`;

-- Tambah kolom booking_code ke bookings table untuk tracking
ALTER TABLE `bookings` 
ADD COLUMN `booking_code` VARCHAR(20) UNIQUE AFTER `id`,
ADD COLUMN `notes` TEXT AFTER `customer_phone`;

-- Update existing bookings dengan booking code (jika ada data)
-- Format: BK-YYYYMMDD-XXXX
UPDATE `bookings` 
SET `booking_code` = CONCAT('BK-', DATE_FORMAT(created_at, '%Y%m%d'), '-', LPAD(id, 4, '0'))
WHERE `booking_code` IS NULL;

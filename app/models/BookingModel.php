<?php

class BookingModel extends Model {
    public function createBooking($data) {
         
        $bookingCode = $this->generateBookingCode();
        
        $query = "INSERT INTO bookings (booking_code, product_id, customer_name, customer_phone, status) VALUES (:booking_code, :product_id, :customer_name, :customer_phone, 'pending')";
        $this->query($query);
        $this->bind('booking_code', $bookingCode);
        $this->bind('product_id', $data['product_id']);
        $this->bind('customer_name', $data['customer_name']);
        $this->bind('customer_phone', $data['customer_phone']);
        $this->execute();
        
        if($this->rowCount() > 0) {
            return $bookingCode;
        }
        return false;
    }

    private function generateBookingCode() {
        $date = date('Ymd');
        $random = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return 'BK-' . $date . '-' . $random;
    }

    public function getBookingByCodeOrPhone($search) {
        $this->query("SELECT bookings.*, products.name as product_name, products.price, products.type, categories.name as category_name 
                      FROM bookings 
                      LEFT JOIN products ON bookings.product_id = products.id 
                      LEFT JOIN categories ON products.category_id = categories.id 
                      WHERE bookings.booking_code = :search OR bookings.customer_phone = :search 
                      ORDER BY bookings.created_at DESC");
        $this->bind('search', $search);
        return $this->resultSet();
    }

    public function getBookingById($id) {
        $this->query("SELECT bookings.*, products.name as product_name, products.price 
                      FROM bookings 
                      LEFT JOIN products ON bookings.product_id = products.id 
                      WHERE bookings.id = :id");
        $this->bind('id', $id);
        return $this->single();
    }
}

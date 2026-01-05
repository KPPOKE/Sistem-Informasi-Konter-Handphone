<?php

class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Katalog Produk';
        $data['products'] = $this->model('ProductModel')->getAllProducts();
        
        // Check for booking success
        if(isset($_SESSION['booking_success'])) {
            $data['booking_success'] = $_SESSION['booking_success'];
            unset($_SESSION['booking_success']);
        }
        
        $this->view('home/index', $data);
    }

    public function detail($id) {
        $data['title'] = 'Detail Produk';
        $data['product'] = $this->model('ProductModel')->getProductById($id);
        
        if(!$data['product']) {
            header('Location: ' . BASEURL);
            exit;
        }
        
        // Get related products (same category, exclude current product)
        $data['related_products'] = $this->model('ProductModel')->getRelatedProducts($data['product']['category_id'], $id);
        
        $this->view('home/detail', $data);
    }

    public function book() {
        if(count($_POST) > 0) {
            $bookingCode = $this->model('BookingModel')->createBooking($_POST);
            if($bookingCode) {
                // Store booking code in session
                $_SESSION['booking_success'] = [
                    'code' => $bookingCode,
                    'customer_name' => $_POST['customer_name'],
                    'customer_phone' => $_POST['customer_phone']
                ];
                
                // Redirect to home with success flag
                header('Location: ' . BASEURL . '?booking=success');
                exit;
            } else {
                echo "<script>alert('Booking gagal. Silakan coba lagi.'); window.location.href='" . BASEURL . "';</script>";
            }
        }
    }

    public function checkBooking() {
        $data['title'] = 'Cek Status Booking';
        
        if(isset($_POST['search'])) {
            $search = $_POST['search_value'];
            $data['booking'] = $this->model('BookingModel')->getBookingByCodeOrPhone($search);
        }
        
        $this->view('home/check-booking', $data);
    }
}

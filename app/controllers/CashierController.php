<?php

class CashierController extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'kasir') {
            header('Location: ' . BASEURL . '/AuthController');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Kasir';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('cashier/dashboard', $data);
        $this->view('templates/footer');
    }

    public function transaction() {
        $data['title'] = 'Transaksi Baru';
        $data['products'] = $this->model('ProductModel')->getAllProducts();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('cashier/transaction', $data);
        $this->view('templates/footer');
    }

    public function processTransaction() {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if($data) {
            $transactionModel = $this->model('TransactionModel');
            if($transactionModel->createTransaction($data)) {
                 echo json_encode(['status' => 'success', 'message' => 'Transaksi berhasil']);
            } else {
                 echo json_encode(['status' => 'error', 'message' => 'Transaksi gagal']);
            }
        }
    }
    
    public function history() {
        $data['title'] = 'Riwayat Transaksi';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('cashier/history', $data);
        $this->view('templates/footer');
    }
}

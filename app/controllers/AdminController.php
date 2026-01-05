<?php

class AdminController extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL . '/AuthController');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['total_products'] = count($this->model('ProductModel')->getAllProducts());
        $products = $this->model('ProductModel')->getAllProducts();
        $data['low_stock'] = 0;
        foreach($products as $p) {
            if($p['stock'] < 5) $data['low_stock']++;
        }
        
        $data['today_sales'] = 0;
        $data['monthly_sales'] = 0;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/dashboard', $data);
        $this->view('templates/footer');
    }

    public function products() {
        $data['title'] = 'Kelola Produk';
        $data['products'] = $this->model('ProductModel')->getAllProducts();
        $data['categories'] = $this->model('CategoryModel')->getAllCategories();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/products/index', $data);
        $this->view('templates/footer');
    }

    public function addProduct() {
        if(count($_POST) > 0) {
            if($this->model('ProductModel')->addProduct($_POST) > 0) {
                Flasher::setFlash('Berhasil menambahkan produk', 'success');
            } else {
                Flasher::setFlash('Gagal menambahkan produk', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/products');
            exit;
        }
    }

    public function updateProduct() {
        if(count($_POST) > 0) {
            if($this->model('ProductModel')->updateProduct($_POST) > 0) {
                Flasher::setFlash('Berhasil mengubah produk', 'success');
            } else {
                Flasher::setFlash('Gagal mengubah produk', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/products');
            exit;
        }
    }

    public function deleteProduct($id) {
        if($this->model('ProductModel')->deleteProduct($id) > 0) {
            Flasher::setFlash('Berhasil menghapus produk', 'success');
        } else {
            Flasher::setFlash('Gagal menghapus produk', 'danger');
        }
        header('Location: ' . BASEURL . '/AdminController/products');
        exit;
    }

    public function categories() {
        $data['title'] = 'Kelola Kategori';
        $data['categories'] = $this->model('CategoryModel')->getAllCategories();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/categories/index', $data);
        $this->view('templates/footer');
    }
    
    public function addCategory() {
        if(count($_POST) > 0) {
            if($this->model('CategoryModel')->addCategory($_POST) > 0) {
                Flasher::setFlash('Berhasil menambahkan kategori', 'success');
            } else {
                Flasher::setFlash('Gagal menambahkan kategori', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/categories');
            exit;
        }
    }

    public function updateCategory() {
        if(count($_POST) > 0) {
            if($this->model('CategoryModel')->updateCategory($_POST) > 0) {
                Flasher::setFlash('Berhasil mengubah kategori', 'success');
            } else {
                Flasher::setFlash('Gagal mengubah kategori', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/categories');
            exit;
        }
    }

    public function deleteCategory($id) {
        if($this->model('CategoryModel')->deleteCategory($id) > 0) {
            Flasher::setFlash('Berhasil menghapus kategori', 'success');
        } else {
            Flasher::setFlash('Gagal menghapus kategori', 'danger');
        }
        header('Location: ' . BASEURL . '/AdminController/categories');
        exit;
    }

    public function stock() {
        $data['title'] = 'Kelola Stok';
        $data['products'] = $this->model('ProductModel')->getAllProducts();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/stock/index', $data);
        $this->view('templates/footer');
    }
    
    public function updateStock() {
        if(count($_POST) > 0) {
            $id = $_POST['id'];
            $newStock = $_POST['stock'];
            
            $this->model('ProductModel')->updateStock($id, $newStock);
            Flasher::setFlash('Stok berhasil diperbarui', 'success');
            header('Location: ' . BASEURL . '/AdminController/stock');
            exit;
        }
    }

    public function transactions() {
        $data['title'] = 'Riwayat Transaksi';
        $data['transactions'] = $this->model('TransactionModel')->getHistory();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/transactions/index', $data);
        $this->view('templates/footer');
    }

    public function users() {
        $data['title'] = 'Kelola Kasir';
        $data['users'] = $this->model('UserModel')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('admin/users/index', $data);
        $this->view('templates/footer');
    }
    
    public function addUser() {
        if(count($_POST) > 0) {
            if($this->model('UserModel')->register($_POST) > 0) {
                Flasher::setFlash('Berhasil menambahkan user', 'success');
            } else {
                Flasher::setFlash('Gagal menambahkan user', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/users');
            exit;
        }
    }
    
    public function deleteUser($id) {
         if($this->model('UserModel')->deleteUser($id) > 0) {
                Flasher::setFlash('Berhasil menghapus user', 'success');
            } else {
                Flasher::setFlash('Gagal menghapus user', 'danger');
            }
            header('Location: ' . BASEURL . '/AdminController/users');
            exit;
    }
}

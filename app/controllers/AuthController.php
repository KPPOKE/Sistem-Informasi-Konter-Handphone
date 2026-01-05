<?php

class AuthController extends Controller {
    public function index() {
        if(isset($_SESSION['user_id'])) {
             if($_SESSION['role'] == 'admin') {
                 header('Location: ' . BASEURL . '/AdminController');
             } else {
                 header('Location: ' . BASEURL . '/CashierController');
             }
             exit;
        }
        $data['title'] = 'Login';
        $this->view('auth/login', $data);
    }

    public function login() {
        if(count($_POST) > 0) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userModel = $this->model('UserModel');
            $user = $userModel->getUserByUsername($username);
            
            if($user) {
                if(password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['name'] = $user['name'];
                    
                     if($user['role'] == 'admin') {
                         header('Location: ' . BASEURL . '/AdminController');
                     } else {
                         header('Location: ' . BASEURL . '/CashierController');
                     }
                     exit;
                } else {
                    Flasher::setFlash('Password salah', 'danger');
                }
            } else {
                Flasher::setFlash('Username tidak ditemukan', 'danger');
            }
        }
        header('Location: ' . BASEURL . '/AuthController');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/AuthController');
        exit;
    }
}

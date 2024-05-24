<?php
class Login extends Controller {
    public function index(){
        $data['title'] = 'Login';
        $this->view('auth/login',$data);
    }

    public function authenticate(){
        $user = $this->model('User_model')->login($_POST['email'], $_POST['password']);
        
        if ($user) {
            
            Flasher::setFlash('Login', 'successful', 'success');
            $_SESSION['user'] = $user; 
            header('Location: ' . BASEURL . 'home');
        } else {
            // Login failed
            Flasher::setFlash('Login Gagal', 'Password atau email salah.', 'danger');
            header('Location: ' . BASEURL . 'login');
        }
        exit;
    }
}
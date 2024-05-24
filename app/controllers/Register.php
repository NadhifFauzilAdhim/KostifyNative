<?php 
class Register extends Controller {

    public function index(){
        $data['title'] = 'Register';
        $this->view('auth/register',$data);
    }
    
    public function adduser(){
        $result = $this->model('User_model')->register($_POST);
        if ($result > 0) {
            Flasher::setFlash('Registration successful!', '', 'success');
        } elseif ($result == -1) {
            Flasher::setFlash('Input Tidak Valid.', 'Cek detail', 'danger');
        } elseif ($result == -2) {
            Flasher::setFlash('Email Sudah Terdaftar.', 'Mohon gunakan Email lain.', 'warning');
        } elseif($result == -3){
            Flasher::setFlash('Username sudah Terdaftar.', 'Mohon gunakan Username Lain.', 'warning');
        } else {
            Flasher::setFlash('Pendaftaran gagal.', 'coba lagi nanti.', 'danger');
        }
        header('Location: ' . BASEURL . 'register');
        exit;
    }
}
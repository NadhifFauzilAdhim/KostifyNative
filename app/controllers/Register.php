<?php 
class Register extends Controller {

    public function index(){
        $data['title'] = 'Register';
        $this->view('auth/register',$data);
    }
    
    public function adduser(){
        $result = $this->model('User_model')->register($_POST);
        $email = $_POST['email'];
        
        if ($result > 0) {
            $token = $this->model('User_model')->getVerificationToken($email); 
            
            $verificationLink = BASEURL . "register/verify?token=" . $token['verification_token'];
            $message = "Silakan klik link berikut untuk mengaktifkan akun Anda: " . $verificationLink;

            $mailer = new Mailer();
            $result = $mailer->sendMail($email, 'Verifikasi Email Anda', $message);
    
            if ($result === true) {
                Flasher::setFlash('Registration Berhasil!, Cek Email untuk verifikasi.', '', 'success');
            } else {
                Flasher::setFlash('Pesan tidak dapat dikirim. Mailer Error: ' . $result, '', 'danger');
            }
        } elseif ($result == -1) {
            Flasher::setFlash('Input Tidak Valid.', 'Cek detail', 'danger');
        } elseif ($result == -2) {
            Flasher::setFlash('Email Sudah Terdaftar.', 'Mohon gunakan Email lain.', 'warning');
        } elseif ($result == -3) {
            Flasher::setFlash('Username sudah Terdaftar.', 'Mohon gunakan Username Lain.', 'warning');
        } elseif ($result == -4) {
            Flasher::setFlash('Username Tidak Boleh Mengandung Spasi', 'Mohon gunakan Username Lain.', 'warning');
        } else {
            Flasher::setFlash('Pendaftaran gagal.', 'coba lagi nanti.', 'danger');
        }
        header('Location: ' . BASEURL . 'register');
        exit;
    }

    public function verify(){
        $token = $_GET['token'];
        $user = $this->model('User_model')->verifyUser($token);
        if ($user) {
            Flasher::setFlash('Email Berhasil di Verifikasi!', 'Silahkan Login', 'success');
        } else {
            Flasher::setFlash('Verifikasi Gagal. .', 'Invalid token', 'danger');
        }
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}
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
            $_SESSION['last_activity'] = time();

            header('Location: ' . BASEURL . 'home');
        } else {
            Flasher::setFlash('Login Gagal', 'Password atau email salah.', 'danger');
            header('Location: ' . BASEURL . 'login');
        }
        exit;
    }

    public function forgotPassword(){
        $data['title'] = 'Lupa Password';
        $this->view('auth/forgot_password', $data);
    }

    public function requestResetPassword(){
        $email = $_POST['email'];
        $user = $this->model('User_model')->findUserByEmail($email);
    
        if ($user) {
            $token = bin2hex(random_bytes(50)); 
            $this->model('User_model')->storeResetToken($email, $token); 
    
            $resetLink = BASEURL . "login/resetPassword?token=" . $token;
            $message = "Silakan klik link berikut untuk reset password Anda: " . $resetLink;
            $mailer = new Mailer();
            $result = $mailer->sendMail($email, 'Reset Password', $message);
    
            if ($result === true) {
                Flasher::setFlash('Email reset password telah dikirim.', 'Silakan cek email Anda.', 'success');
            } else {
                Flasher::setFlash('Gagal', 'Email tidak dapat dikirim. Error: ' . $result, 'danger');
            }
        } else {
            Flasher::setFlash('Gagal', 'Email tidak terdaftar.', 'danger');
        }
        header('Location: ' . BASEURL . 'login/forgotPassword');
        exit;
    }

    public function resetPassword(){
        $token = $_GET['token'];
        $user = $this->model('User_model')->findUserByToken($token);

        if (isset($user)) {
            $data['title'] = 'Reset Password';
            $data['token'] = $token;
            $this->view('auth/reset_password', $data);
        } else {
            Flasher::setFlash('Gagal', 'Token tidak valid', 'danger');
            header('Location: ' . BASEURL . 'login');
            exit;
        }
    }

    public function handleResetPassword(){
        $token = $_POST['token'];
        $newPassword = $_POST['password'];
        $user = $this->model('User_model')->findUserByToken($token);
        
        if (isset($user)) {
            $stat = $this->model('User_model')->updatePassword($user['email'], $newPassword);
            $this->model('User_model')->removeResetToken($token); 
            if($stat){
            Flasher::setFlash('Berhasil', 'Password telah direset.', 'success');
            header('Location: ' . BASEURL . 'login');
            }
            else{
                Flasher::setFlash('Gagal', 'Password gagal direset.', 'danger');
                header('Location: ' . BASEURL . 'login');
            }
            
        } else {
            Flasher::setFlash('Gagal', 'Token tidak valid.', 'danger');
            header('Location: ' . BASEURL . 'login/resetPassword?token=' . $token);
        }
        exit;
    }
}


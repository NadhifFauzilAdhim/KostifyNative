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

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            try {
              
                $mail->isSMTP();
                $mail->Host = MAIL_HOST; 
                $mail->SMTPAuth = true;
                $mail->Username = MAIL_USERNAME; 
                $mail->Password = MAIL_PASSWORD; 
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = MAIL_PORT; 
               
                $mail->setFrom(MAIL_USERNAME, 'Kostify');
                $mail->addAddress($_POST['email']); 
                var_dump($_POST['email']);
                $mail->isHTML(true); 
                $mail->Subject = 'Verifikasi Email Anda';
                $mail->Body    = $message;
    
                $mail->send();
                Flasher::setFlash('Registration Berhasil!, Cek Email untuk verifikasi.', '', 'success');
            } catch (Exception $e) {
                Flasher::setFlash('Pesan tidak dapat dikirim. Mailer Error: ' . $mail->ErrorInfo, '', 'danger');
            }
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
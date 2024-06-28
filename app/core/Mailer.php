<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = MAIL_HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = MAIL_USERNAME;
        $this->mail->Password = MAIL_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = MAIL_PORT;
        $this->mail->setFrom(MAIL_USERNAME, 'Kostify');
    }

    public function sendMail($to, $subject, $body) {
        try {
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return $this->mail->ErrorInfo;
        }
    }
}
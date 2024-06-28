<?php 
class User_model {
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        if (!$this->validate($data)) {
            return -1;
        }
        if ($this->emailExists($data['email'])) {
            return -2; 
        }
        if ($this->usernameExists($data['username'])) {
            return -3; 
        }
        if (strpos($data['username'], ' ') !== false) {
            return -4; 
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['phone'] = '+62'.$data['phone'];
        $token = bin2hex(random_bytes(16)); // Membuat token verifikasi

        $this->db->query('INSERT INTO user (name, username, email, phone, password, is_owner, verification_token) VALUES (:name, :username, :email, :phone, :password, :is_owner, :token)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':is_owner', $data['is_owner']);
        $this->db->bind(':token', $token); 

        if ($this->db->execute()) {
            return 1; 
        } else {
            return 0; 
        }
    }
    public function login($email, $password)
    {
    
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $user = $this->db->single();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    private function validate($data)
    {
        if (!isset($data['is_owner']) || empty($data['username']) || empty($data['name']) || empty($data['phone']) || empty($data['email']) || empty($data['password'])) {
            return false;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function emailExists($email)
    {
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        return $this->db->rowCount() > 0; 
    }
    private function usernameExists($username)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind(':username', $username);
        $this->db->execute();
        return $this->db->rowCount() > 0; 
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        return $this->db->rowCount() > 0; 
    } 

    public function storeResetToken($email, $token)
    {
        $this->db->query('UPDATE user SET reset_token = :token WHERE email = :email');
        $this->db->bind(':token', $token);
        $this->db->bind(':email', $email);
        $this->db->execute();
    }

    public function getVerificationToken($email){
        $this->db->query('SELECT verification_token FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
    public function verifyUser($token)
{
    $this->db->query('UPDATE user SET is_verified = 1 WHERE verification_token = :token');
    $this->db->bind(':token', $token);
    $this->db->execute();
    return $this->db->rowCount() > 0;
}

    public function findUserByToken($token)
    {
        $this->db->query('SELECT user.email FROM user WHERE reset_token = :token');
        $this->db->bind(':token', $token);
       return $this->db->single();
       
    }

    public function updatePassword($email, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->db->query('UPDATE user SET password = :password WHERE email = :email');
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':email', $email);
        if ($this->db->execute()) {
            return true; 
        } else {
            return false; 
        
        }
    }

    public function removeResetToken($token)
    {
        $this->db->query('UPDATE user SET reset_token = NULL WHERE reset_token = :token');
        $this->db->bind(':token', $token);
        $this->db->execute();
        
    }

    

   
}
?>


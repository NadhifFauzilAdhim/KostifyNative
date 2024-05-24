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

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['phone'] = '+62'.$data['phone'];

        
        $this->db->query('INSERT INTO user (name, username, email, phone, password, is_owner) VALUES (:name, :username, :email, :phone, :password, :is_owner)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':is_owner', $data['is_owner']);

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

        // Check if the user exists and the password is correct
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
}
?>
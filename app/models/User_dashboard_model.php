<?php 
class User_dashboard_model{
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommentByUserID($id){
        $this->db->query("SELECT comments.*, property.propertyname,property.slug, user.username FROM comments JOIN property on property.id = comments.property_id JOIN user ON user.id = comments.user_id WHERE comments.user_id =:id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    public function getRequestByUserId($id){
        $this->db->query("SELECT propertyreq.*,property.propertyname,property.slug,property.image,property.available,property.price,property.payment_type FROM propertyreq JOIN property ON property.id = propertyreq.property_id WHERE propertyreq.user_id =:id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM propertyreq WHERE property_id=:id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function requestHandler($propertyid, $action) {
        if ($action) {
            $this->db->query("UPDATE propertyreq SET status = 1, confirm_at = NOW() WHERE id = :id");
        } else {
            $this->db->query("UPDATE propertyreq SET status = -1, confirm_at = NOW() WHERE id = :id");
        }
        $this->db->bind(':id', $propertyid);
        if ($this->db->execute()) {
            return 1;
        } else {
           return 0;
        }
    }

    public function addPayment($data){
        $randomUrl = bin2hex(random_bytes(15));
        $this->db->query("INSERT INTO transactions (amount, user_id, property_id, transactionurl) VALUES (:amount, :user_id, :property_id, :url)");
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':user_id', $_SESSION['user']['id']);
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':url', $randomUrl);
    
        if ($this->db->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    public function checkValid($user_id, $slug){
        $this->db->query("SELECT propertyreq.user_id, property.slug FROM propertyreq JOIN property ON property.id = propertyreq.property_id WHERE propertyreq.user_id = :user_id AND property.slug = :slug");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':slug', $slug);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPaymentByUserId($id){
        $this->db->query("SELECT * FROM transactions WHERE user_id=:id ORDER BY created_at DESC");
        $this->db->bind(':id',$id);
        return $this->db->resultSet();
    }
    public function getBillByUSerId($id){
        $this->db->query("SELECT SUM(amount) as Total_tagihan FROM transactions WHERE transactions.status = 0 AND user_id=:id");
        $this->db->bind(':id',$id);
        return $this->db->single();
    }
    public function sumOfPayment($id){
        $this->db->query("SELECT SUM(amount) as Total_pengeluaran FROM transactions WHERE transactions.paid_status = 1 AND user_id=:id");
        $this->db->bind(':id',$id);
        return $this->db->single();
    }
    public function checkPaymentValidation($user_id, $url){
        $this->db->query("SELECT property_id FROM transactions WHERE user_id=:id AND transactionurl=:url");
        $this->db->bind(':id', $user_id);
        $this->db->bind(':url', $url);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPaymentInfo($url){
        $this->db->query("SELECT transactions.*,  property.propertyname, user.name, account.bricardnumber, account.briname, account.mandiricardnumber, account.mandiriname, account.bcacardnumber, account.bcaname FROM transactions  JOIN property ON property.id = transactions.property_id JOIN user ON user.id = property.user_id JOIN account ON account.user_id = user.id WHERE transactions.transactionurl = :url;
        ");
        $this->db->bind(':url',$url);
        return $this->db->single();
    }

    public function insertTransaction($transaction_id,$transactionnumber,$bankname,$date,$sender,$image){
        $target_dir = "../public/transactions/";
        $allowed_types = ['image/jpeg', 'image/png','image/jpg','image/webp'];
        $max_size = 5 * 1024 * 1024; // 5 MB File Limit

        function handleFileUpload($file, $target_dir, $allowed_types, $max_size) {
            if (!in_array($file["type"], $allowed_types)) {
                return [-2, null];
            }
            if ($file["size"] > $max_size) {
                return [-3, null];
            }
    
            $file_extension = pathinfo($file["name"], PATHINFO_EXTENSION);
            $unique_name = uniqid() . "." . $file_extension;
            $target_file = $target_dir . $unique_name;
            
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return [1, $unique_name];
            } else {
                return [-1, null];
            }
        }
        
        list($status, $unique_name) = handleFileUpload($image, $target_dir, $allowed_types, $max_size);
        if ($status != 1) {
            unlink($target_dir . $unique_name); 
            return $status;
        }
        

        $this->db->query("INSERT INTO payment (bankname, transaction_id, transactionnumber, sendername, image,date) VALUES (:bankname,:transaction_id,:transactionnumber,:sendername,:image,:date)");
        $this->db->bind(':transaction_id', $transaction_id);
        $this->db->bind(':transactionnumber', $transactionnumber);
        $this->db->bind(':bankname', $bankname);
        $this->db->bind(':sendername', $sender);
        $this->db->bind(':image', $unique_name);
        $this->db->bind(':date', $date);
        if ($this->db->execute()) {
            return 1;
        } else {
            unlink($target_dir . $unique_name);
            return 0;
        }
    }

    public function getSuccessPayment($id){
        $this->db->query("SELECT * FROM payment WHERE transaction_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

}
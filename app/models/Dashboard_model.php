<?php 
class Dashboard_model{
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRequestByOwnerID($id){
        $this->db->query("SELECT property.user_id as 'owner_id', property.propertyname, propertyreq.*,user.name FROM property JOIN propertyreq ON propertyreq.property_id = property.id JOIN user ON user.id = propertyreq.user_id WHERE property.user_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    public function getProperyByOwnerID($id){
        $this->db->query("SELECT property.*, type.type_name FROM property JOIN type ON type.id = property.type WHERE user_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();

    }
 
    public function getCommentByUserID($id){
        $this->db->query("SELECT comments.*, property.propertyname,property.slug, user.username FROM comments JOIN property on property.id = comments.property_id JOIN user ON user.id = comments.user_id WHERE property.user_id =:id AND comments.created_at >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();

    }
    public function getPaymentStatusByUserID($id){
        $this->db->query("SELECT transactions.*, property.propertyname, property.user_id as owner_id, user.name FROM transactions JOIN property ON property.id = transactions.property_id JOIN user ON user.id = transactions.user_id WHERE property.user_id = :id AND transactions.created_at >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function setVisibility($data){
        $this->db->query("UPDATE property SET visibility = :visibility WHERE id = :id");
        $this->db->bind(':visibility', $data['visibility']);
        $this->db->bind(':id', $data['postid']);
        return $this->db->execute();
    }

    public function getRegion(){
        $this->db->query("SELECT * FROM region");
        return $this->db->resultSet();
    }
    public function getType(){
        $this->db->query("SELECT * FROM type");
        return $this->db->resultSet();
    }
    public function getCategories(){
        $this->db->query("SELECT * FROM category");
        return $this->db->resultSet();
    }

    public function checkSlugAvailability($slug){
        $this->db->query("SELECT COUNT(*) as count FROM property WHERE slug = :slug");
        $this->db->bind(':slug', $slug);
        $result = $this->db->single();
        return $result['count'] == 0; 
    }  
    
    //FIlE UPLOAD HANDLER
    public function insertPost($category, $user_id, $propertyname, $type, $slug, $price, $location, $region, $available, $facility, $image, $km, $payment_type, $image2, $image3) {
        $target_dir = "../public/uploads/";
        $allowed_types = ['image/jpeg', 'image/png','image/jpg'];
        $max_size = 5 * 1024 * 1024; // 5 MB Limit
    
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
    
        // Handle image uploads
        list($status1, $unique_name1) = handleFileUpload($image, $target_dir, $allowed_types, $max_size);
        if ($status1 != 1) {
            return $status1;
        }
    
        list($status2, $unique_name2) = handleFileUpload($image2, $target_dir, $allowed_types, $max_size);
        if ($status2 != 1) {
            unlink($target_dir . $unique_name1);
            return $status2;
        }
    
        list($status3, $unique_name3) = handleFileUpload($image3, $target_dir, $allowed_types, $max_size);
        if ($status3 != 1) {
            unlink($target_dir . $unique_name1); 
            unlink($target_dir . $unique_name2);
            return $status3;
        }
    
        $image_filenames = $unique_name1 . ',' . $unique_name2 . ',' . $unique_name3;
       
        $this->db->query("INSERT INTO property (category_id, user_id, propertyname, type, slug, price, location, region_id, available, facility, image, km, payment_type) VALUES (:category_id, :user_id, :propertyname, :type, :slug, :price, :location, :region_id, :available, :facility, :image, :km, :payment_type)");
    
        $this->db->bind(':category_id', $category);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':propertyname', $propertyname);
        $this->db->bind(':type', $type);
        $this->db->bind(':slug', $slug);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':region_id', $region);
        $this->db->bind(':available', $available);
        $this->db->bind(':facility', $facility);
        $this->db->bind(':image', $image_filenames);
        $this->db->bind(':km', $km);
        $this->db->bind(':payment_type', $payment_type);
    
        if ($this->db->execute()) {
            return 1;
        } else {
            unlink($target_dir . $unique_name1);
            unlink($target_dir . $unique_name2);
            unlink($target_dir . $unique_name3);
            return 0;
        }
    }

}


?>
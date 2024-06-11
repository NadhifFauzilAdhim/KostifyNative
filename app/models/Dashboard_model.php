<?php 
class Dashboard_model{
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRequestByOwnerID($id){
        $this->db->query("SELECT property.user_id as 'owner_id', property.propertyname, property.available, property.price, property.image, property.payment_type, propertyreq.*,user.name FROM property JOIN propertyreq ON propertyreq.property_id = property.id JOIN user ON user.id = propertyreq.user_id WHERE property.user_id = :id AND propertyreq.status = 0");
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
        $lowerslug = strtolower($slug);
        $this->db->query("INSERT INTO property (category_id, user_id, propertyname, type, slug, price, location, region_id, available, facility, image, km, payment_type) VALUES (:category_id, :user_id, :propertyname, :type, :slug, :price, :location, :region_id, :available, :facility, :image, :km, :payment_type)");
    
        $this->db->bind(':category_id', $category);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':propertyname', $propertyname);
        $this->db->bind(':type', $type);
        $this->db->bind(':slug', $lowerslug);
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

    public function deletePost($data) {
        $this->db->query("SELECT image FROM property WHERE id = :id");
        $this->db->bind(':id', $data['property_id']);
        $result = $this->db->single();

        if ($result) {
            $images = explode(',', $result['image']);
            $target_dir = "../public/uploads/";
            foreach ($images as $image) {
                if (file_exists($target_dir . $image)) {
                    $result = unlink($target_dir . $image);
                    if (!$result) {
                        return -1;
                    } 
                } 
            }
            $this->db->query("DELETE FROM property WHERE id = :id");
            $this->db->bind(':id', $data['property_id']);
            $executionResult = $this->db->execute();
            
            if ($executionResult) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return -3;
        }
    }
    public function getPostBySlug($slug, $user_id){
        $this->db->query("SELECT * FROM property WHERE slug = :slug AND user_id = :user_id");
        $this->db->bind(':slug', $slug);
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->single();

        if ($result && $result['user_id'] == $user_id) {
            return $result;
        } else {
            return null; 
        }
    }

    public function editPost($category,$propertyname,$propertyid,$type,$price,$location,$region,$available,$facility,$image,$km,$payment_type,$image2,$image3) {
        $target_dir = "../public/uploads/";
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        $max_size = 5 * 1024 * 1024; // 5 MB File Limit
    
       function handleFileUpload2($file, $target_dir, $allowed_types, $max_size) {
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
    
        $this->db->query("SELECT image FROM property WHERE id = :propertyid");
        $this->db->bind(':propertyid', $propertyid);
        $existing_images = $this->db->single();
        $existing_images = explode(',', $existing_images['image']);
    
        $uploaded_images = [];
        $statuses = [];
        
        foreach ([$image, $image2, $image3] as $index => $file) {
            if ($file['error'] == UPLOAD_ERR_NO_FILE) {
                $uploaded_images[$index] = $existing_images[$index];
                $statuses[$index] = 1;
            } else {
                list($status, $unique_name) = handleFileUpload2($file, $target_dir, $allowed_types, $max_size);
                $statuses[$index] = $status;
                if ($status == 1) {
                    $uploaded_images[$index] = $unique_name;
                } else {
                    break;
                }
            }
        }
    
        if (in_array(-1, $statuses)) {
            return -1;
        } elseif (in_array(-2, $statuses)) {
            return -2;
        } elseif (in_array(-3, $statuses)) {
            return -3;
        }
    
        foreach ($existing_images as $index => $existing_image) {
            if ($uploaded_images[$index] != $existing_image) {
                unlink($target_dir . $existing_image);
            }
        }
    
        $image_filenames = implode(',', $uploaded_images);

        
        $this->db->query("UPDATE property SET category_id = :category_id, propertyname = :propertyname, type = :type, price = :price, location = :location, region_id = :region_id, available = :available, facility = :facility, image = :image, km = :km, payment_type = :payment_type WHERE id = :propertyid");
    
        $this->db->bind(':category_id', $category);
        $this->db->bind(':propertyname', $propertyname);
        $this->db->bind(':type', $type);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':region_id', $region);
        $this->db->bind(':available', $available);
        $this->db->bind(':facility', $facility);
        $this->db->bind(':image', $image_filenames);
        $this->db->bind(':km', $km);
        $this->db->bind(':payment_type', $payment_type);
        $this->db->bind(':propertyid', $propertyid);
    
        if ($this->db->execute()) {
            return 1;
        } else {
            foreach ($uploaded_images as $uploaded_image) {
                unlink($target_dir . $uploaded_image);
            }
            return 0;
        }
    }

    public function acceptRequest($propertyid){
        $this->db->query("UPDATE propertyreq SET status = 1, confirm_at = NOW() WHERE id = :id");
        $this->db->bind(':id', $propertyid);
        if($this->db->execute()){
            
        } 
    }

    
    

}

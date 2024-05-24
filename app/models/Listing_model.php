<?php 
class Listing_model {
    private $table = 'listings';
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllList(){
        if(isset($_GET['search'])){
            $keyword = $_GET['search'];
            $keyword = '%' . $keyword . '%';
            $query = "SELECT property.*, region.region_name 
            FROM property 
            JOIN region ON region.id = property.region_id 
            WHERE property.propertyname LIKE :keyword 
            OR region.region_name LIKE :keyword 
            ORDER BY property.id DESC";
            $this->db->query($query);
            $this->db->bind(':keyword', $keyword);
            return $this->db->resultSet();
        }
    
        $this->db->query('SELECT property.*,category.pro_category,region.region_name FROM property JOIN category ON category.id = property.category_id JOIN region ON region.id = property.region_id ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getDetailBySlug($slug){
    $this->db->query("SELECT property.*, user.name, user.username, user.id AS 'id_user', user.phone, category.pro_category,region.region_name FROM property JOIN user ON user.id = property.user_id JOIN category ON category.id = property.category_id JOIN region ON region.id = property.region_id WHERE property.slug = :slug");
    $this->db->bind(':slug', $slug);
    $result = $this->db->single();

    if ($result) {
        return $result;
    } else {
        return null; 
    }
}
public function getCommentByPostSlug($slug){
    $this->db->query("SELECT comments.*, property.slug, user.name FROM comments JOIN property ON property.id = comments.property_id JOIN user ON user.id = comments.user_id WHERE property.slug =:slug ORDER BY comments.id DESC");
    $this->db->bind(':slug', $slug);
    $result =  $this->db->resultSet(); 
    if ($result) {
        return $result;
    } else {
        return null; 
    }
    
}

public function addRequest($data){
    $this->db->query("INSERT INTO propertyreq (property_id, user_id) VALUES (:property_id, :user_id)");
    $this->db->bind(':property_id',$data['property_id']);
    $this->db->bind(':user_id',$data['user_id']);
    $this->db->execute();
    return $this->db->rowCount();
}

public function addComment($data){
    $data['comment_body'] = htmlspecialchars($data['comment_body'], ENT_QUOTES, 'UTF-8');
    $this->db->query("INSERT INTO comments (property_id, user_id, comment_body) VALUE (:property_id, :user_id, :comment_body)");
    $this->db->bind(':property_id',$data['property_id']);
    $this->db->bind(':user_id',$data['user_id']);
    $this->db->bind(':comment_body',$data['comment_body']);
    $this->db->execute();
    return $this->db->rowCount();

}

public function deleteComment($data){
    $this->db->query('DELETE FROM comments WHERE id = :comment_id');
    $this->db->bind(':comment_id',$data['comment_id']);
    $this->db->execute();
    return $this->db->rowCount();

}

}
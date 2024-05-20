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
            WHERE property.propertyname LIKE '%$keyword%' 
            OR property.region_id = (SELECT id FROM region WHERE region_name = '$keyword') 
            ORDER BY property.id DESC";
            $this->db->query($query);
            return $this->db->resultSet();
        }
    
        $this->db->query('SELECT property.*,category.pro_category,region.region_name FROM property JOIN category ON category.id = property.category_id JOIN region ON region.id = property.region_id ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getDetailBySlug($slug){
    $this->db->query("SELECT property.*, user.name, user.id AS 'id_user', user.phone, category.pro_category,region.region_name FROM property JOIN user ON user.id = property.user_id JOIN category ON category.id = property.category_id JOIN region ON region.id = property.region_id WHERE property.slug = :slug");
    $this->db->bind(':slug', $slug);
    $result = $this->db->single();

    if ($result) {
        return $result;
    } else {
        return null; 
    }
}
public function getCommentByPostSlug($slug){
    $this->db->query("SELECT comments.*, property.slug, user.name FROM comments JOIN property ON property.id = comments.property_id JOIN user ON user.id = comments.user_id WHERE property.slug =:slug;");
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

}
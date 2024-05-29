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
        $this->db->query("SELECT * FROM property WHERE user_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
}

?>
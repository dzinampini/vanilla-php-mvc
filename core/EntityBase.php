<?php error_reporting(0);
class EntityBase{
    private $table;
    private $db;
    private $connect;

    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        
		/*
        require_once 'Connect.php';
        $this->connect=new Connect();
        $this->db=$this->connect->connection();
		 */
		$this->connect = null;
		$this->db = $adapter;
    }
    
    public function getConnector(){
        return $this->connect;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
    
    public function updateAnswer($id, $answer){
        $query=$this->db->query("UPDATE $this->table SET answer=$answer WHERE id = $id"); 
        return $query;
    }
    
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
}

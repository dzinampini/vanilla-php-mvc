<?php
class Users extends EntityBase{
    private $id;
    private $first_name;
    private $surname;
    private $email;
    private $password;
    
    public function __construct($adapter) {
        $table="users";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function save(){
        $query="INSERT INTO users (id,first_name,surname,email,password)
                VALUES(NULL,
                       '".$this -> first_name."',
                       '".$this -> surname."',
                       '".$this -> email."',
                       '".$this -> password."');";
        $save = $this -> db() -> query($query);
        //$this->db()->error;
        return $save;
    }

}
?>
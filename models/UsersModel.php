<?php
class UsersModel extends ModelBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="users";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnUser(){
        $query="SELECT * FROM users WHERE email='victor@victor.com'";
        $user=$this->throwSql($query);
        return $user;
    }
}
?>

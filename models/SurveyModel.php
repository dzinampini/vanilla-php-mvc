<?php
class SurveyModel extends ModelBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="survey";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnUser(){
        $query="SELECT * FROM survey WHERE guest_id='12341234'";
        $user=$this->throwSql($query);
        return $user;
    }
}
?>

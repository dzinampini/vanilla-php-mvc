<?php
class Survey extends EntityBase{
    private $id;
    private $question;
    private $answer;
    private $question_number;
    private $guest_id;
    
    public function __construct($adapter) {
        $table="survey";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    public function getQuestionNumber() {
        return $this->question_number;
    }

    public function setQuestionNumber($question_number) {
        $this->question_number = $question_number;
    }

    public function getGuestId() {
        return $this->guest_id;
    }

    public function setGuestId($guest_id) {
        $this->guest_id = $guest_id;
    }

    public function save(){
        $query="INSERT INTO survey (id,question,answer,question_number,guest_id)
                VALUES(NULL,
                       '".$this -> question."',
                       '".$this -> answer."',
                       '".$this -> question_number."',
                       '".$this -> guest_id."');";
        $save = $this -> db() -> query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        $query="UPDATE survey SET answer = '".$this -> answer."' WHERE id = '".$this -> id."''";
        $save = $this -> db() -> query($query);
        //$this->db()->error;
        return $save;
    }

}
?>
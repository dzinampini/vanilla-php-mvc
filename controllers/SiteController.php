<?php
class SiteController extends BaseController{
    public $connect;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->connect=new Connect();
        $this->adapter=$this->connect->connection();
    }
    
    public function index(){
        require_once 'models/Users.php';

        $user=new Users($this->adapter);
        $all_users=$user->getAll();

		//Producto
        // $producto=new Producto($this->adapter);
		// $allproducts=$producto->getAll();

        $this->view("index", array(
            "all_users" => $all_users,
            "page_title"    =>"Start page"
        ));
    }

    public function thank_you(){
        $this->view("thank_you", array(
            "page_title"    =>"Thank you"
        ));
    }

    public function survey(){
        require_once 'models/Survey.php';

        $survey=new Survey($this->adapter);
        $all_responses=$survey->getBy("guest_id", $_COOKIE["guest_id"]);

        $this->view("survey", array(
            "all_responses" => $all_responses,
            "page_title"    =>"Survey"
        ));
    }

    public function record_answer(){   
        require_once 'models/Survey.php';

        $survey=new Survey($this->adapter);
        $survey->setGuestId($_POST["guest_id"]);
        $survey->setQuestion($_POST["question"]);
        $survey->setAnswer($_POST["answer"]);
        // $survey->setQuestionNumber($_POST["question_number"]);
        $survey->setQuestionNumber('1');
        $save=$survey->save();

        echo json_encode($save);
    }

    public function update_answer(){   
        require_once 'models/Survey.php';
        $survey=new Survey($this->adapter);
        $id = (int)$_POST["id_edit"];
        $answer = $_POST["answer_edit"];
        $save=$survey->updateAnswer($id, $answer);
        
        // $survey->setQuestion($_POST["question"]);
        // $survey->setId($_POST["id"]);
        // $survey->setAnswer($_POST["answer"]);
        // $save=$survey->update();

        echo json_encode($save);
    }

    public function responses() {
        require_once 'models/Survey.php';
        $survey=new Survey($this->adapter);
        $all_responses=$survey->getBy("guest_id", $_COOKIE["guest_id"]);

        echo json_encode($all_responses);
    }
      
    
    // public function crear(){
    //     $this->redirect("Users", "index");
    // }
    

    public function delete_answer(){
        $id=(int)$_POST["id"];
            
        require_once 'models/Survey.php';
        $survey=new Survey($this->adapter);

        $delete = $survey->deleteById($id); 
        echo json_encode($delete);
    }
    

}
?>

<?php class BaseController{

    public function __construct() {
		require_once 'Connect.php';
        require_once 'EntityBase.php';
        require_once 'ModelBase.php';
        
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    //Plugins y funcionalidades
    
    public function view($view, $data){
        foreach ($data as $id_assoc => $value) {
            ${$id_assoc}=$value; 
        }
        
        require_once 'core/HelpViews.php';
        $helper=new HelpViews();
    
        require_once 'views/'.$view.'.php';
    }
    
    public function redirect($controller=DEFAULT_CONTROLLER, $action=DEFAULT_ACTION) {
        header("Location:index.php?controller=".$controller."&action=".$action);
    }
}

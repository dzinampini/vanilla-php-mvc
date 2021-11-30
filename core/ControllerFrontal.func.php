<?php function carryController($controller){
    $controller=ucwords($controller).'Controller';
    $strFileController='controllers/'.$controller.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controllers/'.ucwords(DEFAULT_CONTROLLER).'Controller.php';   
    }
    
    require_once $strFileController;
    $controllerObj=new $controller();
    return $controllerObj;
}

function carryAction($controllerObj, $action){
    $action=$action;
    $controllerObj->$action();
}

function throwAction($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        carryAction($controllerObj, $_GET["action"]);
    }else{
        carryAction($controllerObj, DEFAULT_ACTION);
    }
}

?>

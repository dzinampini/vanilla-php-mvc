<?php require_once 'config/global.php';
require_once 'core/BaseController.php';
require_once 'core/ControllerFrontal.func.php';

if(isset($_GET["controller"])){
    $controllerObj=carryController($_GET["controller"]);
    throwAction($controllerObj);
}else{
    $controllerObj=carryController(DEFAULT_CONTROLLER);
    throwAction($controllerObj);
}

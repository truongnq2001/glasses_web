<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

if(isset(($_GET['controller']))){
    $controllerName = ucfirst((strtolower($_GET['controller']) ?? 'WelcomeController').'Controller');
    $actionName = $_GET['action'] ?? 'index';
    if($controllerName != 'Controller'){
        if( $controllerName == 'LoginController' || $controllerName == 'RegisterController'){
            require "./Controllers/auth/$controllerName.php";
        }else{
            require "./Controllers/$controllerName.php";
        }
    
        $controllerObject = new $controllerName;
        $controllerObject -> $actionName();
    }
}else{
    require "./Controllers/HomeController.php";
    
    $controllerObject = new HomeController;
    $controllerObject ->index();
}
<?php
session_start();
require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

// if(!isset($_SESSION['loginAdmin'])) {
//     header('Location: admin.php?controller=loginAdmin');
//     exit();
// }

$controllerName = ucfirst((strtolower($_GET['controller']) ?? 'WelcomeController').'Controller');
$actionName = $_GET['action'] ?? 'index';

require "./Controllers/$controllerName.php";

$controllerObject = new $controllerName;
$controllerObject -> $actionName();


?>
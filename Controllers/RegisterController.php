<?php

class RegisterController extends BaseController{
    private $userModel;
    public function __construct(){
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }

    public function index(){
        return $this->view('frontend.register');
    }

    public function logout(){
        if(isset($_GET['action']) && ($_GET['action'] == 'logout'))
        {
            session_destroy();
            header('Location: ?controller=login');
        }

    }
    
    public function loginCheck(){
        $selectColumns = ['*'];
        $orderBy = ['id', 'DESC'];
        $limit = 1;
        $user = $this->userModel->getAll($selectColumns, $orderBy, $limit);
        if(!empty($_POST)){
            $username = $_POST['username'];
            $password = $_POST['password'];
            for ($i=0; $i < count($user); $i++) { 
                if($username == $user[$i]['username']){
                    $index = $i;
                }
            }
            if($username == $user[$index]['username'] && $password == $user[$index]['password']){
                $_SESSION['login'] = true;
                $_SESSION['adminId'] = $user[$index]['id'];
                $_SESSION['adminUser'] = $user[$index]['username'];
                $_SESSION['adminEmail'] = $user[$index]['email'];
            }
        }
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            header('Location: index.php');
        }else{
            header('Location: ?controller=login');
        }
    }
}

?>
<?php

class LoginController extends BaseController{
    private $userModel;
    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
        if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true){
            header('Location: index.php');
        }
    }

    public function index()
    {
        return $this->view('frontend.login');
    }

    public function logout()
    {
        if(isset($_GET['action']) && ($_GET['action'] == 'logout')){
            session_destroy();
            header('Location: ?controller=login');
        }

    }
    
    public function loginCheck()
    {
        $selectColumns = ['*'];
        $orderBy = ['id', 'DESC'];
        $limit = 1;
        $user = $this->userModel->getAll($selectColumns, $orderBy, $limit);
        if(!empty($_POST)){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            for ($i=0; $i < count($user); $i++) { 
                if($username == $user[$i]['username']){
                    $index = $i;
                }
            }
            if($username == $user[$index]['username'] && $password == $user[$index]['password']){
                $_SESSION['userLogin'] = true;
                $_SESSION['userId'] = $user[$index]['id'];
                $_SESSION['userUsername'] = $user[$index]['username'];
                $_SESSION['userEmail'] = $user[$index]['email'];
            }
        }
        if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true){
            $_SESSION['cart'] = [];
            header('Location: index.php');
        }else{
            header('Location: ?controller=login');
        }
    }
}

?>
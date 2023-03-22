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
            $user = $this->userModel->getCheckLogin($username, $password);
            if(isset($user) && $user != []){
                $_SESSION['userLogin'] = true;
                $_SESSION['userId'] = $user[0]['id'];
                $_SESSION['userUsername'] = $user[0]['username'];
                $_SESSION['userEmail'] = $user[0]['email'];
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
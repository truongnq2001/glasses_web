<?php

class LoginAdminController extends BaseController{
    private $adminModel;
    public function __construct(){
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
        if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true){
            header('Location: admin.php?controller=dashboard');
            exit();
        }
    }

    public function index(){
        return $this->view('backend.login');
    }

    public function logout(){
        if(isset($_GET['action']) && ($_GET['action'] == 'logout'))
        {
            session_destroy();
            header('Location: admin.php?controller=loginAdmin');
        }

    }
    
    public function loginCheck(){
        $selectColumns = ['*'];
        $orderBy = ['id', 'DESC'];
        $limit = 1;
        $adminUser = $this->adminModel->getAll($selectColumns, $orderBy, $limit);
        if(!empty($_POST)){
            $username = $_POST['adminUser'];
            $password = md5($_POST['adminPass']);
            for ($i=0; $i < count($adminUser); $i++) { 
                if($username == $adminUser[$i]['username']){
                    $index = $i;
                }
            }
            if($username == $adminUser[$index]['username'] && $password == $adminUser[$index]['password']){
                $_SESSION['loginAdmin'] = true;
                $_SESSION['adminId'] = $adminUser[$index]['id'];
                $_SESSION['adminUser'] = $adminUser[$index]['username'];
                $_SESSION['adminEmail'] = $adminUser[$index]['email'];
            }
        }
        if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true){
            header('Location: admin.php?controller=dashboard');
        }else{
            header('Location: admin.php?controller=loginAdmin');
        }
    }

}

?>
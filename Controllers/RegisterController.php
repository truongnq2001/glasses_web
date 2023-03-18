<?php

class RegisterController extends BaseController{
    private $userModel;
    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }

    public function index()
    {
        return $this->view('frontend.register');
    }
    
    public function registerAccount()
    {
        $data = [
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'email' => $_POST['email'],
        ];
        $this->userModel->createAccount($data);
        header('Location: ?controller=login');
    }
}

?>
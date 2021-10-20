<?php

if (!isset($_SESSION)) {
    session_start();
}

class Register extends Controller
{
    public $register, $data, $error=[];

    public $dataContent = [];

    public function __construct()
    {
        $this->register = $this->model('UserModel');
    }
    public function index(){
        $this->render('layouts/register');
    }
    public function registerUser(){
        $error = array();
        $data=[
                'permission_id'=>'2',
                'email'=>$_POST['email'],
                'username'=>$_POST['username'],
                'password'=>md5($_POST['password']),
                'phone'=>$_POST['phone'],
        ];
        if(empty($data['email'])||empty($data['username'])||empty($data['password'])||empty($data['phone'])){
            echo '<p class="errorLogin">Email or Username or PassWord or Phone is not empty<br/></p>';
        }{
            $this->register->register($data);
            header("Location:"._WEB_ROOT."/register");
            $this->render('layouts/register',$error);
        }
    }
}
?>
<?php

if (!isset($_SESSION)) {
    session_start();
}

class Login extends Controller
{
    public $login, $data;

    public $dataContent = [];

    public function __construct()
    {
        $this->login = $this->model('AdminModel');
    }

    public function index()
    {
        if(isset($_SESSION["login"])){
            if ($_SESSION["login"] == 1) {
                header('Location:' . _WEB_ROOT . '/admin/');
            } else {
                header('Location:' . _WEB_ROOT . '/user/');
            }
        }else {
            $this->render('layouts/login');
            if (isset($_POST['login'])) {
                if ((isset($_POST['email'])) && (isset($_POST['password']))) {
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $password = md5($pass);
                }
                if ((empty($_POST['email']) || empty($_POST['password'])) || (empty($_POST['email']) && empty($_POST['password']))) {
                    echo '<p class="errorLogin">Email or PassWord is empty<br/></p>';
                }
                $data = $this->login->checkLogin($email, $password);
                if (!empty($data)) {
                    $_SESSION["login"] = $data['permission_id'];
                    if ($_SESSION["login"] == 1) {
                        $_SESSION["admin"] = $data['username'];
                        $this->dataContent = $data;
                        //Render view
                        header('Location:' . _WEB_ROOT . '/admin/');
                    } if ($_SESSION["login"] == 2)  {
                        $_SESSION["user"] = $data['username'];
                        $this->dataContent = $data;
                        $title = 'Quan tri Admin';
                        //Render view
                        header('Location:' . _WEB_ROOT . '/user/');
                    }
                } else {
                    echo '<p class="errorLoginFailed">Login failed<br/></p>';
                }
            }
        }
    }
}

?>
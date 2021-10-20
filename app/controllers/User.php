<?php
class  User extends Controller{

    public $user, $data;

    public function __construct(){
        $this->user = $this->model('UserModel');
    }
    public function index(){
        $this->data = $this->user->getListPost();
        $this->render('layouts/view-user',$this->data);
        return $this->data;
    }
    public function myPage(){
        $this->data=$this->user->myUser();
        $this->render('layouts/my-page',$this->data );
    }
    public function updateMyProfile(){
            $data=[
                'id'=>$_POST['id'],
                'email'=>$_POST['email'],
                'username'=>$_POST['username'],
                'password'=>md5($_POST['password']),
                'phone'=>$_POST['phone'],
            ];
            $this->user->updateMyUser($data,$_POST['id']);

        unset($_SESSION['login']);
        unset($_SESSION['user']);
        session_destroy();
        header('Location:'._WEB_ROOT.'/user/');
        exit;
//        header("Location:http://localhost/mvc_training/user");

    }
}

?>
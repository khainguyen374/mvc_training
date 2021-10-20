<?php
class Logout extends Controller{
 function logout() {
     unset($_SESSION['login']);
     unset($_SESSION['admin']);
     unset($_SESSION['user']);
     session_destroy();
    header('Location:'._WEB_ROOT.'/login');
    exit;
    }
}
?>
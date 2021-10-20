<?php if(!isset($_SESSION)){
    session_start();
} ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
</head>
<body>
    <div class="from-login">
    <h2>Login Form</h2>
    <form name="login" action="" method="post" action="">
        <div class="control-from">
            <label for="">Email:</label><br/>
            <input type="text" name="email" value="" id="email" placeholder="Email or Username" >
        </div>
        <div class="control-from">
            <label for="">Password:</label><br/>
            <input type="password" name="password" value="" id="password" placeholder="Passwoed">
        </div>
        <div class="btn-submit">
            <input type="submit" value="Login" name="login" id="login">
        </div>
        <div style="display: flex;justify-content: space-between;margin-top: 20px;">
            <a href="http://localhost/mvc_training/register">Register</a>
            <a href="<?php echo _WEB_ROOT; ?>/">View Index</a>
        </div>
    </form>
</div>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>
</html>
<?php if(!isset($_SESSION['login'])&&($_SESSION['user'])){
    session_start();
    header('Location:'._WEB_ROOT.'/login');
} ?>
<html>
<head>
    <title>MVC PHP</title>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
    <style>
        .container {
            padding-top: 40px;
        }
        h3  {
            width: 100%;
            text-align: center;
        }
        form{margin: 0 auto;
            padding: 15px;
            border: 1px solid #333333;
            width: fit-content;}
    </style>
</head>

<body>
<?php $this->render('blocks/header');?>
<div class="container">
    <h3>User Change Profile </h3>
    <form action="<?php echo _WEB_ROOT; ?>/user/change" method="post">
        <input type="hidden"placeholder="id" name="id" id="id" value="<?php echo $this->data[0]['id'] ?>">
        <div class="control-item">
            <label for="">UserName:</label><br/>
            <input type="text"placeholder="Username" name="username" id="username" value="<?php echo $this->data[0]['username'] ?>">
        </div>
        <div class="control-item">
            <label for="">Email:</label><br/>
            <input type="email"placeholder="Email" name="email" id="email" value="<?php echo $this->data[0]['email'] ?>">
        </div>
        <div class="control-item">
            <label for="">Password:</label><br/>
            <input type="password"placeholder="password" name="password" id="password" value="<?php echo $this->data[0]['password'] ?>">
        </div>
        <div class="control-item">
            <label for="">Phone:</label><br/>
            <input type="text"placeholder="Phone" name="phone" id="phone" value="<?php echo $this->data[0]['phone'] ?>">
        </div>
        <div class="control-item"><br/>
            <button type="submit">Save Change</button>
            <a href="<?php echo _WEB_ROOT; ?>/user/">back to home</a>
        </div>
    </form>

</div>
<?php $this->render('blocks/footer');?>
</body>
</html>

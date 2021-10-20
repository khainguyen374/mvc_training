<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANING PHP AHT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
</head>
<div class="header-nav">
    <div class="container-fluid">
        <div class="logo">
            <img src="<?php echo _WEB_ROOT; ?>/public/assets/clients/image/icon-sun.ico" alt="">
            <div>
                Xin chào,
                <h3 style="text-transform:capitalize">
                    <?php
                        if(isset($_SESSION['login'])) {
                            if(isset($_SESSION['admin'])){
                                echo $_SESSION['admin'];
                            }else {
                                echo $_SESSION['user'];
                            }
                        }else {
                            echo "Ban chua dang nhap";
                        }
                    ?>
                </h3>
            </div>
        </div>
        <?php if(isset($_SESSION['login'])) {
            echo "<h4><a class='logout' href='"._WEB_ROOT."/logout'><i class='fa fa-sign-out'></i>Logout</a></h4>";
        }else {
            echo "<h4><a class='logout' href='"._WEB_ROOT."/login'><i class='fa fa-power-off'></i>Login</a></h4>";
        } ?>

    </div>
</div>
<style>
    .logo {
        display: flex;
        color: black;
    }
    .logo img {
        width: 50px;
        height: 100%;
    }
    .logout {
        line-height: 50px;
    }
    .header-nav {
                position: sticky;
            }
    .header-nav {
        background: rgba(52, 73, 94, 0.94);
    }
    .header-nav .container-fluid  {
            display: flex;
            justify-content: space-between;
            line-height:20px;
        }
    .header-nav .container-fluid a {
            color:#000;
        }
</style>
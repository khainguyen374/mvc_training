
<html>
<head>
    <title>MVC PHP</title>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <style>
        .col-2 {
            padding-top: 0px !important;
            background: rgb(208 208 208 / 94%);
        }
        .header-content ul li:last-child {
            margin-top: 0px !important;
        }
        img {

            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>
<?php $this->render('blocks/header');?>
<div class="container-fluid">
    <div class="row" style="height: 92%;">
        <div class="col-2">
            <div class="header-content container">
                <ul>
                    <li><?php if (isset($_SESSION['user'])){
                        echo '<a href="http://localhost/mvc_training/user/myPage">';
                            echo 'Profile,<h4 style="text-transform: capitalize">';
                            echo $_SESSION['user'];
                            echo '</h4></a>';
                            }if(isset($_SESSION['admin'])) {
                            echo '<a href="http://localhost/mvc_training/admin/">';
                            echo 'Profile,<h4 style="text-transform: capitalize">';
                            echo $_SESSION['admin'];
                            echo '</h4></a>';
                    }?></a></li>
                </ul>
            </div>
        </div>
        <div class="col-10 row">
            <?php foreach ($this->data as $value): ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"  src="<?php echo _WEB_ROOT; ?>/public/assets/clients/image/<?php echo $value['image']?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title" style="text-transform: capitalize;font-weight: bold"><?php echo $value['title']?></h4>
                            <a class="card-text" style="color: #5f5f5f" href="<?php echo $value['tags']?>">#<?php echo $value['tags']?></a><br/>
<!--                            <a class="card-text" style="color: #5f5f5f" href="--><?php //echo $value['id_category']?><!--">#--><?php //echo $value['id_category']?><!--</a>-->
                            <p class="card-text"><?php echo $value['description']?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php $this->render('blocks/footer');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<?php if(isset($_SESSION['login']) && isset($_SESSION['user'])): ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.timeOut = 1500; // 1.5s
            toastr.success('Login thanh cong!');
        });
    </script>
<?php endif;?>
</body>
</html>

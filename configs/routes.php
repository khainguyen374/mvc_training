<?php
$routes['default_controller'] = 'admin/';
/*
 * Đường dẫn ảo => Đường dẫn thật
 *
* */
$routes['/'] = 'user/';
$routes['login'] = 'login/index';
$routes['register'] = 'register/index';
$routes['register/add'] = 'register/registerUser';

//admin
    $routes['admin/'] = 'admin/index';
    $routes['admin/addUser'] = 'admin/addUser';
    $routes['admin/updateUser'] = 'admin/updateUser';
    $routes['admin/deleteUser'] = 'admin/deleteUser/$id';

    $routes['admin/post'] = 'admin/post';;
    $routes['admin/addPost'] = 'admin/addPost';
    $routes['admin/updatePost'] = 'admin/updatePost';
    $routes['admin/deletePost'] = 'admin/deletePost/$id';

    $routes['admin/tag'] = 'admin/tag';
    $routes['admin/addTag'] = 'admin/addTag';
    $routes['admin/updateTag'] = 'admin/updateTag';
    $routes['admin/deleteTag'] = 'admin/deleteTag/$id';

    $routes['admin/category'] = 'admin/category';
    $routes['admin/addCategory'] = 'admin/addCategory';
    $routes['admin/updateCategory'] = 'admin/updateCategory';
    $routes['admin/deleteCategory'] = 'admin/deleteCategory/$id';

//user
    $routes['user/'] = 'user/index';
    $routes['user/myPage'] = 'user/myPage';
    $routes['user/change'] = 'user/updateMyProfile';



?>
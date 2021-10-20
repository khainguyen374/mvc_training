<?php
class Admin extends Controller{

    public $admin, $data,$id_tag=[],$id_user=[],$id_category=[];

    public function __construct(){
        $this->admin = $this->model('AdminModel');
    }

//    user
    public function index(){
        if(isset($_SESSION['admin'])){
            $this->data = $this->admin->getListUser();
            $this->render('layouts/user-list',$this->data);
            return $this->data;
        }else{
            header("Location:" ._WEB_ROOT."/user/");
            echo _WEB_ROOT;
        }
    }
    public function addUser(){

        $data=[
            'permission_id'=>$_POST['permission_id'],
            'email'=>$_POST['email'],
            'username'=>$_POST['username'],
            'password'=>md5($_POST['password']),
            'phone'=>$_POST['phone'],
        ];
        $this->admin->insertUsers($data);
        header("Location:"._WEB_ROOT."/admin/");
    }
    public function updateUser(){
        $data=[
            'permission_id'=>$_POST['permission_id'],
            'email'=>$_POST['email'],
            'username'=>$_POST['username'],
            'password'=>md5($_POST['password']),
            'phone'=>$_POST['phone'],
        ];
        $this->admin->updateUser($data,$_POST['id']);
        header("Location:"._WEB_ROOT."/admin/");
    }
    public function deleteUser(){
        $this->admin->deleteUser($_POST['id']);
        header("Location:"._WEB_ROOT."/admin/");
    }


//    post
    public function getTagName($id_tag){
        $dataTag = $this->admin->getTagName();
        foreach ( $this->data as $value){
            $id_tag[]=$value['tagname'];
        }
        return $this->data;
    }
    public function getUserName($id_user){
        $this->data = $this->admin->getUserName();
        foreach ( $this->data as $value){
            $id_user[]=$value['username'];
        }
        return $this->data;
    }
    public function getCategoryName($id_category){
        $this->data = $this->admin->getCategoryName();
        foreach ( $this->data as $value){
            $id_category[]=$value['category_name'];
        }
        return $this->data;
    }
    public function post(){
        $this->data=$this->admin->getListPost();
        $this->render('layouts/post-list', $this->data);
        return $this->id_user;
    }


    public function addPost(){
//        $output_dir = "http://localhost/mvc_training/public/assets/clients/image/";//Path for file upload
//        $fileCount = count($_FILES["image"]['name']);
//        $RandomNum = time();
//        $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
//        $ImageType = $_FILES['image']['type'][$i]; //"image/png", image/jpeg etc.
//        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
//        $ImageExt = str_replace('.','',$ImageExt);
//        $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
//        $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
//        $ret[$NewImageName]= $output_dir.$NewImageName;
//        move_uploaded_file($_FILES["image"]["tmp_name"][$i],$output_dir."/".$NewImageName );
//        $data_img = array(
//            'image' =>$NewImageName
//        );
        $data=[
//            'id_user'=>'9',
//            'id_tag'=>'1',
//            'id_category'=>'1',
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'image'=>$_POST['image'],
            'status'=>$_POST['status'],
            'author'=>$_POST['author'],
            'tags'=>$_POST['tags'],
        ];

        $this->admin->insertPost($data);
        header("Location:"._WEB_ROOT."/admin/post");
    }
    public function updatePost(){
        $data=[
//            'id_user'=>'9',
//            'id_tag'=>'1',
//            'id_category'=>'1',
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'image'=>$_POST['image'],
            'status'=>$_POST['status'],
            'author'=>$_POST['author'],
            'tags'=>$_POST['tags'],
        ];
        $this->admin->updatePost($data,$_POST['id']);
        header("Location:"._WEB_ROOT."/admin/post");
    }

    public function deletePost(){
        $this->admin->deletePost($_POST['id']);
        header("Location:"._WEB_ROOT."/admin/post");
    }






//    tag
    public function tag(){
        $this->data = $this->admin->getListTag();
        $this->render('layouts/tag-list',$this->data);
        return $this->data;
    }
    public function addTag(){
        $this->admin->insertTag($_POST);
        echo "tag controller";
        header("Location:"._WEB_ROOT."/admin/tag");
    }
    public function updateTag(){
        $this->admin->updateTag($_POST,$_POST['id']);
        header("Location:"._WEB_ROOT."/admin/tag");
    }
    public function deleteTag(){
        $this->admin->deleteTag($_POST['id']);
        header("Location:"._WEB_ROOT."/admin/tag");
    }


//    category
    public function category(){
        $this->data = $this->admin->getListCategory();
        $this->render('layouts/category-list',$this->data);
        return $this->data;
    }
    public function addCategory(){
        $this->admin->insertCategory($_POST);
        echo "category controller";
        header("Location:"._WEB_ROOT."/admin/category");
    }
    public function updateCategory(){
        $this->admin->updateCategory($_POST,$_POST['id']);
        var_dump($_POST);
        header("Location:"._WEB_ROOT."/admin/category");
    }
    public function deleteCategory(){
        $this->admin->deleteCategory($_POST['id']);
        header("Location:"._WEB_ROOT."/admin/category");
    }
}
?>
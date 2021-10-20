<?php
/*
 * Kế thừa từ class Model
 *
 * */
class AdminModel extends Model {
    function tableFill(){
        return 'user';
     }
     function fieldFill(){
         return '*';
     }
     function primaryKey(){
         return 'id';
     }

//     user
    public function getListUser(){
        $data = $this->db->table('users_table')->get();
        return $data;
    }
    public function checkLogin($email,$password) {
        $data = $this->db->table('users_table')->where('email','=',$email)->where('password','=',$password)->first();
        // var_dump($data);
        return $data;
    }

    public function insertUsers($data){
        $this->db->table('users_table')->insert($data);
        var_dump($data);
         return $this->db->lastId();
    }
    public function updateUser($data,$id){
        $this->db->table('users_table')->where('id','=',$id)->update($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function deleteUser($id){
        $this->db->table('users_table')->where('id','=',$id)->delete();
        return $this->db->lastId();
    }

//    post
    public function getListPost(){
        $data = $this->db->table('posts_table')->get();
        return $data;
    }
    public function getTagName($id_tag){
        $data = $this->db->table('tags_table')->where('id','=',$id_tag)->get();
        var_dump($data);
        return $data;
    }
    public function getUserName($id_user){
        $data = $this->db->table('users_table')->where('id','=',$id_user)->get();
        var_dump($data);
        return $data;
    }
    public function getCategoryName($id_category){
        $data = $this->db->table('category_table')->where('id','=',$id_category)->get();
        var_dump($data);
        return $data;
    }
    public function insertPost($data){
        $this->db->table('posts_table')->insert($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function updatePost($data,$id){
        $this->db->table('posts_table')->where('id','=',$id)->update($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function deletePost($id){
        $this->db->table('posts_table')->where('id','=',$id)->delete();
        return $this->db->lastId();
    }
//    tag
    public function getListTag(){
        $data = $this->db->table('tags_table')->get();
        return $data;
    }
    public function insertTag($data){
        $this->db->table('tags_table')->insert($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function updateTag($data,$id){
        $this->db->table('tags_table')->where('id','=',$id)->update($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function deleteTag($id){
        $this->db->table('tags_table')->where('id','=',$id)->delete();
        return $this->db->lastId();
    }
//    category
    public function getListCategory(){
        $data = $this->db->table('category_table')->get();
        return $data;
    }
    public function insertCategory($data){
        $this->db->table('category_table')->insert($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function updateCategory($data,$id){
        $this->db->table('category_table')->where('id','=',$id)->update($data);
        var_dump($data);
        return $this->db->lastId();
    }
    public function deleteCategory($id){
        $this->db->table('category_table')->where('id','=',$id)->delete();
        return $this->db->lastId();
    }
}
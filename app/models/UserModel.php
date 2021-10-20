<?php

class UserModel extends Model
{
    
    function tableFill(){
        return 'user';
     }
 
     function fieldFill(){
         return '*';
     }
 
     function primaryKey(){
         return 'id';
     }

    public function getListPost(){
        $data = $this->db->table('posts_table')->get();
        return $data;
    }
    public function myUser(){
        $data=$this->db->table('users_table')->where('username','=',$_SESSION['user'])->get();
        return $data;
    }
    public function updateMyUser($data,$id){
            $this->db->table('users_table')->where('id','=',$id)->update($data);
    }
    public function register($data){
        $this->db->table('users_table')->insert($data);
//        var_dump($data);
        return $this->db->lastId();
    }

}
?>
<?php
/*
 * Kế thừa từ class Model
 *
 * */
class PostModel extends Model {
    function tableFill(){
        return 'post';
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
        echo "post model";
    }
}
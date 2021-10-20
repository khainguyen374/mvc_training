<?php
class AppServiceProvider extends ServiceProvider {
    public function boot(){
        $dataUser = $this->db->table('users_table')->where('id', '=', 20)->first();
        $data['userInfo'] = $dataUser;
        $data['copyright'] = 'Copyright &copy; 2021 by Unicode';
        View::share($data);
    }
}
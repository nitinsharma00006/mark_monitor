<?php

namespace App\Models;

class UserModel extends DbHelper
{
    public function __construct() {
        parent::__construct();
    }
    protected $table = 'users';
    protected $primaryKey = 'email';

    protected $useAutoIncrement = true;

    protected $useSoftDeletes = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user_data = $this->select('*' ,TABLE_USERS,array('email' => $email));
        if($user_data){
            if(password_verify($password , $user_data[0]['password'])){
                if($user_data[0]['status'] != "active"){
                    return "User is InActive";
                }
                // Save Data in session
                $this->session->set($user_data[0]);
                return false;
            }
            return "Password is incorrect";
        }
        return "User not exists in our system";
    }
}

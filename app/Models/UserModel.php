<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends DbHelper
{
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
            if(password_verify($password , $user_data['password'])){
                return false;
            }
            return "Password is incorrect";
        }
        return "User not exists in our system";
    }
}

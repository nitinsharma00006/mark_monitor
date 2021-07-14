<?php
namespace App\Models;

class LoginModel extends DbHelper{
    public function __construct()
    {
        parent::__construct();   
    }

    public function auth($email , $password)
    {
        $email = $this->input->post('email');
    }
}
?>
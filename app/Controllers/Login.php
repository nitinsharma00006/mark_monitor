<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('login');
    }

    public function forget()
    {
        echo "Forget Password";
    }
    public function auth()
    {        
        $auth = $this->userModel->auth();
        if($auth != false){
            
        }
    }
}

?>
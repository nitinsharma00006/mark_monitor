<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    private $login_model;
    public function __construct()
    {
        $this->login_model = new LoginModel();
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
        $user_name = $this->input->post('email');
        $password = $this->input->post('password');
        $response = $this->login_model->auth($user_name , $password);
    }
}

?>
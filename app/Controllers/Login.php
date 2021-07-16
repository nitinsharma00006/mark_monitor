<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    public function __construct()
    {
        
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
        return view('dashboard');
    }
}

?>
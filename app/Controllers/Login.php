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
        if(userLoggedIn()){
            return redirect()->to(base_url('dashboard'));
        }
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
            setFlashData('message' , $auth , 'error');
            return redirect()->to(base_url('login'));
        }else{
            return redirect()->to(base_url('dashboard'));
        }
    }
}

?>
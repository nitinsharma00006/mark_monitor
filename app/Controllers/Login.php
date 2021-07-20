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
        if(userLoggedIn($this)){
            return redirect()->to(base_url('dashboard'));
        }
        return view('login');
    }

    public function forget()
    {
        if(isset($_POST['submit'])){
            // check email is exists or not 
            // $this->userModel
            echo "check";
            exit();
            // send forgetpassword link
        }
        return view('forgetPassword');
    }
    public function auth()
    {        
        $auth = $this->userModel->auth();
        if($auth != false){
            setFlashData($this , 'message' , $auth , 'error');
            return redirect()->to(base_url('login'));
        }else{
            return redirect()->to(base_url('dashboard'));
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}

?>
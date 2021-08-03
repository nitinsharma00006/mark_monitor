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
            $email = $this->request->getPost('email');
            $check_email = $this->userModel->find($email);
            if($check_email){
                // send forgetpassword link
                // TODO: FIXME:send email to email address
                setFlashData($this , 'message' , "Link send successfull check email" , 'success');
            }else{
                setFlashData($this , 'message' , "Email address not in our system" , 'error');
            }
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
            setFlashData($this , 'message' , "Welcome To Mark Monitor" , 'success');
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
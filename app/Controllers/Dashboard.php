<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct() {

    }

    public function index()
    {
        if(userLoggedIn($this)){
            $data = [
                'page_title'   => 'Dashboard',
            ];
            setFlashData($this , 'message' , "Welcome To Mark Monitor Dashboard" , 'success');
            return view('dashboard',$data);

        }
       return view('login');
    }


}
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
            setFlashData($this , 'message' , "Welcome To Mark Monitor Dashboard" , 'success');
            return view('dashboard');
        }
       return view('login');
    }


}
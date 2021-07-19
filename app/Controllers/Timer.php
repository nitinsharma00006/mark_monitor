<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Timer extends BaseController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('timer/index');
    }
    public function set_time()
    {
        return view('timer/set_timer');
    }
    
}

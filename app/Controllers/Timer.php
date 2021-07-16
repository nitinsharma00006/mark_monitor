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
    
}

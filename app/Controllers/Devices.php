<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Devices extends BaseController
{
    public function __construct()
    {
        
    }    
    public function index()
    {
        return view('devices/index');
    }

    public function register()
    {
        return view('devices/register');
    }
    public function edit($id)
    {
        return view('devices/edit');
    }
}

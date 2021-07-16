<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('customer/index');
    }
    public function create()
    {
        return view('customer/create');
    }
    public function edit($id)
    {
        return view('customer/edit');
    }
}

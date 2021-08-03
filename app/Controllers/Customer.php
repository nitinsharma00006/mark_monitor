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
        $data['page_title'] = 'Customer List';
        return view('customer/index',$data);
    }
    public function create()
    {
        $data['page_title'] = 'Create Customer';
        return view('customer/create',$data);
    }
    public function edit($id)
    {
        $data['page_title'] = 'Edit Customer';
        return view('customer/edit',$data);
    }
}

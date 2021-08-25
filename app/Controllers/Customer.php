<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Customer extends BaseController
{
    public function __construct()
    {
        $this->customer_model = new UserModel();
    }
    public function index()
    {
        $data['page_title'] = 'Customer List';
        return view('customer/index',$data);
    }
    public function create()
    {
        if(isset($_POST['submit'])){
            $response = $this->customer_model->createCustomer();
        }
        $data['page_title'] = 'Create Customer';
        return view('customer/create',$data);
    }
    public function edit($id)
    {
        $data['page_title'] = 'Edit Customer';
        return view('customer/edit',$data);
    }
}

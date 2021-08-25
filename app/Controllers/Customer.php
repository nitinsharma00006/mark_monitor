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
        $data['customer'] = $this->customer_model->where('role', 'customer')->findAll();
        return view('customer/index',$data);
    }
    public function create()
    {
        if(isset($_POST['submit'])){
            $response = $this->customer_model->createCustomer();
            if($response){
                setFlashData($this , 'message' , "Customer Created Successfull" , 'success');
                return redirect()->to(base_url('customer'));
            }else{
                setFlashData($this , 'message' , $response , 'error');
                return redirect()->to(base_url('customer/create'));
            }
        }
        $data['page_title'] = 'Create Customer';
        return view('customer/create',$data);
    }
    public function edit($id)
    {
        $data['page_title'] = 'Edit Customer';
        $data['customer_data'] = $this->customer_model->where('id', cust_decode($id))->find();
        return view('customer/edit',$data);
    }
}

<?php

namespace App\Models;

class UserModel extends DbHelper
{
    public function __construct() {
        parent::__construct();
    }
    protected $table = 'users';
    protected $primaryKey = 'email';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'name','email','role' , 'mobile' , 'zone','city','state','pincode','address','gst','status','created_by','created_type','created_at','update_at','deleted_at'];

    protected $useSoftDeletes = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function auth(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user_data = $this->select('*' ,TABLE_USERS,array('email' => $email));
        if($user_data){
            if(password_verify($password , $user_data[0]['password'])){
                if($user_data[0]['status'] != "active"){
                    return "User is InActive";
                }
                // Save Data in session
                $this->session->set($user_data[0]);
                return false;
            }
            return "Password is incorrect";
        }
        return "User not exists in our system";
    }
    public function createCustomer(){
        $zone = $this->request->getPost('zone');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $address = $this->request->getPost('address');
        $pincode = $this->request->getPost('pincode');
        $gst = $this->request->getPost('gst');
        $password = $this->request->getPost('password');
        $user_id = gen_uniquecode($this,'CUST','user_id',TABLE_USERS);
        $insertData = array(
            'zone' => $zone,
            'state' => $state,
            'city'  => $city,
            'name'  => $name,
            'user_id' => $user_id,
            'email' => $email,
            'role'  => 'customer',
            'mobile' => $mobile,
            'address' => $address,
            'pincode' => $pincode,
            'gst' => $gst,
            'password' => password_hash($password , PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->get('name'),
        );
        if($this->insert_row(TABLE_USERS , $insertData)){
            // Mantain logs
            return true;
        }else{
            return "Error in Creating customer";
        }
    }
    public function updateCustomer($id)
    {
        $zone = $this->request->getPost('zone');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $address = $this->request->getPost('address');
        $pincode = $this->request->getPost('pincode');
        $gst = $this->request->getPost('gst');
        $updateData = array(
            'zone' => $zone,
            'state' => $state,
            'city'  => $city,
            'name'  => $name,
            'email' => $email,
            'mobile' => $mobile,
            'address' => $address,
            'pincode' => $pincode,
            'gst' => $gst,
        );
        if($this->updateRow(TABLE_USERS,$updateData,array('id' => cust_decode($id)))){
            // Mantain logs
            return true;
        }else{
            return "Error in Update customer";
        }
    }
}

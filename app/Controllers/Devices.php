<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\DeviceModel;
use App\Models\UserModel;

class Devices extends BaseController
{
    public function __construct()
    {
        $this->device = new DeviceModel();
        $this->customer = new UserModel();
    }    
    public function index()
    {
        $data['page_title'] = 'Device List';
        $data['devices'] = $this->device->findAll();
        return view('devices/index', $data);
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $response = $this->device->registerDevice();
            if($response){
                setFlashData($this , 'message' , "Device Registred Successfully" , 'success');
                return redirect()->to(base_url('devices'));
            }else{
                setFlashData($this , 'message' , $response , 'error');
                return redirect()->to(base_url('devices/register'));
            }
        }
        $data['page_title'] = 'Device Register';
        $data['customers'] = $this->customer->where('role', 'customer')->findAll();
        return view('devices/register',$data);
    }
    public function edit($id)
    {
        return view('devices/edit');
    }
}

<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\DeviceModel;

class Devices extends BaseController
{
    public function __construct()
    {
        $this->device = new DeviceModel();
    }    
    public function index()
    {
        $data['page_title'] = 'Device List';
        $data['devices'] = $this->device->findAll();
        return view('devices/index', $data);
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

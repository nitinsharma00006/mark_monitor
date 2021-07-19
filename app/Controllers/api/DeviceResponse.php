<?php
namespace App\Controllers\api;
use App\Controllers\BaseController;
use App\Models\DeviceModel;
use App\Models\DeviceResponseModel;
use CodeIgniter\HTTP\RequestInterface;

class DeviceResponse extends BaseController
{
    protected $deviceResponseModel;
    public function __construct() {
        $this->deviceResponseModel = new DeviceResponseModel();
        $this->deviceModel = new DeviceModel();
    }
    
    public function index()
    {
        $device_id = blank($this->request->getGet('device_id') , "Device ID");
        $current_value = blank($this->request->getGet('current_value'), "Current Value");
        $power_status = blank($this->request->getGet('power_status') , 'Power Status');
        $voltage_status = blank($this->request->getGet('voltage_status'), 'Voltage Status');

        $insert_array = array(
            'device_id' => $device_id , 
            'current_value' => $current_value , 
            'power_status' => $power_status , 
            'voltage_status'=>$voltage_status
        );
        $response = $this->deviceResponseModel->insert($insert_array);
        if($response > 0){
            $device_data = $this->deviceModel->find($device_id);
            $on_time = $device_data['on_time'] == null ? "" : $device_data['on_time'];
            $off_time = $device_data['off_time'] == null ? "" : $device_data['off_time'];
            $data = array('on_time' => $on_time, 'off_time' => $off_time);
            return success("Success Hit" , $data);
        }else{
            return internal_server();
        }
    }
}

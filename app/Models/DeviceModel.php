<?php
namespace App\Models;
use CodeIgniter\Model;

class DeviceModel extends DbHelper
{
    public function __construct() {
        parent::__construct();
    }
    protected $table = "devices";
    protected $primaryKey = 'device_id';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['device_id', 'device_name','customer_id','customer_meta' , 'on_time' , 'off_time','status'];

    protected $useSoftDeletes = true;
    protected $returnType = 'array';

    public function registerDevice()
    {
        $deviceID = $this->request->getPost('device_id');
        $deviceName = $this->request->getPost('name');
        $customerID = $this->request->getPost('customer_id');
        $customerName = $this->request->getPost('customer_name');
        $customerEmail = $this->request->getPost('email');
        $customerMobile = $this->request->getPost('mobile');
        $customerMeta = json_encode(array('customer_id'=>$customerID,'customer_name'=>$customerName,'customer_email'=>$customerEmail,'customer_mobile'=>$customerMobile));
        $insertData = array(
            'device_id' => $deviceID,
            'device_name' => $deviceName,
            'customer_id'  => $customerID,
            'customer_meta'  => $customerMeta,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->get('name'),
        );
        if($this->insert_row(TABLE_DEVICES , $insertData)){
            // Mantain logs
            return true;
        }else{
            return "Error in Registration Device!! Try Again";
        }
        return true;
    }
    
}

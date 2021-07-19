<?php
namespace App\Models;
use CodeIgniter\Model;

class DeviceModel extends Model
{
    protected $table = "devices";
    protected $primaryKey = 'device_id';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['device_id', 'device_name','customer_id','customer_meta' , 'on_time' , 'off_time','status'];

    protected $useSoftDeletes = true;
    protected $returnType = 'array';

}

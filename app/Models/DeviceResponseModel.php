<?php

namespace App\Models;

use CodeIgniter\Model;

class DeviceResponseModel extends Model
{
    protected $table = 'device_response';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['device_id', 'current_value','voltage_status','power_status'];

    protected $useSoftDeletes = false;
    protected $returnType = 'array';
}

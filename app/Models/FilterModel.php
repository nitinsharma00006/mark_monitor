<?php
namespace App\Models;
use App\Models\DbHelper;

class FilterModel extends DbHelper
{
    public function __construct() {
        parent::__construct();
    }

    public function loadState($zone)
    {
        $where = false;
        if($zone){
            $where = array('region' => $zone);
        }
        $state = $this->selectDistinct('statename' , TABLE_LOCATION, $where);
        return $state;
    }
    public function loadCity($state,$zone)
    {
        return array();
    }
}

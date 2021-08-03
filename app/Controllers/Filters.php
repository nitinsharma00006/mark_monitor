<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\FilterModel;

class Filters extends BaseController
{
    public function __construct() {
        $this->filterModel = new FilterModel();
    }

    public function loadState($zone=False){
        if($this->request->isAJAX()){
            set_json_header();
            $states = $this->filterModel->loadState($zone);
            die(json_encode($states));
        }
        die("No direct script allowed");       
    }
    public function loadCity($state=False,$zone=false){
        if($this->request->isAJAX()){
            $city = $this->filterModel->loadCity($state,$zone);
            die(json_encode($city));
        }
        die("No direct script allowed");       
    }
}

?>
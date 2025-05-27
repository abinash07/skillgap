<?php

namespace App\Controllers\dashboard;
use App\Controllers\BaseController;

class Home extends BaseController{
    public function index(){
        $data=[];
        return $this->loadDashboardView('index',$data);
    }
}

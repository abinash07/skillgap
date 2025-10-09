<?php

namespace App\Controllers\dashboard;
use App\Controllers\BaseController;

class Home extends BaseController{
    public function index(){
        $data=[];
        return $this->loadDashboardView('index',$data);
    }

    public function add_skill(){
        $data=[];
        return $this->loadDashboardView('addskill',$data);
    }

    public function skill_analysis(){
        $data=[];
        return $this->loadDashboardView('skillanalysis',$data);
    }

    public function all_skills(){
        $data=[];
        return $this->loadDashboardView('allskills',$data);
    }

    public function myaccount(){
        $data=[];
        return $this->loadDashboardView('myaccount',$data);
    }
}

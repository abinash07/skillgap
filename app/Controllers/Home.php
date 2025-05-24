<?php

namespace App\Controllers;

class Home extends BaseController{
    public function index(){
        $data=[];
        return $this->loadView('index',$data);
    }

    public function login(){
        return view('login');
    }
}

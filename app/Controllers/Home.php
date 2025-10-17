<?php

namespace App\Controllers;
use App\Models\CommonModel;
use App\Models\HomeModel;

class Home extends BaseController{

    protected $CommonModel;
    protected $HomeModel;

    public function __construct(){
        $this->isLoggedIn();
        $this->CommonModel = new CommonModel();
        $this->HomeModel = new HomeModel();
    }

    public function index(){
        $data=[];
        $data['skill'] = $this->HomeModel->getSkillData();
        return $this->loadView('index',$data);
    }


    public function add_skill(){
        $data=[];
        return $this->loadView('addskill',$data);
    }

    public function myaccount(){
        $data=[];
        $userid = session()->get('userid');
        $data['account'] = $this->HomeModel->getAccountDetails($userid);
        return $this->loadView('myaccount',$data);
    }

    public function profile(){
        $data=[];
        $userid = session()->get('userid');
        return $this->loadView('profile',$data);
    }


    function createSlug($productName) {
        $slug = strtolower($productName);
        $slug = preg_replace('/&/', 'and', $slug);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    public function insert_skill(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'name' => 'required|trim',
            'url'   => 'required|trim',
            'description'   => 'required|trim',
            'level' => 'required|trim'
        ];

        ## ✅ Validate Input
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => '*** Please fill the form correctly',
                'errors'  => $this->validator->getErrors()
            ]);
        }

        ## ✅ Fetch Data from POST Request
        $data = [
            'userid'            => session()->get('userid'),
            'name'              => $this->request->getPost('name'),
            'slug'              => $this->createSlug($this->request->getPost('name')),
            'url'               => $this->request->getPost('url'),
            'description'       => $this->request->getPost('description'),
            'level'             => $this->request->getPost('level'),
            'status'            => 1,
            'created_by'        => session()->get('id'),
            'created_on'        => time() + 12600,
        ];

        ## ✅ Insert into Database
        $result = $this->CommonModel->add_record('tbl_skill',$data);
        if($result){
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'You have successfully added new skill'
            ]);
        }else{
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Something error, Try after sometime!'
            ]);
        }
    }

    public function insert_post(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'skillid'       => 'required|trim',
            'content'   => 'required|trim'
        ];

        ## ✅ Validate Input
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => '*** Please fill the form correctly',
                'errors'  => $this->validator->getErrors()
            ]);
        }

        ## ✅ Fetch Data from POST Request
        $data = [
            'userid'            => session()->get('userid'),
            'skillid'           => $this->request->getPost('skillid'),
            'content'           => $this->request->getPost('content'),
            'status'            => 1,
            'created_by'        => session()->get('id'),
            'created_on'        => time() + 12600,
        ];

        ## ✅ Insert into Database
        $result = $this->CommonModel->add_record('tbl_post',$data);
        if($result){
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'You have successfully added new post'
            ]);
        }else{
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Something error, Try after sometime!'
            ]);
        }
    }


    public function get_post(){
        //$partnerid = $this->request->getPost('partnerId');
        $userid = session()->get('userid');
        $result = $this->HomeModel->getPost();
        if ($result) {
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $result
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }
}

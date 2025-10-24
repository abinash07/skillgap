<?php

namespace App\Controllers;
use App\Models\CommonModel;
use App\Models\HomeModel;
use App\Models\AuthModel;

class Home extends BaseController{

    protected $CommonModel;
    protected $HomeModel;
    protected $AuthModel;

    public function __construct(){
        $this->isLoggedIn();
        $this->CommonModel = new CommonModel();
        $this->HomeModel = new HomeModel();
        $this->AuthModel = new AuthModel();
    }

    public function index(){
        $data=[];
        return $this->loadView('index',$data);
    }

    public function post_details($id){
        $data=[];
        $data['id'] = $id;
        return $this->loadView('postdetails',$data);
    }

    public function add_skill(){
        $data=[];
        return $this->loadView('addskill',$data);
    }

    public function add_post(){
        $data=[];
        $userid = session()->get('userid');
        $data['skill'] = $this->HomeModel->getSkillData($userid);
        return $this->loadView('addpost',$data);
    }

    public function post_list($skill){
        $data=[];
        $data['skill']= $skill;
        return $this->loadView('posts',$data);
    }

    public function myaccount(){
        $data=[];
        $userid = session()->get('userid');
        $data['account'] = $this->HomeModel->getAccountDetails($userid);
        return $this->loadView('myaccount',$data);
    }

    public function profile($username){
        $data=[];
        $data['username']=$username;
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
            'skill_slug'           => $this->request->getPost('skillid'),
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
        $userid = session()->get('userid');
        $result = $this->HomeModel->getPost($userid);

        $response = [];
        foreach($result as $k => $v){
            $response[$k]['id'] = $v->id;
            $response[$k]['image'] = $v->image;
            $response[$k]['name'] = $v->name;
            $response[$k]['username'] = $v->username;
            $content = strip_tags($v->content);
            $response[$k]['content'] = substr($content,0,300);
            $response[$k]['skill'] = $v->skill;
            $response[$k]['time'] = $this->timeAgo($v->created_on);
            $response[$k]['love'] = $v->love;
            $response[$k]['is_loved'] = $v->is_loved;
        }

        if ($result) {
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $response
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }

    public function get_single_post(){
        $userid = session()->get('userid');
        $postid = $this->request->getPost('postid');
        $result = $this->HomeModel->getSinglePost($postid,$userid);

        if ($result) {
            $response = array(
                'id' => $result->id,
                'image'=> $result->image,
                'name' => $result->name,
                'username' => $result->username,
                'content' => $result->content,
                'skill' => $result->skill,
                'time' => $this->timeAgo($result->created_on),
                'love' => $result->love,
                'is_loved' => $result->is_loved,
            );

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $response
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }

    public function get_popular_skill(){
        $result = $this->HomeModel->getPopularSkill();
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

    public function update_account(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'name' => 'required|trim',
            'email'   => 'required|trim',
            'bio'   => 'required|trim',
            'occupation' => 'required|trim',
            'education' => 'required|trim'
        ];

        ## ✅ Validate Input
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => '*** Please fill the form correctly',
                'errors'  => $this->validator->getErrors()
            ]);
        }

        $userid = session()->get('userid');

        ## ✅ Fetch Data from POST Request
        $data = [
            // 'name'       => $this->request->getPost('name'),
            // 'email'      => $this->request->getPost('email'),
            'bio'        => $this->request->getPost('bio'),
            'occupation' => $this->request->getPost('occupation'),
            'education'  => $this->request->getPost('education'),
            'link_one'   => $this->request->getPost('link_one'),
            'link_two'   => $this->request->getPost('link_two'),
            'link_three' => $this->request->getPost('link_three'),
            'link_four'  => $this->request->getPost('link_four'),
        ];

        ## ✅ Handle Image Upload (optional)
        $old_image = $this->request->getPost('old_image');
        $base64Image = $this->request->getPost('cropped_image');
        if ($base64Image) {
            $imageParts = explode(";base64,", $base64Image);
            $imageBase64 = base64_decode($imageParts[1]);
            $fileName = 'profile_' . $userid . '_' . time() . '.jpeg';
            $uploadPath = FCPATH . 'uploads/profile/';
            if (!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);
            file_put_contents($uploadPath . $fileName, $imageBase64);
            @unlink(FCPATH . 'uploads/profile/' . $old_image);
            $data['image'] = $fileName;
        }


        ## ✅ Insert into Database
        $result = $this->CommonModel->updateRecord('userid',$userid,'tbl_about_me',$data);
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

    public function reset_user_password(){
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');
        $userid = session()->get('userid');

        $result = $this->AuthModel->get_users_password($userid);
        $pass_decode = password_verify($old_password, $result->password);

        // echo '<pre>';
        // print_r($old_password);
        // echo '<br>';
        // print_r($result);
        // exit;

        if($pass_decode){
            $pass = password_hash($confirm_password, PASSWORD_BCRYPT);
            $data = array(
                'userlink' => $confirm_password,
                'password' => $pass,
            );
            $result2 = $this->CommonModel->updateRecord('userid',$userid,'tbl_user',$data);
            if($result2){
                echo json_encode(array('status'=>true, 'message' => 'Password Reset'));
            }else{
                echo json_encode(array('status'=>false, 'message' => 'Something error, Try after sometime!!'));
            }
        }else{
            echo json_encode(array('status'=>false, 'message' => 'Old Password is Wrong'));
        }
    }

    public function get_my_post(){
        $userid = session()->get('userid');
        $result = $this->HomeModel->getMyPost($userid);

        $response = [];
        foreach($result as $k => $v){
            $response[$k]['id'] = $v->id;
            $response[$k]['image'] = $v->image;
            $response[$k]['name'] = $v->name;
            $content = strip_tags($v->content);
            $response[$k]['content'] = substr($content,0,300);
            $response[$k]['skill'] = $v->skill;
            $response[$k]['time'] = $this->timeAgo($v->created_on);
            $response[$k]['love'] = $v->love;
            $response[$k]['is_loved'] = $v->is_liked;
        }

        if ($result) {
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $response
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }

    public function get_my_skill(){
        //$partnerid = $this->request->getPost('partnerId');
        $userid = session()->get('userid');
        $result = $this->HomeModel->getMySkill($userid);
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

    public function timeAgo($timestamp) {
        $timeDifference = time() - $timestamp;

        if ($timeDifference < 1) {
            return 'Just now';
        }

        $units = [
            31536000 => 'year',
            2592000  => 'month',
            604800   => 'week',
            86400    => 'day',
            3600     => 'hour',
            60       => 'minute',
            1        => 'second'
        ];

        foreach ($units as $seconds => $unit) {
            if ($timeDifference >= $seconds) {
                $value = floor($timeDifference / $seconds);
                return "$value {$unit}" . ($value > 1 ? 's' : '') . ' ago';
            }
        }

        return 'Just now';
    }

    public function get_user_post(){
        $session = session();
        $userid = session()->get('userid');
        $username = $this->request->getPost('username');
        $result = $this->HomeModel->getUserPost($username,$userid);

        $response = [];
        foreach($result as $k => $v){
            $response[$k]['id'] = $v->id;
            $response[$k]['image'] = $v->image;
            $response[$k]['name'] = $v->name;
            $content = strip_tags($v->content);
            $response[$k]['content'] = substr($content,0,300);
            $response[$k]['skill'] = $v->skill;
            $response[$k]['time'] = $this->timeAgo($v->created_on);
            $response[$k]['love'] = $v->love;
            $response[$k]['is_loved'] = $v->is_liked;
        }

        if ($result) {
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $response
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }

    public function get_user_skill(){
        $username = $this->request->getPost('username');
        $result = $this->HomeModel->getUserSkill($username);
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

    public function get_user_data(){
        $session = session();
        $userid = session()->get('userid');
        $username = $this->request->getPost('username');
        $result = $this->HomeModel->getUserData($username,$userid);
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

    public function insert_love(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'postid'       => 'required|trim',
        ];

        ## ✅ Validate Input
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => '*** Please fill the form correctly',
                'errors'  => $this->validator->getErrors()
            ]);
        }

        $userid = session()->get('userid');
        $postid = $this->request->getPost('postid');

        ## ✅ Fetch Data from POST Request
        $data = [
            'userid'            => session()->get('userid'),
            'postid'            => $this->request->getPost('postid'),
            'love'              => $this->request->getPost('like'),
            'status'            => 1,
            'created_by'        => session()->get('id'),
            'created_on'        => time() + 12600,
        ];

        $data2 = [
            'love'              => $this->request->getPost('like'),
        ];

        $old_record = $this->HomeModel->getLoveData($userid,$postid);
        if($old_record){
            $result = $this->CommonModel->updateRecords('userid',$userid,'postid',$postid,'tbl_love',$data2);
        }else{
            $result = $this->CommonModel->add_record('tbl_love',$data);
        }
        
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

    public function insert_follow(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'userid'       => 'required|trim',
        ];

        ## ✅ Validate Input
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => '*** Please fill the form correctly',
                'errors'  => $this->validator->getErrors()
            ]);
        }

        $follower_id = session()->get('userid');
        $following_id = $this->request->getPost('userid');
        $follow = $this->request->getPost('follow');

        ## ✅ Fetch Data from POST Request
        $data = [
            'follower_id'       => $follower_id,
            'following_id'      => $following_id,
            'follow'            => $follow,
            'status'            => 1,
            'created_by'        => session()->get('id'),
            'created_on'        => time() + 12600,
        ];

        $data2 = [
            'follow'              => $follow,
        ];

        $old_record = $this->HomeModel->getFollowData($follower_id,$following_id);
        if($old_record){
            $result = $this->CommonModel->updateRecords('follower_id',$follower_id,'following_id',$following_id,'tbl_follow',$data2);
        }else{
            $result = $this->CommonModel->add_record('tbl_follow',$data);
        }
        
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

    public function insert_my_follow(){
        $session = session();
        
        $follower_id = session()->get('userid');
        $following_id = session()->get('userid');
        $follow = $this->request->getPost('follow');

        $data = [
            'follower_id'       => $follower_id,
            'following_id'      => $following_id,
            'follow'            => $follow,
            'status'            => 1,
            'created_by'        => session()->get('id'),
            'created_on'        => time() + 12600,
        ];

        $data2 = [
            'follow'              => $follow,
        ];

        $old_record = $this->HomeModel->getFollowData($follower_id,$following_id);
        if($old_record){
            $result = $this->CommonModel->updateRecords('follower_id',$follower_id,'following_id',$following_id,'tbl_follow',$data2);
        }else{
            $result = $this->CommonModel->add_record('tbl_follow',$data);
        }
        
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

    public function get_skill_post(){
        $userid = session()->get('userid');
        $skill = $this->request->getPost('skill');

        $result = $this->HomeModel->getSkillPost($skill,$userid);

        $response = [];
        foreach($result as $k => $v){
            $response[$k]['id'] = $v->id;
            $response[$k]['image'] = $v->image;
            $response[$k]['name'] = $v->name;
            $response[$k]['username'] = $v->username;
            $content = strip_tags($v->content);
            $response[$k]['content'] = substr($content,0,300);
            $response[$k]['skill'] = $v->skill;
            $response[$k]['time'] = $this->timeAgo($v->created_on);
            $response[$k]['love'] = $v->love;
            $response[$k]['is_loved'] = $v->is_loved;
        }

        if ($result) {
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Record found',
                'result' => $response
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Record not found'
            ]);
        }
    }
}

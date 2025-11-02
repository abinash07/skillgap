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

    public function search(){
        $data=[];
        return $this->loadView('search',$data);
    }

    public function about_us(){
        $data=[];
        return $this->loadView('about',$data);
    }

    public function contact_us(){
        $data=[];
        return $this->loadView('contact',$data);
    }

    public function term_condition(){
        $data=[];
        return $this->loadView('term',$data);
    }

    public function privacy_policy(){
        $data=[];
        return $this->loadView('privacy',$data);
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

    public function setting(){
        $data=[];
        $userid = session()->get('userid');
        $data['account'] = $this->HomeModel->getAccountDetails($userid);

        $columnArray = ['*'];
        $where_conditions = array('userid' => $userid);
        $setting_data = $this->CommonModel->row_any_record_where($columnArray,'tbl_setting',$where_conditions);
        //$data['setting'] = $this->CommonModel->row_any_record_where($columnArray,'tbl_setting',$where_conditions);
        if(!empty($setting_data) && isset($setting_data)){
            $data['setting'] = $setting_data;
        }else{
            $data['setting'][0] = [
                'notif_comment' => 0,
                'notif_like' => 0,
                'notif_monthly' => 1,
                'notif_update' => 1,
                'profile_visibility' => 'public',
                'profile_indexing' => 1,
            ];
        }

        // echo '<pre>';
        // print_r($data);
        // exit;

        return $this->loadView('setting',$data);
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
            'url'   => 'trim',
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
            'skill_slug'        => $this->request->getPost('skillid'),
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
        $skip = $this->request->getPost('skip');
        $top = $this->request->getPost('top');

        //$result2 = $this->HomeModel->checkUserSkill($userid);
  
        $result = $this->HomeModel->getPost($userid,$skip,$top);
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
                'skill_slug' => $result->skill_slug,
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

    public function get_related_post(){
        $skill = $this->request->getPost('skill');
        $postid = $this->request->getPost('postid');
        $result = $this->HomeModel->getRelatedPost($skill,$postid);

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
            'occupation' => 'trim',
            'education' => 'trim'
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

    public function get_suggested_user(){
        $result = $this->HomeModel->getSuggestedUser();
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

    public function search_me(){
        $query = $this->request->getPost('query');
        $filter = $this->request->getPost('filter');

        $response = [];

        if($filter == "skills"){
            $response = $this->HomeModel->getSearchSkill($query);
        }

        if($filter == "posts"){
            $result = $this->HomeModel->getSearchPost($query);
            foreach($result as $k => $v){
                $response[$k]['id'] = $v->id;
                $response[$k]['image'] = $v->image;
                $response[$k]['name'] = $v->name;
                $response[$k]['username'] = $v->username;
                $content = strip_tags($v->content);
                $response[$k]['content'] = substr($content,0,300);
                $response[$k]['skill'] = $v->skill;
                $response[$k]['time'] = $this->timeAgo($v->created_on);
            }
        }

        if($filter == "people"){
            $response = $this->HomeModel->getSearchPeople($query);
        }

        if ($response) {
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

    public function insert_contact_message(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'name' => 'required|trim',
            'email'   => 'required|trim',
            'subject'   => 'required|trim',
            'message' => 'required|trim'
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
            'name'              => $this->request->getPost('name'),
            'email'             => $this->request->getPost('email'),
            'subject'           => $this->request->getPost('subject'),
            'message'           => $this->request->getPost('message'),
            'created_on'        => time() + 12600,
        ];

        ## ✅ Insert into Database
        $result = $this->CommonModel->add_record('tbl_contact_us',$data);
        if($result){
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Thank you for reaching out! Our team will get in touch with you shortly.'
            ]);
        }else{
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Something error, Try after sometime!'
            ]);
        }
    }

    public function update_account_me(){
        $session = session();
        
        ## ✅ Validation Rules
        $validationRules = [
            'name' => 'required|trim',
            'email'   => 'required|trim',
            'username'   => 'required|trim'
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
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');

        $check_email = $this->HomeModel->checkUser('email',$email,$userid);
        if($check_email){
            return $this->response->setJSON(['status' => false, 'message' => 'Email already registered.']);
            exit;
        }

        $check_username = $this->HomeModel->checkUser('username',$username,$userid);
        if($check_username){
            return $this->response->setJSON(['status' => false, 'message' => 'Username already registered.']);
            exit;
        }

        $data = [
            'name'       => $name,
            'email'      => $email,
            'username'   => $username
        ];
        $result = $this->CommonModel->updateRecord('userid',$userid,'tbl_user',$data);
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

    public function update_notification_setting(){
        $userid = session()->get('userid');
        $notifComments = $this->request->getPost('notifComments');
        $notiflikes = $this->request->getPost('notiflikes');
        $notifMonthly = $this->request->getPost('notifMonthly');
        $notifUpdates = $this->request->getPost('notifUpdates');

        $check_setting = $this->HomeModel->checkUserSetting($userid);
        if($check_setting){
            $data = [
                'userid'        => $userid,
                'notif_comment' => $notifComments,
                'notif_like'   => $notiflikes,
                'notif_monthly' => $notifMonthly,
                'notif_update'  => $notifUpdates,
                'status'        => 1,
                'created_by'    => session()->get('id'),
                'created_on'    => time() + 12600,
            ];
            $result = $this->CommonModel->add_record('tbl_setting',$data);
        }else{
            $data = [
                'notif_comment' => $notifComments,
                'notif_like'   => $notiflikes,
                'notif_monthly' => $notifMonthly,
                'notif_update'  => $notifUpdates,
            ];
            $result = $this->CommonModel->updateRecord('userid',$userid,'tbl_setting',$data);
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

    public function update_privacy_setting(){
        $userid = session()->get('userid');


        $check_setting = $this->HomeModel->checkUserSetting($userid);
        if($check_setting){
            $data = [
                'profile_visibility' => $this->request->getPost('profileVisibility'),
                'profile_indexing'   => $this->request->getPost('profileIndexing'),
            ];
            $result = $this->CommonModel->updateRecord('userid',$userid,'tbl_setting',$data);
        }else{
            $data = [
                'userid'             => $userid,
                'profile_visibility' => $this->request->getPost('profileVisibility'),
                'profile_indexing'   => $this->request->getPost('profileIndexing'),
                'status'             => 1,
                'created_by'         => session()->get('id'),
                'created_on'         => time() + 12600,
            ];
            $result = $this->CommonModel->add_record('tbl_setting',$data);
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
}

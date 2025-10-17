<?php

namespace App\Controllers;
use App\Models\AuthModel;

class Auth extends BaseController{

    public function index(){
        $data = [];
        //return $this->loadAdminView('login',$data);
        return view('/login');
    }

    public function login(){
        return view('login');
    }


    public function loginme(){
        // Enable session
        $this->session = session();
        $authModel = new AuthModel();

        // Validate input
        if (!$this->validate([
            'username' => 'required|trim',
            'password' => 'required|max_length[32]',
        ])) {
            return $this->response->setJSON(['status' => false, 'message' => 'All fields are required']);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // echo '<pre>';
        // print_r($_POST);
        // exit;

        $email_check = $authModel->checkEmail($username);
        if ($email_check) {
            $result = $authModel->getUserData($username, $password);
            if ($result) {
                $result = (object) $result;
                // print_r($result);
                // exit;
                if (password_verify($password, $result->password)) {
                    $userData = [
                        'id' => $result->id,
                        'name' => $result->name,
                        'username' => $result->username,
                        'userid' => $result->userid,
                        'email' => $result->email,
                        'phone' => $result->phone,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($userData);
                    return $this->response->setJSON(['status' => true, 'message' => 'Login success', 'result' => $userData]);
                } else {
                    return $this->response->setJSON(['status' => false, 'message' => 'Wrong password']);
                }
            } else {
                return $this->response->setJSON(['status' => false, 'message' => 'Unauthorized']);
            }
        } else {
            return $this->response->setJSON(['status' => false, 'message' => 'Wrong email/username']);
        }
    }



    public function logout(){
        $session = session();
        // Destroy session
        $session->destroy();
        // Redirect to login page
        return redirect()->to(base_url('login'))->with('message', 'You have been logged out.');
    }

}
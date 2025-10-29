<?php

namespace App\Controllers;
use App\Models\AuthModel;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;

class Auth extends BaseController{

    public function index(){
        $data = [];
        return view('/login');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function forgot_password(){
        return view('forgotpassword');
    }

    public function reset_password(){
        return view('resetpassword');
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
                        'image' => $result->image,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($userData);
                    return $this->response->setJSON(['status' => true, 'message' => 'Login success', 'result' => $userData]);
                } else {
                    return $this->response->setJSON(['status' => false, 'message' => 'Invialid email or password']);
                }
            } else {
                return $this->response->setJSON(['status' => false, 'message' => 'Unauthorized']);
            }
        } else {
            return $this->response->setJSON(['status' => false, 'message' => 'Invialid email or password']);
        }
    }

    public function gLogin(){
        $client = new GoogleClient();
        $client->setClientId('GOOGLE_CLIENT_ID');
        $client->setClientSecret('GOOGLE_CLIENT_SECRET');
        $client->setRedirectUri(base_url('googlelogin'));
        $client->addScope('email');
        $client->addScope('profile');
        return redirect()->to($client->createAuthUrl());
    }


    public function googleLogin(){
        $this->session = session();
        $authModel = new AuthModel();
        $client = new GoogleClient();
        $client->setClientId('GOOGLE_CLIENT_ID');
        $client->setClientSecret('GOOGLE_CLIENT_SECRET');
        $client->setRedirectUri(base_url('googlelogin'));

        if ($code = $this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            $client->setAccessToken($token['access_token']);

            $oauth2 = new Oauth2($client);
            $googleUser = $oauth2->userinfo->get();
            $name = $googleUser->name;
            $email = $googleUser->email;
            $password = "Password#123";

            // echo '<pre>';
            // print_r($googleUser);
            // exit;

            $email_check = $authModel->checkEmail($email);
            if($email_check){
                $user_data = $authModel->getUserData($email);
                $user_data = (object) $user_data;
                $userSessionData = [
                    'id' => $user_data->id,
                    'name' => $user_data->name,
                    'username' => $user_data->username,
                    'userid' => $user_data->userid,
                    'email' => $user_data->email,
                    'image' => $user_data->image,
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($userSessionData);
                return redirect()->to('');
            }else{
                $result5 = $authModel->get_last_id();
                $firstname = strtok($name, " ");
                $username = $firstname.$result5->id;
                $userid = uniqid().$result5->id;
                $refferid = "SK".date("Y").$result5->id;
                $auth_key = $this->generate_key($email,'123456');

                $userData = [
                    'userid'        => $userid,
                    'username'      => $username,
                    'name'          => $name,
                    'email'         => $email,
                    'phone'         => $email,
                    'reffer'        => 'SKILLKR',
                    'reffer_id'     => $refferid,
                    'userlink'      => $password,
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'token'         => bin2hex(random_bytes(35)),
                    'auth_key'      => $auth_key,
                    'auth_key_time' => time(),
                    'status'        => 1,
                    'created_on'    => time(),
                ];
                $result = $authModel->insert_record($userData);

                if ($result) {
                    $userSessionData = [
                        'id' => $result,
                        'name' => $name,
                        'username' => $username,
                        'userid' => $userid,
                        'email' => $email,
                        'image' => $result->image,
                        'isLoggedIn' => TRUE
                    ];
                    $this->session->set($userSessionData);

                    return redirect()->to('');
                } else {
                    return redirect()->to('/login')->with('error', 'Google login failed.');
                }
            }

        }else{
            return redirect()->to('/login')->with('error', 'Google login failed.');
        }
    }




    public function registerme(){
        $this->session = session();
        $authModel = new AuthModel();

        // Validate required fields
        if (!$this->validate([
            'name'     => 'required|trim',
            'email'    => 'required|valid_email|trim',
            'password' => 'required|trim',
        ])) {
            return $this->response->setJSON(['status' => false, 'message' => 'Please fill all required fields correctly.']);
        }

        $name     = $this->request->getPost('name');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $emailExists = $authModel->checkEmail($email);
        if ($emailExists) {
            return $this->response->setJSON(['status' => false, 'message' => 'Email already registered.']);
        }

        $result5 = $authModel->get_last_id();
        $firstname = strtok($name, " ");
        $username = $firstname.$result5->id;
        $userid = uniqid().$result5->id;
        $refferid = "SK".date("Y").$result5->id;
        $auth_key = $this->generate_key($email,'123456');

        $userData = [
            'userid'        => $userid,
            'username'      => $username,
            'name'          => $name,
            'email'         => $email,
            'phone'         => $email,
            'reffer'        => 'SKILLKR',
            'reffer_id'     => $refferid,
            'userlink'      => $password,
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'token'         => bin2hex(random_bytes(35)),
            'auth_key'      => $auth_key,
            'auth_key_time' => time(),
            'status'        => 1,
            'created_on'    => time(),
        ];

        $result = $authModel->insert_record($userData);
        if ($result) {
            $userData = [
                'id' => $result,
                'name' => $name,
                'username' => $username,
                'userid' => $userid,
                'email' => $email,
                'isLoggedIn' => TRUE
            ];
            $this->session->set($userData);

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Registration successful.',
                'result'  => $userData
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Something went wrong, please try again.'
            ]);
        }
    }

    public function forgot_password_me(){
        helper('sk');
        $email = $this->request->getPost('email');

        $email_check = $authModel->checkEmail($email);
        if ($email_check) {
            $result = $authModel->getUserData($username, $password);
            $result = (object) $result;
            $token = $result->token;

            $to = $email;
            $subject = 'Forgot Password';
            $message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <title>Password Reset</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body {
                    background-color: #f4f6f8;
                    font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    }
                    .container {
                    max-width: 600px;
                    background-color: #ffffff;
                    margin: 40px auto;
                    border-radius: 8px;
                    box-shadow: 0 2px 12px rgba(0,0,0,0.1);
                    overflow: hidden;
                    }
                    .header {
                    background-color: #6c63ff;
                    color: white;
                    text-align: center;
                    padding: 30px 20px;
                    }
                    .header h1 {
                    margin: 0;
                    font-size: 22px;
                    }
                    .content {
                    padding: 30px;
                    text-align: left;
                    }
                    .content p {
                    font-size: 15px;
                    line-height: 1.6;
                    margin-bottom: 20px;
                    }
                    .btn {
                    display: inline-block;
                    background-color: #6c63ff;
                    color: white;
                    padding: 12px 24px;
                    border-radius: 6px;
                    text-decoration: none;
                    font-weight: 600;
                    }
                    .footer {
                    text-align: center;
                    font-size: 13px;
                    color: #777;
                    padding: 20px;
                    border-top: 1px solid #eee;
                    }
                </style>
                </head>
                <body>
                <div class="container">
                    <div class="header">
                    <h1>Password Reset Request</h1>
                    </div>

                    <div class="content">
                    <p>Hi <strong><?= esc($name) ?></strong>,</p>

                    <p>We received a request to reset your password. Click the button below to reset it:</p>

                    <p style="text-align:center;">
                        <a href="<?= esc($resetLink) ?>" class="btn" target="_blank">Reset Password</a>
                    </p>

                    <p>If you didn’t request this, please ignore this email. The link will expire in <strong>1 hour</strong>.</p>

                    <p>Thanks,<br><strong>The SkillGap Team</strong></p>
                    </div>

                    <div class="footer">
                    &copy; <?= date("Y") ?> SkillGap. All rights reserved.<br>
                    <a href="<?= base_url() ?>" style="color:#6c63ff; text-decoration:none;">Visit Website</a>
                    </div>
                </div>
                </body>
                </html>
            ';

            if (send_email($to, $subject, $message)) {
                return $this->response->setJSON(['status' => true, 'message' => 'Email sent successfully!']);
            } else {
                return $this->response->setJSON(['status' => false, 'message' => 'Failed to send email.']);
            }
        }else {
            return $this->response->setJSON(['status' => false, 'message' => 'Invialid email']);
        }
    }

    public function reset_password_me(){
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        $check_token = $authModel->check_token($token);
        if($check_token){
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $data = array(
                'userlink' => $password,
                'password' => $pass,
                'token' => bin2hex(random_bytes(35))
            );
            $result2 = $authModel->updateRecord('token',$token,'tbl_user',$data);
            if($result2){
                return $this->response->setJSON(['status' => true, 'message' => 'Password Reset']);
            }else{
                return $this->response->setJSON(['status' => false, 'message' => 'Something error, Try after sometime!!']);
            }
        }else{
            return $this->response->setJSON(['status' => false, 'message' => 'Invialid token']);
        }
    }

    public function generate_key($email,$token){
		do{
			$salt = base_convert(bin2hex(random_bytes(64)), 16, 36);
			if ($salt === FALSE){
				$salt = hash('sha256', time() . mt_rand().base64_encode($email.$token));
			}
			$new_key = substr($salt, 0, 40);
		}
		while ($this->key_exists($new_key));
		return $new_key;
	}
	public function key_exists($key){
		return false;
	}

    public function logout(){
        $session = session();
        // Destroy session
        $session->destroy();
        // Redirect to login page
        return redirect()->to(base_url('login'))->with('message', 'You have been logged out.');
    }
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 namespace App\Controllers;  
 use CodeIgniter\Controller;

  $session = \Config\Services::session();
  $security = \Config\Services::security();

class Auth extends Controller {

    private $auth;
    // index method
    public function login() {
        $data = array('metaDescription' => 'Login', 'metaKeywords' => 'Login', 'title' => 'Login - SecWeb APP', 'message_display' => ' ');
        $data['breadcrumbs'] = array('Login' => '#');
        echo view('auth/header', $data);
        echo view('auth/login', $data);
        echo view('auth/footer', $data);
    }

    // index method
    public function profile() {
        $data = array();
        $data['metaDescription'] = 'Profile';
        $data['metaKeywords'] = 'Profile';
        $data['title'] = "Profile - Sec Web APP";
        $data['breadcrumbs'] = array('Profile' => '#');
        echo view('setup/first', $data);
    }
    
    function register() {
        $this->auth = model('App\Models\Auth_model');        
        $session = \Config\Services::session();
        $rules = [
            'username'   => 'required|min_length[3]|max_length[100]',
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|valid_email',
            'password'  =>  'required|min_length[5]',
            'passconf'  =>  'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            $this->first_register();
        } else {
            if ($this->auth->isDuplicate(request()->getPost('username'))) {
                $session->set('flash_message', 'User email already exists');
                $this->first_register();
            } else {
                $clean = request()->getPost();
                echo $id = $this->auth->insertUser($clean);
                if (!$id) {
                    $session->set('flash_message', 'There was a problem updating your record');
                    $this->first_register();
                } else {
                    $this->login();
                }
            }
        }
    }

    function first_register(){
        $data = array('metaDescription' => 'First user Setup', 'metaKeywords' => 'Setup', 
                        'title' => 'First User Setup - SecWeb APP', 'message_display' => ' ');
            $data['breadcrumbs'] = array('First user Setup' => '#');
            echo view('auth/header', $data);
            echo view('setup/first', $data);
            echo view('auth/footer', $data);
    }

    // action login method
    function doLogin() {
        $this->auth = model('App\Models\Auth_model'); 
        // Check form  validation
        $rules = [
            'user_name'   => 'required|min_length[3]|max_length[100]',
            'password'  => 'trim|required'
        ];
        if (!$this->validate($rules)) {
            session()->set('flash_message', 'Required! Please Enter Valid Username and Password. Empty Fieldset are not allowed');
            $this->login();
        } elseif (!$this->auth->checkLoginTable()) {            
            $this->first_register();
        } else {           
            //Field validation succeeded.  Validate against database
            $username = request()->getPost('user_name');
            $password = request()->getPost('password');

            $this->auth->setUserName($username);
            $pass=$this->auth->setPassword($password);
            //query the database
            $result = $this->auth->login();
            if (!empty($result)) {
                $lastLogin = $this->auth->LastLoginInfo($result->id);
                    $authArray = array(
                        'user_id' => $result->id,
                        'empid' => $result->emp_id,
                        'username' => $result->user_id,
                        'user_role' => $result->user_role,
                        'lastLogin' => $lastLogin,
                        'isLoggedIn' => TRUE
                    );
                    
                    session()->set('ci_session_key_generate', TRUE);
                    session()->set('ci_seesion_key', $authArray);
                    // remember me
                    if (!empty(request()->getPost("remember"))) {
                        setcookie("loginId", $username, time() + (10 * 365 * 24 * 60 * 60));
                        setcookie("loginPass", $password, time() + (10 * 365 * 24 * 60 * 60));
                    } else {
                        setcookie("loginId", "");
                        setcookie("loginPass", "");
                    }
                $loginInfo = array("id_user" => $result->id, "log_type" => "login", "session_data" => json_encode($authArray), 
                                    "ipaddress" => $_SERVER['REMOTE_ADDR'], "user_agent" => $this->getBrowserAgent(), 
                                    "agent_string" => \Config\Services::request()->getUserAgent(), 
                                    "platform" => \Config\Services::request()->getUserAgent()->getPlatform());
                $this->auth->Loginlogged($loginInfo);

                // Add user data in session
                session()->set('logged_in', $authArray);
                header('Location: dashboard');
                exit();
            }
            else {
                session()->set('flash_message', 'Login Failed! Please enter valid username/password or Contact Administator');
                header('Location: login');
                exit();
            }
        }
    }

    //logout method
    public function logout() {        
        $this->auth = model('App\Models\Auth_model'); 
        $authArray = session('logged_in');
        $logout_info = array ("id_user" => $authArray['user_id'], "log_type" => "logout", "session_data" => json_encode($authArray), 
                            "ipaddress" => $_SERVER['REMOTE_ADDR'], "user_agent" => $this->getBrowserAgent(), 
                            "agent_string" => \Config\Services::request()->getUserAgent(), 
                            "platform" => \Config\Services::request()->getUserAgent()->getPlatform());
        $this->auth->Logoutlogged($logout_info);
        session()->remove('ci_seesion_key');
        session()->remove('ci_session_key_generate');
        session()->destroy();
        $this->response->setHeader('Cache-Control:', 'no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0');
        $this->response->setHeader('Pragma:',' no-cache');
        session()->remove('logged_in');//, $sess_array);
        return redirect('login');
    }

    function isLoggedIn() {
        $isLoggedIn = session()->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect('login');
        } else {
            return redirect('dashboard');
        }
    }

    public function forgot() {

        $rules = [
            'email'     => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            $data = array('metaDescription' => 'Forgot Password', 'metaKeywords' => 'Login', 'title' => 'Login - SecWeb APP', 'message_display' => ' ');
            $data['breadcrumbs'] = array('Login' => '#');
            echo view('auth/header', $data);
            echo view('auth/forgot');
            echo view('auth/footer', $data);
        } else {
            $email = request()->getPost('email');
            $userInfo = model('Auth_model')->getUserInfoByEmail($email);

            if (!$userInfo) {
                session()->setFlashdata('flash_message', 'We cant find your email address. Please try again or click here to <a href="'. site_url().'login"> Login </a>');
                return redirect('forgot');
            } else {
                if ($userInfo->status != 1) { //if status is not approved
                    session()->setFlashdata('flash_message', 'Your account is not in approved status');
                    return redirect('forgot');
                } else {
                    $token = model('Auth_model')->insertToken($userInfo->id);
                    $subject = 'Password Reset Link from Security W3 Solutions';
                    $qstring = $this->base64url_encode($token);
                    $url = site_url() . 'auth/reset_password/token/' . $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>';
                    // Define email data
                    print_r($userInfo);
                    $mailData = array(
                        'email' => request()->getPost('email'),
                        'subject' => $subject,
                        'message' => '<h2>Hi ' . $userInfo->first_name . $userInfo->last_name . ',</h2><p>You recently requested to reset your password for your Security W3 Solutions Account. Click the button below to reset it.<br><div style="width:100%;position: relative;left: 100px;"> <a href="' . $url . 
                        '">  <button style=" color: white; cursor: pointer; position: relative; padding: 1.5rem 3.5rem; border-radius: 3.75rem; line-height: 1.5rem; font-size: 1.5rem; font-weight: 600; border: 4px solid #C01F9E; background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%); box-shadow: 0 1rem 1.25rem 0 rgba(22,75,195,0.50), 0 -0.25rem 1.5rem rgba(110, 15, 155, 1) inset, 0 0.75rem 0.5rem rgba(255,255,255, 0.4) inset, 0 0.25rem 0.5rem 0 rgba(180, 70, 207, 1) inset; left: 150px;" >Password Reset</button> </a></div></p><p>If You did not request a password reset, please ignore this email or reply to let us know.<br> This password reset is only valid utill tonight.</p><p class="pj"><h2>Thanks,<br>Web Team</h2></p><p><strong>P.S.</strong> We also hearing from you and helping you with any issues you have, please reply to this email if you want to ask a question or just say Hi.</p><p class="small">If you are having trouble clicking the password reset button, copy and paste the URL below into your web browser. <br> ' . $link . '</p><style>.pj{color:green;} .small{ font-size:9px;}</style>'
                    );

                    // Send an email to the site admin
                    $send = $this->sendEmail($mailData);

                    // Check email sending status
                    if ($send) {
                        // Unset form data
                        session()->setFlashdata('flash_message',' Email Sent. Please Check your email to reset your password');
                        return redirect('login');
                    } else {
                        session()->setFlashdata('flash_message', 'Email Not Sent. Please Try Again or Contact Administrator');
                        return redirect('forgot');
                    }
                    exit;
                }
            }
        }
    }

    public function reset_password() {
        $uri = new \CodeIgniter\HTTP\URI(current_url());
            $token = $this->base64url_decode($uri->getSegment(4)); 
            
            $user_info = model('Auth_model')->isTokenValid($token); //either false or array();               
            
            if(!$user_info){
                session()->setFlashdata('flash_message', 'Token is invalid or expired');
                return redirect('login');
            }            
            
            $rules = [
                'password'  =>  'required|min_length[5]',
                'passconf'  =>  'required|matches[password]'
            ];
    
            if (!$this->validate($rules)) {
                $data = array(
                    'firstName'=> $user_info->first_name, 
                    'email'=>$user_info->email, 
    //                'user_id'=>$user_info->id, 
                    'token'=>$this->base64url_encode($token)
                );   
                    $data = array_merge($data, array('metaDescription' => 'Forgot Password', 'metaKeywords' => 'Login', 'title' => 'Login - SecWeb APP', 'message_display' => ' '));
                $data['breadcrumbs'] = array('Login' => '#');
                echo view('auth/header', $data);
                echo view('auth/reset_password', $data);
                echo view('auth/footer',$data);
            } else {
                                               
                $post = request()->getPost(); 
                $post['user_id'] = $user_info->id;
                unset($post['passconf']);                
                if(!model('Auth_model')->updatePassword($post)){
                    session()->setFlashdata('flash_message', 'There was a problem updating your password');
                }else{
                    session()->setFlashdata('flash_message', 'Your password has been updated. You may now login');
                }
                return redirect('login');                
            }
        }
        
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }       

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email) {
        // // Get email and activation code from URL values at index 3-4
        // $email = urldecode($email);

        // // Check activation id in database
        // $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        // $data['email'] = $email;
        // $data['activation_code'] = $activation_id;

        // if ($is_correct == 1) {
        //     echo view('newPassword', $data);
        // } else {
        //     return redirect('login');
        // }
    }

    /**
     * This function used to create new password for user
     */
    function createPasswordUser() {
        // $status = '';
        // $message = '';
        // $email = request()->getPost("email");
        // $email = strtolower("",$email);
        // $activation_id = request()->getPost("activation_code");

        // $rules = [
        //     'password'  =>  'required|max_length[20]',
        //     'passconf'  =>  'trim|required|matches[password]|max_length[20]'
        // ];

        // if (!$this->validate($rules)) {
        //     $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        // } else {
        //     $password = request()->getPost('password');
        //     $cpassword = request()->getPost('cpassword');

        //     // Check activation id in database
        //     $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        //     if ($is_correct == 1) {
        //         $this->login_model->createPasswordUser($email, $password);

        //         $status = 'success';
        //         $message = 'Password reset successfully';
        //     } else {
        //         $status = 'error';
        //         $message = 'Password reset failed';
        //     }

        //     session()->setFlashdata($status, $message);

        //     return redirect("login");
        // }
    }
    private function sendEmail($mailData) {
        // Load the email library
        $email = \Config\Services::email();

        // Mail config
        $to =  $mailData['email'];
        print_r($to);
        $from =  $mailData['email'];
        $fromName = 'Security W3 Solution Web Admin';
        $mailSubject = $mailData['subject'];
        
        //headers
        $headers = "Reply-To: The Sender ansari.ocg@gmail.com \r\n";
        $headers .= "Return-Path: The Sender ansari.ocg@gmail.com \r\n";
        $headers .= "From: The Sender ansari.ocg@gmail.com \r\n";
        $headers .= "Organization: Sender Organization\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

        // Mail content
        $mailContent = $mailData['message'];

        $config['mailtype'] = 'html';
        $email->initialize($config);
        $email->setTo($to);
        $email->setFrom('ansari.ocg@gmail.com', $fromName,'ansari.ocg@gmail.com');
        $email->setSubject($mailSubject);
        $email->setMessage($mailContent);
        $email->setHeader('header',$headers);

        // Send email & return status
        return $email->send() ? true : false;
        
        
    }

    private function getBrowserAgent() {
        $agent = \Config\Services::request()->getUserAgent();

        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
        } elseif ($agent->isRobot()) {
            $currentAgent = $agent->getRobot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }

        echo $currentAgent;

        echo $agent->getPlatform();

        return $currentAgent;
        
    }
}

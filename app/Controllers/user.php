<?php

/* 
 * Metro Info Tech
 * Each line should be prefixed with  * 
 */
namespace App\Controllers;
 
class User extends BaseController {
 
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome');
    protected $javascripts = array('responsive', 'empaddscript', 'customloclist');
    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }
    /* public function __construct()
    {
        parent::__construct();
       // $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    } */
 
    public function index()  {
        $session_array = session('logged_in');
        $data['title'] = 'SWS Executive User';
        $data['stylesheet'] = $this->get_stylesheets();
        $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
        $data['javascripts'] = $this->get_javascripts();
        $data['module'] = '';
        $data['user_role'] = $session_array ['user_role'];

        $data['lod_css'] = '<!-- Nav CSS --><link href="' . base_url() . 'css/custom.css" rel="stylesheet">';
        $data['lod_js'] = '<!-- jQuery --> <script src="' . base_url() . 'js/jquery.min.js"></script>
                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="' . base_url() . 'js/metisMenu.min.js"></script>
                            <script src="' . base_url() . 'js/custom.js"></script>
                            <script src="' . base_url() . 'js/customloclist.js"></script>
                            <!-- Graph JavaScript -->
                            <script src="' . base_url() . 'js/d3.v3.js"></script>
                            <script src="' . base_url() . 'js/rickshaw.js"></script>';                  
        echo view('templates/header', $data);
        $this->register();
    }
    
    public function register() {
        $rules =['firstname'=> 'trim|required|alpha|min_length[3]|max_length[50]',
            'lastname'=> 'trim|required|alpha|min_length[3]|max_length[50]',
            'email'=>'trim|required|valid_email|is_unique[tbl_user.username]',
            'password'=> 'trim|required|md5','cpassword'=> 'trim|required','mobno'=>'trim|required','gender'=> 'trim|required',
            'marstatus'=> 'trim|required',
            'profor'=> 'trim|required'];

              
        $data['title'] = 'Register';
        $data['lod_css'] = '
            <link rel="stylesheet" href="'.base_url().'css/google-style.css" type="text/css">
            <link href="'.base_url().'css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom CSS -->
        <link href="'.base_url().'css/style.css" rel="stylesheet" type="text/css" />
        <!-- Graph CSS -->
        <link href="'.base_url().'css/lines.css" rel="stylesheet" type="text/css" />
        <link href="'.base_url().'css/font-awesome.css" rel="stylesheet"> 
        
        <!----webfonts--->
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
        <!---//webfonts--->  
        <!-- Nav CSS -->
        <link href="'.base_url().'css/custom.css" rel="stylesheet">
        ';
        $data['lod_js'] = '<!-- jQuery --> <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>
                            <script src="<?php echo base_url(); ?>js/custom.js"></script>
                            <script src="<?php echo base_url(); ?>js/customloclist.js"></script>
                            <!-- Graph JavaScript -->
                            <script src="<?php echo base_url(); ?>js/d3.v3.js"></script>
                            <script src="<?php echo base_url(); ?>js/rickshaw.js"></script>
        
        ';

        if ($this->validate($rules) === FALSE) { 
            echo view('user/register');
            echo view('templates/footer',$data); 
        }
        else { 
            if (model('user_model')->set_user())  {                             
                session()->set_flashdata('msg_success','Registration Successful!');
                redirect('user/register');            
            } else {                
                session()->set_flashdata('msg_error','Error! Please try again later.');
                redirect('user/register');
            }
        }
    }
    
    public function login() {        
        $email = request()->getPost('email');
        $password = request()->getPost('password');
        
        $rules = ['email'=>'trim|required|valid_email','password'=> 'trim|required|md5'];        
        
        $data['title'] = 'Login';
        
        if ($this->validate($rules) === FALSE) {            
            echo view('templates/header', $data);
            echo view('user/login');
            echo view('templates/footer'); 
        } else { 
            if ($user = model('user_model')->get_user_login($email, $password))  {   
                /*$user_data = array(
                              'email' => $email,
                              'is_logged_in' => true
                         );
                     
                session()->set_userdata($user_data);*/
                
                session()->set_userdata('email', $email);
                session()->set_userdata('user_id', $user['id']);
                session()->set_userdata('is_logged_in', true);
                
                
                session()->set_flashdata('msg_success','Login Successful!');
                redirect('Welcome');                
            }
            else
            {
                session()->set_flashdata('msg_error','Login credentials does not match!');
                $router = service('router'); 
                $currentClass  = $router->controllerName();  
                $currentAction = $router->methodName();
                redirect($currentAction);
                //redirect('user/login');
            }
        }
    }
    
    public function logout()
    {    
        if (session()->userdata('is_logged_in')) {
            
            //session()->unset_userdata(array('email' => '', 'is_logged_in' => ''));
            session()->unset_userdata('email');
            session()->unset_userdata('is_logged_in');
            session()->unset_userdata('user_id');            
        }
        redirect('Welcome');
    }    
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Executive
 *
 * @author Muhammad Ansari
 */

 namespace App\Controllers;

class Executive extends BaseController {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle','font-awesome');
    protected $javascripts = array('responsive', 'empaddscript', 'customloclist');

    /* public function __construct()
    {
        parent::__construct();
        echo model(array('Executive_model' => 'emp', 'Location_model' => 'loc'));
        echo helper('url_helper');
        echo library('upload');
    } */

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        $session_array = session('logged_in');
        if ($session_array) {
            $data['title'] = "Executive List";
            $data['metakeys'] = "";
            $data['metadesc'] = "";            
            $data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['user_role'] = $session_array['user_role'];

            helper('assets');
            $data['emp'] = model('Executive_model')->getempdata();
            echo view($this->layout, $data);
            echo view('list/Executive');
            echo view('templates/footer', $data);
        } else {
            redirect('/login');
        }
    }

    public function view($page,$id=null) {
        if (session()->userdata('logged_in')) {
            switch ($page) {
                case 'add':
                    $this->add_employee_data();
                    break;
                case 'edit':
                    break;
                case 'details':
                    $data['metakeys'] = "";
                    $data['metadesc'] = "";
                    $data['stylesheet'] = $this->get_stylesheets();
                    $data['stylesheet'] = array_merge($data['stylesheet'], array('details_emp','red','popup-style'));
                    $data['javascripts'] = $this->get_javascripts();
                    $data['javascripts'] = array_merge($data['javascripts'], array('emp-details-main','jquery-3.2.1.min'));
                    $data['module'] = '../../';
                    $data['emp_item'] = model('Executive_model')->getempdata($id);
                    $data['emp_demo'] = model('Executive_model')->get_emp_demo($id);
                    $data['emp_health'] = model('Executive_model')->get_emp_healthdetails($id);
                    $data['emp_edu'] = model('Executive_model')->get_emp_edu($id);
                    $data['emp_exp'] = model('Executive_model')->get_emp_exp($id);
                    $data['emp_bank'] = model('Executive_model')->get_emp_bank($id);
                    $data['emp_family'] = model('Executive_model')->get_emp_family($id);
                    $data['emp_phone'] = model('Executive_model')->get_emp_phone($id);
                    $data['emp_email'] = model('Executive_model')->get_emp_email($id);
                    $data['emp_add'] = model('Executive_model')->get_emp_add($id);
                    $data['title'] = $data['emp_item']["firstname"].' '.$data['emp_item']["lastname"]." 's Profile";
                    echo view($this->layout, $data);
                    echo view('frontend/Executive_details', $data);
                    echo view('templates/footer', $data);
                    break;
                case 'map':
                    $this->map_employee_client();
                    break;
                case '/':
                    redirect('./employee');
                    break;
                default:
                    redirect('./employee');
                    break;
            }
        } else {
            redirect('/login');
        }
    }

    function add_employee_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Executive Registration";
        if (request()->getPost('finish')) {
            $this->employee_add_submit();
        } else {
            $data['geCountries'] =model('Location_model')->getAllCountries();
            model('Location_model')->setCountryID('98');
            $data['geStates'] = model('Location_model')->getStates();
            $page = 'forms/Executive_add';$data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('bootstrap.min','empstyle'));
            $data['javascripts'] = $this->get_javascripts();
            $data['javascripts'] = array_merge($data['javascripts'], array('jquery-2.2.4.min','jquery.bootstrap','material-bootstrap-wizard','jquery.validate.min'));
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/Executive_add', $data);
            echo view('templates/footer', $data);
        }        
    }
    
    function map_employee_client() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Executive Mapping ";
        if (request()->getPost('finish')) {
            $this->employee_client_map();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/emp_client_mapping', $data);
            echo view('templates/footer', $data);
        }        
    }

    function getuploadfilename() {
        $uploadfile ='';
        if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
            $upload_dir = $this->uploaddir();
            $config['upload_path'] = $upload_dir;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'profile_img_' . substr(md5(rand()), 0, 7);
            $config['overwrite'] = false;
            $config['max_size'] = '5120';
            $uploadfile = $config['file_name'];
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('mediafile')) {
                $uploadstatus = 'Error in upload' . $this->upload->display_errors('<p>', '</p>');
            } else {
                $this->upload_data['file'] = $this->upload->data();
                $uploadfile .= $this->upload->data('file_ext');
            }
        } else {
            $uploadstatus = 'Error reading file upload ';
        }
        return $uploadfile;
    }
    function uploaddir(){
        $upload_dir = './assets/profile_pics/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }
            return $upload_dir;
    }

    function employee_add_submit() {
        $rules =['firstname'=> 'trim|required', 'phone'=> 'trim|required'];
        if ($this->validate($rules) !== FALSE) {
            $data['postdata'] = '';
            $data = $this->data_emp_add_post();
            $result = model('Executive_model')->adddata($data);
            $data['success'] = $result;
            $idvar = model('Executive_model')->getlastid('id', 'tbl_emp');
            redirect('Executive/details/' . $idvar);
        } else {
            $data = array('metakeys'=>'','metadesc'=>'','title'=>'Executive Registration','geCountries'=>model('Location_model')->getAllCountries(),'stylesheet'=>$this->get_stylesheets(),'javascripts'=>$this->get_javascripts(),'module'=>'../');
            echo view($this->layout, $data);
            echo view('forms/Executive_add', $data);
            echo view('templates/footer', $data);
        }
    }
    
    function employee_client_map(){
        $rules=['emp'=> 'trim|required','client'=> 'trim|required'];
        if ($this->validate($rules) !== FALSE) {
            $data = $this->data_emp_client_map_post();
            $result = model('Executive_model')->add_emp_client_map_data($data);
            $data['success'] = $result;
            $idvar = model('Executive_model')->getlastid('id', 'tbl_emp');
            redirect('Executive/details/' . $idvar);
        } else {
            redirect('Executive/map');
        }
    }
    function data_emp_client_map_post (){
        $emp = $str_arr = request()->getPost('emp');// explode (",",  request()->getPost('emp'));         
        return array('emp_firstname' => $emp[0],'emp_lastname' => $emp[1],'client' => request()->getPost('client'), 'amount' => request()->getPost('amount'));
    }

    function data_emp_add_post(){
        $uploadfile = $this->getuploadfilename();
        $data = array('firstname' => request()->getPost('firstname'), 'lastname' => request()->getPost('lastname'),  'blood' => request()->getPost('blood'), 'height' => request()->getPost('height'), 'weight' => request()->getPost('weight'),  'religion' => request()->getPost('religion'), 'community' => request()->getPost('community'), 'pobirth' => request()->getPost('pobirth'),   'proofmen' => request()->getPost('proofmen'), 'proofid' => request()->getPost('proofid'), 'dobirth' => request()->getPost('dobirth'),   'gender' => request()->getPost('gender'), 'matstat' => request()->getPost('matstat'), 'dojoin' => request()->getPost('dojoin'),   'doleft' => request()->getPost('doleft'), 'mediafile' => empty($uploadfile) ? 'No Image File' : $uploadfile, 'nosch' => request()->getPost('nosch'), 'eduqua' => request()->getPost('eduqua'), 'yearexp' => request()->getPost('yearexp'), 'pubexp' => request()->getPost('pubexp'), 'nopubexp' => request()->getPost('nopubexp'), 'nopriexp' => request()->getPost('nopriexp'), 'cerver' => request()->getPost('cerver'), 'lang' => request()->getPost('lang'), 'accname' => request()->getPost('accname'), 'accno' => request()->getPost('accno'), 'bankname' => request()->getPost('bankname'), 'branchname' => request()->getPost('branchname'), 'ifsc' => request()->getPost('ifsc'), 'phone' => request()->getPost('phone'), 'email' => request()->getPost('email'), 'address' => request()->getPost('address'), 'city' => request()->getPost('city'), 'pincode' => request()->getPost('pincode'));

            $number = empty(request()->getPost('nosch')) ? 0 : request()->getPost('nosch');   //here 5 is number of column in the HTML table 
            for ($i = 1; $i <= $number; $i++) {
                $data = array_merge($data, array('rel_name' .
                    $i => filter_input(INPUT_POST, "first" . $i), 
                    'relationship' . $i => filter_input(INPUT_POST,"second" . $i), 
                    'rel_age' . $i => filter_input(INPUT_POST,"third" . $i), 
                    'rel_occ' . $i => filter_input(INPUT_POST,"forth" . $i), 
                    'dob' . $i => filter_input(INPUT_POST,"fifth" . $i)));
            }
            
            return $data;
    }

}

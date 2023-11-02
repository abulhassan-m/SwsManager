<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Muhammad Ansari
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use App\Libraries\MenuLibrary;

class Employee extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome');
    protected $javascripts = array('responsive', 'empaddscript', 'customloclist');

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        $emp = model('Employee_model');
        $loc = model('Location_model');
        $session_array = session('logged_in');
        if (session('logged_in')) {
            $data['title'] = "Employee List";
            $data['metakeys'] = "";
            $data['metadesc'] = "";            
            $data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['user_role'] = $session_array['user_role'];
            
            $data['geCountries'] = $loc->getAllCountries();
            $loc->setCountryID('98');
            $data['geStates'] = $loc->getStates();
            $data['menulibrary'] = new MenuLibrary();
            helper('assets');
            $data['emp'] = $emp->getempdata();
            echo view($this->layout, $data);
            echo view('list/Employee');
            echo view('templates/footer', $data);
        } else {
            header('Location: login');
            exit();
        }
    }

    public function view($page,$id=null) {        
        $emp = model('Employee_model');
        $session_array = session('logged_in');
        $data['user_role'] = $session_array['user_role'];
        if (session('logged_in')) {
            switch ($page) {
                case 'add':
                    $this->add_employee_data();
                    break;
                case 'edit':
                    break;
                case 'details':
                    $data['metakeys'] = "";
                    $data['metadesc'] = "";
                    $data['title'] = "Employee Registration";
                    $data['stylesheet'] = $this->get_stylesheets();
                    $data['stylesheet'] = array_merge($data['stylesheet'], array('details_emp','red'));
                    $data['javascripts'] = $this->get_javascripts();
                    $data['javascripts'] = array_merge($data['javascripts'], array('emp-details-main'));
                    $data['module'] = '../../';
                    $data['emp_item'] = $emp->getempdata($id);
                    $data['emp_demo'] = $emp->get_emp_demo($id);
                    $data['emp_health'] = $emp->get_emp_healthdetails($id);
                    $data['emp_edu'] = $emp->get_emp_edu($id);
                    $data['emp_exp'] = $emp->get_emp_exp($id);
                    $data['emp_bank'] = $emp->get_emp_bank($id);
                    $data['emp_family'] = $emp->get_emp_family($id);
                    $data['emp_phone'] = $emp->get_emp_phone($id);
                    $data['emp_email'] = $emp->get_emp_email($id);
                    $data['emp_add'] = $emp->get_emp_add($id);
                    echo view($this->layout, $data);
                    echo view('frontend/Employee_details', $data);
                    echo view('templates/footer', $data);
                    break;
                case 'map':
                    $this->map_employee_client();
                    break;
                case '/':
                    redirect('employee');
                    break;
                default:
                    header('Location: employee');
                    exit();
            }
        } else {
            header('Location: login');
            exit();
        }
    }

    function add_employee_data() {
        $loc = model('Location_model');
        $session_array = session('logged_in');
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['status'] = "";
        $data['title'] = "Employee Registration";
        $data['user_role'] = $session_array['user_role'];
        if (request()->getPost('finish')) {
            $this->employee_add_submit();
        } else {
            $data['geCountries'] = $loc->getAllCountries();
            $loc->setCountryID('98');
            $data['geStates'] = $loc->getStates();
            $page = 'forms/Employee_add';$data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
            $data['menulibrary'] = new MenuLibrary();
        $data['javascripts'] = $this->get_javascripts();
        $data['module'] = '../';
        echo view($this->layout, $data);
        //echo view('forms/Employee_add', $data);
        echo view('entries/emp_new_entry', $data);
        echo view('templates/footer', $data);
        }        
    }
    
    function map_employee_client() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Employee Mapping ";
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
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];
        
        if ($this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

           // return view('list/employee', $data);
        
        $img = request()->getFile('userfile');

        /*if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
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
        return $uploadfile;*/
        
        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            //return view('upload_success', $data);
            return $data;
        }
    }
        $data = ['errors' => 'The file has already been moved.'];

        return $data;
    }
    function uploaddir(){
        $upload_dir = './assets/profile_pics/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }
            return $upload_dir;
    }

    function employee_add_submit() {
        $emp = model('Employee_model');
        $loc = model('Location_model');
        $rules = [
            'firstname' => 'required',
            'phone'  => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['postdata'] = '';
            $data = $this->data_emp_add_post();
            $result = $emp->adddata($data);
            $data['success'] = $result;
            $idvar = $emp->getlastid('id', 'tbl_emp');
            redirect('Employee/details/' . $idvar);
        } else {
            $data = array('metakeys'=>'','metadesc'=>'','title'=>'Employee Registration','geCountries'=>$loc->getAllCountries(),'stylesheet'=>$this->get_stylesheets(),'javascripts'=>$this->get_javascripts(),'module'=>'../');
            echo view($this->layout, $data);
            echo view('forms/Employee_add', $data);
            echo view('templates/footer', $data);
        }
    }
    
    function employee_client_map(){
        $emp = model('Employee_model');
        $rules = [
            'emp' => 'required',
            'client'  => 'required'
        ];

        if (!$this->validate($rules)) {
            $data = $this->data_emp_client_map_post();
            $result = $emp->add_emp_client_map_data($data);
            $data['success'] = $result;
            $idvar = $emp->getlastid('id', 'tbl_emp');
            redirect('Employee/details/' . $idvar);
        } else {
            redirect('Employee/map');
        }
    }
    function data_emp_client_map_post (){
        $emp = request()->getPost('emp');
       // $emp = $str_arr = explode (",",  $emp);         
        return array('emp_firstname' => $emp[0],'emp_lastname' => $emp[1],'client' => request()->getPost('client'), 'amount' => request()->getPost('amount'));
    }

    function data_emp_add_post(){
        $uploadfile = $this->getuploadfilename();
        $data = array('firstname' => request()->getPost('firstname'), 'lastname' => request()->getPost('lastname'), 'blood' => request()->getPost('blood'), 'height' => request()->getPost('height'), 'weight' => request()->getPost('weight'),  'religion' => request()->getPost('religion'), 'community' => request()->getPost('community'), 'pobirth' => request()->getPost('pobirth'),   'proofmen' => request()->getPost('proofmen'), 'proofid' => request()->getPost('proofid'), 'dobirth' => request()->getPost('dobirth'), 'gender' => request()->getPost('gender'), 'matstat' => request()->getPost('matstat'), 'dojoin' => request()->getPost('dojoin'),   'doleft' => request()->getPost('doleft'), 'mediafile' => empty($uploadfile) ? 'No Image File' : $uploadfile, 'nosch' => request()->getPost('nosch'), 'eduqua' => request()->getPost('eduqua'), 'yearexp' => request()->getPost('yearexp'), 'pubexp' => request()->getPost('pubexp'), 'nopubexp' => request()->getPost('nopubexp'), 'nopriexp' => request()->getPost('nopriexp'), 'cerver' => request()->getPost('cerver'), 'lang' => request()->getPost('lang'), 'accname' => request()->getPost('accname'), 'accno' => request()->getPost('accno'), 'bankname' => request()->getPost('bankname'), 'branchname' => request()->getPost('branchname'), 'ifsc' => request()->getPost('ifsc'), 'phone' => request()->getPost('phone'), 'email' => request()->getPost('email'), 'address' => request()->getPost('address'), 'city' => request()->getPost('city'), 'pincode' => request()->getPost('pincode'));

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

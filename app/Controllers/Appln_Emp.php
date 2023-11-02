<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Files\File;

class Appln_Emp extends BaseController {

    function __construct() {
        model('emp_model');
        helper(array('form', 'url'));

        //$this->load->library('upload');
    }

    public function index() {
        $data['title'] = ' ';
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
        $uploadfile = '';
        $uploadstatus = '';

        if (request()->getPost('finish')) {
            $rules =['firstname'=>'required'];
           /* $this->form_validation->set_rules('firstname', 'Full Name', 'trim|required');
              $this->form_validation->set_rules('password', 'Password', 'trim|required');
              $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
              $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
              $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
              $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
              $this->form_validation->set_rules('address', 'Contact Address', 'trim|required'); */

            if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
                $upload_dir = './profile_pics/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }
                $upload_path = $upload_dir;
                $file_name = 'profile_img_' . substr(md5(rand()), 0, 7);
                $config['overwrite'] = false;

                //conversion
                $this->validate([
                    'mediafile' => [
                        'uploaded[mediafile]',
                        'max_size[mediafile,5120]',
                        'mime_in[mediafile,image/png,image/jpg,image/gif,image/jpeg]',
                        'ext_in[mediafile,png,jpg,gif,jpeg]',
                        'max_dims[mediafile,1024,768]',
                    ],
                ]);

                $file = $this->request->getFile('mediafile');
                if (! $path = $file->store($upload_path, $file_name)) {
                    $uploadstatus = 'Error in upload' . validation_errors('<p>', '</p>');
                    return view('upload_form', ['error' => 'upload failed']);
                } 
                $data = ['upload_file_path' => $path];
            } else {
                // $this->form_validation->set_message('_profile_upload', "No file selected");
                $uploadstatus = 'Error reading file upload ';
            }

            if ($this->validate($rules) !== FALSE) {
                $data['postdata'] = '';
                $data = array('firstname' => request()->getPost('firstname'), 'lastname' => request()->getPost('lastname'),                    
                    'blood' => request()->getPost('blood'), 'height' => request()->getPost('height'), 'weight' => request()->getPost('weight'), 
                    'religion' => request()->getPost('religion'), 'community' => request()->getPost('community'), 'pobirth' => request()->getPost('pobirth'), 
                    'proofmen' => request()->getPost('proofmen'), 'proofid' => request()->getPost('proofid'), 'dobirth' => request()->getPost('dobirth'), 
                    'gender' => request()->getPost('gender'), 'matstat' => request()->getPost('matstat'), 'dojoin' => request()->getPost('dojoin'), 
                    'doleft' => request()->getPost('doleft'), 'mediafile' => $uploadfile, 'nosch' => request()->getPost('nosch'),'eduqua' => request()->getPost('eduqua'),
                    'yearexp' => request()->getPost('yearexp'), 'pubexp' => request()->getPost('pubexp'), 'nopubexp' => request()->getPost('nopubexp'),
                    'nopriexp' => request()->getPost('nopriexp'), 'cerver' => request()->getPost('cerver'), 'lang' => request()->getPost('lang'), 
                    'accname' => request()->getPost('accname'), 'accno' => request()->getPost('accno'), 'bankname' => request()->getPost('bankname'), 
                    'branchname' => request()->getPost('branchname'), 'ifsc' => request()->getPost('ifsc'), 'phone' => request()->getPost('phone'), 
                    'email' => request()->getPost('email'), 'address' => request()->getPost('address'),'city' => request()->getPost('city'), 'pincode' => request()->getPost('pincode'));

                $number = request()->getPost('nosch');   //here 5 is number of column in the HTML table
                for ($i = 1; $i <= $number; $i++) {
                    $index1 = "first" . $i;
                    $first[$i] = $_POST[$index1];
                    $index2 = "second" . $i;
                    $second[$i] = $_POST[$index2];
                    $index3 = "third" . $i;
                    $third[$i] = $_POST[$index3];
                    $index4 = "forth" . $i;
                    $forth[$i] = $_POST[$index4];
                    $index5 = "fifth" . $i;
                    $fifth[$i] = $_POST[$index5];
                    $data = array_merge($data, array('rel_name' . $i => $first[$i], 'relationship' . $i => $second[$i], 'rel_age' . $i => $third[$i], 'rel_occ' . $i => $forth[$i], 'dob' . $i => $fifth[$i]));
                }

                
                $appl_emp_model= model('appl_emp_model');
                $result = $appl_emp_model->insert_applnt($data);
                $data['success'] = $result;
                $idvar = $appl_emp_model->getlastid('emp_id', 'tbl_emp');
                $data['emp_item'] = model('emp_model')->get_emp($idvar);
                $data['emp_demo'] = model('emp_model')->get_emp_demo($idvar);
                $data['emp_family'] = model('emp_model')->get_emp_family($idvar);
                $data['emp_phone'] = model('emp_model')->get_emp_phone($idvar);
                $data['emp_email'] = model('emp_model')->get_emp_email($idvar);
                $data['emp_add'] = model('emp_model')->get_emp_add($idvar);
                echo view('frontend/emp-view-detail', $data);
            } else {
                echo view('entries/emp_new_entry');
            }
        } else {
            $data['status'] = 'No post Data';
            $data['page'] = 'country-list';
            $data['title'] = 'country List | TechArise';
            $data['geCountries'] = model('appl_emp_model')->getAllCountries();
            echo view('entries/emp_new_entry', $data);
        }
        echo view('templates/footer', $data);
    }

    // get state names
    public function getstates() {
        $json = array();
        model('appl_emp_model')->setCountryID(request()->getPost('countryID'));
        $json = model('appl_emp_model')->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // get city names
    function getcities() {
        $json = array();
        model('appl_emp_model')->setStateID(request()->getPost('stateID'));
        $json = model('appl_emp_model')->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

}

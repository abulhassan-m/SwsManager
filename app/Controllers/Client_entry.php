<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

class Client_entry extends BaseController {

    /*function __construct() {
        parent::__construct();
        $this->load->model('unit_model');
        $this->load->model('appl_emp_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->library('upload');
    }*/

    public function index() {
        $data['title'] = ' ';
        $data['lod_css'] = '';
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
            $rules=['cname'=> 'trim|required'];
            /*  $this->form_validation->set_rules('password', 'Password', 'trim|required');
              $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
              $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
              $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
              $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
              $this->form_validation->set_rules('address', 'Contact Address', 'trim|required'); */

            if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
                $upload_dir = './clients_logos/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }
                $config['upload_path'] = $upload_dir;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = 'clients_logo_' . substr(md5(rand()), 0, 7);
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
//                $this->form_validation->set_message('_profile_upload', "No file selected");
                $uploadstatus = 'Error reading file upload ';
            }

            if ($this->validate($rules) !== FALSE) {
                $data['postdata'] = '';
                $data = array('cname' => request()->getPost('cname'), 'gst' => request()->getPost('gst'), 'mediafile' => $uploadfile,                   
                    'pan' => request()->getPost('pan'), 'lsp' => request()->getPost('lsp'),'clct' => request()->getPost('clct'),'cphone' => request()->getPost('cphone'), 'cemail' => request()->getPost('cemail'), 
                    'cwww' => request()->getPost('cwww'), 'caddress' => request()->getPost('caddress'), 'ccity' => request()->getPost('ccity'), 
                    'bpsd' => request()->getPost('bpsd'), 'dd' => request()->getPost('dd'), 'baddress' => request()->getPost('baddress'), 
                    'bcity' => request()->getPost('bcity'), 'bpincode' => request()->getPost('bpincode'),
                    'caccname' => request()->getPost('caccname'), 'caccno' => request()->getPost('caccno'), 'cbankname' => request()->getPost('cbankname'), 
                    'cbranchname' => request()->getPost('cbranchname'), 'cifsc' => request()->getPost('cifsc'), 'daddress' => request()->getPost('daddress'),
                    'dcity' => request()->getPost('dcity'), 'dpincode' => request()->getPost('dpincode'));

                $lspnumber = request()->getPost('lsp');   //here 5 is number of column in the HTML table
                for ($i = 1; $i <= $lspnumber; $i++) {
                    $lspindex1 = "lsp1" . $i;
                    $lspfirst[$i] = $_POST[$lspindex1];
                    $lspindex2 = "lsp2" . $i;
                    $lspsecond[$i] = $_POST[$lspindex2];
                    $lspindex3 = "lsp3" . $i;
                    $lspthird[$i] = $_POST[$lspindex3];
                    $lspindex4 = "lsp4" . $i;
                    $lspforth[$i] = $_POST[$lspindex4];
                    $lspindex5 = "lsp5" . $i;
                    $lspfifth[$i] = $_POST[$lspindex5];
                    $data = array_merge($data, array('particulars' . $i => $lspfirst[$i], 'nops' . $i => $lspsecond[$i], 'whrs' . $i => $lspthird[$i], 'rate' . $i => $lspforth[$i], 'salary' . $i => $lspfifth[$i]));
                }
                
                $clctnumber = request()->getPost('clct');   //here 5 is number of column in the HTML table
                for ($i = 1; $i <= $lspnumber; $i++) {
                    $clctindex1 = "clct1" . $i;
                    $clctfirst[$i] = $_POST[$clctindex1];
                    $clctindex2 = "clct2" . $i;
                    $clctsecond[$i] = $_POST[$clctindex2];
                    $clctindex3 = "clct3" . $i;
                    $clctthird[$i] = $_POST[$clctindex3];
                    $clctindex4 = "clct4" . $i;
                    $clctforth[$i] = $_POST[$clctindex4];   
                    $data = array_merge($data, array('cpname' . $i => $clctfirst[$i], 'cpndesign' . $i => $clctsecond[$i], 'cpnphone' . $i => $clctthird[$i], 'cpnemail' . $i => $clctforth[$i]));
                }


                $result = model('unit_model')->insert_client($data);
                $data['success'] = $result;
                $idvar = model('unit_model')->getlastid('id', 'tbl_client');
                $data['client_item'] = model('unit_model')->get_client($idvar);
              //  $data['emp_demo'] = model('unit_model')->get_emp_demo($idvar);
                $data['client_lsp'] = model('unit_model')->get_client_serviceprovided($idvar);
                $data['client_clct'] = model('unit_model')->get_client_contactpersonlist($idvar);
                $data['client_bank'] = model('unit_model')->get_client_bank($idvar);
                $data['client_demo'] = model('unit_model')->get_client_billinfo($idvar);
                $data['client_depl'] = model('unit_model')->get_client_deployinfo($idvar);
              //  $data['emp_email'] = model('unit_model')->get_emp_email($idvar);
              //  $data['emp_add'] = model('unit_model')->get_emp_add($idvar);
               echo view('frontend/client-view-detail', $data);
            } else {
               echo view('entries/unit_new_entry');
            }
        } else {
            $data['page'] = 'country-list';
            $data['title'] = 'country List | TechArise';
            $data['geCountries'] = model('appl_emp_model')->getAllCountries();
           echo view('entries/unit_new_entry', $data);
        }
//       echo view('templates/footer', $data);
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

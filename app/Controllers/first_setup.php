<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\appl_emp_model;
use App\Models\emp_model;
helper(array('form', 'url'));

class first_setup extends Controller {  
    

    public function index() {
       $data['title'] = ' ';
        $data['lod_css'] = '
            
       
        <!-- Nav CSS -->
        <link href="'.base_url().'css/custom.css" rel="stylesheet">
        ';
        $data['lod_js'] = '<!-- jQuery --> <script src="'.base_url().'js/jquery.min.js"></script>
                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="'.base_url().'js/metisMenu.min.js"></script>
                            <script src="'.base_url().'js/custom.js"></script>
                            <script src="'.base_url().'js/customloclist.js"></script>
                            <!-- Graph JavaScript -->
                            <script src="'.base_url().'js/d3.v3.js"></script>
                            <script src="'.base_url().'js/rickshaw.js"></script>
        
        ';
        echo view('templates/header', $data);
       $uploadfile= '';
              $uploadstatus= '';

              if ($this->request->getMethod() === 'finish') {
                //include helper form
                helper(['form']);

                
                //set rules validation form
                $rules = [
                    'firstname'          => 'required|min_length[3]|max_length[100]'
                ];
           
           if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
                $upload_dir = './profile_pics/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }
                $config['upload_path'] = $upload_dir;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = 'profile_img_' . substr(md5(rand()), 0, 7);
                $config['overwrite'] = false;
                $config['max_size'] = '5120';
                $uploadfile =$config['file_name'];

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('mediafile')) {
                    $uploadstatus = 'Error in upload'.$this->upload->display_errors('<p>', '</p>');
                } else {
                    $this->upload_data['file'] = $this->upload->data(); 
                    $uploadfile .=$this->upload->data('file_ext');
                }
            } else {
//                $this->form_validation->set_message('_profile_upload', "No file selected");
                    $uploadstatus = 'Error reading file upload ';
            }

            if ($this->validate($rules)) {
                $data['postdata'] = '';
                $data = array('firstname' => $this->input->post('firstname'), 'lastname' => $this->input->post('lastname') ,
                    'blood'=> $this->input->post('blood'),'height'=> $this->input->post('height'), 'weight' => $this->input->post('weight'), 'religion' => $this->input->post('religion'),
                    'community' =>  $this->input->post('community'), 'pobirth' =>  $this->input->post('pobirth'), 'proofmen'=> $this->input->post('proofmen'),
                    'proofid'=>  $this->input->post('proofid'), 'dobirth'=> $this->input->post('dobirth'), 'gender'=>  $this->input->post('gender'),
                    'matstat' =>  $this->input->post('matstat'),'dojoin'=> $this->input->post('dojoin'),'doleft'=> $this->input->post('doleft'),'mediafile'=>$uploadfile,
                    'fathername'=> $this->input->post('fathername'),'mothername'=> $this->input->post('mothername'),'spousename'=> $this->input->post('spousename'),
                    'fatherocc'=> $this->input->post('fatherocc'),'nosch'=> $this->input->post('nosch'),'nominee'=> $this->input->post('nominee'),'eduqua'=> $this->input->post('eduqua'),
                    'yearexp'=> $this->input->post('yearexp'),'pubexp'=> $this->input->post('pubexp'),'nopubexp'=> $this->input->post('nopubexp'),
                    'nopriexp'=> $this->input->post('nopriexp'),'cerver'=> $this->input->post('cerver'),'lang'=> $this->input->post('lang'),'accname'=> $this->input->post('accname'),
                    'accno'=> $this->input->post('accno'),'bankname'=> $this->input->post('bankname'),'branchname'=> $this->input->post('branchname'),
                    'ifsc'=> $this->input->post('ifsc'),'phone'=> $this->input->post('phone'),'email'=> $this->input->post('email'),'address'=> $this->input->post('address'),
                    'country'=> $this->input->post('country'),'state'=> $this->input->post('state'),'city'=> $this->input->post('city'),'pincode'=> $this->input->post('pincode'));
                
                $number=$this->input->post('nosch');   //here 3 is number of column in the HTML table
                for($i=1;$i<=$number;$i++)
                {
                        $index1="first".$i;
                        $first[$i]=$_POST[$index1];
                        $index2="second".$i;
                        $second[$i]=$_POST[$index2];
                        $index3="third".$i;
                        $third[$i]=$_POST[$index3];
                         $data=array_merge($data,array('rel_name'.$i=>$first[$i],'relationship'.$i=>$second[$i] ,'rel_age'.$i=>$third[$i],'rel_occ'.$i=>$forth[$i],'dob'.$i=>$fifth[$i]));
                }	
                
                
                $result = $this->appl_emp_model->insert_applnt($data);
                $data['success'] = $result;
                $idvar = $this->appl_emp_model->getlastid('emp_id','tbl_emp');
                $data['emp_item'] = $this->emp_model->get_emp($idvar);
                $data['emp_demo'] = $this->emp_model->get_emp_demo($idvar);
                $data['emp_family'] = $this->emp_model->get_emp_family($idvar);
                $data['emp_phone'] = $this->emp_model->get_emp_phone($idvar);
                $data['emp_email'] = $this->emp_model->get_emp_email($idvar);
                $data['emp_add'] = $this->emp_model->get_emp_add($idvar);
                echo view('frontend/emp-view-detail', $data);
            } else {
                echo view('entries/unit_new_entry');
            }
        } else {
            
            
        $data['page'] = 'country-list';
        $data['title'] = 'country List | TechArise';
        $data['geCountries'] = $this->appl_emp_model->getAllCountries(); 
            
            $this->load->view('entries/unit_new_entry', $data);
        }
       $this->load->view('templates/footer',$data);
    }
    
 
 
    // get state names
    public function getstates() {
        $json = array();
        $this->appl_emp_model->setCountryID($this->input->post('countryID')); 
        $json = $this->appl_emp_model->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }
 
    // get city names
    function getcities() {
        $json = array();
        appl_emp_model->setStateID($this->input->post('stateID')); 
        $json = $this->appl_emp_model->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

}


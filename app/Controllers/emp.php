<?php

class emp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('emp_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = "Employee List";
        $data['lod_css'] = '
            
       
        <!-- Nav CSS -->
        <link href="'.base_url().'css/custom.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Abel&amp;Open+Sans" rel="stylesheet">
<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">       
<link rel="stylesheet" type="text/css" href="'. base_url().'css/profile list/style.css">
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
        $data['emp'] = $this->emp_model->get_emp();
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/emplist', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL) {
        $data['emp_item'] = $this->emp_model->get_emp($id);
        
    }

}
<?php

class empdetails extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('emp_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = "Employee Details";
        $data['emp'] = $this->emp_model->get_emp();
        $data['lod_css'] = '';
        $data['lod_js'] = '<!-- jQuery --> <script src="' . base_url() . 'js/jquery.min.js"></script>
                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="' . base_url() . 'js/metisMenu.min.js"></script>
                            <script src="' . base_url() . 'js/custom.js"></script>
                            <script src="' . base_url() . 'js/customloclist.js"></script>
                            <!-- Graph JavaScript -->
                            <script src="' . base_url() . 'js/d3.v3.js"></script>
                            <script src="' . base_url() . 'js/rickshaw.js"></script>';
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/emp-view-detail', $data);
        $this->load->view('templates/footer',$data);
    }

    public function view($id = NULL) {
        
        $this->load->helper('url');
        $data['title'] = "Employee Details";
        $data['emp_item'] = $this->emp_model->get_emp($id);
                $data['emp_demo'] = $this->emp_model->get_emp_demo($id);                
                $data['emp_health'] = $this->emp_model->get_emp_healthdetails($id);
                $data['emp_edu'] = $this->emp_model->get_emp_edu($id);
                $data['emp_exp'] = $this->emp_model->get_emp_exp($id);
                $data['emp_bank'] = $this->emp_model->get_emp_bank($id);
                $data['emp_family'] = $this->emp_model->get_emp_family($id);
                $data['emp_phone'] = $this->emp_model->get_emp_phone($id);
                $data['emp_email'] = $this->emp_model->get_emp_email($id);
                $data['emp_add'] = $this->emp_model->get_emp_add($id);
        $data['lod_css'] = '<!-- Nav CSS --><link href="' . base_url() . 'css/custom.css" rel="stylesheet">';
        $data['lod_js'] = '<!-- jQuery --> <script src="' . base_url() . 'js/jquery.min.js"></script>
                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="' . base_url() . 'js/metisMenu.min.js"></script>
                            <script src="' . base_url() . 'js/custom.js"></script>
                            <script src="' . base_url() . 'js/customloclist.js"></script>
                            <!-- Graph JavaScript -->
                            <script src="' . base_url() . 'js/d3.v3.js"></script>
                            <script src="' . base_url() . 'js/rickshaw.js"></script>';
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/emp-view-detail', $data);
        $this->load->view('templates/footer');
    }

}
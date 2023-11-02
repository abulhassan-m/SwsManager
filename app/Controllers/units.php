<?php

class units extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('unit_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = "Client List";$data['lod_css'] = '
            
       
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
        $data['unit'] = $this->unit_model->get_client();
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/unitslist', $data);
        $this->load->view('templates/footer',$data);
    }

    public function view($id = NULL) {
        $data['unit_item'] = $this->unit_model->get_client($id);
    }

}
<?php

class unitdetails extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('unit_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = "Client Details";
        $data['unit'] = $this->unit_model->get_client();
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
        $this->load->view('frontend/client-view-detail', $data);
        $this->load->view('templates/footer',$data);
    }

    public function view($id = NULL) {
        
        $this->load->helper('url');
        $data['title'] = "Client Details";
                $data['client_item'] = $this->unit_model->get_client($id);
                $data['client_lsp'] = $this->unit_model->get_client_serviceprovided($id);
                $data['client_clct'] = $this->unit_model->get_client_contactpersonlist($id);
                $data['client_bank'] = $this->unit_model->get_client_bank($id);
                $data['client_demo'] = $this->unit_model->get_client_billinfo($id);
                $data['client_depl'] = $this->unit_model->get_client_deployinfo($id);
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
        $this->load->view('frontend/client-view-detail', $data);
        $this->load->view('templates/footer');
    }

}
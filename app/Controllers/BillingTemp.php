<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;

class BillingTemp extends BaseController {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        helper('url');
        $data['title'] ="Billing Template"; 
        $data['lod_css'] = '<!-- Nav CSS --> <link href="'.base_url().'css/custom.css" rel="stylesheet">';
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
        echo view('actions/invoice');
        echo view('templates/footer', $data);
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author Muhammad Ansari
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Location extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Location_model'=>'loc'));
    }
     // get state names
    public function getstates() {
        $this->loc->setCountryID($this->input->post('postID'));
        $json = $this->loc->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // get city names
    function getcities() {
        $this->loc->setStateID($this->input->post('postID'));
        $json = $this->loc->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}

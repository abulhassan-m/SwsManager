<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaction
 *
 * @author Muhammad Ansari
 */
namespace App\Controllers;
use CodeIgniter\Controller;

class Bill extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome', 'dashboard', 'empstyle', 'bootstrap');
    protected $javascripts = array('responsive');

    public function __construct() {
        //parent::__construct();
        //$this->load->model('Bill_model', 'bill');
        helper('url_helper');
        setlocale(LC_MONETARY, 'en_IN');
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        $session_array = session('logged_in');
        if ($session_array) {
            helper('assets');
            $data = array('user_role'=>$session_array['user_role'],'title' => 'Bills Register', 'metakeys' => '', 'metadesc' => '', 'stylesheet' => $this->get_stylesheets(), 
                'javascripts' => $this->get_javascripts(), 'module' => '', 'getdetails' => model('Bill_model')->billdetails());
            echo view($this->layout, $data);
            echo view('list/bill', $data);
            echo view('templates/footer', $data);
        } else {
            header('Location: login');
            exit();
        }
    }

    public function view($page) {
        if (session('logged_in')) {
            switch ($page) {
                case 'receiptadd':
                    $this->add_receipt_data();
                    break;
                case 'voucheradd':
                    $this->add_voucher_data();
                    break;
                case 'suspenseadd':
                    $this->add_suspense_data();
                    break;
                case 'advsaladd':
                    $this->add_advsal_data();
                    break;
                case '/':
                    break;
                default:
                    break;
            }
        } else {
            redirect('login');
        }
    }

    function generate() {
        if (request()->getPost('finish')) {
            $this->bill_generate_submit();
        } else {
            $data = array('metakeys' => '', 'metadesc' => '', 'title' => 'Bill Generation', 'stylesheet' => $this->get_stylesheets(), 'javascripts' => $this->get_javascripts(), 'module' => '../', 'generate_bill' => array());
            echo view($this->layout, $data, FALSE);
            echo view('frontend/invoice', $data);
            echo view('templates/footer', $data, FALSE);
        }
    }

    function bill_generate_submit() {
        $this->form_validation->set_rules('client', 'Name', 'trim|required');
        if ($this->form_validation->run() !== FALSE) {
            $data = request()->getPost('client');
            helper('assets');
            $data = array('title' => 'Attendence Register', 'metakeys' => '', 'metadesc' => '', 'stylesheet' => $this->get_stylesheets(), 'javascripts' => $this->get_javascripts(), 'module' => '../', 'generate_bill' => $this->bill->billgenerate($data));
            echo view($this->layout, $data);
            echo view('frontend/invoice', $data);
            echo view('templates/footer', $data);
        } else {
            session()->set_flashdata('flash_message', 'Error');
            redirect('Bill');
        }
    }

}

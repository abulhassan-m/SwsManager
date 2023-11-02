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

class Reports extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome', 'dashboard','accounts', 'empstyle');
    protected $javascripts = array('responsive');


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
            $data['title'] = "Bills Register";
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['user_role'] = $session_array['user_role'];
            echo view($this->layout, $data);
            echo view('list/reports', $data);
            echo view('templates/footer', $data);
        } else {
            redirect('/login');
        }
    }

    public function view($page) {
        if ($this->session->userdata('logged_in')) {
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
            redirect('/login');
        }
    }

    function add_receipt_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Receipt Entry";
        if ($this->input->post('finish')) {
            $this->receipt_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            $this->load->view($this->layout, $data, FALSE);
            $this->load->view('forms/Receipt_entry', $data);
            $this->load->view('templates/footer', $data, FALSE);
        }
    }

    function receipt_add_submit() {
        $this->form_validation->set_rules('payee', 'Name', 'trim|required');
        if ($this->form_validation->run() !== FALSE) {
            $data = $this->data_receipt_add_post();
            $result = $this->trans->add_receipts($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/receiptadd');
        }
    }

    function data_receipt_add_post() {
        return array('rno' => $this->input->post('rno'), 'code' => $this->input->post('code'), 'date' => $this->input->post('date'), 'payee' => $this->input->post('payee'), 'debit' => $this->input->post('debit'), 'towards' => $this->input->post('towards'), 'mop' => $this->input->post('mop'), 'trdate' => $this->input->post('trdate'), 'transaid' => $this->input->post('transaid'), 'amount' => $this->input->post('amount'), 'receiver' => $this->input->post('receiver'), 'authorize' => $this->input->post('authorize'), 'manage' => $this->input->post('manage'), 'acc' => $this->input->post('acc'));
    }

    function add_voucher_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Voucher Entry";
        if ($this->input->post('finish')) {
            $this->voucher_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            $this->load->view($this->layout, $data, FALSE);
            $this->load->view('forms/Voucher_entry', $data);
            $this->load->view('templates/footer', $data, FALSE);
        }
    }

    function voucher_add_submit() {
        $this->form_validation->set_rules('payee', 'Name', 'trim|required');
        if ($this->form_validation->run() !== FALSE) {
            $data = $this->data_voucher_add_post();
            $result = $this->trans->add_vouchers($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/voucheradd');
        }
    }

    function data_voucher_add_post() {
        return array('vno' => $this->input->post('rno'), 'code' => $this->input->post('code'), 'date' => $this->input->post('date'), 'payee' => $this->input->post('payee'), 'debit' => $this->input->post('debit'), 'towards' => $this->input->post('towards'), 'mop' => $this->input->post('mop'), 'trdate' => $this->input->post('trdate'), 'transaid' => $this->input->post('transaid'), 'amount' => $this->input->post('amount'), 'receiver' => $this->input->post('receiver'), 'authorize' => $this->input->post('authorize'), 'manage' => $this->input->post('manage'), 'acc' => $this->input->post('acc'));
    }

    function add_suspense_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Suspense Entry";
        if ($this->input->post('finish')) {
            $this->suspense_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            $this->load->view($this->layout, $data, FALSE);
            $this->load->view('forms/Suspense_entry', $data);
            $this->load->view('templates/footer', $data, FALSE);
        }
    }

    function suspense_add_submit() {
        $this->form_validation->set_rules('search_box', 'Name', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        if ($this->form_validation->run() !== FALSE) {
            $data = $this->data_suspense_add_post();
            $result = $this->trans->add_suspense($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/suspenseadd');
        }
    }
    function fetch() {
        echo $this->trans->fetch_data($this->uri->segment(3));
    }
    
    function fetchallempdata(){
        echo $this->trans->fetch_allempdata();
    }
    
    function fetchallclientdata(){
        echo $this->trans->fetch_allclientdata();
    }
     
    function data_suspense_add_post() {
        $emp = $str_arr = explode (",",  $this->input->post('search_box'));         
        return array('emp_firstname' => $emp[0],'emp_lastname' => $emp[1], 'amount' => $this->input->post('amount'));
    }

    function add_advsal_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Advance Entry";
        if ($this->input->post('finish')) {
            $this->advsal_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            $this->load->view($this->layout, $data, FALSE);
            $this->load->view('forms/Salary_advance', $data);
            $this->load->view('templates/footer', $data, FALSE);
        }
    }    

    function advsal_add_submit() {
        $this->form_validation->set_rules('emp', 'Name', 'trim|required');
        $this->form_validation->set_rules('client', 'Name', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        if ($this->form_validation->run() !== FALSE) {
            $data = $this->data_advsal_add_post();
            $result = $this->trans->add_emp_advance($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/advsaladd');
        }
    }
    function data_advsal_add_post() {
        $emp = $str_arr = explode (",",  $this->input->post('emp'));         
        return array('date'=>$this->input->post('date'), 'emp_firstname' => $emp[0],'emp_lastname' => $emp[1],'client' => $this->input->post('client'), 'amount' => $this->input->post('amount'),'mop' => $this->input->post('mop'), 'trdate' => $this->input->post('trdate'), 'transaid' => $this->input->post('transaid'), 'amount' => $this->input->post('amount'), 'authorize' => $this->input->post('authorize'), 'manage' => $this->input->post('manage'), 'acc' => $this->input->post('acc'));
    }
    
    function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
}

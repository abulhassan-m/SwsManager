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
class Transaction extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('bootstrap','headerstyle', 'font-awesome', 'accounts', 'empstyle');
    protected $javascripts = array('responsive');

   /* public function __construct() {
        parent::__construct();
        echo model('Transaction_model', 'trans');
        echo helper('url_helper');
        setlocale(LC_MONETARY, 'en_IN');
    }*/

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        if (session('logged_in')) {
            $session_array = session('logged_in');
            $data['user_role'] = $session_array['user_role'];
            helper('assets');
            $data['title'] = "Account Transaction";
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['acc_ob'] = $this->moneyFormatIndia(model('Transaction_model')->acc_open_balance());
            $data['acc_dr'] = $this->moneyFormatIndia(model('Transaction_model')->get_total_receipts());
            $data['acc_dv'] = $this->moneyFormatIndia(model('Transaction_model')->get_total_vouchers());
            $data['acc_cb'] = $this->moneyFormatIndia(model('Transaction_model')->acc_close_balance());
            $data['get_rec'] = model('Transaction_model')->get_receipts();
            $data['get_vou'] = model('Transaction_model')->get_vouchers();
            $data['get_suspense'] = model('Transaction_model')->get_all_suspense();
            $data['get_emp_adv'] = model('Transaction_model')->get_emp_advance();
            echo view($this->layout, $data);
            echo view('list/accounts', $data);
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
            redirect('/login');
        }
    }

    function add_receipt_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Receipt Entry";
        if (request()->getPost('finish')) {
            $this->receipt_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/Receipt_entry', $data);
            echo view('templates/footer', $data);
        }
    }

    function receipt_add_submit() {
        $rules= ['payee' =>'required'];
        if (!$this->validate($rules))  {
            $data = $this->data_receipt_add_post();
            $result = model('Transaction_model')->add_receipts($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/receiptadd');
        }
    }

    function data_receipt_add_post() {
        return array('rno' => request()->getPost('rno'), 'code' => request()->getPost('code'), 'date' => request()->getPost('date'), 'payee' => request()->getPost('payee'), 'debit' => request()->getPost('debit'), 'towards' => request()->getPost('towards'), 'mop' => request()->getPost('mop'), 'trdate' => request()->getPost('trdate'), 'transaid' => request()->getPost('transaid'), 'amount' => request()->getPost('amount'), 'receiver' => request()->getPost('receiver'), 'authorize' => request()->getPost('authorize'), 'manage' => request()->getPost('manage'), 'acc' => request()->getPost('acc'));
    }

    function add_voucher_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Voucher Entry";
        if (request()->getPost('finish')) {
            $this->voucher_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/Voucher_entry', $data);
            echo view('templates/footer', $data);
        }
    }

    function voucher_add_submit() {
        $rules = ['payee' => 'required'];
        if ($this->validate($rules) !== FALSE) {
            $data = $this->data_voucher_add_post();
            $result = model('Transaction_model')->add_vouchers($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/voucheradd');
        }
    }

    function data_voucher_add_post() {
        return array('vno' => request()->getPost('rno'), 'code' => request()->getPost('code'), 'date' => request()->getPost('date'), 'payee' => request()->getPost('payee'), 'debit' => request()->getPost('debit'), 'towards' => request()->getPost('towards'), 'mop' => request()->getPost('mop'), 'trdate' => request()->getPost('trdate'), 'transaid' => request()->getPost('transaid'), 'amount' => request()->getPost('amount'), 'receiver' => request()->getPost('receiver'), 'authorize' => request()->getPost('authorize'), 'manage' => request()->getPost('manage'), 'acc' => request()->getPost('acc'));
    }

    function add_suspense_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Suspense Entry";
        if (request()->getPost('finish')) {
            $this->suspense_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/Suspense_entry', $data);
            echo view('templates/footer', $data);
        }
    }

    function suspense_add_submit() {
        $rule = ['search_box' => 'trim|required', 'amount' => 'required'];
        if ($this->validate($rule)) {
            $data = $this->data_suspense_add_post();
            $result = model('Transaction_model')->add_suspense($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/suspenseadd');
        }
    }
    function fetch() {
        echo model('Transaction_model')->fetch_data(service('uri')->getSegment(3));
    }
    
    function fetchallempdata(){
        echo model('Transaction_model')->fetch_allempdata();
    }
    
    function fetchallclientdata(){
        echo model('Transaction_model')->fetch_allclientdata();
    }
     
    function data_suspense_add_post() {
        $emp = request()->getPost('search_box');         
        return array('emp_firstname' => $emp[0],'emp_lastname' => $emp[1], 'amount' => request()->getPost('amount'));
    }

    function add_advsal_data() {
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Advance Entry";
        if (request()->getPost('finish')) {
            $this->advsal_add_submit();
        } else {
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view('forms/Salary_advance', $data);
            echo view('templates/footer', $data);
        }
    }    

    function advsal_add_submit() {
        $rules=['emp'=>'trim|required','client'=>'trim|required','amount'=>'trim|required'];
        if ($this->validate($rules) !== FALSE) {
            $data = $this->data_advsal_add_post();
            $result = model('Transaction_model')->add_emp_advance($data);
            $data['success'] = $result;
            redirect('transaction');
        } else {
            redirect('transaction/advsaladd');
        }
    }
    function data_advsal_add_post() {
        $emp = request()->getPost('emp');         
        return array('date'=>request()->getPost('date'), 'emp_firstname' => $emp[0],'emp_lastname' => $emp[1],'client' => request()->getPost('client'), 'amount' => request()->getPost('amount'),'mop' => request()->getPost('mop'), 'trdate' => request()->getPost('trdate'), 'transaid' => request()->getPost('transaid'), 'amount' => request()->getPost('amount'), 'authorize' => request()->getPost('authorize'), 'manage' => request()->getPost('manage'), 'acc' => request()->getPost('acc'));
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

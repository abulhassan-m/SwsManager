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

class Utilities extends Controller {

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
            $data['title'] = "Utility";
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['user_role'] = $session_array['user_role'];
            echo view($this->layout, $data);
            echo view('list/utilities', $data);
            echo view('templates/footer', $data);
        } else {
            redirect('login');
        }
    }

    public function view($page) {
        if ($this->session->userdata('logged_in')) {
            switch ($page) {
                case 'receiptadd':
                    break;
                case 'voucheradd':
                    break;
                case 'suspenseadd':
                    break;
                case 'advsaladd':
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

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clients
 *
 * @author Muhammad Ansari
 */
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Clients_model;
use Config\Validation;
use App\Libraries\MenuLibrary;

class Clients extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome', 'clients');
    protected $javascripts = array('responsive','empaddscript','customloclist');
    

   /* public function __construct() {
        parent::__construct();
        $this->load->model(array('Clients_model'=> 'clients', 'Location_model'=>'loc'));
        $this->load->helper('url_helper');
        $this->load->library('upload');
    }*/

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        
        if (session('logged_in')) {
            $data['title'] = "Clients";
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['client'] = model('Clients_model')->get_client();
            helper('assets');
            $data['menulibrary'] = new MenuLibrary();
            $data['geCountries'] = model('Location_model')->getAllCountries();
            $session_array = session('logged_in');
            $data['user_role'] = $session_array['user_role'];
            $data['content'] = view('forms/Client_add', $data);
            echo view($this->layout, $data);
            echo view('list/Clients', $data);
            echo view('templates/footer', $data);
        } else {
            redirect('/login');
        }
    }

    public function view($page,$id=null) {
        $session_array = session('logged_in');
        $data['user_role'] = $session_array['user_role'];
        if (session('logged_in')) {
            switch ($page) {
                case 'add':
                    $this->add_client_data();
                    break;
                case 'edit':
                    break;
                case 'details':
                    $data['metakeys'] = "";
                    $data['metadesc'] = "";
                    $data['title'] = "Client Information";
                    $data['stylesheet'] = $this->get_stylesheets();
                    $data['stylesheet'] = array_merge($data['stylesheet'], array('details_emp'));
                    $data['javascripts'] = $this->get_javascripts();
                    $data['javascripts'] = array_merge($data['javascripts'], array('emp-details-main'));
                    $data['module'] = '../../';
                    $data['client_item'] = model('Clients_model')->get_client($id);
                    $data['client_lsp'] = model('Clients_model')->get_client_serviceprovided($id);
                    $data['client_clct'] = model('Clients_model')->get_client_contactpersonlist($id);
                    $data['client_bank'] = model('Clients_model')->get_client_bank($id);
                    $data['client_demo'] = model('Clients_model')->get_client_billinfo($id);
                    $data['client_depl'] =model('Clients_model')->get_client_deployinfo($id);
                    echo view($this->layout, $data);
                    echo view('frontend/Clients_details', $data);
                    echo view('templates/footer', $data);
                    break;
                case 'terminate':
                    break;
                case '/':
                    redirect('./Clients');
                    break;
                default:
                    redirect('Clients');
                    break;
            }
        } else {
            redirect('/login');
        }
    }
    
    function projects(){
        $session_array = session('logged_in');
        if (session('logged_in')) {
            $data['title'] = "Projects";
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '';
            $data['unit'] =array();
            $data['user_role'] = $session_array['user_role'];
            $data['geCountries'] = model('Location_model')->getAllCountries();
            $data['content'] = view('forms/projects_entry', $data);
            $data['menulibrary'] = new MenuLibrary();
            helper('assets');
            echo view($this->layout, $data);
            echo view('frontend/unitslist');
            echo view('templates/footer', $data);
        } else {
            redirect('/login');
        }
    }
            
    function add_client_data() {
        $session_array = session('logged_in');
        $data['user_role'] = $session_array['user_role'];
        $data['metakeys'] = "";
        $data['metadesc'] = "";
        $data['title'] = "Client Registration";
        if (request()->getPost('finish')) {
            $this->client_add_submit();
        } else {
            $data['geCountries'] = model('Location_model')->getAllCountries();
            $page = 'forms/Client_add';
            $data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
            $data['javascripts'] = $this->get_javascripts();
            $data['module'] = '../';
            echo view($this->layout, $data);
            echo view($page, $data);
            echo view('templates/footer', $data);
        }
    }

    function client_add_submit(){
        $session_array = session('logged_in');
        $data['user_role'] = $session_array['user_role'];
        $rule = ["cname" => 'required', 'cphone' =>'required'];
        if (!$this->validate($rule)) {
            $data['postdata'] = '';
            $data = $this->data_cli_add_post();
            $result = model('Clients_model')->insert_client($data);
            $data['success'] = $result;
            $idvar = model('Clients_model')->getlastid('id', 'tbl_client');
            redirect('Clients/details/' . $idvar);
        } else {
            $data = array('metakeys'=>'','metadesc'=>'','title'=>'Clients Registration','geCountries'=>model('Location_model')->getAllCountries(),'stylesheet'=>$this->get_stylesheets(),'javascripts'=>$this->get_javascripts(),'module'=>'../');
           echo view($this->layout, $data);
           echo view('forms/Client_add', $data);
           echo view('templates/footer', $data);
        }
    }
    function getuploadfilename() {
        $uploadfile ='';
        if ($_FILES['mediafile']['size'] != 0 && !empty($_FILES['mediafile'])) {
            $upload_dir = $this->uploaddir();
            $config['upload_path'] = $upload_dir;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'clients_logo_' . substr(md5(rand()), 0, 7);
            $config['overwrite'] = false;
            $config['max_size'] = '5120';
            $uploadfile = $config['file_name'];
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('mediafile')) {
                $uploadstatus = 'Error in upload' . $this->upload->display_errors('<p>', '</p>');
            } else {
                $this->upload_data['file'] = $this->upload->data();
                $uploadfile .= $this->upload->data('file_ext');
            }
        } else {
            $uploadstatus = 'Error reading file upload ';
        }
        return $uploadfile;
    }
    function uploaddir(){
        $upload_dir = './assets/clients_logos/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }
            return $upload_dir;
    }
    function data_cli_add_post(){
        $uploadfile = $this->getuploadfilename();
        $data = array('cname' => request()->getPost('cname'), 'gst' => request()->getPost('gst'), 'mediafile' => $uploadfile,                   
                    'pan' => request()->getPost('pan'), 'lsp' => request()->getPost('lsp'),'clct' => request()->getPost('clct'),'cphone' => request()->getPost('cphone'), 'cemail' => request()->getPost('cemail'), 
                    'cwww' => request()->getPost('cwww'), 'caddress' => request()->getPost('caddress'), 'ccity' => request()->getPost('ccity'), 
                    'bpsd' => request()->getPost('bpsd'), 'dd' => request()->getPost('dd'), 'baddress' => request()->getPost('baddress'), 
                    'bcity' => request()->getPost('bcity'), 'bpincode' => request()->getPost('bpincode'),
                    'caccname' => request()->getPost('caccname'), 'caccno' => request()->getPost('caccno'), 'cbankname' => request()->getPost('cbankname'), 
                    'cbranchname' => request()->getPost('cbranchname'), 'cifsc' => request()->getPost('cifsc'), 'daddress' => request()->getPost('daddress'),
                    'dcity' => request()->getPost('dcity'), 'dpincode' => request()->getPost('dpincode'));


            $lspnumber = empty(request()->getPost('lsp')) ? 0 : request()->getPost('lsp');   //here 5 is number of column in the HTML table 
            for ($i = 1; $i <= $lspnumber; $i++) {
                $data = array_merge($data, array('particulars' .
                    $i => filter_input(INPUT_POST, "lsp1" . $i), 
                    'nops' . $i => filter_input(INPUT_POST,"lsp2" . $i), 
                    'whrs' . $i => filter_input(INPUT_POST,"lsp3" . $i), 
                    'rate' . $i => filter_input(INPUT_POST,"lsp4" . $i), 
                    'salary' . $i => filter_input(INPUT_POST,"lsp5" . $i)));
            }
            $clctnumber = empty(request()->getPost('clct')) ? 0 : request()->getPost('clct');   //here 5 is number of column in the HTML table 
            for ($i = 1; $i <= $lspnumber; $i++) {
                $data = array_merge($data, array('cpname' .
                    $i => filter_input(INPUT_POST, "clct1" . $i), 
                    'cpndesign' . $i => filter_input(INPUT_POST,"clct2" . $i), 
                    'cpnphone' . $i => filter_input(INPUT_POST,"clct3" . $i), 
                    'cpnemail' . $i => filter_input(INPUT_POST,"clct4" . $i)));
            }
            
            return $data;
    }

}

<?php



/**
 * Description of Transaction
 *
 * @author Muhammad Ansari
 */
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;


class Attendance extends Controller {

    //put your code here
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome', 'dashboard','accounts', 'empstyle');
    protected $javascripts = array('responsive');

    public function __construct() {
        //parent::__construct();
       // model(['Attendance_model'=> 'attend','Clients_model'=> 'client','Employee_model'=> 'emp']);
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
        if (session('logged_in')) {
            if (request()->getPost('finish')) {
                $this->attendence_add_submit();
            } else if (request()->getPost('populate')) {
                $this->attendence_populate_submit();
            } else {
                $data = array('user_role'=>$session_array['user_role'],'title'=>'Attendence Register','metakeys'=>'','metadesc'=>'','stylesheet'=>$this->get_stylesheets(),'javascripts'=>$this->get_javascripts(),'module'=>'','muster_roll'=>array(),'details'=>array('client'=>'','from_date'=> date('Y-m-d'),'to_date'=> date('Y-m-d')));
                echo view($this->layout, $data);
                echo view('list/attendance', $data);
                echo view('templates/footer', $data);
            }
        } else {
            redirect('/login');
        }
    }

    public function view($page) {
        if (session('logged_in')) {
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
    
    function attendence_add_submit() {
        $rules = ['client'=> 'trim|required','emp'=>'trim|required'];
        if ($this->validate($rules) !== FALSE) {
            $data = $this->data_attendance_add_post();
            $result = model('Attendance_model')->add_attendance($data);
            $data['success'] = $result;
            session()->setFlashdata('flash_message', 'Added'.$result);
            redirect('attendance');
           
        } else {
            session()->setFlashdata('flash_message', 'Error');
            redirect('attendance');
        }
    }
     function attendence_populate_submit() {
        $rules= ['Muster'=> 'trim|required'];
        if ($this->validate($rules) !== FALSE) {
            $post_data = $this->data_attendance_get_post();
             echo helper('assets');
                $data = array('title'=>'Attendence Register','metakeys'=>'','metadesc'=>'','stylesheet'=>$this->get_stylesheets(),'javascripts'=>$this->get_javascripts(),'module'=>'','muster_roll' =>model('Attendance_model')->get_attendance($post_data),'details'=>$post_data);
                echo view($this->layout, $data);
                echo view('list/attendance', $data);
                echo view('templates/footer', $data);
        } else {
            session()->setFlashdata('flash_message', 'Error');
            header('Location: attendance');
            exit;
        }
    }

    function data_attendance_add_post() {
         $emp =  request()->getPost('emp');   
        return array('client' => request()->getPost('client'), 'emp_firstname' => $emp[0],'emp_lastname' => $emp[1], 'date' => request()->getPost('date'), 'shift' => request()->getPost('shift'));
    }
     function data_attendance_get_post() {  
        return array('client' => request()->getPost('Muster'), 'from_date' => request()->getPost('from_date'), 'to_date' => request()->getPost('to_date'));
    }

    function fetch() {
        echo model('Attendance_model')->fetch_data($this->uri->segment(3));
    }
    
    function fetchallempdata(){
        echo model('Attendance_model')->fetch_allempdata();
    }
    
    function fetchallclientdata(){
        echo model('Attendance_model')->fetch_allclientdata();
    }     
}

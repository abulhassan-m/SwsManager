<?php 
/* Comments

 */
namespace App\Controllers;

class Applicant extends BaseController {
    
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle', 'font-awesome');
    protected $javascripts = array('responsive', 'empaddscript', 'customloclist');

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index() {
        if (session('logged_in')) {
            $data['title'] = 'Application Entry ';
            $data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array_merge($data['stylesheet'], array('empstyle'));
            $data['javascripts'] = $this->get_javascripts();
            $session_array = session('logged_in');
            $data['user_role'] = $session_array['user_role'];
            $data['module'] = '';
            $data['lod_css'] = '<!-- Nav CSS --><link href="' . base_url() . 'css/custom.css" rel="stylesheet">';
            $data['lod_js'] = '<!-- jQuery --> <script src="' . base_url() . 'js/jquery.min.js"></script>
                                <!-- Metis Menu Plugin JavaScript -->
                                <script src="' . base_url() . 'js/metisMenu.min.js"></script>
                                <script src="' . base_url() . 'js/custom.js"></script>
                                <script src="' . base_url() . 'js/customloclist.js"></script>
                                <!-- Graph JavaScript -->
                                <script src="' . base_url() . 'js/d3.v3.js"></script>
                                <script src="' . base_url() . 'js/rickshaw.js"></script>';
            echo view('templates/header', $data);
            $uploadfile = '';
            $uploadstatus = '';

            if (request()->getPost('finish')) {
                $rules =['firstname'=>'required', 'phone' => 'required'];

                if ($this->validate($rules) !== FALSE) {
                    $data['postdata'] = '';
                    $data = array('firstname' => request()->getPost('firstname'),  'phone' => request()->getPost('phone'), 
                        'email' => request()->getPost('email'), 'address' => request()->getPost('address'),'city' => request()->getPost('city'), 'pincode' => request()->getPost('pincode'));
                    
                    $appl_emp_model= model('appl_emp_model');
                    $result = $appl_emp_model->insert_applnt($data);
                    $data['success'] = $result;
                    $idvar = $appl_emp_model->getlastid('emp_id', 'tbl_emp');
                    $data['emp_item'] = model('emp_model')->get_emp($idvar);
                    $data['emp_demo'] = model('emp_model')->get_emp_demo($idvar);
                    $data['emp_family'] = model('emp_model')->get_emp_family($idvar);
                    $data['emp_phone'] = model('emp_model')->get_emp_phone($idvar);
                    $data['emp_email'] = model('emp_model')->get_emp_email($idvar);
                    $data['emp_add'] = model('emp_model')->get_emp_add($idvar);
                    echo view('frontend/emp-view-detail', $data);
                } else {
                    echo view('forms/appln_add');
                }
            } else {
                $data['status'] = 'No post Data';
                $data['page'] = 'country-list';
                $data['title'] = 'country List | TechArise';
                echo view('forms/appln_add', $data);
            }
            echo view('templates/footer', $data);
        } else {
            return redirect('login');
        }
    }

    // get state names
    public function getstates() {
        $json = array();
        model('appl_emp_model')->setCountryID(request()->getPost('countryID'));
        $json = model('appl_emp_model')->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // get city names
    function getcities() {
        $json = array();
        model('appl_emp_model')->setStateID(request()->getPost('stateID'));
        $json = model('appl_emp_model')->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

}

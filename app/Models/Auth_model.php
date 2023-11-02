<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model {

    // Declaration of a variables   
    private $_userName;
    private $_password;

    public function setUserName($userName) {
        $this->_userName = $userName;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    // login method and password verify
    function login() {
        $query = $this->db
                ->table('user_log')
                ->select('*')
                ->where('user_log.user_id', $this->_userName)
                ->where('user_log.status', 1)
                ->limit(1)
                ->get();
        if ($query->getNumRows() == 1) {
            $result = $query->getResult();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $row;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    public function checkLoginTable() {
        $query = $this->db->table('user_log')->get();
        if ($query->getNumRows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // password verify
    public function verifyHash($password, $vpassword) {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insertUser($d) {
        $this->db->table('name')->insert(array('first_name' => $d['firstname'],'last_name' => $d['lastname'], 'is_active' => '1'));
        $id_name = $this->db->insertID();
        $this->db->table('applicant')->insert(array('id_name' => $id_name,'status' => '1'));
        $id_applicant = $this->db->insertID();
        $this->db->table('employee')->insert(array('appln_id' => $id_applicant,'status' => '1'));        
        $id_emp = $this->db->insertID();
        $this->db->table('email')->insert(array('email' => $d['email'],'type_id' => '1','is_primary'=>'1','status'=>'1'));
        $id_email = $this->db->insertID();
        $this->db->table('map_ct_appln_email')->insert(array('appln_id' => $id_applicant,'email_id' => $id_email));
        $this->db->table('user_log')->insert(array('emp_id' => $id_emp,'user_id' => $d['username'],
                                                'password' => password_hash($d['password'], PASSWORD_DEFAULT),'status' => '1','super_user'=>'1'));
        
        return $this->db->insertID();
    }

    function LastLoginInfo($id) {        
        date_default_timezone_set('Asia/Calcutta'); 
        $data = array('is_loggedin'=> TRUE,'last_log_in'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'));
        $this->db->table('user_log')->set($data)->where('id',$id)->update();
        return date('Y-m-d H:i:s');
    }

    function Loginlogged($loginInfo) {
        $this->db->table('comp_login_log')->insert($loginInfo);
    }
    
    function LoggedLoginInfo($userId) {
        $query=$this->db->table('comp_login_log as BaseTbl')->select('BaseTbl.created_at')
                    ->where('BaseTbl.empid', $userId)
                    ->orderBy('BaseTbl.id', 'DESC')
                    ->limit(1)
                    ->get();

        return $query->getRow();
    }
    
    function Logoutlogged($log_out_Info){
        date_default_timezone_set('Asia/Calcutta'); 
        $data = array('is_loggedin'=> FALSE,'last_log_out'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'));
        $this->db->table('user_log')->set($data)->where('id',$log_out_Info['id_user'])->update();
        $this->db->table('comp_login_log')->insert($log_out_Info);
    }

    public function isDuplicate($username) {     
        $this->db->table('user_log')->getWhere(array('user_id' => $username), 1);
        return $this->db->affectedRows() > 0 ? TRUE : FALSE;         
    }
    
    public function insertToken($user_id) {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'verification_code'=> $token,
                'id'=>$user_id,
               
            );
        $this->db->table('user_log')->where('id', $user_id)->set(array('verification_code' => $token, 'updated_at'=>$date))->update(); 
       
        return $token . $user_id;
        
    }
    
    public function isTokenValid($token) {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->table('user_log')->getWhere(array('user_log.verification_code' => $tkn, 'user_log.emp_id' => $uid), 1);                         
               
        if($this->db->affectedRows() > 0){
            $row = $q->getRow();             
            
            $created = $row->updated_at;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->emp_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }    
    
    public function getUserInfo($id) {
        $q = $this->db-> table ('employee')->select('*')
                            ->join('applicant', 'applicant.id = employee.appln_id')
                            ->join('name', 'name.id = applicant.id_name')
                                    ->join('map_ct_appln_email', 'applicant.id = map_ct_appln_email.appln_id')
                                    ->join('email', 'map_ct_appln_email.email_id = email.id') 
                                    ->where('employee.id', $id)->get(); 
        if($this->db->affectedRows() > 0){
            $row = $q->getRow();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
        
    public function getUserInfoByEmail($email) {
       
        $query = $this->db->table('user_log')-> select('*')
                            ->join('employee', 'employee.id = user_log.emp_id')
                            ->join('applicant', 'applicant.id = employee.appln_id')
                            ->join('name','name.id=applicant.id_name')
                            ->join('map_ct_appln_email','map_ct_appln_email.appln_id = employee.appln_id ')
                            ->join('email','email.id=map_ct_appln_email.email_id')
                                    -> where('email' ,$email) -> where('is_primary', TRUE)
                                    ->get();
        
        if($this->db->affectedRows() > 0){
            $row = $query->getRow();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
    
    public function updatePassword($post) {   
        $this->db->table('user_log')->where('emp_id', $post['user_id'])->set(array('password' => password_hash($post['password'], PASSWORD_DEFAULT)))->update();
        
        $success = $this->db->affectedRows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    } 
    
    public function updateUserInfo($post) {
        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1]
            );
        $this->db->table('user_log')->set($data)->where('id', $post['user_id'])->update();
        $success = $this->db->affectedRows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }

}

?>
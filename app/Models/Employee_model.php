<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//if (!defined('BASEPATH'))  exit('No direct script access allowed');
namespace App\Models;
use CodeIgniter\Model;

class Employee_model extends Model {

    public function getlastid($id,$tbl) {
        $last_row = $this->db->table($tbl)->select($id)
                ->orderBy($id, "desc")
                ->limit(1)
                ->get($tbl)
                ->getRow();
        return $last_row->$id;
    }

    function setDataAppLead(){

    }
    function getDataAppLead(){

    }
    function setDataAppln(){

    }
    function getDataAppln(){

    }
    function setDataEmployee(){

    }
    function getDataEmployee(){
                          
    }

    function adddata($postdata) { 
        // First Name, Last Name, Photo path, DoJ (Basic Details) 'doj' => $postdata['dojoin'],
        $result1 = $this->db->table('name')->insert(array('first_name' => $postdata['firstname'], 
                                                        'last_name' => $postdata['lastname'], 
                                                        'photo' => $postdata['mediafile'],                                                         
                                                        'status' => 1));
        $empid = $this->db->insertId();        
        // Gender
        $result2 = $this->db->table('tbl_demo')->insert(array('name' => 'Gender', 
                                                                'description' => $postdata['gender'], 
                                                                'created' => 'NOW()', 'updated' => 'NOW()'));
        $result3 = $this->db->table('tbl_emp_map_demo')->insert(array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 
                                                                'created' => 'NOW()', 'updated' => 'NOW()'));
        // Marital Status
        $result4 = $this->db->table('tbl_demo')->insert( array('name' => 'Marital Status', 'description' => $postdata['matstat'],
                                                         'created' => 'NOW()', 'updated' => 'NOW()'));
        $result5 = $this->db->table('tbl_emp_map_demo')->insert( array('empid' => $empid,
                                                            'demoid' => $this->getlastid('id', 'tbl_demo'), 
                                                            'created' => 'NOW()', 'updated' => 'NOW()'));
                // Religion
        $result6 = $this->db->table('tbl_demo')->insert(array('name' => 'Religion', 'description' => $postdata['religion'], 
                                             'created' => 'NOW()', 'updated' => 'NOW()'));
        $result7 = $this->db->table('tbl_emp_map_demo')->insert(array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 
                                                                    'created' => 'NOW()', 'updated' => 'NOW()'));
                // Community      
        $result8 = $this->db->table('tbl_demo')->insert( array('name' => 'Community', 'description' => $postdata['community'], 
                                                        'created' => 'NOW()', 'updated' => 'NOW()'));
        $result9 = $this->db->table('tbl_emp_map_demo')->insert( array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 
                                                'created' => 'NOW()', 'updated' => 'NOW()'));
                // Place of Birth
        $result10 = $this->db->table('tbl_demo')->insert( array('name' => 'Place of Birth', 'description' => $postdata['pobirth'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result11 = $this->db->table('tbl_emp_map_demo')->insert( array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Date of Birth
        $result12 = $this->db->table('tbl_demo')->insert( array('name' => 'Date of Birth', 'description' => $postdata['dobirth'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result13 = $this->db->table('tbl_emp_map_demo')->insert( array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Blood Group
        $result14 = $this->db->table('tbl_healthdetails')->insert( array('name' => 'Blood Group','value' => $postdata['blood'],'empid' => $empid,'created' => 'NOW()','updated' => 'NOW()'));
                // Height
        $result15 = $this->db->table('tbl_healthdetails')->insert( array('name' => 'Height', 'value' => $postdata['height'], 'empid' => $empid, 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Weight
        $result16 = $this->db->table('tbl_healthdetails')->insert( array('name' => 'Weight', 'value' => $postdata['weight'], 'empid' => $empid, 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Family Details
         $number = empty($postdata['nosch'])?0:$postdata['nosch'];
        for($i=1;$i<=$number;$i++)  {
            echo $i;
                $this->db->table('tbl_emp_family')->insert( array( 'empid' => $empid, 'name' => $postdata['rel_name'.$i], 'relationid' => $postdata['relationship'.$i], 'age' => $postdata['rel_age'.$i],          'occupation' => $postdata['rel_occ'.$i],'created' => 'NOW()', 'updated' => 'NOW()','dob' => $postdata['dob'.$i]));        
        }        
                // Proof Mentioned
        $result17 = $this->db->table('tbl_refids')->insert( array('name' => 'Proof Mentioned', 'value' => $postdata['proofmen'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result18 = $this->db->table('tbl_emp_map_refid')->insert( array('empid' => $empid,'ref_id' => $this->getlastid('id', 'tbl_refids'), 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Proof ID NO
        $result19 = $this->db->insert('tbl_refids', array('name' => 'Proof Id No', 'value' => $postdata['proofid'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result20 = $this->db->insert('tbl_emp_map_refid', array('empid' => $empid,'ref_id' => $this->getlastid('id', 'tbl_refids'), 'created' => 'NOW()', 'updated' => 'NOW()'));
                // Educational Qualification
        $result21 = $this->db->insert('tbl_edudetails', array('name' => 'Education Qualification', 'value' => $postdata['eduqua'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result22 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
               // Certificates
        $result23 = $this->db->insert('tbl_edudetails', array('name' => 'Certificate Verification', 'value' => $postdata['cerver'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result24 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
               //Know Languages        
        $result25 = $this->db->insert('tbl_edudetails', array('name' => 'Known Languages', 'value' => $postdata['lang'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result26 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
              // Experiance Total Working Experiance
        $result27 = $this->db->insert('tbl_expdetails', array('name' => 'Total Working Experiance', 'value' => $postdata['yearexp'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result28 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
               // Is Any Public Service experiance?
        $result29 = $this->db->insert('tbl_expdetails', array('name' => 'Is Any Public Service experiance?', 'value' => $postdata['pubexp'], 'created' => 'NOW()',
            'updated' => 'NOW()'));
        $result30 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
        
        // No of Years Exp in Public Service
        $result31 = $this->db->insert('tbl_expdetails', array('name' => 'No of Years Exp in Public Service', 'value' => $postdata['nopubexp'], 'created' => 'NOW()',
            'updated' => 'NOW()'));
        $result32 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
        
        // No of years Exp in Private Security
        $result33 = $this->db->insert('tbl_expdetails', array('name' => 'No of years Exp in Private Security', 'value' => $postdata['nopriexp'], 'created' => 'NOW()',
            'updated' => 'NOW()'));
        $result34 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => 'NOW()', 'updated' => 'NOW()'));
        
        //Bank Details
        $result35 = $this->db->insert('tbl_bankdetails', array('name' => $postdata['bankname'], 'branch' => $postdata['branchname'], 'ifscode' => $postdata['ifsc'], 
            'created' => 'NOW()', 'updated' => 'NOW()'));
        $result36 = $this->db->insert('tbl_bank_map_emp', array('empid' => $empid,'bankid' => $this->getlastid('id', 'tbl_bankdetails'),'accname' => $postdata['accname'], 
            'accno' => $postdata['accno'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        
        // Contact Point - Phone
        $result37 = $this->db->insert('tbl_ct_phone', array('phone_no' => $postdata['phone'], 'type_id' => 1, 'cat_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result38 = $this->db->insert('tbl_ct_map_emp_phone', array('empid' => $empid,'phone_id' => $this->getlastid('id','tbl_ct_phone'),'created' => 'NOW()','updated' => 'NOW()'));
        
        // Contact Point - Email
        $result39 = $this->db->insert('tbl_ct_email', array('email' => $postdata['email'], 'type_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result40 = $this->db->insert('tbl_ct_map_emp_email', array('empid' => $empid,'email_id' => $this->getlastid('id','tbl_ct_email'),'created' => 'NOW()','updated' => 'NOW()'));
        
        // Contact Point - Address
        $result41 = $this->db->insert('tbl_ct_area', array('cityid' => $postdata['city'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result42 = $this->db->insert('tbl_ct_postaladd', array('address' => $postdata['address'],'areaid' => $this->getlastid('id','tbl_ct_area'), 'type_id' => 1,
            'created' => 'NOW()','updated' => 'NOW()'));
        $result43 = $this->db->insert('tbl_ct_map_emp_post', array('empid' => $empid,'postid' => $this->getlastid('id','tbl_ct_postaladd'),'created' => 'NOW()','updated' => 'NOW()'));
        
       
        if ($result1 !== NULL && $result2 !== NULL && $result3 !== NULL && $result4 !== NULL && $result5 !== NULL && $result6 !== NULL && $result7 !== NULL && $result8 !== NULL &&
                $result9 !== NULL && $result10 !== NULL && $result11 !== NULL && $result12 !== NULL &&  $result13 !== NULL && $result14 !== NULL && $result15 !== NULL &&
                $result16 !== NULL && $result17 !== NULL &&  $result18 !== NULL && $result19 !== NULL &&  $result20 !== NULL && $result21 !== NULL && $result22 !== NULL && 
                $result23 !== NULL && $result24 !== NULL && $result25 !== NULL &&  $result26 !== NULL && $result27 !== NULL &&  $result28 !== NULL && $result29 !== NULL && 
                $result30 !== NULL && $result31 !== NULL  &&  $result32 !== NULL && $result33 !== NULL &&  $result34 !== NULL && $result35 !== NULL && $result36 !== NULL && 
                $result37 !== NULL && $result38 !== NULL && $result39 !== NULL &&  $result40 !== NULL && $result41 !== NULL && $result42 !== NULL && $result43 !== NULL
                ) {
            return TRUE;
        }
        return FALSE;
    }

    public function getempdata($id = 0)    {
        if ($id === 0)  {
            $query = $this->db->table('applicant')->select('*')
                    ->join('employee', 'employee.appln_id = applicant.id')
                    ->join('map_ct_appln_phone', 'applicant.id = map_ct_appln_phone.appln_id')
                    ->join('phone', 'map_ct_appln_phone.phone_id = phone.id') 
                  //  ->where('emp_type', 'Outsource')
                    ->get();
            return $query->getResultArray();
        }
 
        $query = $this->db->table('employee')->getWhere( array('id' => $id,'emp_type' => 'Outsource',));
        return $query->getRowArray();
    }
    
    public function get_emp_rank($id = 0)    {
        $query = $this->db-> table('')->select('*')
                                    ->get();
        return $query->getRow();
    }

    public function get_emp_demo($id = 0)    {
        if ($id === 0) {
            $query = $this->db->get('tbl_demo');
            return $query->result_array();
        }
 
        $this->db->select('demoid');
        $this->db->from('tbl_emp_map_demo');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();

        $query = $this->db-> select('*')
                                    -> from('tbl_demo')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
        return $query->result_array();
    }
    
    public function get_emp_phone($id = 0)    {
        if ($id === 0)        {
            $query = $this->db->get('tbl_ct_phone');
            return $query->result_array();
        }
        $this->db->select('phone_id');
        $this->db->from('tbl_ct_map_emp_phone');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();

        $query = $this->db-> select('*')
                                    -> from('tbl_ct_phone')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
        
        return $query->row_array();
    }
    
    public function get_emp_email($id = 0)   {
        if ($id === 0)        {
            $query = $this->db->get('tbl_ct_email');
            return $query->result_array();
        }
 
        $this->db->select('email_id');
        $this->db->from('tbl_ct_map_emp_email');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();
 
        $query = $this->db-> select('*')
                                    -> from('tbl_ct_email')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    -> get();
        
        return $query->row_array();
    }
    
    public function get_emp_add($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('tbl_ct_postaladd');
            return $query->result_array();
        }
                
        #Create where clause
        $this->db->select('postid');
        $this->db->from('tbl_ct_map_emp_post');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();
 
        $query = $this->db-> select('tbl_ct_postaladd.address as address,tbl_ct_postaladd.pincode as pincode, tbl_ct_city.name as city,tbl_ct_state.name as state, tbl_ct_country.name as country')
                                    -> from('tbl_ct_postaladd')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id')
                                    -> where("tbl_ct_postaladd.`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
          
        return $query->row_array();
    }
    
    public function get_emp_family($id = 0)  {
        if ($id === 0)   {
            $query = $this->db->get('tbl_emp_family');
            return $query->result_array();
        }
        
        $this->db->select('tbl_emp_family.name as name,tbl_emp_family.age as age,tbl_emp_family.occupation as occup, tbl_emp_family.dob as dob,tbl_reltype.name as relation ');    
        $this->db->from('tbl_emp_family');
        $this->db->join('tbl_reltype', 'tbl_emp_family.relationid = tbl_reltype.id');
        $this->db -> where ('tbl_emp_family.empid = '.$id);
         $query = $this->db->get();
        
        return $query->result_array();
    }

    public function add_emp_client_map_data($postdata){
         $query_emp = $this->db->select('id')->from('tbl_emp')->where('firstname ',  $postdata['emp_firstname'])->where('lastname ',  $postdata['emp_lastname'])->get()->row(); 
        $query_client = $this->db->select('id')->from('tbl_client')->where('name ',  $postdata['client'])->get()->row(); 
        $result1 = $this->db->insert('tbl_emp_map_client', array('empid' => $query_emp->id,'client_id' => $query_client->id,'salary' => $postdata['amount'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
    }

    public function get_emp_healthdetails($id = 0)  {
        if ($id === 0)   {
            $query = $this->db->get('tbl_healthdetails');
            return $query->result_array();
        }
        
        $this->db->select('*');    
        $this->db->from('tbl_healthdetails');
        $this->db -> where ('tbl_healthdetails.empid = '.$id);
         $query = $this->db->get();
        
        return $query->result_array();
    }
    
     public function get_emp_edu($id = 0)  {
       if ($id === 0) {
            $query = $this->db->get('tbl_edudetails');
            return $query->result_array();
        }
 
        $this->db->select('eduid');
        $this->db->from('tbl_emp_map_edu');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();

        $query = $this->db-> select('*')
                                    -> from('tbl_edudetails')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
        return $query->result_array();
    }
    
     public function get_emp_exp($id = 0)  {
        if ($id === 0) {
            $query = $this->db->get('tbl_expdetails');
            return $query->result_array();
        }
 
        $this->db->select('expid');
        $this->db->from('tbl_emp_map_exp');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();

        $query = $this->db-> select('*')
                                    -> from('tbl_expdetails')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
        return $query->result_array();
    }
    
     public function get_emp_bank($id = 0)  {
        if ($id === 0)   {
            $query = $this->db->get('tbl_bankdetails');
            return $query->result_array();
        }
        
        $this->db->select('*');    
        $this->db->from('tbl_bankdetails');
        $this->db->join('tbl_bank_map_emp', 'tbl_bank_map_emp.bankid = tbl_bankdetails.id');
        $this->db -> where ('tbl_bank_map_emp.empid = '.$id);
         $query = $this->db->get();
        
        return $query->result_array();
    }    
}
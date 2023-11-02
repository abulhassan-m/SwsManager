<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models;
use CodeIgniter\Model;

class Executive_model extends Model {

    

    function adddata($postdata) { 
        // First Name, Last Name, Photo path, DoJ (Basic Details)
        $result1 = $this->db->insert('tbl_emp', array('firstname' => $postdata['firstname'], 'lastname' => $postdata['lastname'], 'photo' => $postdata['mediafile'],'doj' => $postdata['dojoin'],'emp_type' => 'Executive',  'status_id' => 1, 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $empid = $this->db->insert_id();        
        // Gender
        $result2 = $this->db->insert('tbl_demo', array('name' => 'Gender', 'description' => $postdata['gender'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result3 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        // Marital Status
        $result4 = $this->db->insert('tbl_demo', array('name' => 'Marital Status', 'description' => $postdata['matstat'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result5 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Religion
        $result6 = $this->db->insert('tbl_demo', array('name' => 'Religion', 'description' => $postdata['religion'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result7 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Community      
        $result8 = $this->db->insert('tbl_demo', array('name' => 'Community', 'description' => $postdata['community'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result9 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Place of Birth
        $result10 = $this->db->insert('tbl_demo', array('name' => 'Place of Birth', 'description' => $postdata['pobirth'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result11 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Date of Birth
        $result12 = $this->db->insert('tbl_demo', array('name' => 'Date of Birth', 'description' => $postdata['dobirth'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result13 = $this->db->insert('tbl_emp_map_demo', array('empid' => $empid,'demoid' => $this->getlastid('id', 'tbl_demo'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Blood Group
        $result14 = $this->db->insert('tbl_healthdetails', array('name' => 'Blood Group','value' => $postdata['blood'],'empid' => $empid,'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
                // Height
        $result15 = $this->db->insert('tbl_healthdetails', array('name' => 'Height', 'value' => $postdata['height'], 'empid' => $empid, 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Weight
        $result16 = $this->db->insert('tbl_healthdetails', array('name' => 'Weight', 'value' => $postdata['weight'], 'empid' => $empid, 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Family Details
         $number = empty($postdata['nosch'])?0:$postdata['nosch'];
        for($i=1;$i<=$number;$i++)  {
            echo $i;
                $this->db->insert('tbl_emp_family', array( 'empid' => $empid, 'name' => $postdata['rel_name'.$i], 'relationid' => $postdata['relationship'.$i], 'age' => $postdata['rel_age'.$i],          'occupation' => $postdata['rel_occ'.$i],'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s'),'dob' => $postdata['dob'.$i]));        
        }        
                // Proof Mentioned
        $result17 = $this->db->insert('tbl_refids', array('name' => 'Proof Mentioned', 'value' => $postdata['proofmen'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result18 = $this->db->insert('tbl_emp_map_refid', array('empid' => $empid,'ref_id' => $this->getlastid('id', 'tbl_refids'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Proof ID NO
        $result19 = $this->db->insert('tbl_refids', array('name' => 'Proof Id No', 'value' => $postdata['proofid'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result20 = $this->db->insert('tbl_emp_map_refid', array('empid' => $empid,'ref_id' => $this->getlastid('id', 'tbl_refids'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
                // Educational Qualification
        $result21 = $this->db->insert('tbl_edudetails', array('name' => 'Education Qualification', 'value' => $postdata['eduqua'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result22 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
               // Certificates
        $result23 = $this->db->insert('tbl_edudetails', array('name' => 'Certificate Verification', 'value' => $postdata['cerver'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result24 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
               //Know Languages        
        $result25 = $this->db->insert('tbl_edudetails', array('name' => 'Known Languages', 'value' => $postdata['lang'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result26 = $this->db->insert('tbl_emp_map_edu', array('empid' => $empid,'eduid' => $this->getlastid('id', 'tbl_edudetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
              // Experiance Total Working Experiance
        $result27 = $this->db->insert('tbl_expdetails', array('name' => 'Total Working Experiance', 'value' => $postdata['yearexp'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result28 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
               // Is Any Public Service experiance?
        $result29 = $this->db->insert('tbl_expdetails', array('name' => 'Is Any Public Service experiance?', 'value' => $postdata['pubexp'], 'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $result30 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        
        // No of Years Exp in Public Service
        $result31 = $this->db->insert('tbl_expdetails', array('name' => 'No of Years Exp in Public Service', 'value' => $postdata['nopubexp'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result32 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        
        // No of years Exp in Private Security
        $result33 = $this->db->insert('tbl_expdetails', array('name' => 'No of years Exp in Private Security', 'value' => $postdata['nopriexp'], 'created' => date('Y-m-d H:i:s'),            'updated' => date('Y-m-d H:i:s')));
        $result34 = $this->db->insert('tbl_emp_map_exp', array('empid' => $empid,'expid' => $this->getlastid('id', 'tbl_expdetails'), 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        
        //Bank Details
        $result35 = $this->db->insert('tbl_bankdetails', array('name' => $postdata['bankname'], 'branch' => $postdata['branchname'], 'ifscode' => $postdata['ifsc'], 
            'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result36 = $this->db->insert('tbl_bank_map_emp', array('empid' => $empid,'bankid' => $this->getlastid('id', 'tbl_bankdetails'),'accname' => $postdata['accname'], 
            'accno' => $postdata['accno'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        
        // Contact Point - Phone
        $result37 = $this->db->insert('tbl_ct_phone', array('phone_no' => $postdata['phone'], 'type_id' => 1, 'cat_id' => 1, 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result38 = $this->db->insert('tbl_ct_map_emp_phone', array('empid' => $empid,'phone_id' => $this->getlastid('id','tbl_ct_phone'),'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        
        // Contact Point - Email
        $result39 = $this->db->insert('tbl_ct_email', array('email' => $postdata['email'], 'type_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result40 = $this->db->insert('tbl_ct_map_emp_email', array('empid' => $empid,'email_id' => $this->getlastid('id','tbl_ct_email'),'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        
        // Contact Point - Address
        $result41 = $this->db->insert('tbl_ct_area', array('cityid' => $postdata['city'], 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
        $result42 = $this->db->insert('tbl_ct_postaladd', array('address' => $postdata['address'],'areaid' => $this->getlastid('id','tbl_ct_area'), 'type_id' => 1, 'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $result43 = $this->db->insert('tbl_ct_map_emp_post', array('empid' => $empid,'postid' => $this->getlastid('id','tbl_ct_postaladd'),'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
         $result44 = $this->db->insert('tbl_comp_staff', array('empid' => $empid,'design_id' => '','department'=>'','level'=>'','branchid'=>'','created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
       
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
    public function getlastid($id,$tbl) {
        $last_row = $this->db->select($id)
                ->order_by($id, "desc")
                ->limit(1)
                ->get($tbl)
                ->row();
        return $last_row->$id;
    }
    public function getempdata($id = 0)    {
        if ($id === 0)  {
            $query = $this->db->table('employee')->select('*')/*
                    ->join('map_emp_phone', 'tbl_emp.id = tbl_ct_map_emp_phone.empid')
                    ->join('phone', 'tbl_ct_map_emp_phone.phone_id = tbl_ct_phone.id')
                    ->where('emp_type', 'Executive')*/
                    ->get();
            if($query->getNumRows() > 0){
                return $query->getResultArray();
            } else {
                $result= array();
                $query = $this->db->table('employee')->select('*')
                    ->where('emp_type', 'Executive')
                    ->get();
                foreach ($query->getResultArray() as $key=>$emp) {
                    $result[$key]= array_merge($result,array('empid'=>$emp['id'],'firstname'=>$emp['firstname'],'lastname'=>$emp['lastname'],'photo'=>$emp['photo'],'phone_no'=>''));
                }
                 return $result;
            }
        }
 
        $query = $this->db->get_where('tbl_emp', array('id' => $id,'emp_type' => 'Executive'));
        return $query->row_array();
    }
    
    public function get_emp_rank($id = 0)    {
         if ($id === 0) {
            $query = $this->db->get('tbl_demo');
            return $query->result_array();
        }
 
        $this->db->select('design_id');
        $this->db->from('tbl_comp_staff');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();

        $query = $this->db-> select('*')
                                    -> from('tbl_designation')
                                    -> where("`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
         if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return NULL;
        }        
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
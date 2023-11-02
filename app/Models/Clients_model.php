<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Muhammad Ansari
 */
// if (!defined('BASEPATH'))    exit('No direct script access allowed');
namespace App\Models;
use CodeIgniter\Model;

class Clients_model extends Model {
    //put your code here
     
    function insert_client($postdata) { 
        // Company Name, GST, PAN , Logo Path
        $result1 = $this->db->insert('tbl_client', array('name' => $postdata['cname'], 'gst_no' => $postdata['gst'], 'pan_no' => $postdata['pan'],'logo' => $postdata['mediafile'],
                   'created' => 'NOW()', 'updated' => 'NOW()'));
        $clientid = $this->getlastid ('id','tbl_client');
        
        // Company Phone
        $result2 = $this->db->insert('tbl_ct_phone', array('phone_no' => $postdata['cphone'], 'type_id' => 1, 'cat_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result3 = $this->db->insert('tbl_ct_map_client_phone', array('client_id' => $clientid,'phone_id' => $this->getlastid('id','tbl_ct_phone'),'created' => 'NOW()','updated' => 'NOW()'));
        
        // Company Email
        $result4 = $this->db->insert('tbl_ct_email', array('email' => $postdata['cemail'], 'type_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result5 = $this->db->insert('tbl_ct_map_client_email', array('client_id' => $clientid,'email_id' => $this->getlastid('id','tbl_ct_email'),'created' => 'NOW()','updated' => 'NOW()'));
        
        // Company www
        $result6 = $this->db->insert('tbl_ct_www', array('www' => $postdata['cwww'], 'type_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result7 = $this->db->insert('tbl_ct_map_client_www', array('client_id' => $clientid,'www_id' => $this->getlastid('id','tbl_ct_www'),'created' => 'NOW()','updated' => 'NOW()'));
        
        // Company - Address
        $result8 = $this->db->insert('tbl_ct_area', array('cityid' => $postdata['ccity'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result9 = $this->db->insert('tbl_ct_postaladd', array('address' => $postdata['caddress'],'areaid' => $this->getlastid('id','tbl_ct_area'), 'type_id' => 1,
            'created' => 'NOW()','updated' => 'NOW()'));
        $result10 = $this->db->insert('tbl_ct_map_client_post', array('client_id' => $clientid,'postid' => $this->getlastid('id','tbl_ct_postaladd'),'post_type' => 'Main Address','created' => 'NOW()','updated' => 'NOW()'));
        
        // List of Service Provided to the Client
        for($i=1;$i<=$postdata['lsp'];$i++)  {
                $this->db->insert('tbl_service_client_map', array( 'client_id' => $clientid, 'product_id' => $this->getelement('id', 'name', $postdata['particulars'.$i], 'tbl_service'),
                    'quantity' => $postdata['nops'.$i], 'work_hrs' => $postdata['whrs'.$i],
                    'rate' => $postdata['rate'.$i],'salary' => $postdata['salary'.$i],'created' => 'NOW()', 'updated' => 'NOW()'));        
        }    
        
        // List of Contact persons from Client Side
        for($i=1;$i<=$postdata['clct'];$i++)  {
            $this->db->insert('tbl_ct_phone', array('phone_no' =>  $postdata['cpnphone'.$i], 'type_id' => 1, 'cat_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
            $this->db->insert('tbl_ct_email', array('email' =>  $postdata['cpnemail'.$i], 'type_id' => 1, 'created' => 'NOW()', 'updated' => 'NOW()'));
                $this->db->insert('tbl_client_ct_person', array( 'client_id' => $clientid, 'name' => $postdata['cpname'.$i],
                    'designation_id' => $this->getelement('id', 'name', $postdata['cpndesign'.$i], 'tbl_designation'), 'phone_id ' => $this->getlastid('id','tbl_ct_phone'),
                    'email_id' => $this->getlastid('id','tbl_ct_email'),'created' => 'NOW()', 'updated' => 'NOW()'));        
        }  
        
        //Bank Details
        $result11 = $this->db->insert('tbl_bankdetails', array('name' => $postdata['cbankname'], 'branch' => $postdata['cbranchname'], 'ifscode' => $postdata['cifsc'], 
            'created' => 'NOW()', 'updated' => 'NOW()'));
        $result12 = $this->db->insert('tbl_bank_map_client', array('client_id' => $clientid,'bankid' => $this->getlastid('id', 'tbl_bankdetails'),'accname' => $postdata['caccname'], 
            'accno' => $postdata['caccno'], 'created' => 'NOW()', 'updated' => 'NOW()'));

        
        // Billing Start Date & Deployement Date
        $result13 = $this->db->insert('tbl_client_demo', array('client_id' => $clientid,'bill_st_day' => $postdata['bpsd'],'deploy_dt' => $postdata['dd'],'created' => 'NOW()','updated' => 'NOW()'));
        
        // Billing - Address
        $result14 = $this->db->insert('tbl_ct_area', array('cityid' => $postdata['bcity'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result15 = $this->db->insert('tbl_ct_postaladd', array('address' => $postdata['baddress'],'areaid' => $this->getlastid('id','tbl_ct_area'), 'type_id' => 1,
            'created' => 'NOW()','updated' => 'NOW()'));
        $result16 = $this->db->insert('tbl_ct_map_client_post', array('client_id' => $clientid,'postid' => $this->getlastid('id','tbl_ct_postaladd'),'post_type' => 'Billing Address','created' => 'NOW()','updated' => 'NOW()'));
        
        // Deployemnt - Address
        $result17 = $this->db->insert('tbl_ct_area', array('cityid' => $postdata['dcity'], 'created' => 'NOW()', 'updated' => 'NOW()'));
        $result18 = $this->db->insert('tbl_ct_postaladd', array('address' => $postdata['daddress'],'areaid' => $this->getlastid('id','tbl_ct_area'), 'type_id' => 1,
            'created' => 'NOW()','updated' => 'NOW()'));
        $result19 = $this->db->insert('tbl_ct_map_client_post', array('client_id' => $clientid,'postid' => $this->getlastid('id','tbl_ct_postaladd'),'post_type' => 'Deployment Address','created' => 'NOW()','updated' => 'NOW()'));
        
       
        if ($result1 !== NULL && $result2 !== NULL && $result3 !== NULL && $result4 !== NULL && $result5 !== NULL && $result6 !== NULL && $result7 !== NULL && $result8 !== NULL &&
                $result9 !== NULL && $result10 !== NULL && $result11 !== NULL && $result12 !== NULL &&  $result13 !== NULL && $result14 !== NULL && $result15 !== NULL &&
                $result16 !== NULL && $result17 !== NULL &&  $result18 !== NULL && $result19 !== NULL 
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
    
    public function getelement($id,$attribute,$value,$tbl) {
        $last_row = $this->db->select($id)
                -> where ($attribute.' = "'.$value.'"')
                ->order_by($id, "desc")
                ->limit(1)
                ->get($tbl) 
                ->row();
        return $last_row->$id;
    }
        
    public function get_client($id = 0)    {
        if ($id === 0)  {
           /* $query = $this->db->select('*')
                    -> from ('tbl_client')            
                                    ->join('tbl_ct_map_client_phone', 'tbl_client.id = tbl_ct_map_client_phone.client_id')
                                    ->join('tbl_ct_phone', 'tbl_ct_map_client_phone.phone_id = tbl_ct_phone.id') ->get();*/
            $query = $this->db->table('company')->select('*')
                                -> join('unit', 'unit.company_id = company.id') -> get();
            return $query->getResultArray();
        }
 
        $query = $this->db->table('company')->select('tbl_client.name, tbl_client.gst_no, tbl_client.pan_no, tbl_client.logo,
                                tbl_ct_phone.phone_no,tbl_ct_email.email,tbl_ct_www.www,tbl_ct_postaladd.address,
                                tbl_ct_city.name as city_name, tbl_ct_state.name as state_name, tbl_ct_country.name as country_name')     
                ->join('tbl_ct_map_client_phone', 'tbl_client.id = tbl_ct_map_client_phone.client_id')
                ->join('tbl_ct_phone', 'tbl_ct_map_client_phone.phone_id = tbl_ct_phone.id') 
                ->join('tbl_ct_map_client_email', 'tbl_client.id = tbl_ct_map_client_email.client_id')
                ->join('tbl_ct_email', 'tbl_ct_map_client_email.email_id = tbl_ct_email.id') 
                ->join('tbl_ct_map_client_www', 'tbl_client.id = tbl_ct_map_client_www.client_id')
                ->join('tbl_ct_www', 'tbl_ct_map_client_www.www_id = tbl_ct_www.id') 
                                    ->join('tbl_ct_map_client_post', 'tbl_client.id = tbl_ct_map_client_post.client_id')
                                    ->join('tbl_ct_postaladd', 'tbl_ct_map_client_post.postid = tbl_ct_postaladd.id')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id')
                ->getWhere('tbl_client', array('tbl_client.id' => $id,'tbl_ct_map_client_post.post_type' => 'Main Address'));
        return $query->getRowArray();
    }
    public function get_clientdetails($id = 0)    {
         
        $query = $this->db->select('*')     
                ->join('tbl_ct_map_client_phone', 'tbl_client.id = tbl_ct_map_client_phone.client_id')
                ->join('tbl_ct_phone', 'tbl_ct_map_client_phone.phone_id = tbl_ct_phone.id') 
                ->join('tbl_ct_map_client_email', 'tbl_client.id = tbl_ct_map_client_email.client_id')
                ->join('tbl_ct_email', 'tbl_ct_map_client_email.email_id = tbl_ct_email.id') 
                ->join('tbl_ct_map_client_www', 'tbl_client.id = tbl_ct_map_client_www.client_id')
                ->join('tbl_ct_www', 'tbl_ct_map_client_www.www_id = tbl_ct_www.id') 
                                    ->join('tbl_ct_map_client_post', 'tbl_client.id = tbl_ct_map_client_post.client_id')
                                    ->join('tbl_ct_postaladd', 'tbl_ct_map_client_post.postid = tbl_ct_postaladd.id')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id')
                ->get_where('tbl_client', array('tbl_client.id' => $id,'tbl_ct_map_client_post.post_type' => 'Main Address'));
        return $query->row_array();
    }
    
    public function get_client_demo($id = 0)    {
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
    
    public function get_client_phone($id = 0)    {
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
    
    public function get_client_email($id = 0)   {
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
    
    public function get_client_add($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('tbl_ct_postaladd');
            return $query->result_array();
        }
                
        #Create where clause
        $this->db->select('postid');
        $this->db->from('tbl_ct_map_emp_post');
        $this->db->where('empid', $id);
        $where_clause = $this->db->get_compiled_select();
 
        $query = $this->db-> select('*')
                                    -> from('tbl_ct_postaladd')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id')
                                    -> where("tbl_ct_postaladd.`id` IN ($where_clause)", NULL, FALSE)
                                    ->get();
          
        return $query->row_array();
    }
    
        
    public function get_client_serviceprovided($id = 0)  {
                
        $this->db->select('*');    
        $this->db->from('tbl_service_client_map');
        $this->db->join('tbl_service', 'tbl_service_client_map.product_id = tbl_service.id');
        $this->db -> where ('tbl_service_client_map.client_id = '.$id);
         $query = $this->db->get();
        
        return $query->result_array();
    }
    
     public function get_client_contactpersonlist($id = 0)  {
       $this->db->select('tbl_client_ct_person.name as ct_name,tbl_designation.name as design_name,tbl_ct_phone.phone_no as phone,tbl_ct_email.email as email');    
        $this->db->from('tbl_client_ct_person');
        $this->db->join('tbl_designation', 'tbl_client_ct_person.designation_id = tbl_designation.id');
        $this->db->join('tbl_ct_phone', 'tbl_client_ct_person.phone_id = tbl_ct_phone.id');
        $this->db->join('tbl_ct_email', 'tbl_client_ct_person.email_id = tbl_ct_email.id');
        $this->db -> where ('tbl_client_ct_person.client_id = '.$id);
         $query = $this->db->get();
         
        return $query->result_array();
    }
    public function get_client_deployinfo($id = 0)  {
        if ($id === 0) {
            $query = $this->db->get('tbl_client_demo');
            return $query->result_array();
        }
  		 
        $this->db->select('tbl_client_demo.deploy_dt,tbl_ct_postaladd.address,tbl_ct_city.name as city_name,tbl_ct_state.name as state_name,tbl_ct_country.name as country_name');   
        $this->db->from('tbl_client_demo')
                                    ->join('tbl_client', 'tbl_client.id = tbl_client_demo.client_id')
                                    ->join('tbl_ct_map_client_post', 'tbl_client.id = tbl_ct_map_client_post.client_id')
                                    ->join('tbl_ct_postaladd', 'tbl_ct_map_client_post.postid = tbl_ct_postaladd.id')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id');
        $this->db -> where (array('tbl_client.id' => $id,'tbl_ct_map_client_post.post_type' => 'Billing Address'));
         $query = $this->db->get();
        return $query->result_array();
    }
    
     public function get_client_billinfo($id = 0)  {
        if ($id === 0) {
            $query = $this->db->get('tbl_client_demo');
            return $query->result_array();
        }
  		 
        $this->db->select('tbl_client_demo.bill_st_day,tbl_ct_postaladd.address,tbl_ct_city.name as city_name,tbl_ct_state.name as state_name,tbl_ct_country.name as country_name');   
        $this->db->from('tbl_client_demo')
                                    ->join('tbl_client', 'tbl_client.id = tbl_client_demo.client_id')
                                    ->join('tbl_ct_map_client_post', 'tbl_client.id = tbl_ct_map_client_post.client_id')
                                    ->join('tbl_ct_postaladd', 'tbl_ct_map_client_post.postid = tbl_ct_postaladd.id')
                                    ->join('tbl_ct_area', 'tbl_ct_postaladd.areaid = tbl_ct_area.id')
                                    ->join('tbl_ct_city', 'tbl_ct_area.cityid = tbl_ct_city.id')
                                    ->join('tbl_ct_state', 'tbl_ct_city.state_id = tbl_ct_state.id')
                                    ->join('tbl_ct_country', 'tbl_ct_state.countryid = tbl_ct_country.id');
        $this->db -> where (array('tbl_client.id' => $id,'tbl_ct_map_client_post.post_type' => 'Billing Address'));
         $query = $this->db->get();
        return $query->result_array();
    }
    
     public function get_client_bank($id = 0)  {
        if ($id === 0)   {
            $query = $this->db->get('tbl_bankdetails');
            return $query->result_array();
        }
        
        $this->db->select('*');    
        $this->db->from('tbl_bankdetails');
        $this->db->join('tbl_bank_map_client', 'tbl_bank_map_client.bankid = tbl_bankdetails.id');
        $this->db -> where ('tbl_bank_map_client.client_id = '.$id);
         $query = $this->db->get();
        
        return $query->result_array();
    }
         
    public function delete_client($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_client');
    }    
}

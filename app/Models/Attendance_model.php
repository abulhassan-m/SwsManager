<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaction_model
 *
 * @author Muhammad Ansari
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance_model extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function getlastid($id,$tbl,$ord) {
        $last_row = $this->db->select($id)
                ->order_by($id, $ord)
                ->limit(1)
                ->get($tbl);
        if ($last_row->num_rows() > 0) {
            return $last_row->row()->$id;
        } else {
            return NULL;
        }
    }
    
    public function add_attendance($postdata) {
        $this->db->select('id');
        $this->db->from('tbl_emp');
        $this->db->where('firstname ',  $postdata['emp_firstname']);
        $this->db->where('lastname ',  $postdata['emp_lastname']);
        $empid = $this->db->get()->row();
        $this->db->select('id');
        $this->db->from('tbl_client');
        $this->db->where('name ',  $postdata['client']);
        $clientid = $this->db->get()->row();
        $result = $this->db->insert('tbl_emp_attendence', array('empid' => $empid->id, 'client_id' => $clientid->id,'Date' => $postdata['date'],'shift' => $postdata['shift'],'status' => '1','created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        if ($result !== NULL){
             return TRUE;
         }
          return FALSE;
    }
     
    function  get_attendance ($postdata){        
        $this->db->select('id');
        $this->db->from('tbl_client');
        $this->db->where('name ',  $postdata['client']);
        $clientid = $this->db->get()->row();
//      $this->db->select(' empid,firstname,lastname,  GROUP_CONCAT(if(DAY(`Date`) = 1, `shift`, NULL)) AS day01, 
//  GROUP_CONCAT(if(DAY(`Date`) = 2, `shift`, NULL)) AS day02, 
//  GROUP_CONCAT(if(DAY(`Date`) = 3, `shift`, NULL)) AS day03, 
//  GROUP_CONCAT(if(DAY(`Date`) = 4, `shift`, NULL)) AS day04, 
//  GROUP_CONCAT(if(DAY(`Date`) = 5, `shift`, NULL)) AS day05, 
//  GROUP_CONCAT(if(DAY(`Date`) = 6, `shift`, NULL)) AS day06, 
//  GROUP_CONCAT(if(DAY(`Date`) = 7, `shift`, NULL)) AS day07, 
//  GROUP_CONCAT(if(DAY(`Date`) = 8, `shift`, NULL)) AS day08, 
//  GROUP_CONCAT(if(DAY(`Date`) = 9, `shift`, NULL)) AS day09, 
//  GROUP_CONCAT(if(DAY(`Date`) = 10, `shift`, NULL)) AS day10,
//  GROUP_CONCAT(if(DAY(`Date`) = 11, `shift`, NULL)) AS day11, 
//  GROUP_CONCAT(if(DAY(`Date`) = 12, `shift`, NULL)) AS day12, 
//  GROUP_CONCAT(if(DAY(`Date`) = 13, `shift`, NULL)) AS day13, 
//  GROUP_CONCAT(if(DAY(`Date`) = 14, `shift`, NULL)) AS day14, 
//  GROUP_CONCAT(if(DAY(`Date`) = 15, `shift`, NULL)) AS day15, 
//  GROUP_CONCAT(if(DAY(`Date`) = 16, `shift`, NULL)) AS day16, 
//  GROUP_CONCAT(if(DAY(`Date`) = 17, `shift`, NULL)) AS day17, 
//  GROUP_CONCAT(if(DAY(`Date`) = 18, `shift`, NULL)) AS day18, 
//  GROUP_CONCAT(if(DAY(`Date`) = 19, `shift`, NULL)) AS day19, 
//  GROUP_CONCAT(if(DAY(`Date`) = 20, `shift`, NULL)) AS day20, 
//  GROUP_CONCAT(if(DAY(`Date`) = 21, `shift`, NULL)) AS day21, 
//  GROUP_CONCAT(if(DAY(`Date`) = 22, `shift`, NULL)) AS day22, 
//  GROUP_CONCAT(if(DAY(`Date`) = 23, `shift`, NULL)) AS day23, 
//  GROUP_CONCAT(if(DAY(`Date`) = 24, `shift`, NULL)) AS day24, 
//  GROUP_CONCAT(if(DAY(`Date`) = 25, `shift`, NULL)) AS day25, 
//  GROUP_CONCAT(if(DAY(`Date`) = 26, `shift`, NULL)) AS day26, 
//  GROUP_CONCAT(if(DAY(`Date`) = 27, `shift`, NULL)) AS day27, 
//  GROUP_CONCAT(if(DAY(`Date`) = 28, `shift`, NULL)) AS day28, 
//  GROUP_CONCAT(if(DAY(`Date`) = 29, `shift`, NULL)) AS day29, 
//  GROUP_CONCAT(if(DAY(`Date`) = 30, `shift`, NULL)) AS day30,  
//  GROUP_CONCAT(if(DAY(`Date`) = 31, `shift`, NULL)) AS day31
//  ');
//        $this->db->from('tbl_emp_attendence');
//        $this->db->join('tbl_emp','tbl_emp.id = tbl_emp_attendence.empid');
//        $this->db->where('tbl_emp_attendence.client_id ',  $clientid->id);
//        $this->db->where('tbl_emp_attendence.date >=', $postdata['from_date']);
//        $this->db->where('tbl_emp_attendence.date <=', $postdata['to_date']);
//        $this->db->group_by('tbl_emp_attendence.empid');
//        $query = $this->db->get();
//        echo $this->db->last_query();
        $db_string = '';
        for ($i = 1; $i <= 31; $i++) {
            for ($j = 1; $j <=9; $j++){
                $i==$j?$i='0'.$i:$i;
            }
            $db_string .= 'GROUP_CONCAT(if(DAY(`Date`) = '.$i.', `shift`, NULL)) AS day'.$i.',';
        }
        $this->db->select(' empid,firstname,lastname,  '.$db_string);
        $this->db->from('tbl_emp_attendence');
        $this->db->join('tbl_emp','tbl_emp.id = tbl_emp_attendence.empid');
        $this->db->where('tbl_emp_attendence.client_id ',  $clientid->id);
        $this->db->where('tbl_emp_attendence.date >=', $postdata['from_date']);
        $this->db->where('tbl_emp_attendence.date <=', $postdata['to_date']);
        $this->db->group_by('tbl_emp_attendence.empid');
        $query = $this->db->get();
        return $query->result_array(); 
    }
            
    function fetch_data($q) {
        if(!empty($q)){
        $this->db->like('firstname', $q);
        $this->db->or_like('lastname', $q);
        }
        $query = $this->db->get('tbl_emp');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'name' => $row["firstname"].','.$row["lastname"],
                    'image' => $row["photo"]
                );
            }
            echo json_encode($output);
        } else {
            
        }
    }
    function fetch_allempdata() {
        $query = $this->db->get('tbl_emp');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'name' => $row["firstname"].','.$row["lastname"],
                    'image' => $row["photo"]
                );
            }
            echo json_encode($output);
        }  
    }
    
    function fetch_allclientdata() {
        $query = $this->db->get('tbl_client');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'name' => $row["name"],
                    'image' => $row["logo"]
                );
            }
            echo json_encode($output);
        }  
    }
}

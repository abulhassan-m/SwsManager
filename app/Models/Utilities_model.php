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

class Utilities_model extends CI_Model {
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
    public function vouchers($amount,$diff1,$diff2,$type) {
        $this->db->select_sum($amount);
        $this->db->from('tbl_voucher');
        $this->db->where('date >=', $diff1);
        $this->db->where('date <=', $diff2);
        $this->db->where('type_id ',$type);
        $query = $this->db->get();
        return $query->row()->$amount;
    }
    public function acc_open_balance($param=null) {
        $leastdate = $this->getlastid('date', 'tbl_voucher','asc') == null ? '0000-00-00' : $this->getlastid('date', 'tbl_voucher','asc');
        $tol_receipts = $this->vouchers('amount',$leastdate,date('Y-m-d H:i:s', strtotime("-1 days")),'Receipt');
        $tol_voucher = $this->vouchers('amount',$leastdate,date('Y-m-d H:i:s', strtotime("-1 days")),'Voucher');
        $open_bal = $tol_receipts-$tol_voucher;
        return $open_bal;
    }
    public function acc_close_balance($param=null) {
        $close_bal = $this->acc_open_balance()+$this->get_total_receipts()-$this->get_total_vouchers();
        return $close_bal;
    }
    public function get_total_receipts($param=null) {
        $amount = 'amount';
        $today=date("Y-m-d");
        $this->db->select_sum('amount');
        $this->db->from('tbl_voucher');
        $this->db->where('type_id ','Receipt');
        $this->db->where('date ', $today);
        $query = $this->db->get();
//        echo "<pre>";
//     print_r( $query );
//   echo '</pre>';
//$str = $this->db->last_query();
//echo $str; 
        return $query->row()->$amount;
    }
    public function get_total_vouchers($param=null) {
        $amount = 'amount';
        $today=date("Y-m-d");
        $this->db->select_sum('amount');
        $this->db->from('tbl_voucher');
        $this->db->where('type_id ', 'Voucher');
        $this->db->where('date ', $today);
        $query = $this->db->get();
        return $query->row()->$amount;        
    }
    
    public function add_receipts($postdata) {
        $result1 = $this->db->insert('tbl_voucher', array('code' => $postdata['code'],'type_id' => 'Receipt','date'=>$postdata['date'],'pay_name' => $postdata['payee'],'tran_cat_id' => $postdata['towards'],'towards' => $postdata['debit'],'amount' => $postdata['amount'],'mode_pay_id' => $postdata['mop'],'receiver' => $postdata['receiver'],'authorize' => $postdata['authorize'],'manager' => $postdata['manage'],'accountant' => $postdata['acc'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $refid = $this->db->insert_id();
        $result2 = $this->db->insert('tbl_trans_pay_details', array('ref_id' => $refid,'details' => $postdata['transaid'],'trans_date' => $postdata['trdate'],'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')));
         if ($result1 !== NULL && $result2 !== NULL){
             return TRUE;
         }
          return FALSE;
    }
    
    public function get_receipts($param=null) {
        $today=date("Y-m-d");
        $this->db->select('*');
        $this->db->from('tbl_voucher');
        $this->db->where('type_id ', 'Receipt');
        $this->db->where('date ', $today);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function add_vouchers($postdata) {
        $result1 = $this->db->insert('tbl_voucher', array('code' => $postdata['code'],'type_id' => 'Voucher','date'=>$postdata['date'],'pay_name' => $postdata['payee'],'tran_cat_id' => $postdata['towards'],'towards' => $postdata['debit'],'amount' => $postdata['amount'],'mode_pay_id' => $postdata['mop'],'receiver' => $postdata['receiver'],'authorize' => $postdata['authorize'],'manager' => $postdata['manage'],'accountant' => $postdata['acc'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $refid = $this->db->insert_id();
        $result2 = $this->db->insert('tbl_trans_pay_details', array('ref_id' => $refid,'details' => $postdata['transaid'],'trans_date' => $postdata['trdate'],'created' => 'NOW()', 'updated' => 'NOW()'));
         if ($result1 !== NULL && $result2 !== NULL){
             return TRUE;
         }
          return FALSE;
    }
    
    public function get_vouchers($param=null) {
        $today=date("Y-m-d");
        $this->db->select('*');
        $this->db->from('tbl_voucher');
        $this->db->where('type_id ', 'Voucher');
        $this->db->where('date ', $today);
        $query = $this->db->get();
        return $query->result_array(); 
    }
    
    public function add_suspense($postdata) {
        $this->db->select('id');
        $this->db->from('tbl_emp');
        $this->db->where('firstname ',  $postdata['emp_firstname']);
        $this->db->where('lastname ',  $postdata['emp_lastname']);
        $query = $this->db->get()->row();
        $result = $this->db->insert('tbl_trans_emp_suspense', array('empid' => $query->id,
            'amount' => $postdata['amount'],'type' => 'Added','created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        if ($result !== NULL){
             return TRUE;
         }
          return FALSE;
    }
    public function get_all_suspense($param=null) {
        $today=date("Y-m-d");
        $yesterday=date('Y-m-d', strtotime("-1 days"));
        $this->db->select('empid,IFNULL( SUM( CASE WHEN TYPE = "Added" AND DATE(t.created) = '.$today.' THEN amount END),0) AS "ADDED TOTAL", IFNULL(SUM( CASE WHEN TYPE = "Deduction" AND DATE(t.created) = '.$today.' THEN amount END),0) AS "DEDUCTED TOTAL", ( IFNULL(SUM( CASE WHEN TYPE = "Added" AND DATE(t.created) <= '.$yesterday.' THEN amount END),0) - IFNULL(SUM( CASE WHEN TYPE = "Deduction" AND DATE(t.created) <= '.$yesterday.' THEN amount END),0)) AS "OPENING BAL", ( IFNULL(SUM( CASE WHEN TYPE = "Added" THEN amount END),0) - IFNULL(SUM( CASE WHEN TYPE = "Deduction" THEN amount END),0)) AS CLOSINGBAL, firstname, lastname,photo');
        $this->db->from('tbl_trans_emp_suspense as t ');
        $this->db->join('tbl_emp','tbl_emp.id = t.empid');
        $this->db->group_by('t.empid');
        $where_clause = $this->db->get_compiled_select();
        $query = $this->db-> select('*')
                                    -> from('('.$where_clause.') as y')
                                    -> where("CLOSINGBAL > 0 ", NULL, FALSE)
                                    ->group_by('empid')
                                    ->get();
        return $query->result_array(); 
    }
     public function get_emp_advance($param=null) {
        $today=date("Y-m-d");
        $this->db->select('*');
        $this->db->from('tbl_acc_sal_adv_log');
        $this->db->join('tbl_emp','tbl_emp.id = tbl_acc_sal_adv_log.empid');
        $this->db->join('tbl_client','tbl_client.id = tbl_acc_sal_adv_log.client_id');
        $this->db->where('Date(tbl_acc_sal_adv_log.created)', $today);
        $query = $this->db->get();
        return $query->result_array(); 
    }
    
    public function add_emp_advance($postdata) {
        $id = 'id';
        $refid ='';
        $query_voucher = $this->db->select('id')->from('tbl_voucher')->where('date',  $postdata['date'])->where('pay_name ',  'Salary Advance')->get();  
$str = $this->db->last_query();
echo $str;        
        if ($query_voucher->num_rows() > 0) {
            $this->db->where('pay_name ',  'Salary Advance');
            $this->db->where('date',  $postdata['date']);
            $this->db->update('tbl_voucher', array('amount' => $postdata['amount']));
            $refid = $query_voucher->row()->id;
        } else {
            $this->db->insert('tbl_voucher', array('code' => '','type_id' => 'Voucher','date'=>$postdata['date'],'pay_name' => 'Salary Advance','tran_cat_id' => 1,'towards' => '','amount' => $postdata['amount'],'mode_pay_id' => $postdata['mop'],'receiver' => '','authorize' => $postdata['authorize'],'manager' => $postdata['manage'],'accountant' => $postdata['acc'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
            $refid = $this->db->insert_id();            
        }
        $query_emp = $this->db->select('id')->from('tbl_emp')->where('firstname ',  $postdata['emp_firstname'])->where('lastname ',  $postdata['emp_lastname'])->get()->row(); 
        $query_client = $this->db->select('id')->from('tbl_client')->where('name ',  $postdata['client'])->get()->row(); 
        $result1 = $this->db->insert('tbl_acc_sal_adv_log', array('empid' => $query_emp->id,'client_id' => $query_client->id,'amount' => $postdata['amount'],'authorized' => $postdata['authorize'],'manager' => $postdata['manage'],'accounts' => $postdata['acc'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $result2 = $this->db->insert('tbl_trans_pay_details', array('ref_id' => $refid,'details' => $postdata['transaid'],'trans_date' => $postdata['trdate'],'created' => 'NOW()', 'updated' => 'NOW()'));
         if ($result1 !== NULL && $result2 !== NULL){
             return TRUE;
         }
          return FALSE;
    }

    function fetch_data($q) {
        echo 'Argument : '.$q;
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
            
        echo 'Argument123 : '.$q;
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

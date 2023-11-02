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
namespace App\Models;
use CodeIgniter\Model;

class Transaction_model extends Model {
    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function getlastid($id,$tbl,$ord) {
        $last_row = $this->db->table($tbl)->select($id)
                ->orderBy($id, $ord)
                ->limit(1)
                ->get();
        if ($last_row->getNumRows() > 0) {
            return $last_row->getRow()->$id;
        } else {
            return NULL;
        }
    }
    public function vouchers($amount,$diff1,$diff2,$type) {
        $query = $this->db->table('voucher')->selectSum($amount)->where('vouch_date >=', $diff1)
                                            ->where('vouch_date <=', $diff2) ->get();
        return $query->getRow()->$amount;
    }
    public function acc_open_balance($param=null) {
        $leastdate = $this->getlastid('vouch_date', 'voucher','asc') == null ? '0000-00-00' : $this->getlastid('vouch_date', 'voucher','asc');
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
        $query=$this->db->table('receipts')->selectSum('amount')->where('created_at ', $today)->get();
//        echo "<pre>";
//     print_r( $query );
//   echo '</pre>';
//$str = $this->db->last_query();
//echo $str; 
        return $query->getRow()->$amount;
    }
    public function get_total_vouchers($param=null) {
        $amount = 'amount';
        $today=date("Y-m-d");
        $query = $this->db->table('voucher')->selectSum('amount')->where('vouch_date ', $today)->get();
        return $query->getRow()->$amount;        
    }
    
    public function add_receipts($postdata) {
        $result1 = $this->db->table('voucher')->insert( array('code' => $postdata['code'],
                                                            'type_id' => 'Receipt',
                                                            'date'=>$postdata['date'],
                                                            'pay_name' => $postdata['payee'],
                                                            'tran_cat_id' => $postdata['towards'],
                                                            'towards' => $postdata['debit'],
                                                            'amount' => $postdata['amount'],
                                                            'mode_pay_id' => $postdata['mop'],
                                                            'receiver' => $postdata['receiver'],
                                                            'authorize' => $postdata['authorize'],
                                                            'manager' => $postdata['manage'],
                                                            'accountant' => $postdata['acc'],
                                                            'created' => date('Y-m-d H:i:s'),
                                                            'updated' => date('Y-m-d H:i:s')));
        $refid = $this->db->insertId();
        $result2 = $this->db->table('tbl_trans_pay_details')->insert( array('ref_id' => $refid,
                                                                    'details' => $postdata['transaid'],
                                                                    'trans_date' => $postdata['trdate'],
                                                                    'created' => date('Y-m-d H:i:s'), 
                                                                    'updated' => date('Y-m-d H:i:s')));
         if ($result1 !== NULL && $result2 !== NULL){
             return TRUE;
         }
          return FALSE;
    }
    
    public function get_receipts($param=null) {
        $today=date("Y-m-d");
        $query = $this->db->table('receipts')->select('*')->where('created_at ', $today)->get();
        return $query->getResultArray();
    }
    
    public function add_vouchers($postdata) {
        $result1 = $this->db->table('voucher')->insert(array('code' => $postdata['code'],'type_id' => 'Voucher',
                                                            'date'=>$postdata['date'],'pay_name' => $postdata['payee'],
                                                            'tran_cat_id' => $postdata['towards'],'towards' => $postdata['debit'],
                                                            'amount' => $postdata['amount'],'mode_pay_id' => $postdata['mop'],
                                                            'receiver' => $postdata['receiver'],'authorize' => $postdata['authorize'],
                                                            'manager' => $postdata['manage'],'accountant' => $postdata['acc'],
                                                            'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
        $refid = $this->db->insertId();
        $result2 = $this->db->table('tbl_trans_pay_details')->insert( array('ref_id' => $refid,'details' => $postdata['transaid'],
                                                                        'trans_date' => $postdata['trdate'],'created' => 'NOW()', 
                                                                        'updated' => 'NOW()'));
         if ($result1 !== NULL && $result2 !== NULL){
             return TRUE;
         }
          return FALSE;
    }
    
    public function get_vouchers($param=null) {
        $today=date("Y-m-d");
        $query = $this->db->table('voucher')->select('*')->where('vouch_date ', $today)->get();
        return $query->getResultArray(); 
    }
    
    public function add_suspense($postdata) {
        $query = $this->db->table('employee')->select('id')->where('firstname ',  $postdata['emp_firstname'])
                                    ->where('lastname ',  $postdata['emp_lastname'])->get()->getRow();
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
        $where_clause = $this->db->table('map_emp_suspense as t')
                                ->select('id_emp,IFNULL( SUM( CASE WHEN DATE(t.created_at) = '.$today.
                                ' THEN added_sus END),0) AS "ADDED TOTAL",
                                 IFNULL(SUM( CASE WHEN DATE(t.created_at) = '
                                .$today.' THEN deducted_sus END),0) AS "DEDUCTED TOTAL", 
                                ( IFNULL(SUM( CASE WHEN DATE(t.created_at) <= '.$yesterday.
                                ' THEN added_sus END),0) - IFNULL(SUM( CASE WHEN DATE(t.created_at) <= '.$yesterday.
                                ' THEN deducted_sus END),0)) AS "OPENING BAL", 
                                ( IFNULL(SUM(added_sus),0) - IFNULL(SUM(deducted_sus),0)) AS CLOSINGBAL, n.first_name, n.last_name,n.photo')
                                 ->join('employee','employee.id = t.id_emp')
                                 ->join('applicant','applicant.id = employee.appln_id')
                                 ->join('name as n', 'n.id = applicant.id_name')
                                 ->groupBy('t.id_emp')
                                 ->getCompiledSelect();
        $query = $this->db-> table('('.$where_clause.') as y')->select('*')
                                    -> where("CLOSINGBAL > 0 ", NULL, FALSE)
                                    ->groupBy('id_emp')
                                    ->get();
        return $query->getResultArray(); 
    }
     public function get_emp_advance($param=null) {
        $today=date("Y-m-d");
        $query = $this->db->table('tbl_acc_sal_adv_log')->select('*')->join('employee','employee.id = tbl_acc_sal_adv_log.id_emp')
                    ->where('Date(tbl_acc_sal_adv_log.created_at)', $today)->get();
        return $query->getResultArray(); 
    }
    
    public function add_emp_advance($postdata) {
        $id = 'id';
        $refid ='';
        $query_voucher = $this->db->table('voucher')->select('id')->where('vouch_date',  $postdata['date'])->where('pay_name ',  'Salary Advance')->get();  
        $str = $this->db->getLastQuery();
        echo $str;        
        if ($query_voucher->getNumRows() > 0) {
            //$this->db->where('pay_name ',  'Salary Advance');
            $this->db->table('voucher')->set(array('amount' => $postdata['amount']))->where('date',  $postdata['date'])->update();
            $refid = $query_voucher->getRow()->id;
        } else {
            $this->db->table('voucher')->insert(array('code' => '','type_id' => 'Voucher','date'=>$postdata['date'],'pay_name' => 'Salary Advance','tran_cat_id' => 1,'towards' => '','amount' => $postdata['amount'],'mode_pay_id' => $postdata['mop'],'receiver' => '','authorize' => $postdata['authorize'],'manager' => $postdata['manage'],'accountant' => $postdata['acc'],'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s')));
            $refid = $this->db->insertId();            
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

<?php

/*if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

class Payroll_model extends Model {
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
    
    public function get_all_lists($param=null) {
        $today=date("m"); $db_string = ''; $countduties=0; $countot=0; $countoff=0; $result = array();
        for ($i = 1; $i <= 31; $i++) { 
            $db_string .= 'GROUP_CONCAT(if(DAY(`Date`) = '.$i.', `shift`, NULL)) AS day'.$i.',';
        }
        $query = $this->db->table('emp_attendance')->select('name.first_name,name.last_name,salary,  '.$db_string) 
                             ->join('employee','employee.id = emp_attendance.emp_id') 
                             ->join('applicant','applicant.id = employee.appln_id') 
                             ->join('name','name.id = applicant.id_name') 
                             ->join('map_employee_unit','map_employee_unit.emp_id = emp_attendance.emp_id') 
                             ->join('unit','unit.id=map_employee_unit.unit_id ') 
                             ->where('MONTH(Date)', $today) ->groupBy('emp_attendance.emp_id')->get();
        foreach ($query->getResultArray() as $key=>$muster_roll) {
            for ($i = 1; $i <= 31; $i++) {
                if ($muster_roll['day' . $i] == 'P' || $muster_roll['day' . $i] == 'P,P' || $muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A' || $muster_roll['day' . $i] == 'B' || $muster_roll['day' . $i] == 'C' || $muster_roll['day' . $i] == 'A,B,C' || $muster_roll['day' . $i] == 'A,B' || $muster_roll['day' . $i] == 'B,C' || $muster_roll['day' . $i] == 'C,A' || $muster_roll['day' . $i] == 'N' || $muster_roll['day' . $i] == 'D' || $muster_roll['day' . $i] == 'D,N' || $muster_roll['day' . $i] == 'N,D') {
                    $countduties++;
                }
                if ($muster_roll['day' . $i] == 'P,P' || $muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A,B,C' || $muster_roll['day' . $i] == 'A,B' || $muster_roll['day' . $i] == 'B,C' || $muster_roll['day' . $i] == 'C,A' || $muster_roll['day' . $i] == 'D,N' || $muster_roll['day' . $i] == 'N,D') {
                    $countot++;
                }
                if ($muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A,B,C') {
                    $countot++;
                }
                if ($muster_roll['day' . $i] == 'W') {
                    $countoff++;
                }
            }
            $gross = round($muster_roll['salary']*($countduties+$countot+$countoff)/31,0,PHP_ROUND_HALF_DOWN);
            $pf = round($muster_roll['salary']*($countduties+$countot+$countoff)/31*12/100,0,PHP_ROUND_HALF_UP);
            $esi = round($muster_roll['salary']*($countduties+$countot+$countoff)/31*1.75/100,0,PHP_ROUND_HALF_UP);
            $advance = $this->advance_data($muster_roll['firstname'],$muster_roll['lastname'],$muster_roll['name']);
            $uniform =0;
            $deduction = $pf+$esi+$advance+$uniform;
            $result[$key]= array_merge($result,array('firstname'=>$muster_roll['firstname'],'lastname'=>$muster_roll['lastname'],'name'=>$muster_roll['name'] ,'duties'=>$countduties,'ots'=>$countot,'Weekoff'=>$countoff,'total'=>$countduties+$countot+$countoff,'salary'=>$muster_roll['salary'],'gross'=>$gross,'pf'=>$pf,'esi'=>$esi,'advance'=>$advance,'uniform'=>$uniform,'ded'=>$deduction,'net'=>$gross-$deduction,'paid'=>'','paidon'=>'','remarks'=>''));
        }
        return $result;
    }
    
    function advance_data($empfname,$emplname,$clientname){
        $today=date("m");
        $query = $this->db->table('tbl_acc_sal_adv_log')->select('SUM(amount) as advance')
                    ->join('employee','employee.id = tbl_acc_sal_adv_log.empid')
                    ->join('tbl_client','tbl_client.id = tbl_acc_sal_adv_log.client_id')
                    ->where('employee.firstname',$empfname)
                    ->where('employee.lastname',$emplname)
                    ->where('tbl_client.name',$clientname)
                    ->where('Month(tbl_acc_sal_adv_log.created)', $today)
                    ->get();
        return $query->getRow()->advance;
    }
    

    function fetch_data($q) {
        if(!empty($q)){
        $this->db->like('firstname', $q);
        $this->db->or_like('lastname', $q);
        }
        $query = $this->db->get('employee');
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
        $query = $this->db->get('employee');
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

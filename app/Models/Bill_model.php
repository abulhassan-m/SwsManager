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
namespace App\Controllers;
use CodeIgniter\Model;

class Bill_model extends Model {
    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function getlastid($id,$tbl,$ord) {
        $last_row = $this->db->table('$tbl')->select($id)
                ->orderBy($id, $ord)
                ->limit(1)
                ->get();
        if ($last_row->getNumRows() > 0) {
            return $last_row->getRow()->$id;
        } else {
            return NULL;
        }
    }
    function billdetails() {
         $today=date("m")-1;
         $query = $this->db->table('unit_bill')->select('*')->join('unit_bill_breakup','unit_bill_breakup.bill_id=unit_bill.id')
                    ->where('Month(unit_bill.created_at)', $today)->get();
        
        return $query->getResultArray();
    }
    
    function invoice_no_generate($data){
        
    }
            
    function itemized_bill($id=null){
        $today=date("m"); $db_string = ''; $countduties=0; $countot=0;$countoff=0; $result = array();
        for ($i = 1; $i <= 31; $i++) {
            $db_string .= 'GROUP_CONCAT(if(DAY(`Date`) = '.$i.', `shift`, NULL)) AS day'.$i.',';
        }
        $query = $this->db->select( 'rank_id,product_id,quantity,work_hrs,rate, tbl_service.name as product,'.$db_string) ->from('tbl_emp_attendence') ->join('tbl_emp_map_client','tbl_emp_map_client.client_id=tbl_emp_attendence.client_id') ->join('tbl_designation','tbl_designation.id=tbl_emp_map_client.rank_id')->join('tbl_service_client_map','tbl_service_client_map.client_id=tbl_emp_attendence.client_id')->join('tbl_service','tbl_service.id=tbl_service_client_map.product_id') ->where('MONTH(tbl_emp_attendence.Date)', $today) ->where('tbl_emp_attendence.client_id', $id) ->group_by('tbl_emp_attendence.client_id')->get();
        
        foreach ($query->result_array() as $key=>$generate_bill) {
            for ($i = 1; $i <= 31; $i++) {
                if ($generate_bill['day' . $i] == 'P' || $generate_bill['day' . $i] == 'P,P' || $generate_bill['day' . $i] == 'P,P,P' || $generate_bill['day' . $i] == 'A' || $generate_bill['day' . $i] == 'B' || $generate_bill['day' . $i] == 'C' || $generate_bill['day' . $i] == 'A,B,C' || $generate_bill['day' . $i] == 'A,B' || $generate_bill['day' . $i] == 'B,C' || $generate_bill['day' . $i] == 'C,A' || $generate_bill['day' . $i] == 'N' || $generate_bill['day' . $i] == 'D' || $generate_bill['day' . $i] == 'D,N' || $generate_bill['day' . $i] == 'N,D') {
                    $countduties++;
                }
                if ($generate_bill['day' . $i] == 'P,P' || $generate_bill['day' . $i] == 'P,P,P' || $generate_bill['day' . $i] == 'A,B,C' || $generate_bill['day' . $i] == 'A,B' || $generate_bill['day' . $i] == 'B,C' || $generate_bill['day' . $i] == 'C,A' || $generate_bill['day' . $i] == 'D,N' || $generate_bill['day' . $i] == 'N,D') {
                    $countot++;
                }
                if ($generate_bill['day' . $i] == 'P,P,P' || $generate_bill['day' . $i] == 'A,B,C') {
                    $countot++;
                }
                if ($generate_bill['day' . $i] == 'W') {
                    $countoff++;
                }
            }
            $result[$key]= array_merge($result,array('product'=>$generate_bill['product'],'quantity'=>$generate_bill['quantity'],'rate'=>$generate_bill['rate'],'total'=>$countduties+$countot+$countoff,'amount'=>round($generate_bill['rate']*($countduties+$countot+$countoff)/31,2,PHP_ROUND_HALF_UP)));
        }
        return $result;
    }
    
    function billgenerate($data) {
          $today=date("m"); $db_string = ''; $countduties=0; $countot=0;$countoff=0; $result = array();
        $query = $this->db->select( '*, tbl_client.name as client,tbl_client.code as inv_code,tbl_ct_postaladd.address as address,tbl_ct_city.name as city,tbl_ct_state.name as state,tbl_ct_country.name as country,tbl_service.name as product,tbl_service_client_map.quantity as quantity,tbl_service_client_map.work_hrs as work_hrs,tbl_service_client_map.rate as rate') ->from('tbl_emp_attendence') ->join('tbl_client','tbl_client.id=tbl_emp_attendence.client_id ')->join('tbl_ct_map_client_post','tbl_ct_map_client_post.client_id=tbl_emp_attendence.client_id') ->join('tbl_ct_postaladd','tbl_ct_postaladd.id=tbl_ct_map_client_post.postid')->join('tbl_ct_area','tbl_ct_area.id=tbl_ct_postaladd.areaid') ->join('tbl_ct_city','tbl_ct_city.id=tbl_ct_area.cityid')->join('tbl_ct_state','tbl_ct_state.id=tbl_ct_city.state_id')->join('tbl_ct_country','tbl_ct_country.id=tbl_ct_state.countryid')->join('tbl_service_client_map','tbl_service_client_map.client_id=tbl_emp_attendence.client_id')->join('tbl_service','tbl_service.id=tbl_service_client_map.product_id') ->where('MONTH(Date)', $today) ->group_by('tbl_emp_attendence.client_id')->get();
        foreach ($query->result_array() as $key=>$generate_bill) {
            $subtotal=0; $quantity=0; $mandays=0;
            foreach ($this->itemized_bill($query->row()->client_id) as $key=>$billdetails) {
                $subtotal += $billdetails['amount'];
                $quantity += $billdetails['quantity'];
                $mandays += $billdetails['total'];
            }
             
            $result[$key]= array_merge($result,array('name'=>$generate_bill['client'],'address'=>$generate_bill['address'],'city'=>$generate_bill['city'],'state'=>$generate_bill['state'],'country'=>$generate_bill['country'],'pincode'=>$generate_bill['pincode'],'email'=>'','gst_no'=>$generate_bill['gst_no'],'pan'=>$generate_bill['pan_no'],'invoice_no'=>$generate_bill['inv_code'].'/'.date('m').'/'.date('Y'),'date'=>date('d-m-Y'),'fromdate'=>date('01-m-Y'),'todate'=>date('t-m-Y'),'duedate'=>date('d-m-Y',strtotime('+5 days')),'itemizedbill'=>$this->itemized_bill($query->row()->client_id),'quantity'=>$quantity,'mandays'=>$mandays,'subtotal'=>$subtotal,'cgst'=> round($subtotal*9/100,2,PHP_ROUND_HALF_UP),'sgst'=>round($subtotal*9/100,2,PHP_ROUND_HALF_UP),'gst'=>round($subtotal*18/100,2,PHP_ROUND_HALF_UP),'totalamount'=>$this->moneyFormatIndia(round($subtotal+$subtotal*18/100,0,PHP_ROUND_HALF_UP)),'remarks'=>''));
        }
        return $result;
//        SELECT * FROM `tbl_bill`
//	id 	invoice_no 	client_id 	deploy_id 	date 	place 	period 	sub_total 	gst 	total_amount 	created 	updated
    }
    function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
    
}

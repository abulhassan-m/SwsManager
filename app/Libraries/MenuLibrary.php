<?php

/* 
 * To change this license header, choose License \Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Libraries;

class MenuLibrary {
    
    public function menu_navigation($userrole) {
        $uri = new \CodeIgniter\HTTP\URI(current_url());
        $page = $uri->getSegment(2);  
        if($userrole=='Super User') {
            $menu = array(
                array('text'=>'<i class="fa fa-dashboard fa-fw"></i> Dashboard','url'=>'dashboard','class'=>($page=='dashboard'?'active':''),
                    'submenu'=>array()),
                array(
                    'text'=>'<i class="fa fa-users fa-fw"></i> Application List',
                    'url'=>'applicant','class'=> (($page=='applicant' || $page=='Applicant')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-users fa-fw"></i> Employees List','url'=>'employee','class'=> (($page=='employee' || $page=='Employee')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-building-o fa-fw"></i> Clients List','url'=>'clients','class'=>(($page=='clients' || $page=='Clients')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="material-icons">batch_prediction</i> Projects List','url'=>'projects','class'=>(($page=='projects' || $page=='projects')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-tasks fa-fw"></i> Accounts','url'=>'transaction','class' =>($page=='transaction'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-credit-card fa-fw"></i> Payroll Registry','url'=>'payroll','class'=>($page=='payroll'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-money fa-fw"></i> Invoice/Bill Registry','url'=>'bill','class'=>($page=='bill'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-check-square-o fa-fw"></i> Muster Roll','url'=>'attendance','class'=>($page=='attendance'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-book  fa-fw"></i> Uniform Inventory','url'=>'uniform','class'=>($page=='unifrom'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="material-icons">account_circle</i> Executives','url'=>'executive','class'=> (($page=='executive' || $page=='Executive')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-file fa-fw"></i> Reports','url'=>'reports','class'=>($page=='reports'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-gear fa-spin fa-fw"></i> User Setting','url'=>'user-setting','class'=>($page=='user-setting'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-archive fa-fw"></i> Utilities','url'=>'utilities','class'=>($page=='utilities'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-wrench fa-spin fa-fw"></i> Settings','url'=>'settings','class'=>($page=='cost2gov'?'active':''),
                    'submenu'=>array()),
            );
        } else if ($userrole=='Administrator') {
            $menu = array(
                array('text'=>'<i class="fa fa-dashboard fa-fw"></i> Dashboard','url'=>'dashboard','class'=>($page=='dashboard'?'active':''),
                    'submenu'=>array()),
                array(
                    'text'=>'<i class="fa fa-users fa-fw"></i> Application List',
                    'url'=>'applicant','class'=> (($page=='applicant' || $page=='Applicant')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-users fa-fw"></i> Employees List','url'=>'employee','class'=> (($page=='employee' || $page=='Employee')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-building-o fa-fw"></i> Clients List','url'=>'clients','class'=>(($page=='clients' || $page=='Clients')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="material-icons">batch_prediction</i> Projects List','url'=>'projects','class'=>(($page=='projects' || $page=='projects')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-tasks fa-fw"></i> Accounts','url'=>'transaction','class' =>($page=='transaction'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-credit-card fa-fw"></i> Payroll Registry','url'=>'payroll','class'=>($page=='payroll'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-money fa-fw"></i> Invoice/Bill Registry','url'=>'bill','class'=>($page=='bill'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-check-square-o fa-fw"></i> Muster Roll','url'=>'attendance','class'=>($page=='attendance'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-book  fa-fw"></i> Uniform Inventory','url'=>'uniform','class'=>($page=='unifrom'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="material-icons">account_circle</i> Executives','url'=>'executive','class'=> (($page=='executive' || $page=='Executive')?'active':''),
                    'submenu'=>array()),
            );
        } else if ($userrole == 'Employee') {
            $menu = array(
                array('text'=>'<i class="fa fa-dashboard fa-fw"></i> Dashboard','url'=>'dashboard','class'=>($page=='dashboard'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-users fa-fw"></i> Employees List','url'=>'employee','class'=> (($page=='employee' || $page=='Employee')?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-tasks fa-fw"></i> Accounts','url'=>'transaction','class' =>($page=='transaction'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-credit-card fa-fw"></i> Payroll Registry','url'=>'payroll','class'=>($page=='payroll'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-check-square-o fa-fw"></i> Muster Roll','url'=>'attendance','class'=>($page=='attendance'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-book  fa-fw"></i> Uniform Inventory','url'=>'uniform','class'=>($page=='unifrom'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-file fa-fw"></i> Reports','url'=>'reports','class'=>($page=='reports'?'active':''),
                    'submenu'=>array()),
                array('text'=>'<i class="fa fa-wrench fa-spin fa-fw"></i> Settings','url'=>'settings','class'=>($page=='cost2gov'?'active':''),
                    'submenu'=>array()),
            );
        } else {
            $menu = array();
        }
        return $menu;
    }
}


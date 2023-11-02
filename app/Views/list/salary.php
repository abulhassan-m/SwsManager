<div class="content">
    <div class="container-fluid">
        <div class="row">
    <div class="col-lg-3">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="pull-left fa fa-rupee rounded"></i>
                </div>
                <div class="card-title">
                <h5><strong> <?= empty($acc_ob) ? '-' : $acc_ob; ?> </strong></h5>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">Total Salaries (Previous Month)</div>
            </div>
        </div>        
    </div>
    <div class="col-lg-3">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="pull-left fa fa-rupee rounded"></i>
                </div>
                <div class="card-title">
                <h5><strong> <?= empty($acc_dr) ? '-' : $acc_dr; ?> </strong></h5>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">Total Salaries (Current Month)</div>
            </div>
        </div>        
    </div>
    
    <div class="col-lg-3">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="pull-left fa fa-rupee rounded"></i>
                </div>
                <div class="card-title">
                <h5><strong> <?= empty($acc_dv) ? '-' : $acc_dv; ?> </strong></h5>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">Previous Pending Salaries</div>
            </div>
        </div>        
    </div>
    <div class="col-lg-3">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                <i class="pull-left fa fa-rupee rounded"></i>
                </div>
                <div class="card-title">
                <h5><strong> <?= empty($acc_cb) ? '-' : $acc_cb; ?> </strong></h5>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">Stop Payments</div>
            </div>
        </div>        
    </div>
    <div class="clearfix"> </div>
</div>


<div class="row">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title">Salary List (Generated for the Month of <?php 
                
                $currentMonth = date('F');
   $month = Date('F-Y', strtotime($currentMonth . " last month"));
   echo $month;?>)  <a class="small" href="payroll/advsaladd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
            </div>
            <div class="card-body">
            <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Principle Employer</th>
                            <th>No of Duties</th>
                            <th>OT</th>
                            <th>OFF</th>
                            <th>Total duties</th>
                            <th>Salary</th>
                            <th>Gross</th>
                            <th>PF</th>
                            <th>ESI</th>
                            <th>Advance</th>
                            <th>Uniform</th>
                            <th>Deduction</th>
                            <th>Net Amount</th>
                            <th>Paid Amount </th>
                            <th>Paid on </th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($salary_list as $key => $salary_list): ?>
                            <tr class="active">
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $salary_list['firstname'].$salary_list['lastname'] ?></td>
                                <td><?= $salary_list['name'] ?></td>
                                <td><?= $salary_list['duties'] ?> </td>
                                <td><?= $salary_list['ots'] ?> </td>
                                <td><?= $salary_list['Weekoff'] ?></td>
                                <td><?= $salary_list['total'] ?> </td>
                                <td><?= $salary_list['salary'] ?></td>
                                <td><?= $salary_list['gross'] ?></td>
                                <td><?= $salary_list['pf'] ?></td>
                                <td><?= $salary_list['esi'] ?></td>
                                <td><?= $salary_list['advance'] ?></td>
                                <td><?= $salary_list['uniform'] ?></td>
                                <td><?= $salary_list['ded'] ?></td>
                                <td><?= $salary_list['net'] ?></td>
                                <td><?= $salary_list['paid'] ?></td>
                                <td><?= $salary_list['paidon'] ?></td>
                                <td><?= $salary_list['remarks'] ?></td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="box_panel p-5 margin-right-0">
            <div class="panel-heading">
                
            <div class="panel-body restable">
                
            </div>
        </div>
    </div>
    </div>
</div>
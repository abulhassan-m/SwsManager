<div class="column-full padding-t-5 top_widget">
    <div class="column-quad bg-white top_widget_contents">
        <div class="column-full open">
            <i class="pull-left fa fa-rupee rounded"></i>
            <div class="inner_widget">
                <h5><strong> <?= empty($acc_ob) ? '-' : $acc_ob; ?> </strong></h5>
                <span>Total Bills (Previous Month)</span>
            </div>
        </div>
    </div>
    <div class="column-quad bg-white top_widget_contents">
        <div class="column-full receipt">
            <i class="pull-left fa fa-rupee rounded"></i>
            <div class="inner_widget">
                <h5><strong><?= empty($acc_dr) ? '-' : $acc_dr; ?> </strong></h5>
                <span>Total Amount Received</span>
            </div>
        </div>
    </div>
    <div class="column-quad bg-white top_widget_contents">
        <div class="column-full voucher">
            <i class="pull-left fa fa-rupee rounded"></i>
            <div class="inner_widget ">
                <h5><strong><?= empty($acc_dv) ? '-' : $acc_dv ?> </strong></h5>
                <span>Previous Outstanding</span>
            </div>
        </div>
    </div>
    <div class="column-quad bg-white top_widget_contents">
        <div class="column-full close">
            <i class="pull-left fa fa-rupee rounded"></i>
            <div class="inner_widget">
                <h5><strong><?= empty($acc_cb) ? '-' : $acc_cb ?> </strong></h5>
                <span>Total Bills (Current Month)</span>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="column-full margin-t-b-15 row">
        <div class="box_panel padding-5 margin-right-0">
            <div class="panel-heading">
                <h4 class="panel-title">Salary List (Generated for Current Month)  <a class="small" href="payroll/advsaladd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Principle Employer</th>
                            <th>Over Dues</th>
                            <th>Salary Dues</th>
                            <th>Amount</th>
                            <th>Balance</th>
                            <th>Paid By</th>
                            <th>authorized By</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($get_emp_adv as $key => $get_emp_adv): ?>
                            <tr class="active">
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?php echo $get_emp_adv['firstname'] . ' ' . $get_emp_adv['lastname'] ?></td>
                                <td><?php echo $get_emp_adv['name'] ?></td>
                                <td> </td>
                                <td> </td>
                                <td><?php echo $get_emp_adv['amount'] ?></td>
                                <td> </td>
                                <td><?php echo $get_emp_adv['authorized'] ?></td>
                                <td><?php echo $get_emp_adv['manager'] ?></td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
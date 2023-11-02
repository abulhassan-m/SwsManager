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
                        <div class="stats">Total Bills (Previous Month)</div>
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
                            <h5><strong><?= empty($acc_dr) ? '-' : $acc_dr; ?> </strong></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">Total Amount Received</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="pull-left fa fa-rupee rounded"></i>
                        </div>
                        <div class="card-title">
                            <h5><strong> <?= empty($acc_dv) ? '-' : $acc_dv ?></strong></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">Previous Outstanding</div>
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
                            <h5><strong> <?= empty($acc_cb) ? '-' : $acc_cb ?> </strong></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">Total Bills (Current Month)</div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>


        <div class="row">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Bill Register (Generated for Month <?php

                                                                                $currentMonth = date('F');
                                                                                $month = Date('F-Y', strtotime($currentMonth . " last month"));
                                                                                echo $month; ?>) <a class="small" href="bill/generate"><span class="small-badge small padding-5"><u>Generate New Invoice</u> <i class="fa fa-plus-circle"></i> </span> </a></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bill No</th>
                                <th>Principle Employer</th>
                                <th>Bill Amount</th>
                                <th>G.S.T</th>
                                <th>Total Amount</th>
                                <th>Received</th>
                                <th>TDS</th>
                                <th>Less</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getdetails as $key => $getdetails) : ?>

                                <tr class="active">
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $getdetails['invoice_no'] ?></td>
                                    <td><?= $getdetails['client_id'] ?></td>
                                    <td><?= $this->moneyFormatIndia($getdetails['sub_total']) ?></td>
                                    <td><?= $getdetails['gst'] ?></td>
                                    <td><?= $getdetails['total_amount'] ?></td>
                                    <td><?= $getdetails['amount'] ?></td>
                                    <td><?= $getdetails['tds'] ?></td>
                                    <td><?= $getdetails['less'] ?></td>
                                    <td><?php
                                        //                                $getdetails['name'].$getdetails['branch'].$getdetails['ifscode'].$getdetails['details'].$getdetails['trans_date'].$getdetails['clr_date'].$getdetails['sub_date'].$getdetails['status'] 
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
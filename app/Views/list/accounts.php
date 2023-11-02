<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon"><i class="pull-left fa fa-rupee rounded"></i></div>
                        <p class="card-category">Opening Balance</p>
                        <h3 class="card-title">&#x20B9;.<?= empty($acc_ob) ? '-' : $acc_ob; ?><small></small></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="pull-left fa fa-rupee rounded"></i>
                        </div>
                        <p class="card-category">Today's Receipt</p>
                        <h3 class="card-title">&#x20B9;.<?= empty($acc_dr) ? '-' : $acc_dr; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="pull-left fa fa-rupee rounded"></i>
                        </div>
                        <p class="card-category">Todays Voucher</p>
                        <h3 class="card-title">&#x20B9;.<?= empty($acc_dv) ? '-' : $acc_dv ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="pull-left fa fa-rupee rounded"></i>
                        </div>
                        <p class="card-category">Closing Balance</p>
                        <h3 class="card-title">&#x20B9;.<?= empty($acc_cb) ? '-' : $acc_cb ?> </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-danger">
                        <div class="cb-balance">
                            <h4 class="panel-title">Receipts <a class="small" href="transaction/receiptadd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled"><?php foreach ($get_rec as $get_rec): ?>
                            <li><?php echo $get_rec['pay_name'] ?><div class="text-success pull-right"><i class="fa fa-inr"></i><?php echo $get_rec['amount'] ?></div></li>
                            <?php endforeach; ?>
                        </ul>               
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-danger">
                        <div class="cb-balance">
                            <h4 class="panel-title">Vouchers <a class="small" href="transaction/voucheradd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php foreach ($get_vou as $get_vou): ?>
                                <li><?php echo $get_vou['pay_name'] ?><div class="text-success pull-right"><i class="fa fa-inr"></i><?php echo $get_vou['amount'] ?></div></li>
                            <?php endforeach; ?>
                        </ul>              
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-danger">
                        <div class="cb-balance">
                            <h4 class="panel-title">Suspense List  <a class="small" href="transaction/suspenseadd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach ($get_suspense as $get_suspense): ?>
                            <div class="column-full padding-t-5 suspense_row">
                                <div class="column-16">
                                    <?php
                                    $url = empty($get_suspense["photo"]) || $get_suspense["photo"] == 'No Image File' ? "assets/images/logo-app.svg" : base_url() . "assets/profile_pics/" . $get_suspense["photo"];
                                    $file_headers = @get_headers($url);
                                    $InvalidHeaders = array('404', '403', '500');
                                    foreach ($InvalidHeaders as $HeaderVal) {
                                        if (strstr($file_headers[0], $HeaderVal) || $get_suspense["photo"] == 'No Image File') {
                                            $url = "assets/images/logo-app.svg";
                                        }
                                    }
//               
                                    ?>
                                    <img class="suspense_image img-responsive" src='<?= $url ?>' alt=""/> 
                                </div>
                                <div class="column-66">
                                    <div class="suspense_title"> <?= $get_suspense['firstname'] . ' ' . $get_suspense['lastname'] ?> </div>
                                    <h6 class="padding-t-0">Opening Balance:<?php echo $get_suspense['OPENING BAL'] ?></h6>
                                    <h6 class="padding-t-0"> Added:<?php echo $get_suspense['ADDED TOTAL'] ?> | Deducted:<?php echo $get_suspense['DEDUCTED TOTAL'] ?> </h6>
                                    <p>CASH Balance:<?php echo $get_suspense['CLOSINGBAL'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>          
                    </div>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Salary Advance List  <a class="small" href="transaction/advsaladd"><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a></h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                     <th>#</th>
                                <th>Employee Name</th>
                                <th>Principle Employer</th>
                                <th>Over Dues</th>
                                <th>Salary Dues</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Paid By</th>
                                <th>authorized By</th>
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
        </div>
    </div>
</div>
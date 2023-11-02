<div class="content">
            <h4 class="text-indianred"><?php echo anchor('Executive/add', 'Click here for new executive registration   <i class="material-icons">group_add</i>'); ?></h4>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($emp as $emp_item): ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats text-indianred">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <a class="emp-imageover" target="_blank" href="Employee/details/<?php echo $emp_item["empid"] ?>">
                                    <?php
                                    $filename = "./assets/profile_pics/" . $emp_item["photo"];
                                    if (file_exists($filename)) {
                                        $url = $filename;
                                    } else {
                                        $url = 'https://image.flaticon.com/icons/svg/783/783192.svg';
                                    }
                                    ?>
                                    <img class="emp-author-image emp-clickcircle" src="<?php echo $url ?>" alt="">
                                </a>
                            </div>
                            <p class="card-category"><a href="#"><i class="fa fa-phone"></i> <?php echo $emp_item["phone_no"] ?></a></p>
                            <h3 class="card-title">
                                <small></small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-primary">navigate_next</i>
                                <a href="Executive/details/<?php echo $emp_item["empid"] ?>" ><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endforeach; ?>                
        </div>
    </div>
</div>
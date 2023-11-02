<?php
/*  if (isset($success)) {
        echo 'User record inserted successfully';
    }
    if (isset($postdata)) {
        echo 'User record inserted successfully'.$postdata;
    }
    helper('form');
    $attributes = array('name' => 'frmRegistration', 'id' => 'msform', 'enctype' => 'multipart/form-data');
    echo form_open('applnentry', $attributes)
?>
<!-- div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-12 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Enroll Form</h2>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="column-full padding-t-5">
                                    <div class="column-half">
                                        <!-- First Column (Basic Information) - ->
                                        <div class="column-half">
                                            <div class="group">  
                                                <?php
                                                echo form_input(array(
                                                    'type' => 'text',
                                                    'name' => 'firstname',
                                                    'id' => 'firstname',
                                                    'required' => '',
                                                    'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                                    'value' => set_value('firstname')));
                                                ?>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label for="firstname">First Name</label>
                                                <span class="signup-error"><?php echo validation_show_error('firstname'); ?></span>
                                            </div>                                                       
                                        </div>
                                        <div class="column-half">
                                            <div class="group">  
                                                <?php
                                                echo form_input(array(
                                                    'type' => 'text',
                                                    'name' => 'firstname',
                                                    'id' => 'firstname',
                                                    'required' => '',
                                                    'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                                    'value' => set_value('firstname')));
                                                ?>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label for="firstname">Phone No</label>
                                                <span class="signup-error"><?php echo validation_show_error('firstname'); ?></span>
                                            </div>                                                       
                                        </div>
                                        <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div -->
 */ ?>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-6">No Records Found</div>
        <div class="col-md-4">
            <div class="card card-signup">
                <form action="applicant" class="remember-login-frm" id="remember-login-frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon"><i class="material-icons">diversity_3</i></div>
                        <h3 class="card-title">Lead Call Data from Ads<small></small></h3>
                    </div>
                    <div class="card-body">
                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="enroll_name" name="enroll_name" placeholder="Name *" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="enroll_phone" name="enroll_phone" placeholder="Phone *" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="enroll_area" name="enroll_area" placeholder="Area *" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="enroll_jobpos" name="enroll_jpbpos" placeholder="Job Seeking For *" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="finish" id="finish" class="btn-purple btn rounded-right float-right">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
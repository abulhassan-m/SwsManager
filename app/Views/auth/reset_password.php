<div class="text-center">
    <h2>Reset your password</h2>
    <h5>Hello <span><?php echo $firstName; ?></span>, Please enter your new password </h5>     
<?php helper('form');
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'reset_password/token/'.$token, $fattr); ?>
     <div class="row justify-content-center">
    <div class="col-log pb-5">
        <!--Form with header-->
            <div class="card border-red rounded-0">
                <div class="card-header p-0">
                    <div class="bg-dc3545 text-white text-center py-2">
                        <h5> <i class="fa fa-lock"></i> Forgot Password</h5>
                    </div>
                </div>
                <div class="card-body p-3">     
    
    <div class="form-group">
      <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-envelope text-red"></i></div>
                            </div><?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo validation_show_error('password') ?>
      </div>
    </div>
    
    <div class="form-group">
        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-envelope text-red"></i></div>
                            </div>
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
      <?php echo validation_show_error('passconf') ?>
        </div>
    </div>
    
    <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
                </div>
            </div>
    </div>
     </div>
    <?php echo form_close(); ?>
 
</div>
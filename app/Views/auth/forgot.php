
  
<p class="text-red text-center">Please enter your email address and we'll send you instructions on how to reset your password</p>
   
    <?php helper('form');
    $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'forgot', $fattr); ?>
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
                            </div>
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
        </div>
      <?php echo validation_show_error('email') ?>
    <?php echo form_submit(array('value'=>'Send Verification Link', 'class'=>'btn btn-lg btn-dc3545 btn-block')); ?>
    </div>
    </div>
            </div>
    </div>
    </div>
    <?php echo form_close(); ?>    

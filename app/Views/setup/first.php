<div class="col-lg-12 col-lg-offset-12 text-center">
    <h4>Fist Setup</h4>
    <h5>Please enter the required information below.</h5>   
    <div class="row justify-content-center">
        <div class="col-log pb-5">
            <?php
            helper('form');
            $fattr = array('class' => 'form-signin');
            echo form_open('register', $fattr);
            ?>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-red"></i></div>
                    </div>
                    <?php echo form_input(array('name' => 'firstname', 'id' => 'firstname', 'placeholder' => 'First Name', 'class' => 'form-control', 'value' => set_value('firstname'))); ?>
                    <?= validation_show_error('firstname') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-red"></i></div>
                    </div>
                    <?php echo form_input(array('name' => 'lastname', 'id' => 'lastname', 'placeholder' => 'Last Name', 'class' => 'form-control', 'value' => set_value('lastname'))); ?>
                    <?= validation_show_error('lastname') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-red"></i></div>
                    </div>
                    <?php echo form_input(array('name' => 'email', 'id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'value' => set_value('email'))); ?>
                    <?= validation_show_error('email') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-red"></i></div>
                    </div>
                    <?php echo form_input(array('name' => 'username', 'id' => 'username', 'placeholder' => 'User Name', 'class' => 'form-control', 'value' => set_value('username'))); ?>
                    <?= validation_show_error('username') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key text-red"></i></div>
                    </div><?php echo form_password(array('name' => 'password', 'id' => 'password', 'placeholder' => 'Password', 'class' => 'form-control', 'value' => set_value('password'))); ?>
                    <?= validation_show_error('password') ?>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key text-red"></i></div>
                    </div>
                    <?php echo form_password(array('name' => 'passconf', 'id' => 'passconf', 'placeholder' => 'Confirm Password', 'class' => 'form-control', 'value' => set_value('passconf'))); ?>
                    <?= validation_show_error('passconf') ?>
                </div>
            </div>
            <?php echo form_submit(array('value' => 'Sign up', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
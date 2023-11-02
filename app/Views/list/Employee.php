<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="center">
                    <?php
                    if (count($emp) == 0) {
                        echo "No records Found";
                    }
                    foreach ($emp as $emp_item) : ?>
                        <div class="col-lg-3 card">
                            <figure class="emp-image-figure">
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
                                    <div class="emp-imageover-color"></div>
                                    <img class="emp-imageover-image emp-clickcircle" src="https://image.flaticon.com/icons/svg/783/783192.svg" />
                                </a>
                                <figcaption>
                                    <div class="emp-author-figure-title"><a href="Employee/details/<?php echo $emp_item["empid"] ?>"><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?></a></div>
                                    <div class="emp-author-figure-title"><a href="#"><i class="fa fa-phone"></i> <?php echo $emp_item["phone_no"] ?></a></div>
                                </figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card card-signup">
                <?php helper('form');
                        $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
                        echo form_open('Employee/add', $attributes);
                        ?>
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon"><i class="material-icons">diversity_3</i></div>
                        <h3 class="card-title">New Employee Registration<small></small></h3>
                    </div>
                    <div class="card-body">
                        
                        <!-- field sets 1 Basic Information -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row pt-5">
                                            <!-- First col-lg (Basic Information-->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                        <?php
                                                        echo form_input(array(
                                                            'type' => 'text',
                                                            'name' => 'firstname',
                                                            'id' => 'firstname',
                                                            'required' => '',
                                                            'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                                            'value' => set_value('firstname'),
                                                            'class' => 'form-control input-group-text'
                                                        ));
                                                        ?>
                                                        <label for="firstname"><i class="fa fa-user"></i> First Name</label>
                                                        <span class="signup-error"><?php echo validation_show_error('firstname'); ?></span>
                                                </div>
                                            </div>
                                            <!--Last Name-->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'text',
                                                        'name' => 'lastname',
                                                        'id' => 'lastname',
                                                        'required',
                                                        'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                                        'value' => set_value('lastname'),
                                                        'class' => 'form-control input-group-text'
                                                    ));
                                                    ?>
                                                    <label for="lastname">Last Name</label>
                                                    <span class="signup-error"><?php echo validation_show_error('lastname'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3">
                                            <!-- Blood Group Selection-->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'text',
                                                        'name' => 'blood',
                                                        'id' => 'blood',
                                                        'class' => 'form-control input-group-text'
                                                    ));
                                                    ?>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Blood Group</label>
                                                    <span class="signup-error"><?php echo validation_show_error('blood'); ?></span>
                                                </div>
                                            </div>
                                            <!--- Blood Group Selection  Ended-->

                                            <!---  Place of Birth Selection-->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'text',
                                                        'name' => 'pobirth',
                                                        'id' => 'pobirth',
                                                        'class' => 'form-control input-group-text'
                                                    ));
                                                    ?>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label for="pobirth">Place of Birth</label>
                                                    <span class="signup-error"><?php echo validation_show_error('pobirth'); ?></span>
                                                </div>
                                            </div>
                                            <!--- Place of Birth  Selection  Ended-->
                                        </div>
                                        <div class="row pt-3">
                                            <!-- Phone -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?= form_input(array(
                                                        'type' => 'text',
                                                        'class' => 'form-control input-group-text',
                                                        'name' => 'phone',
                                                        'id' => 'phone'
                                                    )); ?>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Phone</label>
                                                    <span class="signup-error"><?= validation_show_error('phone'); ?></span>
                                                </div>
                                            </div>
                                            <!--Phone end             
                                                    email-->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'text',
                                                        'name' => 'email',
                                                        'id' => 'email',
                                                        'class' => 'form-control input-group-text'
                                                    ));
                                                    ?>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Email</label>
                                                    <span class="signup-error"><?php echo validation_show_error('email'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--email end
                                                            Address-->
                                        <div class="row pt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_textarea(array(
                                                        'name' => 'address',
                                                        'id' => 'address',
                                                        'class' => 'form-control textarea',
                                                        'rows' => '3',
                                                        'cols' => '5'
                                                    ));
                                                    ?>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Address</label>
                                                    <span class="signup-error"><?php echo validation_show_error('address'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3">

                                            <!-- Address end  Country Selection -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    $opt_countries = array('' => 'Select a Country');
                                                    foreach ($geCountries as $key => $element) {
                                                        $opt_countries[$element['country_id']] = $element['country_name'];
                                                    }
                                                    echo form_dropdown(array('name' => 'country', 'class' => 'form-control',  'id' => 'country'), $opt_countries, '98'); //, 'disabled="disabled"');
                                                    ?>
                                                </div>
                                            </div>

                                            <!--- Country Selection  Ended - State Selection -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    $opt_state = array('' => 'Select a State');

                                                    foreach ($geStates as $key => $element) {
                                                        $opt_state[$element['state_id']] = $element['state_name'];
                                                    }
                                                    echo form_dropdown(array('name' => 'state', 'class' => 'form-control',  'id' => 'state'), $opt_state);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3">
                                            <!--- State Selection  Ended - City Selection -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    $opt_city = array('' => 'Select a City');
                                                    echo form_dropdown(array('name' => 'city', 'class' => 'form-control', 'id' => 'city'), $opt_city);
                                                    ?>
                                                </div>
                                            </div>
                                            <!--- City Selection  Ended  -->
                                            <!--  pincode -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'text',
                                                        'name' => 'pincode',
                                                        'id' => 'pincode',
                                                        'class' => 'form-control input-group-text'
                                                    ));
                                                    ?>
                                                    <label>Pincode</label>
                                                    <span class="signup-error"><?php echo validation_show_error('pincode'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- pincode end -->
                                        <div class="row pt-3">
                                            <div class="col-lg-6">
                                                <!--- DOB Selection-->
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'date',
                                                        'name' => 'dobirth',
                                                        'id' => 'dobirth',
                                                        'class' => 'form-control'
                                                    ));
                                                    ?>
                                                    <label>Date of Birth</label>
                                                    <span class="signup-error"><?php echo validation_show_error('dobirth'); ?></span>
                                                </div>

                                                <!---DOB Selection  Ended-->
                                            </div>
                                            <div class="col-lg-6">
                                                <!---Gender Selection-->
                                                <div class="form-group">
                                                    <?php
                                                    echo form_dropdown(array('name' => 'gender', 'id' => 'gender', 'class' => 'form-control',  'required' => ''), array(' ' => 'Gender Select', 'Male' => 'Male', 'Femaile' => 'Female', 'Transgender' => 'Transgender'));
                                                    ?>
                                                    <span class="signup-error"><?php echo validation_show_error('gender'); ?></span>
                                                </div>

                                                <!--- Gender Selection  Ended-->
                                            </div>
                                        </div>
                                        <div class="row pt-3">

                                            <div class="col-lg-6">
                                                <!--- Marital Status Selection-->
                                                <div class="form-group">
                                                    <?php
                                                    echo form_dropdown(array('name' => 'matstat', 'id' => 'matstat', 'class' => 'form-control',  'required' => ''), array(' ' => 'Marital Status', 'Single' => 'Single', 'Married' => 'Married', 'Widow' => 'Widow', 'Separated' => 'Separated', 'Divorcee' => 'Divorcee'));
                                                    ?>
                                                    <span class="signup-error"><?php echo validation_show_error('matstat'); ?></span>
                                                </div>

                                                <!--- Marital Status  Selection  Ended-->
                                            </div>
                                            <div class="col-lg-6">
                                                <!--- DOJ Selection-->
                                                <div class="form-group">
                                                    <?php
                                                    echo form_input(array(
                                                        'type' => 'date',
                                                        'name' => 'dojoin', 'class' => 'form-control',
                                                        'id' => 'dojoin'
                                                    ));
                                                    ?>
                                                    <label>Date of Join</label>
                                                    <span class="signup-error"><?php echo validation_show_error('dojoin'); ?></span>
                                                </div>

                                                <!--- DOJ Selection  Ended-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer">
                        <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'btn btn-primary submit action-button', 'value' => 'Finish')); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
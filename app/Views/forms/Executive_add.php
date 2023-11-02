<div class="content">
    <div class="container-fluid">
        <div class="row"><!-- progress bar -->
            <div class="col-12">
                <ul id="progressbar">
                    <li class="active" id="personal"><strong>Personal</strong></li>
                    <li id="family"><strong>Family</strong></li>
                    <li id="qualify"><strong>Qualification</strong></li>
                    <li id="payment"><strong>Bank </strong></li>
                    <li id="contact"><strong>Contact</strong></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- Registration Form Started -->
    <?php
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('Employee/add', $attributes);
    ?>
    <!-- field sets 1 Basic Information -->
     <fieldset>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Basic Information</h4>
                  <p class="card-category">Step 1 - 6</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <!--<div class="col-md-4">-->
                          <div class="col-md-3">
                              <div class="card-header">
                                  <h4 class="card-title">Name of the Executive</h4>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <?= form_input(array('type' => 'text','name' => 'firstname','class' => 'form-control','id' => 'firstname','pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}','value' => set_value('firstname'))); ?>
                                              <label class="bmd-label-floating">First Name</label>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <?= form_input(array('type' => 'text','class' => 'form-control','name' => 'lastname','id' => 'lastname')); ?>
                                               <label class="bmd-label-floating">Last Name</label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>                        
                      <!--</div>-->
                      <!--<div class="col-md-6">-->
                          <div class="col-md-7">
                              <div class="card-header"><h4 class="card-title">Demographics</h4></div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                             <?= form_dropdown(array('name' => 'gender', 'id' => 'gender','class'=> "form-control", 'required' => ''), array(' ' => 'Gender', 'Male' => 'Male', 'Femaile' => 'Female', 'Transgender' => 'Transgender')); ?>
                                               <label class="bmd-label-floating">Gender </label>
                                          </div>
                                      </div>                                      
                                      <div class="col-md-3">
                                          <div class="form-group">
                                             <?= form_input(array('type' => 'text','name' => 'blood','class'=> "form-control",'id' => 'blood')); ?>
                                               <label class="bmd-label-floating">Blood Group</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                             <?= form_input(array('type' => 'text','name' => 'height','class'=> "form-control",'id' => 'height')); ?>
                                               <label class="bmd-label-floating">Height</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <?= form_input(array('type' => 'text','name' => 'weight','class'=> "form-control",'id' => 'weight')); ?>
                                               <label class="bmd-label-floating"> Weight</label>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-3">
                                          <div class="form-group">
                                               <?= form_input(array('type' => 'text','class'=>'form-control','name' => 'religion','id' => 'religion')); ?>
                                               <label class="bmd-label-floating">Religion</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'community','class'=>'form-control',
                                'id' => 'community'));
                            ?>
                                               <label class="bmd-label-floating"> Community</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'pobirth','class'=>'form-control',
                                'id' => 'pobirth'));
                            ?>
                                               <label class="bmd-label-floating"> Place of Birth</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'proofmen','class'=>'form-control',
                                'id' => 'proofmen'));
                            ?>
                                               <label class="bmd-label-floating">Proof Mention</label>
                                          </div>
                                      </div>                                      
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                 <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'proofid','class'=>'form-control',
                                'id' => 'proofid'));
                            ?>
                                               <label class="bmd-label-floating">Proof Id</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'dobirth','class'=>'form-control',
                                'id' => 'dobirth'));
                            ?>
                                               <label class="bmd-label-floating">Date of Birth Qualification</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_dropdown(array('name' => 'matstat','class'=>'form-control', 'id' => 'matstat', 'required' => ''), array(' ' => '', 'Single' => 'Single', 'Married' => 'Married', 'Widow' => 'Widow', 'Separated' => 'Separated', 'Divorcee' => 'Divorcee'));
                            ?>
                                               <label class="bmd-label-floating">Marital Status</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'dojoin','class'=>'form-control',
                                'id' => 'dojoin'));
                            ?>
                                               <label class="bmd-label-floating">Date of Join</label>
                                          </div>
                                      </div>
                                  </div>                                  
                              </div>
                          </div>
                      <!--</div>-->
                        
                        <!--<div class="col-md-2">-->
                            <div class="col-md-2">
                              <div class="card-header"><h4 class="card-title">Photo</h4></div>
                              <div class="card-body">
                    <div style="width: 100%; padding-top:100%; ">
                        <div id="profile" style="position: absolute;  top: 0; left: 0;  bottom: 0;  right: 0;">
                            <div class="dashes"></div>
                            <label>Click to browse or drag an image here</label>
                        </div>
                    </div>
                    <?php
                    echo form_input(array(
                        'type' => 'file',
                        'name' => 'mediafile',
                        'id' => 'mediafile',
                        'accept' => 'image/*',
                        'capture' => 'camera'));
                    ?>
                              </div>
                <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"><div></div></script>
                            </div>
                    </div> 
                                        
                    <?php
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'next',
                          'class' => 'next btn btn-primary pull-right',
                          'value' => 'Next'));
                      ?>
                </div>
              </div>
    </fieldset>
    <!-- field sets 2 Family Information -->
    <fieldset>
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Family Information:</h4>
                  <p class="card-category">Step 2 - 6</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                     <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nosch',
                        'class' => 'form-control',
                        'id' => 'nosch'));
                    ?>
                    <label  class="bmd-label-floating">No of Family Members</label>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 navbar-btn table-responsive" id='relTable'></div>
                    </div>
                </div>
                  <div class="card-footer">
                      <?php
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'previous',
                          'class' => 'previous  btn btn-primary pull-left',
                          'value' => 'Previous'));
                      
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'next',
                          'class' => 'next  btn btn-primary pull-right',
                          'value' => 'Next'));
                      ?>
                  </div>
              </div>
        
        <?php
        
        ?>
    </fieldset>
    <fieldset>
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"> Qualification:</h4>
                  <p class="card-category">Step 3 - 6</p>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'eduqua', 'class' => 'form-control',
                            'id' => 'eduqua'));
                        ?>
                        <label  class="bmd-label-floating">Education Qualification</label>
                    </div>
                    <div class="form-group">
                         <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'yearexp', 'class' => 'form-control',
                        'id' => 'yearexp'));
                    ?>
                        <label  class="bmd-label-floating">Year of Experiance</label>
                    </div>
                    <div class="form-group">
                        <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'pubexp','class' => 'form-control',
                        'id' => 'pubexp'));
                    ?>
                        <label  class="bmd-label-floating">If any Experiance in Public Service?</label>
                    </div>
                    <div class="form-group">
                        <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nopubexp','class' => 'form-control',
                        'id' => 'nopubexp'));
                    ?>
                        <label  class="bmd-label-floating">No of Year Experiance in Public Service?</label>
                    </div>
                    <div class="form-group">
                        <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nopriexp','class' => 'form-control',
                        'id' => 'nopriexp'));
                    ?>
                        <label  class="bmd-label-floating">No of Years Experiance in Private Security?</label>
                    </div>
                    <div class="form-group">
                        <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'cerver','class' => 'form-control',
                        'id' => 'cerver'));
                    ?>
                        <label  class="bmd-label-floating">Certificate verification</label>
                    </div>
                    <div class="form-group">
                        <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'lang','class' => 'form-control',
                        'id' => 'lang'));
                    ?>
                        <label  class="bmd-label-floating">Languages Known</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                 <?php
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'previous',
                          'class' => 'previous  btn btn-primary pull-left',
                          'value' => 'Previous'));
                      
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'next',
                          'class' => 'next  btn btn-primary pull-right',
                          'value' => 'Next'));
                      ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"> Bank Details:</h4>
                  <p class="card-category">Step 4 - 6</p>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">                    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'accname', 'class' => 'form-control',
                                'id' => 'accname'));
                            ?> 
                            <label class="bmd-label-floating">Account Name</label>
                        </div>                                                       
                    </div>
                    <div class="col-3">
                        <div class="form-group">                    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'accno', 'class' => 'form-control',
                                'id' => 'accno'));
                            ?> 
                            <label class="bmd-label-floating">Account No</label>
                        </div>                                                       
                    </div>
                    <div class="col-3">
                        <div class="form-group">                    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'bankname', 'class' => 'form-control',
                                'id' => 'bankname'));
                            ?> 
                            <label class="bmd-label-floating">Bank Name</label>
                        </div>                                                       
                    </div>
                    <div class="col-3">
                        <div class="form-group">                    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'branchname', 'class' => 'form-control',
                                'id' => 'branchname'));
                            ?> 
                            <label class="bmd-label-floating">Branch Name</label>
                        </div>                                                       
                    </div>
                    <div class="col-3">
                        <div class="form-group">                    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'ifsc', 'class' => 'form-control',
                                'id' => 'ifsc'));
                            ?> 
                            <label class="bmd-label-floating">IFS Code</label>
                        </div>                                                       
                    </div>
                </div>
            </div>
            <div class="card-footer">
                 <?php
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'previous',
                          'class' => 'previous  btn btn-primary pull-left',
                          'value' => 'Previous'));
                      
                      echo form_input(array(
                          'type' => 'button',
                          'name' => 'next',
                          'class' => 'next  btn btn-primary pull-right',
                          'value' => 'Next'));
                      ?>
            </div>
        </div>
        
    </fieldset>
    <fieldset>
        <div class="card">
             <div class="card-header card-header-primary">
                  <h4 class="card-title"> Contact Information:</h4>
                  <p class="card-category">Step 5 - 6</p>
                </div>
            <div class="card-body">
                <div class="row">
            <!-- Phone -->
            <div class="col-md-3">
                <div class="form-group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'phone','class'=>'form-control',
                        'id' => 'phone'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Phone</label>
                    <span class="signup-error"><?php echo form_error('phone'); ?></span>
                </div>                                                       
            </div>
            <!-- Phone end             
                 email -->
            <div class="column-33">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'email',
                        'id' => 'email'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                    <span class="signup-error"><?php echo form_error('email'); ?></span>
                </div>                                                       
            </div>
            <!--email end 
                Address -->
            <div class="column-66">
                <div class="group">
                    <?php
                    echo form_textarea(array('name' => 'address',
                        'id' => 'address',
                        'class' => 'textarea',
                        'rows' => '3',
                        'cols' => '5'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Address</label>
                    <span class="signup-error"><?php echo form_error('address'); ?></span>
                </div>                                                       
            </div>
            <!-- Address end                             
                 Country Selection -->
            <div class="column-16">
                <div class="group">                       
                    <?php
                    $opt_countries = array(''=>'Select a Country');
                    foreach ($geCountries as $key => $element) {
                        $opt_countries[$element['country_id']] = $element['country_name'];
                    }
                    echo form_dropdown(array('name' => 'country', 'id' => 'country'), $opt_countries,'98', 'disabled="disabled"');
                    ?>
                    <span class="select-highlight"></span>
                    <span class="select-bar"></span>
                    <label class="select-label">Country</label>
                </div>
            </div>
            <!--- Country Selection  Ended                                 
                - State Selection -->
            <div class="column-16">
                <div class="group">                       
                    <?php
                    $opt_state = array('' => 'Select a State');
                    
                    foreach ($geStates as $key => $element) {
                        $opt_state[$element['state_id']] = $element['state_name'];
                    }
                    echo form_dropdown(array('name' => 'state', 'id' => 'state'), $opt_state);
                    ?>
                    <span class="select-highlight"></span>
                    <span class="select-bar"></span>
                    <label class="select-label">State</label>
                </div>
            </div>
            <!--- State Selection  Ended                                
                - City Selection -->
            <div class="column-16">
                <div class="group">                       
                    <?php
                    $opt_city = array('' => '');
                    echo form_dropdown(array('name' => 'city', 'id' => 'city'), $opt_city);
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>City</label>
                </div>
            </div>
                <!--- City Selection  Ended  -->
                <!--  pincode -->
                <div class="column-16">
                    <div class="group">             
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'pincode',
                            'id' => 'pincode'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Pincode</label>
                        <span class="signup-error"><?php echo form_error('pincode'); ?></span>
                    </div>                                                       
                </div>
                <!-- pincode end -->
            </div>
        
        
            <div class="card-footer">
                 <?= form_input(array(
                          'type' => 'button',
                          'name' => 'previous',
                          'class' => 'previous  btn btn-primary pull-left',
                          'value' => 'Previous'));
                      ?>
                <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit btn btn-primary pull-right', 'value' => 'Finish')); ?>   
            </div>
        </div>
    </fieldset>
    
    <?php echo form_close(); ?>
            </div>
    </div>
</div>
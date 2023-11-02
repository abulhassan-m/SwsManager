<div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="container">
    <!-- progress bar -->
    <ul id="progressbar">
        <li class="active" id="personal"><strong>Personal</strong></li>
        <li id="family"><strong>Family</strong></li>
        <li id="qualify"><strong>Qualification</strong></li>
        <li id="payment"><strong>Bank Details</strong></li>
        <li id="contact"><strong>Contact Information</strong></li>
        <li id="confirm"><strong>Finish</strong></li>
    </ul>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <!-- Registration Form Started -->
              </div>
          </div>
          <div class="row">
    <?php helper('form');
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('Employee/add', $attributes);
    ?>
    <!-- field sets 1 Basic Information -->
    <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Basic Information:</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 1 - 6</h2>
                </div>
            </div>
            <div class="column-full padding-t-5">
                <div class="column-half">
                    <!-- First Column (Basic Information) -->
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
                    <!--Last Name--> 
                    <div class="column-half">
                        <div class="group">  
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'lastname',
                                'id' => 'lastname',
                                'required' => '',
                                'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                'value' => set_value('lastname')));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="lastname">Last Name</label>
                            <span class="signup-error"><?php echo validation_show_error('lastname'); ?></span>
                        </div>                                                       
                    </div>
                    <!-- Blood Group Selection -->
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'blood',
                                'id' => 'blood'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Blood Group</label>
                            <span class="signup-error"><?php echo validation_show_error('blood'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Blood Group Selection  Ended-->
                    <!--- Height Status Selection-->                     
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'height',
                                'id' => 'height'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Height</label>
                            <span class="signup-error"><?php echo validation_show_error('height'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Height Status  Selection  Ended-->
                    <!--- Weight Status Selection-->                     
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'weight',
                                'id' => 'weight'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Weight</label>
                            <span class="signup-error"><?php echo validation_show_error('weight'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Weight Status  Selection  Ended-->
                    <!--- Religion Selection-->                    
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'religion',
                                'id' => 'religion'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Religion</label>
                            <span class="signup-error"><?php echo validation_show_error('religion'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Religion Selection  Ended-->
                    <!--- Community Selection-->                  
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'community',
                                'id' => 'community'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Community</label>
                            <span class="signup-error"><?php echo validation_show_error('community'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Community Selection  Ended -->
                    <!---  Place of Birth Selection-->                  
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'pobirth',
                                'id' => 'pobirth'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="pobirth">Place of Birth</label>
                            <span class="signup-error"><?php echo validation_show_error('pobirth'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Place of Birth  Selection  Ended-->
                    <!--- Proof of Identification -->                  
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'proofmen',
                                'id' => 'proofmen'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Proof Mentioned</label>
                            <span class="signup-error"><?php echo validation_show_error('proofmen'); ?></span>
                        </div>                                                       
                    </div>                 
                    <div class="column-half">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'proofid',
                                'id' => 'proofid'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Proof ID</label>
                            <span class="signup-error"><?php echo validation_show_error('proofid'); ?></span>
                        </div>                                                       
                    </div>
                    <!---  Proof of Identification Ended-->
                    <!-- Phone -->
            <div class="column-half">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'class'=> 'input-group-text',
                        'name' => 'phone',
                        'id' => 'phone'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Phone</label>
                    <span class="signup-error"><?php echo validation_show_error('phone'); ?></span>
                </div>                                                       
            </div>
            <!-- Phone end             
                 email -->
            <div class="column-half">
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
                    <span class="signup-error"><?php echo validation_show_error('email'); ?></span>
                </div>                                                       
            </div>
            <!--email end 
                Address -->
            <div class="column-full">
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
                    <span class="signup-error"><?php echo validation_show_error('address'); ?></span>
                </div>                                                       
            </div>
            <!-- Address end                             
                 Country Selection -->
            <div class="column-half">
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
            <div class="column-half">
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
            <div class="column-half">
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
                <div class="column-half">
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
                        <span class="signup-error"><?php echo validation_show_error('pincode'); ?></span>
                    </div>                                                       
                </div>
                <!-- pincode end -->
                </div>
                <div class="column-16">
                    <!--- DOB Selection-->                
                    <div class="column-full">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'dobirth',
                                'id' => 'dobirth'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Date of Birth</label>
                            <span class="signup-error"><?php echo validation_show_error('dobirth'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- DOB Selection  Ended-->
                    <!--- Gender Selection-->               
                    <div class="column-full">
                        <div class="group">    
                            <?php
                            echo form_dropdown(array('name' => 'gender', 'id' => 'gender', 'required' => ''), array(' ' => '', 'Male' => 'Male', 'Femaile' => 'Female', 'Transgender' => 'Transgender'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Gender</label>
                            <span class="signup-error"><?php echo validation_show_error('gender'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Gender Selection  Ended--> 
                    <!--- Marital Status Selection-->              
                    <div class="column-full">
                        <div class="group">    
                            <?php
                            echo form_dropdown(array('name' => 'matstat', 'id' => 'matstat', 'required' => ''), array(' ' => '', 'Single' => 'Single', 'Married' => 'Married', 'Widow' => 'Widow', 'Separated' => 'Separated', 'Divorcee' => 'Divorcee'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Marital Status</label>
                            <span class="signup-error"><?php echo validation_show_error('matstat'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- Marital Status  Selection  Ended-->
                    <!--- DOJ Selection-->          
                    <div class="column-full">
                        <div class="group">    
                            <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'dojoin',
                                'id' => 'dojoin'));
                            ?>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Date of Join</label>
                            <span class="signup-error"><?php echo validation_show_error('dojoin'); ?></span>
                        </div>                                                       
                    </div>
                    <!--- DOJ Selection  Ended-->
                </div>
                <!--                   Photo                                             -->
                <div class="column-33">
                    <h4>Photo </h4>
                    <div style="width: 100%; padding-top: 100%;  position: relative;">
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
            'class' => 'next action-button',
            'value' => 'Next'));
        ?>
    </fieldset>
    <!-- field sets 2 Family Information -->
    <fieldset>
        <div class="form-control">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Family Information:</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 2 - 6</h2>
                </div>
            </div>  
            <div class="column-quad">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nosch',
                        'id' => 'nosch'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>No of Family Members</label>
                    <span class="signup-error"><?php echo validation_show_error('nosch'); ?></span>
                </div>                                                       
            </div>
            <div class="column-full navbar-btn" id='relTable'></div>                
        </div> 
        <?php
        echo form_input(array(
            'type' => 'button',
            'name' => 'next',
            'class' => 'next action-button',
            'value' => 'Next'));
        echo form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'));
        ?>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Qualification</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 3 - 6</h2>
                </div>
            </div> 
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'eduqua',
                        'id' => 'eduqua'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Education Qualification</label>
                    <span class="signup-error"><?php echo validation_show_error('eduqua'); ?></span>
                </div>                                                       
            </div>

            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'yearexp',
                        'id' => 'yearexp'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Year of Experiance</label>
                    <span class="signup-error"><?php echo validation_show_error('yearexp'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'pubexp',
                        'id' => 'pubexp'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>If any Experiance in Public Service?</label>
                    <span class="signup-error"><?php echo validation_show_error('pubexp'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nopubexp',
                        'id' => 'nopubexp'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>No of Year Experiance in Public Service?</label>
                    <span class="signup-error"><?php echo validation_show_error('nopubexp'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'nopriexp',
                        'id' => 'nopriexp'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>No of Years Experiance in Private Security?</label>
                    <span class="signup-error"><?php echo validation_show_error('nopriexp'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'cerver',
                        'id' => 'cerver'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Certificate verification</label>
                    <span class="signup-error"><?php echo validation_show_error('cerver'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'lang',
                        'id' => 'lang'));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Languages Known</label>
                    <span class="signup-error"><?php echo validation_show_error('lang'); ?></span>
                </div>                                                       
            </div>
        </div> 
        <?php
        echo form_input(array(
            'type' => 'button',
            'name' => 'next',
            'class' => 'next action-button',
            'value' => 'Next'));
        echo form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'));
        ?>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Bank Details:</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 4 - 6</h2>
                </div>
            </div> 
            <div class="column-33">
                <div class="group">                    
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'accname',
                        'id' => 'accname'));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account Name</label>
                    <span class="signup-error"><?php echo validation_show_error('accname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">              
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'accno',
                        'id' => 'accno'));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account No</label>
                    <span class="signup-error"><?php echo validation_show_error('accno'); ?></span>
                </div>                                                       
            </div><div class="column-33">
                <div class="group">               
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'bankname',
                        'id' => 'bankname'));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Bank Name</label>
                    <span class="signup-error"><?php echo validation_show_error('bankname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'branchname',
                        'id' => 'branchname'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Branch Name</label>
                    <span class="signup-error"><?php echo validation_show_error('branchname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'ifsc',
                        'id' => 'ifsc'));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>IFS Code</label>
                    <span class="signup-error"><?php echo validation_show_error('ifsc'); ?></span>
                </div>                                                       
            </div>
        </div>
        <?php
        echo form_input(array(
            'type' => 'button',
            'name' => 'next',
            'class' => 'next action-button',
            'value' => 'Next'));
        echo form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'));
        ?>
    </fieldset>
    <fieldset>
        <div class="form-control">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Contact Information</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 5 - 6</h2>
                </div>
            </div>
            
            </div>
            <?= form_input(array(
                'type' => 'button',
                'name' => 'previous',
                'class' => 'previous action-button',
                'value' => 'Previous')); ?>
            <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>            
    </fieldset>
    
    <fieldset>
        <div class="form-control">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Error Loading</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2"></h2>
                </div>
            </div>
            <h2 class="red-text"><strong>Error !</strong></h2> <br>
            <div class="column-full">
                <div class="red-text text-center">
                    <p> Please try again from the beginnings </p>
                    
                    <p style="color:green; font-style:bold"><?php echo session()->get('msg_success'); ?></p>
                    <p style="color:red; font-style:bold"><?php echo session()->get('msg_error'); ?></p>
                </div>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
        </div>
</div>

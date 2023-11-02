<div class="container">
    <!-- Registration Form Started -->
    <?php
    helper('form');
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('Clients/add', $attributes);
    ?>

    <div class="card card-signup">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon"><i class="material-icons">diversity_3</i></div>
            <h3 class="card-title">New Client Registration<small></small></h3>
        </div>
        <div class="card-body">
            <!-- field sets 1 Basic Information -->
            <fieldset>
                <div class="form-card">
                    <div class="col-lg-12 pt-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cname',
                                        'id' => 'cname',
                                        'required' => '',
                                        'class' => 'form-control',
                                        'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                        'value' => set_value('cname')
                                    ));
                                    ?>
                                    <label for="cname">Company Name</label>
                                    <span class="signup-error"><?php echo validation_show_error('cname'); ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <!--   Photo    -->

                            <h4>Logo </h4>
                            <div style="width: 100%; padding-top: 50%; position: relative;">
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
                                'capture' => 'camera'
                            ));
                            ?>
                            <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js">
                                <div> </div>
                            </script>
                            <!-- End Phot0 -->
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <?php
                                    echo form_textarea(array(
                                        'name' => 'caddress',
                                        'id' => 'caddress',
                                        'class' => 'form-control textarea',
                                        'rows' => '3',
                                        'cols' => '5'
                                    ));
                                    ?>
                                    <label>Address</label>
                                    <span class="signup-error"><?php echo validation_show_error('caddress'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?php
                                    $opt_countries = array('' => 'Select a Country');
                                    foreach ($geCountries as $key => $element) {
                                        $opt_countries[$element['country_id']] = $element['country_name'];
                                    }
                                    echo form_dropdown(array('name' => 'ccountry', 'id' => 'ccountry', 'class' => 'form-control'), $opt_countries, '98');
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?php
                                    $opt_state = array('' => 'Select a State');
                                    echo form_dropdown(array('name' => 'cstate', 'id' => 'cstate', 'class' => 'form-control'), $opt_state);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?php
                                    $opt_city = array('' => 'Select City');
                                    echo form_dropdown(array('name' => 'ccity', 'id' => 'ccity', 'class' => 'form-control'), $opt_city);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cpincode', 'class' => 'form-control',
                                        'id' => 'cpincode'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Pincode</label>
                                    <span class="signup-error"><?php echo validation_show_error('cpincode'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cphone', 'class' => 'form-control',
                                        'id' => 'cphone'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label for="cphone">Phone</label>
                                    <span class="signup-error"><?php echo validation_show_error('cphone'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cemail', 'class' => 'form-control',
                                        'id' => 'cemail'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label for="cemail">Email</label>
                                    <span class="signup-error"><?php echo validation_show_error('cemail'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cwww', 'class' => 'form-control',
                                        'id' => 'cwww'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label for="cwww">www</label>
                                    <span class="signup-error"><?php echo validation_show_error('cwww'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'gst', 'class' => 'form-control',
                                        'id' => 'gst'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label for="gst">G.S.T No.</label>
                                    <span class="signup-error"><?php echo validation_show_error('gst'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'pan', 'class' => 'form-control',
                                        'id' => 'pan'
                                    ));
                                    ?>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label for="pan">PAN.</label>
                                    <span class="signup-error"><?php echo validation_show_error('pan'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row-span">
                            
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="card-footer">
            <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'btn btn-primary submit action-button', 'value' => 'Finish')); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<!-- 
  <!- - field sets 2 Family Information -- >
  <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Services:</h2>
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
                        'name' => 'lsp',
                        'id' => 'lsp'
                    ));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>List of Service Provided</label>
                    <span class="signup-error"><?php echo validation_show_error('lsp'); ?></span>
                </div>                                                       
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
            $('#lsp').on('blur', function (e) {
                e.preventDefault();
                var dat = {lsp: parseInt(document.getElementById("lsp").value)};
                $.ajax({
                    url: 'http://[::1]/sec-web-app/Client_entry',
                    type: 'POST',
                    dataType: 'text',
                    data: dat,
                }).done(function (response) {
                    console.log(response);
                    //do something with the response
                }).fail(function () {
                    console.log("error");
                });
                var row = parseInt(document.getElementById("lsp").value);
                var tbody = '<table  class="table table-bordered padding-t-5"> <thead> <th>Sl.No</th> <th>Particulars</th> <th>No of Persons</th> <th>Working Hours</th> <th>Rate Finalized</th> <th>Salary Fixed</th> </thead><tbody> ';
                for (var r = 1; r <= row; r++) {
                    tbody += ' <tr><td>' + r + '</td> <td> <input type="text" name="lsp1' + r
                            + '" />  </td> <td> <input type="text" name="lsp2' + r + '" />  </td> <td> <input type="text" name="lsp3' + r + '" />  </td> <td> <input type="text" name="lsp4' + r +
                            '" />  </td> <td> <input type="text" name="lsp5' + r + '" /> </tr>';
                }
                tbody += ' </tbody>    </table>';
                var table = document.getElementById("lspTable");
                div = document.createElement('div');
                div.innerHTML = tbody;
                table.appendChild(div);
            });
            </script>  
            <div class="column-full navbar-btn" id='lspTable'></div>                
        </div> 
    </fieldset>
    <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">
                    <h2 class="subtitle1">Contact Persons:</h2>
                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 3 - 6</h2>
                </div>
            </div>  
            <div class="column-quad">
                <div class="group">
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'clct',
                        'id' => 'clct'
                    ));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Contact Person List</label>
                    <span class="signup-error"><?php echo validation_show_error('clct'); ?></span>
                </div>                                                       
            </div>
            <script>

                $('#clct').on('blur', function (e) {
                    e.preventDefault();
                    var dat = {clct: parseInt(document.getElementById("clct").value)};
                    $.ajax({
                        url: 'http://[::1]/sec-web-app/Client_entry',
                        type: 'POST',
                        dataType: 'text',
                        data: dat,
                    })
                            .done(function (response) {
                                console.log(response);
                                //do something with the response
                            })
                            .fail(function () {
                                console.log("error");
                            });
                    var row = parseInt(document.getElementById("clct").value);
                    var tbody = '<table  class="table table-bordered padding-t-5"> <thead> <th>Sl.No</th> <th>Name</th> <th>Designation</th> <th>Contact No</th> <th>Contact Email</th>' +
                            '</thead><!-- tbody id="data">     </tbody- -><tbody> ';
                    for (var r = 1; r <= row; r++) {
                        tbody += ' <tr><td>' + r + '</td> <td> <input type="text" name="clct1' + r
                                + '" />  </td> <td> <input type="text" name="clct2' + r + '" />  </td> <td> <input type="text" name="clct3' + r + '" />  </td> <td> <input type="text" name="clct4' + r + '" />  </td> </tr>';
                    }
                    tbody += ' </tbody>    </table>';
                    var table = document.getElementById("clctTable");
                    div = document.createElement('div');
                    div.innerHTML = tbody;
                    table.appendChild(div);

                });

            </script>  
            <div class="column-full navbar-btn" id='clctTable'></div>
        </div>
        <?php
        echo form_input(array(
            'type' => 'button',
            'name' => 'next',
            'class' => 'next action-button',
            'value' => 'Next'
        ));
        echo form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'
        ));
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
                        'name' => 'caccname',
                        'id' => 'caccname'
                    ));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account Name</label>
                    <span class="signup-error"><?php echo validation_show_error('caccname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">              
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'caccno',
                        'id' => 'caccno'
                    ));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account No</label>
                    <span class="signup-error"><?php echo validation_show_error('caccno'); ?></span>
                </div>                                                       
            </div><div class="column-33">
                <div class="group">               
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'cbankname',
                        'id' => 'cbankname'
                    ));
                    ?> 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Bank Name</label>
                    <span class="signup-error"><?php echo validation_show_error('cbankname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'cbranchname',
                        'id' => 'cbranchname'
                    ));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Branch Name</label>
                    <span class="signup-error"><?php echo validation_show_error('cbranchname'); ?></span>
                </div>                                                       
            </div>
            <div class="column-33">
                <div class="group">             
                    <?php
                    echo form_input(array(
                        'type' => 'text',
                        'name' => 'cifsc',
                        'id' => 'cifsc'
                    ));
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>IFS Code</label>
                    <span class="signup-error"><?php echo validation_show_error('cifsc'); ?></span>
                </div>                                                       
            </div>
        </div>
        <?php
        echo form_input(array(
            'type' => 'button',
            'name' => 'next',
            'class' => 'next action-button',
            'value' => 'Next'
        ));
        echo form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'
        ));
        ?>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <div class="column-full">
                <div class="column-half">

                </div>
                <div class="column-half">
                    <h2 class="subtitle2">Step 5 - 6</h2>
                </div>
            </div>            
            <div class="column-full">                
                <div class="column-half">
                    <div class="column-full">
                        <h2 class="subtitle1">Billing Info</h2>
                    </div>
                    <div class="column-66">
                        <!-- Start -- Billing Period Start Date -- >
                        <div class="column-full">
                            <div class="group">             
                                <?php
                                echo form_input(array(
                                    'type' => 'date',
                                    'name' => 'bpsd',
                                    'id' => 'bpsd'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Billing Period Start Date</label>
                                <span class="signup-error"><?php echo validation_show_error('bpsd'); ?></span>
                            </div>                                                       
                        </div> 
                        <!-- End -- Billing Period Start Date--> <!-- Start -- Billing address - ->
                        <div class="column-full">
                            <div class="group">
                                <?php
                                echo form_textarea(array(
                                    'name' => 'baddress',
                                    'id' => 'baddress',
                                    'class' => 'textarea',
                                    'rows' => '3',
                                    'cols' => '5'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Billing Address</label>
                                <span class="signup-error"><?php echo validation_show_error('baddress'); ?></span>
                            </div>                                                       
                        </div>
                    </div>
                    <!-- End -- Billing address --><!-- Address end                             
                         Country Selection -- >
                    <div class="column-33">
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_countries = array('' => 'Select a Country');
                                foreach ($geCountries as $key => $element) {
                                    $opt_countries[$element['country_id']] = $element['country_name'];
                                }
                                echo form_dropdown(array('name' => 'bcountry', 'id' => 'bcountry'), $opt_countries, '98');
                                ?>
                                <span class="select-highlight"></span>
                                <span class="select-bar"></span>
                                <label class="select-label">Country</label>
                            </div>
                        </div> <!--- Country Selection  Ended                                 
                            - State Selection - ->
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_state = array('' => 'Select a State');
                                echo form_dropdown(array('name' => 'bstate', 'id' => 'bstate'), $opt_state);
                                ?>
                                <span class="select-highlight"></span>
                                <span class="select-bar"></span>
                                <label class="select-label">State</label>
                            </div>
                        </div>
                        <!--- State Selection  Ended                                
                            - City Selection - ->
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_city = array('' => '');
                                echo form_dropdown(array('name' => 'bcity', 'id' => 'bcity'), $opt_city);
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>City</label>
                            </div>
                        </div>
                        <!--- City Selection  Ended  - ->
                        <!--  pincode -- >
                        <div class="column-full">
                            <div class="group">             
                                <?php
                                echo form_input(array(
                                    'type' => 'text',
                                    'name' => 'bpincode',
                                    'id' => 'bpincode'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pincode</label>
                                <span class="signup-error"><?php echo validation_show_error('bpincode'); ?></span>
                            </div>                                                       
                        </div>
                        <!-- pincode end -- >
                    </div>
                </div>              
                <div class="column-half">
                    <div class="column-full">
                        <h2 class="subtitle1">Deployment Info</h2>
                    </div>
                    <div class="column-66">
                        <!-- Start -- Deployment Date -- >
                        <div class="column-full">
                            <div class="group">             
                                <?php
                                echo form_input(array(
                                    'type' => 'date',
                                    'name' => 'dd',
                                    'id' => 'dd'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Deployment Date</label>
                                <span class="signup-error"><?php echo validation_show_error('dd'); ?></span>
                            </div>                                                       
                        </div>       
                        <!-- End -- Deployment Date -->
<!-- Deployment Address -->
<!-- Start -- Deployment address -- >  
                        <div class="column-full">
                            <div class="group">
                                <?php
                                echo form_textarea(array(
                                    'name' => 'daddress',
                                    'id' => 'daddress',
                                    'class' => 'textarea',
                                    'rows' => '3',
                                    'cols' => '5'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Deployment Address</label>
                                <span class="signup-error"><?php echo validation_show_error('daddress'); ?></span>
                            </div>                                                       
                        </div>
                        <!-- End -- Deployment address -- >
                    </div>
                    <div class="column-33">
                        <!-- Country Selection -- >
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_countries = array('' => 'Select a Country');
                                foreach ($geCountries as $key => $element) {
                                    $opt_countries[$element['country_id']] = $element['country_name'];
                                }
                                echo form_dropdown(array('name' => 'dcountry', 'id' => 'dcountry'), $opt_countries, '98');
                                ?>
                                <span class="select-highlight"></span>
                                <span class="select-bar"></span>
                                <label class="select-label">Country</label>
                            </div>
                        </div> 
                        <!--- Country Selection  Ended                                 
                            - State Selection - ->
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_state = array('' => 'Select a State');
                                echo form_dropdown(array('name' => 'dstate', 'id' => 'dstate'), $opt_state);
                                ?>
                                <span class="select-highlight"></span>
                                <span class="select-bar"></span>
                                <label class="select-label">State</label>
                            </div>
                        </div>
                        <!--- State Selection  Ended     
                        - City Selection - ->
                        <div class="column-full">
                            <div class="group">                       
                                <?php
                                $opt_city = array('' => '');
                                echo form_dropdown(array('name' => 'dcity', 'id' => 'dcity'), $opt_city);
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>City</label>
                            </div>
                        </div>
                        <!--- City Selection  Ended  - ->
                        <!--  pincode - ->
                        <div class="column-full">
                            <div class="group">             
                                <?php
                                echo form_input(array(
                                    'type' => 'text',
                                    'name' => 'dpincode',
                                    'id' => 'dpincode'
                                ));
                                ?>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pincode</label>
                                <span class="signup-error"><?php echo validation_show_error('dpincode'); ?></span>
                            </div>                                                       
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?=
        form_input(array(
            'type' => 'button',
            'name' => 'previous',
            'class' => 'previous action-button',
            'value' => 'Previous'
        ));
        ?>
        <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>            
    </fieldset>

    <fieldset>
        <div class="form-card">
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

                    <p style="color:green; font-style:bold"><?php echo session()->setFlashdata('msg_success'); ?></p>
                    <p style="color:red; font-style:bold"><?php echo session()->setFlashdata('msg_error'); ?></p>
                </div>
            </div>
        </div>
    </fieldset>

            -->
<style>
    .signup-error { color:#FF0000; padding-left:15px; }
    .view_container { background-color: #fff; }
    .message { color: #00FF00; font-weight: bold; width: 100%; padding: 10px; }
    .btnAction {
        padding: 5px 10px;
        background-color: #F00;
        border: 20px solid white;
        color: #FFF;
        cursor: pointer;
        margin-top:15px;
        width: auto;
        display: inline;
    }
    label {    line-height:35px; }
    .wizard {  margin: 20px auto;  background: #fff;  }
    .wizard > div.wizard-inner { position: relative; }
    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }
    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }
    span.round-tab i{ color:#555555; }   
    span.round-tab:hover { color: #333;  border: 2px solid #333; }
    .wizard h3 { margin-top: 0; }
    .optn-label {  padding-right: 40px; }
    @media( max-width : 585px ) {
        .wizard { width: 90%;  height: auto !important;  }
        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }       
    }   
    .select-form {  border: 0; }
    /* form starting stylings ------------------------------- */
    .group { position:relative; margin-bottom: 0px; margin-top: 14px; }
    input, textarea {
        font-size:18px;
        padding:10px 10px 10px 5px;
        display:block;
        border:none;
        border-bottom:1px solid #757575;
        width: 100%;
    }
    input:focus,  textarea:focus { outline:none; }
    /* LABEL ======================================= */
    label 	 {
        color:#999; 
        font-size:16px;
        font-weight:normal;
        position:absolute;
        pointer-events:none;
        left:5px;
        top:10px;
        transition:0.2s ease all; 
        -moz-transition:0.2s ease all; 
        -webkit-transition:0.2s ease all;
    }
    /* active state */
    input:focus ~ label, input:valid ~ label, textarea:focus ~ label { top:-20px; font-size:12px; color:#4285f4; }
    /* active state */
    input[type=date]:focus ~ label, input[type=date]:valid ~ label { top:-10px;  font-size:12px; color:#4285f4; }
    /* BOTTOM BARS ================================= */
    .select-bar, .bar 	{ position:relative; display:block; width:100%; }     
    .select-bar:before, .select-bar:after, .bar:before, .bar:after {
        content:'';
        height:2px; 
        width:0;
        bottom:1px; 
        position:absolute;
        background:#4285f4; /* select:: background: #2F80ED; */
        transition:0.2s ease all; 
        -moz-transition:0.2s ease all; 
        -webkit-transition:0.2s ease all;
    }    
    .select-bar:before, .bar:before {  left:50%; }
    .select-bar:after, .bar:after {  right:50%; }
    /* active state */
    .select-text:focus ~ .select-bar:before, .select-text:focus ~ .select-bar:after, input:focus ~ .bar:before, input:focus ~ .bar:after { width:50%; }        
    /* HIGHLIGHTER ================================== */
   .select-highlight, .highlight {
        position:absolute;
        height:60%; 
        width:100%; 
        top:25%; 
        left:0;
        pointer-events:none;
        opacity:0.5;
    }      
    /* active state */
    input:focus ~ .highlight {
        -webkit-animation:inputHighlighter 0.3s ease;
        -moz-animation:inputHighlighter 0.3s ease;
        animation:inputHighlighter 0.3s ease;
    }
    /* ANIMATIONS ================ */
    @-webkit-keyframes inputHighlighter {
        from { background:#5264AE; }
        to 	{ width:0; background:transparent; }
    }
    @-moz-keyframes inputHighlighter {
        from { background:#5264AE; }
        to 	{ width:0; background:transparent; }
    }
    @keyframes inputHighlighter {
        from { background:#5264AE; }
        to 	{ width:0; background:transparent; }
    }
    .material-form-field.material-form-field-invalid {
        color: #d50000;
    }
    .material-form-field.material-form-field-invalid::after { content: attr(data-validationError); }
    .material-form-field.material-form-field-invalid input:focus ~ .material-form-field-label { color: #d50000; }
    input[type=date]{ line-height: 26px; font-size: 15px; }
    /********************************************************************
                                List Select
    ********************************************************************/
    .select { font-family: 'Roboto','Helvetica','Arial',sans-serif; position: relative; }
    .select-text {
        position: relative;
        font-family: inherit;
        background-color: transparent;
        width: 100%;
        padding: 26px 10px 10px 0;
        font-size: 18px;
        border-radius: 0;
        border: none;
        border-bottom: 1px solid #757575; /* rgba(0,0,0, 0.12);*/
    }
    /* Remove focus */
    .select-text:focus { outline: none;  border-bottom: 1px solid rgba(0,0,0, 0); }
    /* Use custom arrow */
    .select .select-text {   appearance: none;
        -webkit-appearance:none
    }
    .select:after {
        position: absolute;
        top: 38px;
        right: 10px;
        /* Styling the down arrow */
        width: 0;
        height: 0;
        padding: 0;
        content: '';
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid rgba(0, 0, 0, 0.12);
        pointer-events: none;
    }
    /* LABEL =======================================  */
    .select-label {
        color: rgba(0,0,0, 0.26);
        font-size: 16px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 20px;
        top: 22px;
        transition: 0.2s ease all;
    }
    /* active state */
    .select-text:focus ~ .select-label, .select-text:valid ~ .select-label {
        color: #4285f4;
        top: -3px;
        left:20px;
        transition: 0.2s ease all;
        font-size: 12px;
    }
    /******************         List Select End         ************************/
    
    *, *:before, *:after {
        box-sizing: border-box;
    }
    @-webkit-keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }    
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    function validate() {
        var output = true;
        $(".signup-error").html('');

        if ($("#personal-field").css('display') != 'none') {
//            if (!($("#firstName").val())) {
//                output = false;
//                $("#name-error").html("Name required!");
//            }
        }        
        return output;
    }

    $(document).ready(function () {
        $("input#finish").click(function (e) {
            var output = validate();
            var current = $(".active");

            if (output === true) {
                return true;
            } else {
                //prevent refresh
                e.preventDefault();
                $("#" + current.attr("id") + "-field").show();
                $("#back").show();
                $("#finish").show();
            }
        });
    });

</script>

<div class="wizard padding-t-5">
    <?php
    if (isset($success)) {
        echo 'User record inserted successfully';
    }
    if (isset($postdata)) {
        echo 'User record inserted successfully' . $postdata;
    }
    $attributes = array('name' => 'frmRegistration', 'id' => 'signup-form', 'enctype' => 'multipart/form-data');
    echo form_open('applnentry', $attributes);
    ?>
    <div id="personal-field" >
        <div class="col-lg-12 padding-t-5">
            <div class="col-lg-8">
                <div class="col-lg-12">
                    <h4>Transaction Entry (Receipt/Voucher)</h4>
                    <div class="col-md-8">
                        <div class="group">      
                            <input type="text" required name="cname" id="cname"  pattern="(?=.*[a-z])(?=.*[A-Z]).{2,}">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Name (Paid To)</label>
                            <span id="name-error" class="signup-error" style="color:red"><?php echo form_error('cname'); ?></span>
                        </div>                                                       
                    </div>

                    <!-- Branch Name -->

                    <div class="col-md-4">
                        <div class="group">      
                            <input type="text" required name="brname" id="brname" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Debit Account </label>
                            <span style="color:red"><?php echo form_error('brname'); ?></span>
                        </div>                                                       
                    </div>

                    <!--                    - Branch Name  Ended-->
                </div>
                <div class="col-lg-12">

                    <!--                  Phone -->

                    <div class="col-md-6">
                        <div class="group" data-validationError="<?php
                        if (form_error('phone')) {
                            echo "This field is invalid";
                        } else
                            echo " ";
                        ?>">      
                            <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>"  id="phone" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Towards</label><span id="phone-error" class="signup-error"></span>
                            <span style="color:red"><?php echo form_error('phone'); ?></span>
                        </div>                                                       
                    </div>
                    <!--                 phone end 
                    
                                     email -->

                    <div class="col-md-6">
                        <div class="group" data-validationError="<?php
                        if (form_error('email')) {
                            echo "This field is invalid";
                        } else
                            echo " ";
                        ?>">      
                            <input type="text" required name="email" value="<?php echo set_value('email'); ?>"  id="email" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Amount</label><span id="email-error" class="signup-error"></span>
                            <span style="color:red"><?php echo form_error('email'); ?></span>
                        </div>                                                       
                    </div>

                    <!--                 email end 
                    
                                     Address -->

                    <div class="col-md-8">
                        <div class="group" data-validationError="<?php
                        if (form_error('address')) {
                            echo "This field is invalid";
                        } else
                            echo " ";
                        ?>">      
                            <textarea name="address" id="address" class="textarea" rows="3" cols="5"></textarea>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Details</label><span id="address-error" class="signup-error"></span>
                            <span style="color:red"><?php echo form_error('address'); ?></span>
                        </div>                                                       
                    </div>
                    <!--
                                     Address end 
                                    
                                    - Country Selection -->

                    <div class="col-md-2 select">
                        <!--select title="Select Country" name="regcountry" class="form-control" id="country-name"-->
                        <select class="select-text" required name="country" id="country">
                            <option value="" disabled selected></option>
                            <?php
                            foreach ($geCountries as $key => $element) {
                                echo '<option value="' . $element['country_id'] . '">' . $element['country_name'] . '</option>';
                            }
                            ?>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Account Type</label>
                    </div>

                    <!--                    - Country Selection  Ended  
                                        
                                        - State Selection -->

                    <div class="col-md-2 select">  
                        <!--select title="Select State" name="state_name" class="form-control" id="state-name"-->
                        <select class="select-text" required name="state" id="state">
                            <option value="" disabled selected></option>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Code</label>
                    </div>

                    <!--                    - State Selection  Ended
                                        
                                        - City Selection -->

                    <div class="col-md-2 select"> 
                        <!--select title="Select City" name="city_name" class="form-control" id="city-name"--> 
                        <select class="select-text" required name="city" id="city">
                            <option value="" disabled selected></option>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Date</label>
                    </div>
                </div>
            </div>          
        </div>

    </div>

    <div class="">
        <input class="btnAction" type="submit" name="finish" id="finish" value="Finish">
    </div>

    <?php echo form_close(); ?>

    <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
</div>
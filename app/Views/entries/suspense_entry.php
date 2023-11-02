
<style>

    .signup-error {
        color:#FF0000; 
        padding-left:15px;
    }

    .view_container {
        background-color: #fff;
    }

    .message {
        color: #00FF00;
        font-weight: bold;
        width: 100%;
        padding: 10;
    }

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

    label {
        line-height:35px;
    }
    .wizard {
        margin: 20px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

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

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
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
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;

    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs > li {
        width: 20%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }

    .wizard .nav-tabs > li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }

    .wizard h3 {
        margin-top: 0;
    }

    .optn-label {
        padding-right: 40px;
    }

    @media( max-width : 585px ) {

        .wizard {
            width: 90%;
            height: auto !important;
        }

        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard .nav-tabs > li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }   
    .select-form {
        border: 0;

    }



    /* form starting stylings ------------------------------- */
    .group 			  { 
        position:relative; 
        margin-bottom: 0px;
        margin-top: 14px;
    }
    input, textarea {
        font-size:18px;
        padding:10px 10px 10px 5px;
        display:block;
        border:none;
        border-bottom:1px solid #757575;
        width: 100%;
    }
    input:focus,  textarea:focus		{ outline:none; }

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
    input:focus ~ label, input:valid ~ label, textarea:focus ~ label 		{
        top:-20px;
        font-size:12px;
        color:#4285f4;
    }
    /* active state */
    input[type=date]:focus ~ label, input[type=date]:valid ~ label 		{
        top:-10px;
        font-size:12px;
        color:#4285f4;
    }

    /* BOTTOM BARS ================================= */
    .bar 	{ position:relative; display:block; width:100%; }
    .bar:before, .bar:after 	{
        content:'';
        height:2px; 
        width:0;
        bottom:1px; 
        position:absolute;
        background:#4285f4; 
        transition:0.2s ease all; 
        -moz-transition:0.2s ease all; 
        -webkit-transition:0.2s ease all;
    }
    .bar:before {
        left:50%;
    }
    .bar:after {
        right:50%; 
    }

    /* active state */
    input:focus ~ .bar:before, input:focus ~ .bar:after {
        width:50%;
    }

    /* HIGHLIGHTER ================================== */
    .highlight {
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
    .material-form-field.material-form-field-invalid::after {
        content: attr(data-validationError);
    }
    .material-form-field.material-form-field-invalid input:focus ~ .material-form-field-label {
        color: #d50000;
    }
    input[type=date]{
        line-height: 26px;
        font-size: 15px;
    }
    /********************************************************************
                                List Select
    ********************************************************************/

    .select {
        font-family:
            'Roboto','Helvetica','Arial',sans-serif;
        position: relative;
    }

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
    .select-text:focus {
        outline: none;
        border-bottom: 1px solid rgba(0,0,0, 0);
    }

    /* Use custom arrow */
    .select .select-text {
        appearance: none;
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

    /* BOTTOM BARS ================================= */
    .select-bar {
        position: relative;
        display: block;
        width: 100%;
    }

    .select-bar:before, .select-bar:after {
        content: '';
        height: 2px;
        width: 0;
        bottom: 1px;
        position: absolute;
        background: #2F80ED;
        transition: 0.2s ease all;
    }

    .select-bar:before {
        left: 50%;
    }

    .select-bar:after {
        right: 50%;
    }

    /* active state */
    .select-text:focus ~ .select-bar:before, .select-text:focus ~ .select-bar:after {
        width: 50%;
    }

    /* HIGHLIGHTER ================================== */
    .select-highlight {
        position: absolute;
        height: 60%;
        width: 100%;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }

    /******************         List Select End         ************************/
</style>
<style>
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

    #mediafile {
        position: absolute;
        top: -1000px;
    }

    #profile {
        border-radius: 100%;
        width: 90%;
        height: 145px;
        margin: 0 auto;
        position: relative;
        top: -80px;
        margin-bottom: -80px;
        cursor: pointer;
        /*background: #f4f4f4;*/
        display: table;
        background-size: cover;
        background-position: center center;
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.35);
    }
    #profile .dashes {
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 100%;
        width: 100%;
        height: 100%;
        border: 4px dashed #ddd;
        opacity: 1;
    }
    #profile label {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        padding: 35px;
        color: grey;
        opacity: 1;
        font-size: 13px;
        line-height: 15px;
    }
    #profile.dragging {
        background-image: none !important;
    }
    #profile.dragging .dashes {
        -webkit-animation-duration: 10s;
        animation-duration: 10s;
        -webkit-animation-name: spin;
        animation-name: spin;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        opacity: 1 !important;
    }
    #profile.dragging label {
        opacity: 0.5 !important;
    }
    #profile.hasImage .dashes, #profile.hasImage label {
        opacity: 0;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /*  *********** Form Validation ****************/


    form > div > label {
        opacity: 0.3;
        font-weight: bold;
        position: absolute;
        top: 22px;
        left: 20px;
        transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    form > div > input[type="text"],
    form > div > input[type="email"],
    form > div > input[type="password"] {
        position: relative;
        width: 100%;
        border: 0;
        padding: 25px 20px 20px 50px;
        background: #eee;
    }
    /*input[type="text"]:focus,
    form > div > input[type="email"]:focus,
    form > div > input[type="password"]:focus {
      outline: 0;
      background: white;
    }*/
    form > div > input[type="text"]:focus + label{
        top: 5px;
        left: 10px;
        color: #666;
        font-size: 70%;
    }
    input[type="text"]:valid {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/check.svg);
        background-size: 16px;
        background-repeat: no-repeat;
        background-position: 100% 50%;
    }
    form > div > input[type="text"]:valid + label {
        top: 5px;
        left: 10px;
        color: #666;
        font-size: 70%;
    }
    input[type="text"]:invalid:not(:focus):not(:placeholder-shown) {
        background: pink;
    }
    input[type="text"]:invalid:not(:focus):not(:placeholder-shown) + label{
        top: 5px;
        left: 10px;
        color: #666;
        font-size: 70%;
    }
    input[type="text"]:invalid:focus:not(:placeholder-shown) ~ .requirements {
        max-height: 200px;
        padding: 0 30px 20px 50px;
    }
    .requirements {
        padding: 0 30px 0 50px;
        color: #999;
        max-height: 0;
        transition: 0.28s;
        overflow: hidden;
        color: red;
        font-style: italic;
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
//
//            if (!($("#dob").val())) {
//                output = false;
//                $("#dob-error").html("Date of Birth required!");
//            }
        }

        if ($("#demographics-field").css('display') != 'none') {
            /* if (!($("#user-password").val())) {
             output = false;
             $("#password-error").html("Password required!");
             }
             
             if (!($("#confirm-password").val())) {
             output = false;
             $("#confirm-password-error").html("Confirm password required!");
             }
             
             if ($("#user-password").val() != $("#confirm-password").val()) {
             output = false;
             $("#confirm-password-error").html("Password not matched!");
             }*/
        }

        //experiance-field


        if ($("#experiance-field").css('display') != 'none') {

        }

        //bankdetails-field


        if ($("#bankdetails-field").css('display') != 'none') {

        }

        if ($("#contact-field").css('display') != 'none') {
            if (!($("#phone").val())) {
                output = false;
                $("#phone-error").html("Phone required!");
            }

            if (!($("#email").val())) {
                output = false;
                $("#email-error").html("Email required!");
            }

            if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $("#email-error").html("Invalid Email!");
                output = false;
            }

            if (!($("#address").val())) {
                output = false;
                $("#address-error").html("Address required!");
            }
        }

        return output;
    }

    $(document).ready(function () {
        $("#next").click(function () {
            var output = true; //validate();
            if (output === true) {
                var current = $(".active");
                var next = $(".active").next("li");
                if (next.length > 0) {
                    if (current.attr("id") !== "personal") {
                        $("#personal-field").hide();
                    }
                    $("#" + current.attr("id") + "-field").hide();
                    $("#" + next.attr("id") + "-field").show();
                    $("#back").show();
                    $("#finish").hide();
                    $(".active").removeClass("active");
                    next.addClass("active");
                    if ($(".active").attr("id") === $("li").last().attr("id")) {
                        $("#next").hide();
                        $("#finish").show();
                    }
                }
            }
        });


        $("#back").click(function () {
            var current = $(".active");
            var prev = $(".active").prev("li");
            if (prev.length > 0) {
                $("#" + current.attr("id") + "-field").hide();
                $("#" + prev.attr("id") + "-field").show();
                $("#next").show();
                $("#finish").hide();
                $(".active").removeClass("active");
                prev.addClass("active");
                if ($(".active").attr("id") == $("li").first().attr("id")) {
                    $("#back").hide();
                }
            }
        });

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

<div class="wizard">
    <div class="wizard-inner">
        <div class="connecting-line"></div>
        <ul class="nav nav-tabs" role="tablist"  id="signup-step">

            <li role="presentation"  id="personal" class="active">
                <a href="javascript:function() { return false; }" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                    <span class="round-tab">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                </a>
            </li>

            <li role="presentation"  id="demographics" class="disabled">
                <a href="javascript:function() { return false; }"  data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" disabled="disabled">
                    <span class="round-tab">
                        <i class="glyphicon glyphicon-th"></i>
                    </span>
                </a>
            </li>
            <li role="presentation" id="experiance" class="disabled">
                <a href="javascript:function() { return false; }"  data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" disabled="disabled">
                    <span class="round-tab">
                        <i class="glyphicon glyphicon-lock"></i>
                    </span>
                </a>
            </li>
            <li role="presentation" id="bankdetails" class="disabled">
                <a href="javascript:function() { return false; }"  data-toggle="tab" aria-controls="step4" role="tab" title="Step 4" disabled="disabled">
                    <span class="round-tab">
                        <i class="glyphicon glyphicon-credit-card"></i>
                    </span>
                </a>
            </li>

            <li role="presentation" id="contact" class="disabled">
                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                    <span class="round-tab">
                        <i class="glyphicon glyphicon-ok"></i>
                    </span>
                </a>
            </li>
        </ul>
    </div>

</div>



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
                <h4>Company Details</h4>
                <div class="col-md-8">
                    <div class="group">      
                        <input type="text" required name="cname" id="cname"  pattern="(?=.*[a-z])(?=.*[A-Z]).{2,}">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Company Name</label>
                        <span id="name-error" class="signup-error" style="color:red"><?php echo form_error('cname'); ?></span>
                    </div>                                                       
                </div>

                <!-- Branch Name -->

                <div class="col-md-4">
                    <div class="group">      
                        <input type="text" required name="brname" id="brname" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Branch</label>
                        <span style="color:red"><?php echo form_error('brname'); ?></span>
                    </div>                                                       
                </div>

                <!--                    - Branch Name  Ended-->
            </div>
            <div class="col-lg-12">

                <!--                  Phone -->

                <div class="col-md-6">
                    <div class="group" data-validationError=<?php
                    if (form_error('phone')) {
                        echo "This field is invalid";
                    } else
                        echo " ";
                    ?>>      
                        <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>"  id="phone" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Phone</label><span id="phone-error" class="signup-error"></span>
                        <span style="color:red"><?php echo form_error('phone'); ?></span>
                    </div>                                                       
                </div>
                <!--                 phone end 
                
                                 email -->

                <div class="col-md-6">
                    <div class="group" data-validationError=<?php
                    if (form_error('email')) {
                        echo "This field is invalid";
                    } else
                        echo " ";
                    ?>>      
                        <input type="text" required name="email" value="<?php echo set_value('email'); ?>"  id="email" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label><span id="email-error" class="signup-error"></span>
                        <span style="color:red"><?php echo form_error('email'); ?></span>
                    </div>                                                       
                </div>

                <!--                 email end 
                
                                 Address -->

                <div class="col-md-8">
                    <div class="group" data-validationError=<?php
                    if (form_error('address')) {
                        echo "This field is invalid";
                    } else
                        echo " ";
                    ?>>      
                        <textarea name="address" id="address" class="textarea" rows="3" cols="5"></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Address</label><span id="address-error" class="signup-error"></span>
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
                    <label class="select-label">Country</label>
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
                    <label class="select-label">State</label>
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
                    <label class="select-label">City</label>
                </div>

            </div>

        </div>

            <!--                   Photo                                             -->

            <div class="col-lg-2">
                <h4>Logo </h4>
                <div style="width: 100%; padding-top: 100%; position: relative;">
                    <div id="profile" style="position: absolute;  top: 0; left: 0;  bottom: 0;  right: 0;">
                        <div class="dashes"></div>
                        <label>Click to browse or drag an image here</label>
                    </div>
                </div>
                <input type="file" id="mediafile" name="mediafile" accept="image/*" capture="camera" style="" />

            </div>
            <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"><div> </div></script>
            <script>
//                 ----- On render -----
                $(function () {

                    $('#profile').addClass('dragging').removeClass('dragging');
                });

                $('#profile').on('dragover', function () {
                    $('#profile').addClass('dragging');
                }).on('dragleave', function () {
                    $('#profile').removeClass('dragging');
                }).on('drop', function (e) {
                    $('#profile').removeClass('dragging hasImage');

                    if (e.originalEvent) {
                        var file = e.originalEvent.dataTransfer.files[0];
                        console.log(file);

                        var reader = new FileReader();

                        //attach event handlers here...

                        reader.readAsDataURL(file);
                        reader.onload = function (e) {
                            console.log(reader.result);
                            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

                        };

                    }
                });
                $('#profile').on('click', function (e) {
                    console.log('clicked');
                    $('#mediafile').click();
                });
                window.addEventListener("dragover", function (e) {
                    e = e || event;
                    e.preventDefault();
                }, false);
                window.addEventListener("drop", function (e) {
                    e = e || event;
                    e.preventDefault();
                }, false);
                $('#mediafile').change(function (e) {

                    var input = e.target;
                    if (input.files && input.files[0]) {
                        var file = input.files[0];

                        var reader = new FileReader();

                        reader.readAsDataURL(file);
                        reader.onload = function (e) {
                            console.log(reader.result);
                            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                        };
                    }
                });
//# sourceURL=pen.js



                </script>
                <!--                     End Phot0 -->



            </div>

        </div>

        <div id="demographics-field" style="display:none" >
            <div class="col-md-12">
              
                <div class="col-md-4">
                    <div class="group">      
                        <input type="text" required name="nosch"  id="nosch" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>List of Service Provided</label>
                        <span style="color:red"><?php echo form_error('nosch'); ?></span>
                    </div>                                                       
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>

                   $('#nosch').on('blur', function (e) {
                            e.preventDefault();
                        var dat = {nosch: parseInt(document.getElementById("nosch").value)};
                        $.ajax({
                            url: 'http://[::1]/sec-web-app/Client_entry',
                            type: 'POST',
                            dataType: 'text',
                            data: dat,
                        })
                        .done(function(response) {
                            console.log(response);
                            //do something with the response
                        })
                        .fail(function () {
                            console.log("error");
                        });
                       
                        var row = parseInt(document.getElementById("nosch").value);
                        var tbody = '<table  class="table table-bordered padding-t-5"> <thead> <th>Sl.No</th> <th>Particulars</th> <th>No of Persons</th> <th>Working Hours</th> <th>Rate Finalized</th> <th>Salary Fixed</th>' +
                                '</thead><!-- tbody id="data">     </tbody--><tbody> ';
                        for (var r=1;r<=row;r++) {
                            tbody+=' <tr><td>'+r+'</td> <td> <input type="text" name="first'+r
                                +'" />  </td> <td> <input type="text" name="second'+r+'" />  </td> <td> <input type="text" name="third'+r+'" />  </td> <td> <input type="text" name="forth'+r+
                                '" />  </td> <td> <input type="text" name="fifth'+r+'" /> </tr>';
                        }
                        tbody+=' </tbody>    </table>';
                        var table = document.getElementById("relTable");
                        div = document.createElement('div');
                        div.innerHTML = tbody;
                        table.appendChild(div);

                    });
                
                </script>              

            </div>

            <div class="col-md-12 navbar-btn" id='relTable'></div>
        </div>

        
    <div id="experiance-field" style="display:none" >
            <div class="col-md-12">
              
                <div class="col-md-4">
                    <div class="group">      
                        <input type="text" required name="clct"  id="clct" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Contact Person List</label>
                        <span style="color:red"><?php echo form_error('clct'); ?></span>
                    </div>                                                       
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                        .done(function(response) {
                            console.log(response);
                            //do something with the response
                        })
                        .fail(function () {
                            console.log("error");
                        });
                       
                        var row = parseInt(document.getElementById("clct").value);
                        var tbody = '<table  class="table table-bordered padding-t-5"> <thead> <th>Sl.No</th> <th>Name</th> <th>Designation</th> <th>Contact No</th> <th>Contact Email</th>' +
                                '</thead><!-- tbody id="data">     </tbody--><tbody> ';
                        for (var r=1;r<=row;r++) {
                            tbody+=' <tr><td>'+r+'</td> <td> <input type="text" name="first'+r
                                +'" />  </td> <td> <input type="text" name="second'+r+'" />  </td> <td> <input type="text" name="third'+r+'" />  </td> <td> <input type="text" name="forth'+r+'" />  </td> </tr>';
                        }
                        tbody+=' </tbody>    </table>';
                        var table = document.getElementById("relTable1");
                        div = document.createElement('div');
                        div.innerHTML = tbody;
                        table.appendChild(div);

                    });
                
                </script>              

            </div>

            <div class="col-md-12 navbar-btn" id='relTable1'></div>
        </div>

        <div id="bankdetails-field"  style="display:none;">
            <div class="col-md-4">
                <div class="group">      
                    <input type="text" required name="accname"  id="accname" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account Name</label>
                    <span style="color:red"><?php echo form_error('accname'); ?></span>
                </div>                                                       
            </div>
            <div class="col-md-4">
                <div class="group">      
                    <input type="text" required name="accno"  id="accno" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Account No</label>
                    <span style="color:red"><?php echo form_error('accno'); ?></span>
                </div>                                                       
            </div><div class="col-md-4">
                <div class="group">      
                    <input type="text" required name="bankname"  id="bankname" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Bank Name</label>
                    <span style="color:red"><?php echo form_error('bankname'); ?></span>
                </div>                                                       
            </div>
            <div class="col-md-4">
                <div class="group">      
                    <input type="text" required name="branchname"  id="branchname" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Branch Name</label>
                    <span style="color:red"><?php echo form_error('branchname'); ?></span>
                </div>                                                       
            </div>
            <div class="col-md-4">
                <div class="group">      
                    <input type="text" required name="ifsc"  id="ifsc" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>IFS Code</label>
                    <span style="color:red"><?php echo form_error('ifsc'); ?></span>
                </div>                                                       
            </div>
        </div>

        <div class="col-md-12" id="contact-field"  style="display:none;">
            <div class="col-lg-12">
                <h1> <span>Billing Information</span></h1>
                <div class="clearfix"></div>                                    
            </div>

            <!--                  Phone -->

            <div class="col-md-4">
                <div class="group" data-validationError=<?php
                if (form_error('phone')) {
                    echo "This field is invalid";
                } else
                    echo " ";
                ?>>      
                    <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>"  id="phone" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Billing Period Start Date</label><span id="phone-error" class="signup-error"></span>
                    <span style="color:red"><?php echo form_error('phone'); ?></span>
                </div>                                                       
            </div>
            <!--                 phone end 
            
                             email -->

            <div class="col-md-4">
                <div class="group" data-validationError=<?php
                if (form_error('email')) {
                    echo "This field is invalid";
                } else
                    echo " ";
                ?>>      
                    <input type="text" required name="email" value="<?php echo set_value('email'); ?>"  id="email" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Deployment Date</label><span id="email-error" class="signup-error"></span>
                    <span style="color:red"><?php echo form_error('email'); ?></span>
                </div>                                                       
            </div>

            <!--                 email end 
            
                             Address -->

            <div class="col-md-8">
                <div class="group" data-validationError=<?php
                if (form_error('address')) {
                    echo "This field is invalid";
                } else
                    echo " ";
                ?>>      
                    <textarea name="address" id="address" class="textarea" rows="3" cols="5"></textarea>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Address</label><span id="address-error" class="signup-error"></span>
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
                <label class="select-label">Country</label>
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
                <label class="select-label">State</label>
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
                <label class="select-label">City</label>
            </div>



            <!--                    - City Selection  Ended  -->

            <!--                      pincode -->

            <div class="col-md-2">
                <div class="group" data-validationError=<?php
                if (form_error('pincode')) {
                    echo "This field is invalid";
                } else
                    echo " ";
                ?>>      
                    <input type="text" required name="pincode" value="<?php echo set_value('phone'); ?>"  id="pincode" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Pincode</label><span id="phone-error" class="signup-error"></span>
                    <span style="color:red"><?php echo form_error('pincode'); ?></span>
                </div>                                                       
            </div>
            <!--                 pincode end -->

        </div>

        <div class="">
            <input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
            <input class="btnAction" type="button" name="next" id="next" value="Next" >      
            <input class="btnAction" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
        </div>

        <?php echo form_close(); ?>

        <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
        <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
    </div>


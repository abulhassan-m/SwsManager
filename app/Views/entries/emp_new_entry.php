
<?php /*
<!-- style>
    /*

    p {
        color: grey
    }

    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 10px;
        width: 100%;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        margin: 15px;
        padding: 30px;
        padding-bottom: 10px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform input,
    #msform textarea {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        background-color: #ECEFF1;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #673AB7;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 15px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 16.66%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #family:before {
        font-family: FontAwesome;
        content: "\f0c0"
    }

    #progressbar #qualify:before {
        font-family: FontAwesome;
        content: "\f19d"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f19c"
    }

    #progressbar #contact:before {
        font-family: FontAwesome;
        content: "\f095"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 15px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
    /* form starting stylings ------------------------------- /
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

    /* LABEL ======================================= /
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

    /* active state * /
    input:focus ~ label, input:valid ~ label, textarea:focus ~ label 		{
        top:-20px;
        font-size:12px;
        color:#4285f4;
    }
    /* active state * /
    input[type=date]:focus ~ label, input[type=date]:valid ~ label 		{
        top:-10px;
        font-size:12px;
        color:#4285f4;
    }

    /* BOTTOM BARS ================================= * /
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

    /* active state * /
    input:focus ~ .bar:before, input:focus ~ .bar:after {
        width:50%;
    }

    /* HIGHLIGHTER ================================== * /
    .highlight {
        position:absolute;
        height:60%; 
        width:100%; 
        top:25%; 
        left:0;
        pointer-events:none;
        opacity:0.5;
    }

    /* active state * /
    input:focus ~ .highlight {
        -webkit-animation:inputHighlighter 0.3s ease;
        -moz-animation:inputHighlighter 0.3s ease;
        animation:inputHighlighter 0.3s ease;
    }

    /* ANIMATIONS ================ * /
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
    ******************************************************************** /

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
        border-bottom: 1px solid #757575; /* rgba(0,0,0, 0.12);* /
    }

    /* Remove focus * /
    .select-text:focus {
        outline: none;
        border-bottom: 1px solid rgba(0,0,0, 0);
    }

    /* Use custom arrow * /
    .select .select-text {
        appearance: none;
        -webkit-appearance:none
    }

    .select:after {
        position: absolute;
        top: 38px;
        right: 10px;
        /* Styling the down arrow * /
        width: 0;
        height: 0;
        padding: 0;
        content: '';
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid rgba(0, 0, 0, 0.12);
        pointer-events: none;
    }


    /* LABEL =======================================  * /
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

    /* active state * /
    .select-text:focus ~ .select-label, .select-text:valid ~ .select-label {
        color: #4285f4;
        top: -3px;
        left:20px;
        transition: 0.2s ease all;
        font-size: 12px;
    }

    /* BOTTOM BARS ================================= * /
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

    /* active state * /
    .select-text:focus ~ .select-bar:before, .select-text:focus ~ .select-bar:after {
        width: 50%;
    }

    /* HIGHLIGHTER ================================== * /
    .select-highlight {
        position: absolute;
        height: 60%;
        width: 100%;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }

    /******************         List Select End         ************************ /
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
        /*background: #f4f4f4;* /
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

    /*  *********** Form Validation **************** /


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
    }* /
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


    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

//Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
            next_fs.show();
//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

//Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
            previous_fs.show();

//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                    .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        });

    });


</script>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-12 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Employee Registration Form</h2>
                <p>Fill all form field to go to next step</p>  
                    <?php echo $status;
                    if (isset($success)) {
        echo 'User record inserted successfully';
    }
    if (isset($postdata)) {
        echo 'User record inserted successfully'.$postdata;
    }  helper('form');
                $attributes = array('name' => 'frmRegistration', 'id' => 'msform', 'enctype' => 'multipart/form-data');
                echo form_open('applnentry', $attributes);
                ?>

                <!-- progressbar -->
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
                <!-- fieldsets -->
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Basic Information:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 1 - 6</h2>
                            </div>
                        </div> 
                        <div class="col-lg-12 padding-t-5">
                            <div class="col-lg-8">
                                <div class="col-md-6">

                                    <div class="group">      
                                        <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>"  id="firstname"  pattern="(?=.*[a-z])(?=.*[A-Z]).{2,}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>First Name</label>
                                        <div class="requirements">      Required Field Empty !    </div>
                                        <span id="name-error" class="signup-error" style="color:red"><?php echo validation_show_error('firstname'); ?></span>
                                    </div>                                                       
                                </div>



                                <!--Last Name--> 

                                <div class="col-md-6">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('lastname')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?> >      
                                        <input type="text" required name="lastname" required  value="<?php echo set_value('lastname'); ?>"  id="lastname" placeholder=" " >                                                    
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Last Name</label>
                                        <div class="requirements">      Required Field Empty !    </div>
                                        <span  id="name-error" class="signup-error"  style="color:red"><?php echo validation_show_error('lastname'); ?></span>
                                    </div>  

                                </div>                                           

                                <!-- Blood Group Selection -->

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('blood')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="blood" value="<?php echo set_value('blood'); ?>"  id="blood" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Blood Group</label>
                                        <span style="color:red"><?php echo validation_show_error('blood'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--                    - Blood Group Selection  Ended-->

                                <!--- Height Status Selection--> 

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('height')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?> >      
                                        <input type="text" required name="height" value="<?php echo set_value('height'); ?>"  id="Height" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Height</label>
                                        <span style="color:red"><?php echo validation_show_error('height'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- Height Status  Selection  Ended-->

                                <!--- Weight Status Selection--> 

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('weight')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?> >      
                                        <input type="text" required name="weight" value="<?php echo set_value('weight'); ?>"  id="Weight" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Weight</label>
                                        <span style="color:red"><?php echo validation_show_error('weight'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- Weight Status  Selection  Ended-->


                                <!--- Religion Selection--> 

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('religion')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="religion" value="<?php echo set_value('religion'); ?>"  id="marstatus" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Religion</label>
                                        <span style="color:red"><?php echo validation_show_error('religion'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- Religion Selection  Ended-->
                                <!--- Community Selection--> 

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('community')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="community"  id="community" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Community</label>
                                        <span style="color:red"><?php echo validation_show_error('community'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--                    - Community Selection  Ended -->

                                <!---  Place of Birth Selection--> 

                                <div class="col-md-3">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('pobirth')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?> >      
                                        <input type="text" required name="pobirth" value="<?php echo set_value('pobirth'); ?>"  id="pob" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Place of Birth</label>
                                        <span style="color:red"><?php echo validation_show_error('pobirth'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- Place of Birth  Selection  Ended-->

                                <!--- Proof of Identification --> 

                                <div class="col-md-4">
                                    <div class="group"  >      
                                        <input type="text" required name="proofmen" value=""  id="proofmen" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Proof Mentioned </label>
                                    </div>                                                       
                                </div>

                                <div class="col-md-4">
                                    <div class="group"  >      
                                        <input type="text" required name="proofid" value=""  id="proofid" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Proof ID </label>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="eduqua"  id="eduqua" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Education Qualification</label>
                                        <span style="color:red"><?php echo validation_show_error('eduqua'); ?></span>
                                    </div>                                                       
                                </div>

                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="yearexp"  id="yearexp" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Year of Experiance</label>
                                        <span style="color:red"><?php echo validation_show_error('yearexp'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="pubexp"  id="pubexp" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>If any Experiance in Public Service?</label>
                                        <span style="color:red"><?php echo validation_show_error('pubexp'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="nopubexp"  id="nopubexp" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>No of Year Experiance in Public Service?</label>
                                        <span style="color:red"><?php echo validation_show_error('nopubexp'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="nopriexp"  id="nopriexp" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>No of Years Experiance in Private Security?</label>
                                        <span style="color:red"><?php echo validation_show_error('nopriexp'); ?></span>
                                    </div>                                                       
                                </div>

                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="cerver"  id="cerver" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Certificate verification</label>
                                        <span style="color:red"><?php echo validation_show_error('cerver'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="lang"  id="lang" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Languages Known</label>
                                        <span style="color:red"><?php echo validation_show_error('lang'); ?></span>
                                    </div>                                                       
                                </div>

                                <!---  Proof of Identification Ended-->

                            </div>

                            <div class="col-lg-2">                              




                                <!--- DOB Selection--> 

                                <div class="col-md-12">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('dobirth')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?> >      
                                        <input class="date_input" type="date" required name="dobirth" value="<?php echo set_value('dobirth'); ?>"  id="dobirth" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="line-height: 0px; font-size: 12px;">Date of Birth</label>
                                        <span style="color:red"><?php echo validation_show_error('dobirth'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- DOB Selection  Ended-->
                                <!--- Gender Selection--> 

                                <div class="col-md-12 select">
                                    <select class="select-text" required name="gender" id="gender">
                                        <option value="" disabled selected></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Gender</label>
                                </div>

                                <!--- Gender Selection  Ended-->   

                                <!--- Marital Status Selection--> 

                                <div class="col-md-12 select">      
                                    <select class="select-text" required name="matstat" id="matstat">
                                        <option value="" disabled selected></option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widow">Widow</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorcee">Divorcee</option>
                                    </select>
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Marital Status</label>
                                    <span style="color:red"><?php echo validation_show_error('matstat'); ?></span>

                                </div>

                                <!--- Marital Status  Selection  Ended-->

                                <!--- DOJ Selection--> 

                                <div class="col-md-12">
                                    <div class="group" >      
                                        <input class="date_input" type="date" required name="dojoin" value="<?php echo set_value('dojoin'); ?>"  id="dojoin" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="line-height: 0px; font-size: 12px;">Date of Join</label>
                                        <span style="color:red"><?php echo validation_show_error('dojoin'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--- DOJ Selection  Ended-->

                                

                            </div>


                            <!--                   Photo                                             -->

                            <div class="col-lg-2">
                                <h4>Photo </h4>
                                <div style="width: 100%; padding-top: 100%;  position: relative;">
                                    <div id="profile" style="position: absolute;  top: 0; left: 0;  bottom: 0;  right: 0;">
                                        <div class="dashes"></div>
                                        <label>Click to browse or drag an image here</label>
                                    </div>
                                </div>
                                <input type="file" id="mediafile" name="mediafile" accept="image/*" capture="camera">

                            </div>
                            <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"><div>                             </div></script>
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

                        </div> <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title"Family Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 6</h2>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="group">      
                                    <input type="text" required name="nosch"  id="nosch" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>No of Family Members</label>
                                    <span style="color:red"><?php echo validation_show_error('nosch'); ?></span>
                                </div>                                                       
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script>

                    $('#nosch').on('blur', function (e) {
                            e.preventDefault();
                            var dat = {nosch: parseInt(document.getElementById("nosch").value)};
                            $.ajax({
                                    url: 'http://[::1]/sec-web-app/appln_emp',
                                    type: 'POST',
                                    dataType: 'text',
                                    data: dat,
                            })
                            .done(function(response) {
                                    console.log("response");
                            //do something with the response
                            })
                            .fail(function () {
                            console.log("error");
                            });
                            var row = parseInt(document.getElementById("nosch").value);
                    var tbody = '<table class="table table-bordered padding-t-5">     <thead>      <th>Sl.No</th>  <th>Name</th>               <th>Relationship</th>    <th>Age</th>     <th>Occupation</th>    <th>Date of Birth</th>  ' +
                                '</thead><!-- tbody id="data">     </tbody--><tbody> ';
                                        for (var r = 1; r <= row; r++) {
                                tbody += ' <tr><td>' + r
                                        + ' </td> <td> <input type="text" name="first'+r
                            +'" />  </td> <td> <select class="select select-text " name="second'+r
                            +'"> <option value="1">Father</option><option value="2">Mother</option> <option value="3">Spouse</option> <option value="4">Son</option> <option value="5">Daugher</option>  </select>  </td> <td> <input type="text" name="third'+r+'" />  </td> <td> <input type="text" name="forth'+r+'" />  </td> <td> <input type="text" name="fifth'+r+'" />  </td>  </tr>';
                }
                
                tbody+=' </tbody>    </table>';
                var table = document.getElementById("relTable");
                div = document.createElement('div');
                div.innerHTML = tbody;
                table.appendChild(div);

});

                
                                    </script>
                                    <div class="col-md-12 navbar-btn" id='relTable'></div>


                            </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Qualification</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 6</h2>
                                    </div>
                                </div> 
                                
                            </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Bank Details:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 6</h2>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="accname"  id="accname" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Account Name</label>
                                        <span style="color:red"><?php echo validation_show_error('accname'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="accno"  id="accno" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Account No</label>
                                        <span style="color:red"><?php echo validation_show_error('accno'); ?></span>
                                    </div>                                                       
                                </div><div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="bankname"  id="bankname" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Bank Name</label>
                                        <span style="color:red"><?php echo validation_show_error('bankname'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="branchname"  id="branchname" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Branch Name</label>
                                        <span style="color:red"><?php echo validation_show_error('branchname'); ?></span>
                                    </div>                                                       
                                </div>
                                <div class="col-md-4">
                                    <div class="group">      
                                        <input type="text" required name="ifsc"  id="ifsc" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>IFS Code</label>
                                        <span style="color:red"><?php echo validation_show_error('ifsc'); ?></span>
                                    </div>                                                       
                                </div>
                            </div>
                                <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Contact Information</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 5 - 6</h2>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <h1> <span></span></h1>
                                    <div class="clearfix"></div>                                    
                                </div>

                                <!--                  Phone -->

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('phone')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>"  id="phone" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Phone</label><span id="phone-error" class="signup-error"></span>
                                        <span style="color:red"><?php echo validation_show_error('phone'); ?></span>
                                    </div>                                                       
                                </div>
                                <!--                 phone end 
                                
                                                 email -->

                                <div class="col-md-4">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('email')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="email" value="<?php echo set_value('email'); ?>"  id="email" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label><span id="email-error" class="signup-error"></span>
                                        <span style="color:red"><?php echo validation_show_error('email'); ?></span>
                                    </div>                                                       
                                </div>

                                <!--                 email end 
                                
                                                 Address -->

                                <div class="col-md-8">
                                    <div class="group" data-validationError=<?php
                                    if (validation_show_error('address')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <textarea name="address" id="address" class="textarea" rows="3" cols="5"></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Address</label><span id="address-error" class="signup-error"></span>
                                        <span style="color:red"><?php echo validation_show_error('address'); ?></span>
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
                                    if (validation_show_error('pincode')) {
                                        echo "This field is invalid";
                                    } else
                                        echo " ";
                                    ?>>      
                                        <input type="text" required name="pincode" value="<?php echo set_value('phone'); ?>"  id="pincode" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Pincode</label><span id="phone-error" class="signup-error"></span>
                                        <span style="color:red"><?php echo validation_show_error('pincode'); ?></span>
                                    </div>                                                       
                                </div>
                                <!--                 pincode end -->
                                
                                
                            </div>
                            <?php echo form_submit(array('name' => 'finish',  'id'=>'finish','class' => 'next action-button', 'value' => 'Finish')); ?>
                                <!--<input type="submit" name="finish" class="submit next action-button" value="finish" />--> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 6 - 6</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                 
                                    <!-- div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div -->
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                        <p style="color:green; font-style:bold"><?php echo session('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo session('msg_error'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>
                                        <p style="color:green; font-style:bold"><?php echo session('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo session('msg_error'); ?></p>
                    </div>
                </div>
            </div>
        </div>
*/ ?>

<div class="content">
    <form action="applicant" class="remember-login-frm" id="remember-login-frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-signup">
                    <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon"><i  class="material-icons">diversity_3</i></div>
                    <h3 class="card-title">Employee New Registration<small></small></h3>
                    </div>
                    <div class="card-body">
                        <!--Body-->
                        <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name *" value="">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name *" value="">
                            </div>
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
                </div>
            </div>          
        </div>
    </form>
 </div>
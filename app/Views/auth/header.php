<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="icon" href="https://image.flaticon.com/icons/svg/783/783192.svg">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo $metaKeywords; ?>" />
        <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
    <!-- container --> 
    <div class="login-container">
        <div class="row justify-content-center pb-2 mt-4 mb-2 border-bottom">
        <h3><i class="fa fa-shield" aria-hidden="true"></i> Security W3 Solutions</h3>
      </div> 
        <?php
        $green = session('green_message'); 
        if(!empty($green)){
            $html = '<div class="alert alert-dismissible alert-sucess">';
            $html .= $arr;
            $html .= '</div>';
            echo $html;
        }
            $arr = session('flash_message'); 
            if(!empty($arr)){
                $html = '<div class="alert alert-dismissible alert-error">';
                $html .= $arr;                 
                $html .= '<button type="button" class="close" data-dismiss="alert">×</button></div>';
                echo $html;
            }
        ?>
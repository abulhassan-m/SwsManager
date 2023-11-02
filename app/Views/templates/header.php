<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href*="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SW3S-<?= $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=yes' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
   <link rel="icon" href="<?= $module ?>assets/images/logo-app.svg">
    <?php
    use App\Libraries\MenuLibrary;
    /*foreach ($stylesheet as $stylesheets) {
      echo css_asset($stylesheets,$module);
      ?><link rel="stylesheet" href="<?=$module?>assets/css/<?=$stylesheets?>.css"><?php 
    }*/
    ?>
  <!-- CSS Just for demo purpose, don't include it in your project ->
  <link href="<?= $module ?>assets/demo/demo.css" rel="stylesheet" /> 
  <link href="<?= $module ?>style/style.min.css" rel="stylesheet"/>
  <link href="<?= $module ?>assets/scss/empstyle.css" rel="stylesheet" />-->
  <link href="<?= $module ?>assets/css/material-dashboard.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="dashboard" class="simple-text logo-normal">
          <i class="fa fa-shield" aria-hidden="true"></i> Security W3 Solutions 
        </a>
      </div> 
      <div class="sidebar-wrapper">
        <ul class="nav">
              <?php $menulibrary= new MenuLibrary(); foreach ($menulibrary->menu_navigation($user_role) as $data) { ?>
                    <li class="nav-item menu-list <?php echo $data['class']; ?>"> 
                        <?php echo anchor($data['url'], $data['text'],'class="nav-link"');  
                            $toppings_names=array($data['submenu']);  foreach ($toppings_names as $val){ if ($val != null){?>
                            <li class="nav-item <?php echo array_key_exists("sclass",$val)? $val['sclass']:''; ?>"> 
                                <?php echo anchor(array_key_exists("surl",$val) ? $val['surl']: '', array_key_exists("stext",$val) ? $val['stext']:'',
                                'class="nav-link"'); ?>
                            </li>
                            <?php }} ?>
                    </li>
              <?php } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
     <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-fixed  navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">              
                  <?php echo anchor('dashboard', '<i class="fa fa-shield" aria-hidden="true"></i> SW3S'); ?>
            <a class="navbar-brand" href="javascript:;"><?= $title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="navbar-item">
                <a class="navbar-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="navbar-item navbar-dropdown">
                <a class="navbar-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="navbar-item navbar-dropdown">
                <a class="navbar-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div> 
                  <?php echo anchor('logout', '<i class="fa fa-sign-out"></i>Log out','class="dropdown-item"'); ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
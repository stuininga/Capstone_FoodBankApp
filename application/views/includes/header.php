<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS File-->
    <link href="<?php echo base_url(); ?>assets/dist/css/custom.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

      <?php
        //For testing, remove later!
        //This variable will be populated based on which database the user is in, to change the colour of the links, etc.
        $databaseColor="green";
      ?>


    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <div class="image-container">
              <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Leduc Food Bank Logo"/>
            </div>
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <div class="image-container">
              <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Leduc Food Bank Logo"/>
            </div>
            <b>Leduc Food Bank</b>
          </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="database-navigation">
            <a class="active <?php echo $databaseColor; ?>" href="#">Clients</a>
            <a class="yellow" href="#">Example</a>
            <a class="blue" href="#">Example</a>
            <a class="purple" href="#">Example</a>
            <a class="red" href="#">Example</a>
          </div>
          <div class="navbar-user-dropdown">
            <ul class="nav navbar-nav">
              <!-- User Account -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Logged in as <?php echo $name; ?></span>
                </a>
                <!-- Account dropdown -->
                <ul class="user-dropdown-menu closed" id="dropdown-menu">
                  <li>       
                    <a href="<?php echo base_url() . 'admin/profile.php'?>">Edit Profile</a> 
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>logout" class="button"><i class="fas fa-sign-out-alt"></i> Log out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="header">CLIENTS DATABASE</li>
            <li class="treeview">
              <a class="<?php echo $databaseColor; ?>" href="<?php echo base_url(); ?>dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard Home</span></i>
              </a>
            </li>
            <li class="treeview">
              <a class="<?php echo $databaseColor; ?>" href="<?php echo base_url(); ?>">
                <i class="fas fa-user-plus"></i> 
                <span>Add Client</span></i>
              </a>
            </li>
            <li class="treeview">
              <a class="<?php echo $databaseColor; ?>" href="<?php echo base_url(); ?>">
                <i class="fas fa-search"></i> 
                <span>Search Clients</span></i>
              </a>
            </li>
            <?php //if($role == ROLE_ADMIN || $role == ROLE_MANAGER) {?>
            <?php if($role == ROLE_ADMIN) {?>
              <li class="header">REPORTS</li>
              <li class="treeview">
                <a class="<?php echo $databaseColor; ?>" href="#" >
                  <i class="fas fa-file"></i> 
                  <span>View Reports</span>
                </a>
              </li>
              <li class="treeview">
                <a class="<?php echo $databaseColor; ?>" href="#" >
                  <i class="fas fa-file-signature"></i>
                  <span>Create Reports</span>
                </a>
              </li>
            <?php } ?>
            <li class="header">USER FUNCTIONS</li>
            <?php if($role == ROLE_ADMIN) { ?>
              <li class="treeview">
                <a class="<?php echo $databaseColor; ?>" href="<?php echo base_url(); ?>userListing">
                  <i class="fa fa-users"></i>
                  <span>Manage Users</span>
                </a>
              </li>
              <li class="treeview">
                <a class="<?php echo $databaseColor; ?>" href="<?php //echo base_url(); ?>profile">
                  <i class="fas fa-user-circle"></i>
                  <span>My Profile</span>
              </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
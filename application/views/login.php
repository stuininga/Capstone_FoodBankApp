<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Leduc Food Bank | Log In</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Custom CSS File -->
    <link href="<?php echo base_url(); ?>assets/dist/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Favion -->
    <link rel="icon" type="image/png" href="assets/dist/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/dist/img/favicon-16x16.png" sizes="16x16" />

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <div class="img-container">
          <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Leduc Food Bank Logo"/>
        </div>
        <h1>Log In</h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
          $this->load->helper('form');
          $error = $this->session->flashdata('error');
          if($error) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
          $success = $this->session->flashdata('success');
          if($success) {
              ?>
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $success; ?>                    
              </div>
          <?php } ?>
        <form action="<?php echo base_url(); ?>loginMe" method="post">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row buttons">
              <a href="<?php echo base_url() ?>forgotPassword">Forgot Password</a>
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Log In" />
          </div>
        </form>   
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>My CI App</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
   
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  
   	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>js/jquery-2.1.3.js"></script>
    <script src="<?php echo base_url(); ?>js/bootbox.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
       

      }); // \ doc ready

    </script>
   
  </head>

  <body class="metro">
<div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">My CI App</a>
        </div>



        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

          <li class="active"><a href="<?php echo base_url();?>birds/loon">The Loon Bird</a></li>
               
                


            <!-- dropdown -->
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url()?>controller/alpha">Alpha</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url()?>controller/beta">Beta</a></li>
              </ul>
            </li>
          		<!-- \ dropdown -->

          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>

 


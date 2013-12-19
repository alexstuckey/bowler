<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alex Stuckey">

    <title>Bowler</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/site-wide.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/pickadate/classic.css" id="theme_base">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/pickadate/classic.date.css" id="theme_date">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/pickadate/classic.time.css" id="theme_time">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>home">Bowler</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url(); ?>home">Home</a></li>
              <li><a href="<?php echo base_url(); ?>schedule">Schedule</a></li>
              <li><a href="<?php echo base_url(); ?>items">Items</a></li>
              <li><a href="<?php echo base_url(); ?>schedule/create/quarter">Create Quarter</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

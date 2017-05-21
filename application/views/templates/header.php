<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Felipe Moura">
    
	<link rel="stylesheet" type="text/css" href="<? echo base_url("assets/css/bootstrap.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<? echo base_url("assets/css/animate.css");?>">
	<link rel="stylesheet" type="text/css" href="<? echo base_url("assets/css/custom.css");?>">
  
  <?php if($this->uri->segment(1)=="available-techniques"){
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/css/dataTables.bootstrap.min.css") . '">';
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/css/available_technique.css") . '">';
  }?>

  <link rel="manifest" href="<? echo base_url("assets/fav/manifest.json");?>">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<? echo base_url("assets/fav/ms-icon-144x144.png");?>">
  <meta name="theme-color" content="#ffffff">


  <link rel="apple-touch-icon" sizes="180x180" href="<? echo base_url('assets/fav/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<? echo base_url('assets/fav/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<? echo base_url('assets/fav/favicon-16x16.png') ?>">
  <link rel="manifest" href="<? echo base_url('assets/fav/manifest.json') ?>">
  <link rel="mask-icon" href="<? echo base_url('assets/fav/safari-pinned-tab.svg') ?>" color="#5bbad5">
  <link rel="shortcut icon" href="<? echo base_url('assets/fav/favicon.ico') ?>">
  <meta name="msapplication-config" content="<? echo base_url('assets/fav/browserconfig.xml') ?>">
  <meta name="theme-color" content="#ffffff">

	<title>Selectt</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?= base_url('home');?>">
          <img alt="Brand" src="<? echo base_url("assets/photos/selectt.png");?>" style="max-width:100px; margin-top: -7px;">
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php if($this->uri->segment(1)=="home"){echo 'class="active"';}?>>
            <a href="<?= base_url('home');?>">Home</a>
          </li>

          <li <?php if($this->uri->segment(1)=="people"){echo 'class="active"';}?>>
            <a href="<?= base_url('people');?>">People</a>
          </li>
          
          <li <?php if($this->uri->segment(1)=="publication"){echo 'class="active"';}?>>
            <a href="<?= base_url('publication');?>">Publication</a>
          </li>
          
          <li <?php if($this->uri->segment(1)=="available-techniques"){echo 'class="active"';}?>>
            <a href="<?= base_url('available-techniques');?>">Available Techniques</a>
          </li>

          <li <?php if($this->uri->segment(1)=="contact"){echo 'class="active"';}?>>
            <a href="<?= base_url('contact');?>">Contact</a>
          </li>
        </ul>
        
        <button onclick="location.href=' <?= base_url('register');?>'" class="btn btn-success pull-right" type="submit" id="btnLogin" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Register</button>     

        <button onclick="location.href=' <?= base_url('login')?>'" class="btn btn-primary pull-right" type="submit" id="btnLogin" style="margin-top: 0.5em;">Login</button>         
      </div>

    </div>
  </nav>

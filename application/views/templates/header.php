<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Felipe Moura">
    
	<link rel="stylesheet" type="text/css" href="<? echo base_url("sources/css/bootstrap.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<? echo base_url("sources/css/animate.css");?>">
	<link rel="stylesheet" type="text/css" href="<? echo base_url("sources/css/custom.css");?>">

  <link rel="manifest" href="<? echo base_url("sources/fav/manifest.json");?>">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<? echo base_url("fav/ms-icon-144x144.png");?>">
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

        <a class="navbar-brand" href="<?= base_url('index.php/home');?>">
          <img alt="Brand" src="<? echo base_url("sources/assets/selectt.png");?>" style="max-width:100px; margin-top: -7px;">
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php if($this->uri->segment(1)=="home"){echo 'class="active"';}?>><a href="<?= base_url('index.php/home');?>">Home</a></li>
          <li <?php if($this->uri->segment(1)=="people"){echo 'class="active"';}?>><a href="<?= base_url('index.php/people');?>">People</a></li>
          <li <?php if($this->uri->segment(1)=="publication"){echo 'class="active"';}?>><a href="<?= base_url('index.php/publication');?>">Publication</a></li>
          <li <?php if($this->uri->segment(1)=="contact"){echo 'class="active"';}?>><a href="<?= base_url('index.php/contact');?>">Contact</a></li>
        </ul>
        
        <button onclick="location.href=' <?= base_url('index.php/register');?>'" class="btn btn-success pull-right" type="submit" id="btnLogin" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Register</button>     

        <button onclick="location.href=' <?= base_url('index.php/login')?>'" class="btn btn-primary pull-right" type="submit" id="btnLogin" style="margin-top: 0.5em;">Login</button>         
      </div>

    </div>
  </nav>
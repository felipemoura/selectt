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

  <?php if ($this->uri->segment(2)=="weights"){
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/jqueryui/jquery-ui.theme.css") . '">';
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/jqueryui/jquery-ui.min.css") . '">';
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/css/bootstrap-slider.min.css") . '">';
  }?>

  <?php if( ($this->uri->segment(2)=="users") || ($this->uri->segment(2)=="techniques") ){
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/datatables/css/dataTables.bootstrap.min.css") . '">';
  }?>

  <?php if($this->uri->segment(1)=="admin"){
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/css/admin.css") . '">';
  }?>

  <?php if ( ($this->uri->segment(1)=="insert_test") || ($this->uri->segment(1)=="form") || ($this->uri->segment(2)=="editTechnique" ) ){
    
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/tagsinput/bootstrap-tagsinput-typeahead.css") . '">';
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/tagsinput/bootstrap-tagsinput.css") . '">';
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

        <a class="navbar-brand" href="<?= base_url('logged');?>">
          <img alt="Brand" src="<? echo base_url("assets/photos/selectt.png");?>" style="max-width:100px; margin-top: -7px;">
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php if($this->uri->segment(1)=="insert_test") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('insert_test');?>">Insert Technique</a>
          </li>

          <li <?php if($this->uri->segment(1)=="form") {   echo 'class="active"';     }?>>
            <a href="<?= base_url('form');?>">Fill Form</a>
          </li>

          <li <?php if($this->uri->segment(1)=="results") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('results');?>">Results</a>
          </li>

        <? if ($this->session->userdata('is_admin')) : ?>
          <!-- Only if Admin page -->
          <li <?php if($this->uri->segment(1)=="admin") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('admin');?>">Admin</a>
          </li>
        <? endif; ?>
        </ul>


        <button onclick="location.href='<?= base_url('login/logout');?>'" class="btn btn-danger pull-right" type="submit" id="btnLogout">Logout</button>
        <div class="pull-right" style="margin: auto; padding-top: 13px; padding-right: 20px;">Welcome, <? echo $this->session->userdata('name'); ?></div> 
     
      </div>

    </div>
  </nav>

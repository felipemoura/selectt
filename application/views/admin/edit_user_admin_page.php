<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeIn">
  <h1>Edit user: <?= $user['USERNAME']; ?>  
  <div class="pull-right">
    <a href="<?= base_url('admin/users'); ?>">
      <button style="width: 200px;" type="button" class="btn btn-danger">Return</button>
    </a>  
  </div>  
  </h1>
  <h5>Please provide the information below.</h5>
  <br>

  <?php echo $this->session->flashdata('msg'); ?>

  <?php echo form_open_multipart('admin/updateUser/'.$user['ID']);?>

  <!-- Technique name -->
  <div class="form-group">
    <label for="inputUsername">Username:</label>
    <input type="text" class="form-control" id="inputUsername" name="inputUsername" aria-describedby="titleHelp" placeholder="Enter username" required focus>
    <span class="text-danger"><?php echo form_error('inputUsername'); ?></span>
  </div>

  <div class="form-group">
    <label for="inputEmail">Email:</label>
    <input type="text" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="titleHelp" placeholder="Enter Email" required focus>
    <span class="text-danger"><?php echo form_error('inputEmail'); ?></span>
  </div>

  <div class="form-group">
    <label for="inputFullName">Full Name:</label>
    <input type="text" class="form-control" id="inputFullName" name="inputFullName" aria-describedby="titleHelp" placeholder="Enter Full Name" required focus>
    <span class="text-danger"><?php echo form_error('inputFullName'); ?></span>
  </div>

  <div class="form-group">
    <label for="inputInstitution">Institution:</label>
    <input type="text" class="form-control" id="inputInstitution" name="inputInstitution" aria-describedby="titleHelp" placeholder="Enter Institution">
    <span class="text-danger"><?php echo form_error('inputInstitution'); ?></span>
  </div>

  <!-- Submit Form -->
  <button type="submit" onclick="return confirm('Do you really want to update user: <?= $user['USERNAME']; ?>  ?');" class="btn btn-block btn-success">Update <?= $user['USERNAME']; ?> </button>

  <!-- Return -->
  <a href="<?= base_url('admin/users'); ?>">
    <button type="button" class="btn btn-block btn-danger">Return</button>
  </a> 
  
</div>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? if (isset($record)): ?>

<div class="container animated fadeInDown">
  <h1>Edit <?= $record['ApproachTechniqueName']; ?> Technique 
	<div class="pull-right">
	  <a href="javascript:history.go(-1)">
	  	<button style="width: 200px;" type="button" class="btn btn-danger">Return</button>
	  </a> 	
	</div>  
  </h1>
  <h5>Please provide the information below.</h5>
  <br>

  <? if (isset($error)): ?>
      <div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $error; ?></div>
  <? endif; ?>

  <?php echo form_open_multipart('Admin/updateRecord'.$record['ID']);?>

  <!-- Technique name -->
  <div class="form-group">
    <label for="inputApproachTechniqueName">Technique Name:</label>
    <input type="text" class="form-control" id="inputApproachTechniqueName" name="inputApproachTechniqueName" aria-describedby="titleHelp" placeholder="Enter Technique name" required focus>
    <strong><small>Required</small></strong>
    <span class="text-danger"><?php echo form_error('inputApproachTechniqueName'); ?></span>
  </div>

  <!-- Title -->
  <div class="form-group">
    <label for="inputTitle">Title:</label>
    <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="titleHelp" placeholder="Enter project Title" required focus>
    <strong><small>Required</small></strong>
    <span class="text-danger"><?php echo form_error('inputTitle'); ?></span>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4 cold-sm-12 cold-xs-12">
      <!-- Year -->
      <div class="form-group">
        <label for="inputYear">Select year of publication:</label>
        <select class="form-control" id="inputYear" name="inputYear"></select>
        <span class="text-danger"><?php echo form_error('inputYear'); ?></span>
      </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
        <label class="form-check-label">
          <input type="checkbox" name="checkinputYear" id="checkinputYear" class="form-check-input" onchange="toggleCheckbox(this)" value="1">
          No information
        </label>
      </div>
    </div>
  </div>
  
  <?php foreach ($record as $key => $item): ?>
	<? if (($key == "ID") || ($key == "Title") || ($key == "Year")) { continue; } ?>

    <div class="row">
      <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
        <!-- <?= $item; ?> -->
        <div class="form-group">
          <label for="<?= 'input'. str_replace(' ', '', $key); ?>"><?= $key; ?>:</label>
          <textarea class="form-control" id="<?= 'input'. str_replace(' ', '', $key); ?>" name="<?= 'input'. str_replace(' ', '', $key); ?>" rows="3"></textarea>
          <span class="text-danger"><?php echo form_error($key); ?></span>
        </div>
      </div>

      <!--  <?= $item; ?> checkbox  -->
      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
            <label class="form-check-label">
              <input type="checkbox" name="check<?= 'input'. str_replace(' ', '', $key); ?>" id="check<?= 'input'. str_replace(' ', '', $key); ?>" class="form-check-input" onchange="toggleCheckbox(this)" value="1"> No information
            </label>
          </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Submit Form -->
  <button type="submit" onclick="return confirm('Do you really want to update <?= $record['ApproachTechniqueName']; ?> Technique ?');" class="btn btn-block btn-success">Update <?= $record['ApproachTechniqueName']; ?> </button>

  <!-- Return -->
  <a href="javascript:history.go(-1)">
	  <button type="button" class="btn btn-block btn-danger">Return</button>
  </a> 
</div>

<? endif; ?>

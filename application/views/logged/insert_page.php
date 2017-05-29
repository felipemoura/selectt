<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeIn">
  <h1>Insert Technique</h1>
  <h5>Please provide the information below.</h5>
  <br>
  
  <?php echo form_open_multipart(base_url('insert_test/insert_database'));?>

  <?php echo $this->session->flashdata('msg'); ?> 

  <!-- Technique name -->
  <div class="form-group">
    <label for="inputApproachTechniqueName">Technique name:</label>
    <input type="text" class="form-control" id="inputApproachTechniqueName" name="inputApproachTechniqueName" aria-describedby="titleHelp" placeholder="Enter Technique name" required focus>
    <small>* Required</small>
    <span class="text-danger"><?php echo form_error('inputApproachTechniqueName'); ?></span>
  </div>

  <!-- Title -->
  <div class="form-group">
    <label for="inputTitle">Title:</label>
    <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="titleHelp" placeholder="Enter project Title" required focus>
    <small>* Required</small>
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
  
  <?php foreach ($id as $key => $item): ?>
    <div class="row">
      <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
        <!-- <?= $item; ?> -->
        <div class="form-group">
          <label for="<?= $item; ?>"><?= $name[$key]; ?>:</label>
          <textarea class="form-control" id="<?= $item; ?>" name="<?= $item; ?>" placeholder="Enter <?= $name[$key]; ?>" rows="3"></textarea>
          <span class="text-danger"><?php echo form_error($item); ?></span>
        </div>
      </div>

      <!--  <?= $item; ?> checkbox  -->
      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
            <label class="form-check-label">
              <input type="checkbox" name="check<?= $item; ?>" id="check<?= $item; ?>" class="form-check-input" onchange="toggleCheckbox(this)" value="1"> No information
            </label>
          </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Submit Form -->
  <button type="submit" class="btn btn-block btn-success">Insert Technique into Database</button>
</div>

<script type="text/javascript">
    function toggleCheckbox(el) {
      var theId = el.id.replace("check","");

      if( el.checked ){
         $("#" + theId).prop('disabled', true);
      }else{
         $("#" + theId).prop('disabled', false);
      }
    }
</script>
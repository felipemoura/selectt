<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<div class="container animated fadeIn">
  <h1>Insert Technique</h1>
  <h5>Please provide the information below.</h5>
  <br>
  
  <?php echo form_open_multipart(base_url('insert_test/insert_database'));?>

  <?php echo $this->session->flashdata('msg'); ?> 

  <?php foreach($fields as $field): ?>
    <div class="row">

      <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
        <!-- <?= $field['atribute']; ?> -->
        <div class="form-group">
          <label for="<?= $field['html_id']; ?>"><?= $field['html_label']; ?></label>    

          <textarea type="text" class="form-control" id="<?= $field['html_id']; ?>" name="<?= $field['html_name']; ?>" rows="<?= $field['html_row_count']; ?>" placeholder="<?= $field['html_placeholder']; ?>"></textarea>

          <small><?= $field['html_info']; ?></small>
          <span class="text-danger"><?php echo form_error($field['html_id']); ?></span>
        </div>
      </div>
      <!--  <?= $field['atribute']; ?> checkbox  -->
      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
          <label class="form-check-label">
            <input type="checkbox" name="check<?= $field['html_id']; ?>" id="check<?= $field['html_id']; ?>" class="form-check-input" onchange="toggleCheckbox(this)" value="1"> No information
          </label>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Submit Form -->
  <button type="submit" class="btn btn-block btn-success">Insert Technique into Database</button>
</div>

<!-- START OF FOOTER -->
<?  $this->load->view('templates/footer'); ?>

<script src="<? base_url("assets/js/insert_custom.js"); ?>" type="text/javascript"></script>

<!-- END OF IT  -->
</body>
</html>
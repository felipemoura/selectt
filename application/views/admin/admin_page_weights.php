<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<style type="text/css">
  form {
    margin: auto;
    padding: 0 70px;
  }

  .slider-selection {
    background: #555;
  }

  .slider.slider-horizontal {
    width: 700px;
  }
</style>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
      
        <? $this->load->view('templates/admin_nav'); ?>


        <div class="col-lg-10 col-md-10">
          <div class="content-box-large">

            <?php echo $this->session->flashdata('msg'); ?>
          
            <h2> Edit Techniques Weight </h2>
            <br>
            <br>
            <? echo form_open ('admin/saveWeights') ?>
            <?php foreach($fields as $field): ?>

            <div class="form-group" style="margin-bottom: 25px;">
              <label style="font-size: 12pt;" for="<?= $field['html_ID']; ?>"><?= $field['html_label']; ?></label>
              <br>
              <input id="<?= $field['html_ID']; ?>" name="<?= $field['html_Name']; ?>" data-slider-id='<?= $field['html_ID'] . 'SliderVal'; ?>' type="number" data-slider-min="0" data-slider-max="1" data-slider-step="0.01" data-slider-value="<?= $field['weight']; ?>"/>
              <span class="text-danger"><?php echo form_error($field['html_ID']); ?></span>
            </div>

            <?php endforeach; ?>
              <!-- Submit Form -->
              <button type="submit" style="margin-top: 20px; width: 700px;" class="btn btn-block btn-success">Save Weights</button>
            </form>

           </div>            
        <!-- End row -->
          </div>
        <!-- End Page content -->
        </div>
    </div>
  </div>
</div>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer');?>

<script src="<?= base_url('assets/media/jqueryui/jquery-ui.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/bootstrap-slider.min.js'); ?>" type="text/javascript"></script>


<script>
  $(document).ready( function () { 
    <?php foreach($fields as $field): ?>
    $("<?= $field['html_ID'];?>").bootstrapSlider({
      precision: 2,
      ticks: [0.00, 0.25, 0.50, 0.75, 1.00],
      ticks_labels: ['0.00', '0.25', '0.50', '0.75', '1.00'],
    });

  <?php endforeach; ?>
});
</script>

<!-- END OF IT -->
</body>
</html>
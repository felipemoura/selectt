<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<style type="text/css">
  hr.line { 
    height: 30px; 
    border-style: solid; 
    border-color: #8c8b8b; 
    border-width: 1px 0 0 0; 
    border-radius: 20px; 
  } 
  hr.line:before { 
    display: block; 
    content: ""; 
    height: 30px; 
    margin-top: -31px; 
    border-style: solid; 
    border-color: #8c8b8b; 
    border-width: 0 0 1px 0; 
    border-radius: 20px; 
  }
  .bootstrap-tagsinput {
    width: 100%;
  }
</style>

<div class="container animated fadeIn">
  <h1>Insert Technique</h1>
  <h5>Please provide the information below.</h5>
  <br>
  
  <?php echo form_open(base_url('insert_test/insert_database'));?>
  <?php echo $this->session->flashdata('msg'); ?> 


  <?php $count = 0; ?>
  <h2 align="center" style="margin-top: 50px"><?= 'Part '. ($count+1) . ' - ' . $name[$count++]; ?></h2>
  <hr class="line">

  <!-- INIT Title -->
  <div class="form-group">

    <!-- Title -->
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter the Title of the project published" required focus>

    <small style="font-weight: 900;">* Required</small>
    <span class="text-danger"><?php echo form_error('title'); ?></span>

  </div>
  <br>
  <!-- END Title -->

  <!-- INIT Year -->
  <div class="row">
    <div class="col-lg-6 col-md-6 cold-sm-12 cold-xs-12">

      <!-- Year -->
      <div class="form-group">
        <label for="year">Select year of publication:</label>
        <select class="form-control" id="year" name="year"></select>
        <span class="text-danger"><?php echo form_error('year'); ?></span>
      </div>
    </div>
    
    <!--  Year checkbox  -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
        <label class="form-check-label">
          <input type="checkbox" name="checkyear" id="checkyear" class="form-check-input" value="1">
          No information
        </label>
      </div>
    </div>

  </div>
  <br>
  <!-- END Year -->



  <!-- INIT BibTex -->
  <div class="row">

  <!-- Bibliografic reference (Bibtex) -->
    <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
      <div class="form-group">
        <label for="bibtex">Bibliografic reference (Bibtex)</label>    

        <textarea type="text" class="form-control" id="bibtex" name="bibtex" rows="5"></textarea>

        <small>The Bibliografic reference (Bibtex)</small>
        <span class="text-danger"><?php echo form_error('bibtex'); ?></span>
      </div>
    </div>

    <!--  Bibliografic reference (Bibtex) checkbox  -->
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
        <label class="form-check-label">
          <input type="checkbox" name="checkbibtex" id="checkbibtex" class="form-check-input" value="1"> No information
        </label>
      </div>
    </div>

  </div>
  <br>
  <!-- END bibTex -->



  <!-- INIT Link -->
  <div class="row">

  <!-- Link (URL) -->
    <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
      <div class="form-group">
        <label for="link">Link (URL)</label>    

        <textarea type="text" class="form-control" id="link" name="link" rows="1"></textarea>

        <small>Link to the article</small>
        <span class="text-danger"><?php echo form_error('link'); ?></span>
      </div>
    </div>

    <!--  Link (URL) checkbox  -->
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
        <label class="form-check-label">
          <input type="checkbox" name="checklink" id="checklink" class="form-check-input" value="1"> No information
        </label>
      </div>
    </div>

  </div>
  <br>
  <!-- END Link -->

  
  <?php foreach($category as $fields): ?>

    <h2 align="center" style="margin-top: 50px"><?= 'Part '. ($count+1) . ' - ' .$name[$count++] ;?></h2>
    <hr class="line">
    <?php foreach($fields as $field): ?>

    <!-- INIT <?= $field['atribute']; ?> -->
      <div class="row">
        
        <!-- <?= $field['atribute']; ?> -->
        <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
          <div class="form-group <?= $field['html_id']; ?>">
            <label for="<?= $field['html_id']; ?>"><?= $field['html_label']; ?></label>    

            <input type="text" class="form-control typeahead" id="<?= $field['html_id']; ?>" name="<?= $field['html_name']; ?>" rows="<?= $field['html_row_count']; ?>" data-role="tagsinput"></input>

            <small><?= $field['html_info']; ?></small>
            <span class="text-danger"><?php echo form_error($field['html_id']); ?></span>
          </div>
        </div>

        <!--  <?= $field['atribute']; ?> checkbox  -->
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
            <label class="form-check-label">
              <input type="checkbox" name="check<?= $field['html_id']; ?>" id="check<?= $field['html_id']; ?>" class="form-check-input" value="1"> No information
            </label>
          </div>
        </div>

      </div>
      <!-- END <?= $field['atribute']; ?> -->
      <br>

    <?php endforeach; ?>
  <?php endforeach; ?>

  <!-- Submit Form -->
  <button style="margin-top: 50px; border: 1px solid #8c8b8b;" type="submit" class="btn btn-block btn-success">Insert Technique into Database</button>
</div>

<!-- START OF FOOTER -->
<?  $this->load->view('templates/footer'); ?>

<script src="<?= base_url('assets/media/lib/typeahead.js/typeahead.bundle.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/media/tagsinput/bootstrap-tagsinput.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  <?php foreach($category as $fields): ?>
    <?php foreach($fields as $field): ?>

    var <?= $field['html_id']; ?> = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: window.location.origin + '/selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>'),
      local: window.location.origin + '/selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>'),
      // prefetch: '../selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>'),
      remote: {
        url: window.location.origin + '/selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>')
        // url: '../selectt/api/tableInfo/table/%QUERY.json',
        // wildcard: '%QUERY'
      }
    });

    <?= $field['html_id']; ?>.initialize();

    $("#<?= $field['html_id']; ?>").tagsinput({
      typeaheadjs: [{
        hint: true,
        highlight: true,
        minLength: 1,
        ttl_ms: 1,
        prefetch: window.location.origin + '/selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>'),
        remote: window.location.origin + '/selectt/api/tableInfo/table/' + capitalizeFirstLetter('<?= $field['html_id']; ?>')
      },{
        name: '<?= $field['html_id']; ?>',
        source: <?= $field['html_id']; ?>.ttAdapter()
      }],
      freeInput: true
    });  


    $(".<?= $field['html_id']; ?> input").blur(function(){
      $('#<?= $field['html_id']; ?>').tagsinput('add', $(this).val());
      $(this).val('');
    });

    <?php endforeach; ?>
  <?php endforeach; ?>


  $(document).ready(function(){
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "<option> </option>";

    for(var year = end ; year >= start; year--){
      options += "<option>"+ year +"</option>";
    }
    document.getElementById("year").innerHTML = options;
  });
 
</script>

<!-- END OF IT  -->
</body>
</html>
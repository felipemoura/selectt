<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<div class="container animated fadeIn">

  <h1>Contact</h1>

  <!-- Contact Form -->
  <form role="form" method="post" action="<?= base_url('contact/sendContactMail'); ?>">

    <?php echo $this->session->flashdata('msg'); ?>

    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="name" class="form-control" name="inputName" id="inputName" aria-describedby="NameHelp" placeholder="Name" required focus>
      <small class="form-text text-muted" style="color:black">* Required</small>
      <span class="text-danger">
        <?php echo form_error('inputName'); ?>
      </span>
    </div>

    <div class="form-group">
      <label for="inputEmail">Email address</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter a valid email" required focus>
      <small id="emailHelp" class="form-text text-muted" style="color:black">* Required. We'll never share your email with anyone else. We promisse!</small>
      <span class="text-danger">
        <?php echo form_error('inputEmail'); ?>
      </span>
    </div>

    <div class="form-group">
      <label for="inputSubject">Subject</label>
      <select class="form-control" id="inputSubject" name="inputSubject">
        <option value=""></option>
        <option value="Bug reports">Bug report</option>
        <option value="Contributing">Contributing</option>
        <option value="Features requests">Features requests</option>
        <option value="Mailing lists">Mailing lists</option>
        <option value="Project suggestions">Project suggestions</option>
        <option value="Other">Other</option>
      </select>
      <span class="text-danger">
        <?php echo form_error('inputSubject'); ?>
      </span>
    </div>

    <div class="form-group">
      <label for="inputPhoneNumber">Phone Number</label>
      <input class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" aria-describedby="numberHelp" placeholder="Phone Number">
      <span class="text-danger">
        <?php echo form_error('inputPhoneNumber'); ?>
      </span>
    </div>

    <div class="form-group">
      <label for="inputInstitution">Institution</label>
      <input class="form-control" id="inputInstitution" name="inputInstitution"  aria-describedby="InstitutionHelp" placeholder="Institution name">
      <span class="text-danger">
        <?php echo form_error('inputInstitution'); ?>
      </span>
    </div>

    <div class="form-group">
      <label for="inputMessage">Message</label>
      <textarea class="form-control" id="inputMessage" name="inputMessage" rows="5" placeholder="Enter Message" required focus></textarea>
      <small class="form-text text-muted" style="color:black">* Required</small>
      <span class="text-danger">
        <?php echo form_error('inputMessage'); ?>
      </span>
    </div>

    <!-- Recaptcha -->
    <div class="g-recaptcha" data-sitekey="6Le0dyIUAAAAAEZXgofwNVy8ZPE_hic7wRaVy-YK"></div>
    <span class="text-danger">
      <?php echo form_error('g-recaptcha-response'); ?>
    </span>

    <!-- SUBMIT BUTTON -->
    <button type="submit" class="btn btn-block btn-primary">Submit</button>

  </form>
</div>

<!-- START OF FOOTER -->
<?  $this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

<script src="<?= base_url('assets/js/tinymce/tinymce.min.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    tinymce.init({ 
      selector:"textarea" ,
      height: 300 ,
      theme: 'modern',
      plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
      image_advtab: true
    });
  });
</script>

</body>
</html>
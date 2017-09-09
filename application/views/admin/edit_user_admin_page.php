<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>

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
  <span id="error"></span>

  <!-- Technique name -->
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="titleHelp" placeholder="Enter username" required focus>
    <span class="text-danger"><?php echo form_error('username'); ?></span>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="titleHelp" placeholder="Enter Email" required focus>
    <span class="text-danger"><?php echo form_error('email'); ?></span>
  </div>

  <div class="form-group">
    <label for="fullname">Full Name</label>
    <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="titleHelp" placeholder="Enter Full Name" required focus>
    <span class="text-danger"><?php echo form_error('fullname'); ?></span>
  </div>

  <div class="form-group">
    <label for="institution">Institution</label>
    <input type="text" class="form-control" id="institution" name="institution" aria-describedby="titleHelp" placeholder="Enter Institution">
    <span class="text-danger"><?php echo form_error('institution'); ?></span>
  </div>

  <!-- Submit Form -->
  <button type="submit" onclick="return confirm('Do you really want to update user: <?= $user['USERNAME']; ?>  ?');" class="btn btn-block btn-success">Update <?= $user['USERNAME']; ?> </button>

  <!-- Return -->
  <a href="<?= base_url('admin/users'); ?>">
    <button type="button" class="btn btn-block btn-danger">Return</button>
  </a> 
  
</div>

<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        let httpRequest;
        let id = <?= $user['ID'] ?>;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
          httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }

        httpRequest.onreadystatechange = function(){
          if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
              let data = JSON.parse(httpRequest.responseText);

              $('#username').val(data.USERNAME);
              $('#email').val(data.EMAIL);
              $('#fullname').val(data.FULLNAME);
              $('#institution').val(data.INSTITUTION);

            } else {
              let errorHTML = '<div class="alert alert-danger" style="text-align: center;">' +  httpRequest.responseText +'</div>';
              $('#error').empty().append(errorHTML);
            }
          }
        };

        httpRequest.open('GET', window.location.origin + '/selectt/api/user/id/' + id, true);
        httpRequest.send(null);

      });
</script>

<!-- END OF IT -->
</body>
</html>
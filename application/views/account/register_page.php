<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<? $this->load->view('templates/header'); ?>


<!-- Register Container -->
<div class="container animated fadeIn" id="register">

    <form class="form-signin" role="form" method="post" action="<?= base_url('register/registerCheck'); ?>">
        <h2 class="form-signin-heading">Register Account</h2>

        <?php echo $this->session->flashdata('verify_msg'); ?>
        <?php echo $this->session->flashdata('msg'); ?>

        <!-- Full Name -->
        <div class="form-group">
            <label for="inputName">Full Name</label>
            <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Full Name" value="<?php echo set_value('inputName'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputName'); ?></span>
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="inputUsername">Username</label>
            <input class="form-control" type="text" id="inputUsername" name="inputUsername" placeholder="Username" value="<?php echo set_value('inputUsername'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputUsername'); ?></span>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" id="inputPassword" name="inputPassword" placeholder="Password" value="<?php echo set_value('inputPassword'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputPassword'); ?></span>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="inputPasswordConfirm">Confirm Password</label>
            <input class="form-control" type="password" id="inputPasswordConfirm" name="inputPasswordConfirm" placeholder="Confirm password" value="<?php echo set_value('inputPasswordConfirm'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputPasswordConfirm'); ?></span>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo set_value('inputEmail'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputEmail'); ?></span>
        </div>

        <!-- Confirm Email -->
        <div class="form-group">
            <label for="inputEmailConfirm">Confirm Email</label>
            <input class="form-control" type="email" id="inputEmailConfirm" name="inputEmailConfirm" placeholder="Confirm Email" value="<?php echo set_value('inputEmailConfirm'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputEmailConfirm'); ?></span>
        </div>

        <!-- Institution -->
        <div class="form-group">
            <label for="inputInstitution">Institution</label>
            <input class="form-control" type="text" id="inputInstitution" name="inputInstitution" placeholder="Institution" value="<?php echo set_value('inputInstitution'); ?>" required autofocus>
            <span class="text-danger"><?php echo form_error('inputInstitution'); ?></span>
        </div>

        <!-- Recaptcha -->
        <div class="g-recaptcha" data-sitekey="6Le0dyIUAAAAAEZXgofwNVy8ZPE_hic7wRaVy-YK"></div>
        <span class="text-danger"><?php echo form_error('g-recaptcha-response'); ?></span>


        <button class="btn btn-danger btn-block" id="btnConfirm" type="submit">Confirm</button>
    </form>
</div>

<!-- START FOOTER -->
<?  $this->load->view('templates/footer'); ?>

<!-- END OF IT  -->
</body>
</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Login container -->
<!-- Login FORM -->


<div class="container form-signin animated fadeInDown">

	<form class="form-signin" role="form" method="post" action="<?= base_url('index.php/login/loginCheck') ?>">

		<h2 class="form-signin-heading">Log in</h2>

		<? if (isset($error)): ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $error; ?></div>
		<? endif; ?>


	 	<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

		<button class="btn btn-primary btn-block" id="btnLogin" type="submit">Sign in</button>
		<!-- <a href="<?= base_url('index.php/register') ?>"><button class="btn btn-success btn-block" id="btnRegister" type="submit">Register</button></a> -->
	</form>	
</div>




<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Login container -->
<!-- Login FORM -->
<div class="container animated fadeInDown">

	<form class="form-signin" role="form" method="post" action="login/loginCheck">

		<h2 class="form-signin-heading">Log in</h2>

		<? if (isset($error)): ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $error; ?></div>
		<? endif; ?>

		<!-- Username -->
	 	<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>

		<!-- Password -->
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

		<!-- Sign in -->
		<button class="btn btn-primary btn-block" id="btnLogin" type="submit">Sign in</button>

	</form>	
</div>

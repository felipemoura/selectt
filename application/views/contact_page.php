<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="container animated fadeIn">

<h1>Contact</h1>

  <!-- Contact Form -->
  <form role="form" method="post" action="contact/">
    <div class="form-group">
      <label for="InputName">Name</label>
      <input type="name" class="form-control" id="InputName" aria-describedby="NameHelp" placeholder="Name" required focus>
      <small class="form-text text-muted" style="color:black">* Required</small>
    </div>

    <div class="form-group">
      <label for="InputEmail1">Email address</label>
      <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter a valid email" required focus>
      <small id="emailHelp" class="form-text text-muted" style="color:black">* Required. We'll never share your email with anyone else. We promisse!</small>

    </div>

    <div class="form-group">
      <label for="phoneNumber">Phone Number</label>
      <input class="form-control" id="phoneNumber" aria-describedby="numberHelp" placeholder="Phone Number">
    </div>

    <div class="form-group">
      <label for="phoneNumber">Company</label>
      <input class="form-control" id="Company" aria-describedby="companyHelp" placeholder="Company">
    </div>

    <div class="form-group">
      <label for="exampleTextarea">Text</label>
      <textarea class="form-control" id="exampleTextarea" rows="4" placeholder="Enter Text" required focus></textarea>
      <small class="form-text text-muted" style="color:black">* Required</small>
    </div>

    <button type="submit" class="btn btn-block btn-primary">Submit</button>

  </form>
</div>


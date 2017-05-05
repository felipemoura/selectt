<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="container animated fadeInDown">

<h1>Contact</h1>

 <!-- Form -->
  <form>
    <div class="form-group">
      <label for="InputName">Name</label>
      <input type="name" class="form-control" id="InputName" aria-describedby="NameHelp" placeholder="Name">
    </div>

    <div class="form-group">
      <label for="InputEmail1">Email address</label>
      <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter a valid email">
      <small id="emailHelp" class="form-text text-muted" style="color:black">I'll never share your email with anyone else. I promisse!</small>
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
      <textarea class="form-control" id="exampleTextarea" rows="4" placeholder="Enter Text"></textarea>
   </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</div>


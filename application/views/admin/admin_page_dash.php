<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<? $this->load->view('templates/header_logged'); ?>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
      
        <? $this->load->view('templates/admin_nav'); ?>

        <div class="col-lg-10 col-md-10">
          <div class="content-box-large">

            	<h2> Some dash stuff </h2>
            	<p>Soon....</p>


          <!-- End context -->
          </div>
        <!-- End cols -->
        </div>
      <!-- End row -->
	  </div>
    <!-- End Page content -->
    </div>
</div>

<!-- START OF FOOTER -->
<? $this->load->view('templates/footer');?>
<!-- END OF IT -->

</body>
</html>
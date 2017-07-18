<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<? $this->load->view('templates/header_logged'); ?>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
    	  <div class="col-lg-2 col-md-2">
    	  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current">
                    	<a href="<?= base_url('admin'); ?>">
                            <i class="glyphicon glyphicon-home"></i>Dashboard
                        </a>
                    </li>

                    <li>
                    	<a href="<?= base_url('admin/techniques'); ?>">
                    		<i class="glyphicon glyphicon-hdd"></i>Techniques
                    	</a>
                   	</li>

                    <li>
                        <a href="<?= base_url('admin/users'); ?>">
                            <i class="glyphicon glyphicon-user"></i>Users
                        </a>
                    </li>


                    <li>
                        <a href="<?= base_url('admin/content'); ?>">
                            <i class="glyphicon glyphicon-edit"></i>Content
                        </a>
                    </li>

                </ul>
             </div>
    	</div>

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
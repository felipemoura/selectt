<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
      
        <? $this->load->view('templates/admin_nav'); ?>

        <div class="col-lg-10 col-md-10">
          <div class="content-box-large">

            	<h2> Selectt data information</h2>


              <div id="numberTechnique"></div>

              <div id="numberSearch"></div>

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

<script src="<?= base_url('assets/js/raphael.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/morris.min.js'); ?>" type="text/javascript"></script>


<script type="text/javascript">
  Morris.Area({
    element: 'numberTechnique',
    data: [
    { y: '2000', a:-900 },
    { y: '2006', a: 100 },
    { y: '2007', a: 75 },
    { y: '2008', a: 50 },
    { y: '2009', a: 75 },
    { y: '2010', a: 50 },
    { y: '2011', a: 75 },
    { y: '2012', a: 100 }
    ],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Number of Techniques Inserted in ' + new Date().getFullYear() + ' by Month' ]
  });


    Morris.Area({
    element: 'numberSearch',
    data: [
    { y: '2000', b: 100 },
    { y: '2006', b: 90  },
    { y: '2007', b: 65  },
    { y: '2008', b: 40  },
    { y: '2009', b: 65  },
    { y: '2010', b: 40  },
    { y: '2011', b: 65  },
    { y: '2012', b: 90  }
    ],
    xkey: 'y',
    ykeys: ['b'],
    labels: ['Number of techniques searches in ' + new Date().getFullYear() + ' by Month']
  });
</script>
<!-- END OF IT -->
</body>
</html>
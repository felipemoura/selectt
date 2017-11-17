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
              <br><br>
              <div id="numberSearch"></div>
              <br><br>
              <div id="numberUsers"></div>
              <br><br>
              <div id="numberLastLogin"></div>

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
  var year = new Date().getFullYear();
  Morris.Area({
    element: 'numberTechnique',
    data: [
    { y: year + '-01', a: <?= $technique[1]; ?> },
    { y: year + '-02', a: <?= $technique[2]; ?> },
    { y: year + '-03', a: <?= $technique[3]; ?> },
    { y: year + '-04', a: <?= $technique[4]; ?> },
    { y: year + '-05', a: <?= $technique[5]; ?> },
    { y: year + '-06', a: <?= $technique[6]; ?> },
    { y: year + '-07', a: <?= $technique[7]; ?> },
    { y: year + '-08', a: <?= $technique[8]; ?> },
    { y: year + '-09', a: <?= $technique[9]; ?> },
    { y: year + '-10', a: <?= $technique[10]; ?> },
    { y: year + '-11', a: <?= $technique[11]; ?> },
    { y: year + '-12', a: <?= $technique[12]; ?> }],
      xkey: 'y',
      ykeys: ['a'],
      hoverCallback: function(index, options, content) {
          return(content);
      },
      parseTime: false,
      labels: ['Number of Techniques Inserted in ' + year + ' by Month' ]
    });


    Morris.Area({
    element: 'numberSearch',
    data: [
    { y: year + '-01', a: <?= $resultTechnique[1]; ?>  },
    { y: year + '-02', a: <?= $resultTechnique[2]; ?>  },
    { y: year + '-03', a: <?= $resultTechnique[3]; ?>  },
    { y: year + '-04', a: <?= $resultTechnique[4]; ?>  },
    { y: year + '-05', a: <?= $resultTechnique[5]; ?>  },
    { y: year + '-06', a: <?= $resultTechnique[6]; ?>  },
    { y: year + '-07', a: <?= $resultTechnique[7]; ?>  },
    { y: year + '-08', a: <?= $resultTechnique[8]; ?>  },
    { y: year + '-09', a: <?= $resultTechnique[9]; ?>  },
    { y: year + '-10', a: <?= $resultTechnique[10]; ?> },
    { y: year + '-11', a: <?= $resultTechnique[11]; ?> },
    { y: year + '-12', a: <?= $resultTechnique[12]; ?> }],
      xkey: 'y',
      hoverCallback: function(index, options, content) {
          return(content);
      },
      ykeys: ['a'],
      parseTime: false,
      labels: ['Number of techniques searches in ' + year + ' by Month']
    });


    Morris.Area({
    element: 'numberUsers',
    data: [
    { y: year + '-01', a: <?= $numberUsers[1]; ?>  },
    { y: year + '-02', a: <?= $numberUsers[2]; ?>  },
    { y: year + '-03', a: <?= $numberUsers[3]; ?>  },
    { y: year + '-04', a: <?= $numberUsers[4]; ?>  },
    { y: year + '-05', a: <?= $numberUsers[5]; ?>  },
    { y: year + '-06', a: <?= $numberUsers[6]; ?>  },
    { y: year + '-07', a: <?= $numberUsers[7]; ?>  },
    { y: year + '-08', a: <?= $numberUsers[8]; ?>  },
    { y: year + '-09', a: <?= $numberUsers[9]; ?>  },
    { y: year + '-10', a: <?= $numberUsers[10]; ?> },
    { y: year + '-11', a: <?= $numberUsers[11]; ?> },
    { y: year + '-12', a: <?= $numberUsers[12]; ?> }],
      xkey: 'y',
      hoverCallback: function(index, options, content) {
          return(content);
      },
      ykeys: ['a'],
      parseTime: false,
      labels: ['Number of users registered in ' + year + ' by Month']
    });


    Morris.Area({
    element: 'numberLastLogin',
    data: [
    { y: year + '-01', a: <?= $lastLogin[1]; ?>  },
    { y: year + '-02', a: <?= $lastLogin[2]; ?>  },
    { y: year + '-03', a: <?= $lastLogin[3]; ?>  },
    { y: year + '-04', a: <?= $lastLogin[4]; ?>  },
    { y: year + '-05', a: <?= $lastLogin[5]; ?>  },
    { y: year + '-06', a: <?= $lastLogin[6]; ?>  },
    { y: year + '-07', a: <?= $lastLogin[7]; ?>  },
    { y: year + '-08', a: <?= $lastLogin[8]; ?>  },
    { y: year + '-09', a: <?= $lastLogin[9]; ?>  },
    { y: year + '-10', a: <?= $lastLogin[10]; ?> },
    { y: year + '-11', a: <?= $lastLogin[11]; ?> },
    { y: year + '-12', a: <?= $lastLogin[12]; ?> }],
      xkey: 'y',
      hoverCallback: function(index, options, content) {
          return(content);
      },
      ykeys: ['a'],
      parseTime: false,
      labels: ['Last login of users in ' + year + ' by Month']
    });
</script>
<!-- END OF IT -->
</body>
</html>
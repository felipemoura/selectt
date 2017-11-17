<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<style type="text/css">
	.container .center-block {
		font-size: 12pt;
		margin: auto;
		max-width: 1200px;
		padding-top: 30px;
		padding-bottom: 15px;
	}

	.jumbotron {
		min-height: 250px;
	}

	.jumbotron h4 {
		font-size: 10pt;
	}
</style>

<div class="container animated fadeIn">
	<div class="container center-block">
		<h1>Statistics</h1>		

		 <div id="numberTechnique"></div>
		 <br><br><br><br><br><br>

         <div id="numberSearch"></div>
	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

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
</script>
<!-- END OF IT -->
</body>
</html>
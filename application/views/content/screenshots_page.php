<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<div class="container animated fadeIn">

	<h1>Screenshots</h1>
	
	<h3>SeleCTT is defined as a web tool composed of four main modules:</h3>

	<p align="justify">
		<ul style="font-size: 1em">
			<li style="margin-top: 10px;"><strong>(a) Insertion Module:</strong> It receives information about the project to be developed as input.</li>
			<li style="margin-top: 10px;"><strong>(b) System Administration Module:</strong> Responsible for database management.</li>
			<li style="margin-top: 10px;"><strong>(c) Control Module:</strong> Responsible for controlling the attributes and criteria adopted on characterizing the testing techniques.</li>
			<li style="margin-top: 10px;"><strong>(d) Results Module:</strong> Responsible for comparing information extracted from module (a) using adequacy criteria defined in module (c) in order to provide a recommendation list of techniques ranked according to their level of relevance to the project.</li>
		</ul>

		Images about the modules are shown below.
	</p> 

	<br><br>

	<div id="carouselModules" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselModules" data-slide-to="0" class="active"></li>
			<li data-target="#carouselModules" data-slide-to="1"></li>
			<li data-target="#carouselModules" data-slide-to="2"></li>
			<li data-target="#carouselModules" data-slide-to="3"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="d-block img-fluid img-responsive" src="<?= base_url('assets/photos/1-insertionModule.png'); ?>" alt="First Module">

				<div class="carousel-caption">
					<h1>Insertion Module</h1>
				</div>
			</div>

			<div class="item">
				<img class="d-block img-fluid img-responsive" src="<?= base_url('assets/photos/2-administrationModule.png'); ?>" alt="Second Module">	
				<div class="carousel-caption">
					<h1>System Administration Module</h1>
				</div>
			</div>

			<div class="item">
				<img class="d-block img-fluid img-responsive" src="<?= base_url('assets/photos/3-controlModule.png'); ?>" alt="Third Module">
				<div class="carousel-caption">
					<h1>Control Module</h1>
				</div>
			</div>

			<div class="item">
				<img class="d-block img-fluid img-responsive" src="<?= base_url('assets/photos/4-resultsModule.png'); ?>" alt="Fourth Module">
				
				<div class="carousel-caption">
					<h1>Results Module</h1>
				</div>
			</div>

		</div>

		<a class="left carousel-control" href="#carouselModules" role="button" data-slide="prev">
			<span style="font-size:3em;" class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carouselModules" role="button" data-slide="next">
			<span style="font-size:3em;" class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span> >
		</a>
	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>
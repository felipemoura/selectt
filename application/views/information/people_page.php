<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<style type="text/css">
	.post-container {
		overflow: auto;
		font-size: 10pt;
		text-align: justify;
	}
	.post-thumb {
		float: left;
	}
	.post-thumb img {
		display: block;
		max-width: 200px;
		max-height: 500px;
	}
	.post-content {
		margin-left: 210px;
	}
</style>

<div class="container animated fadeIn">
	<div class="row" style="padding-top: 40px;">
		<!-- Paulo -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="post-container">                
				<div class="post-thumb">
					<img src="<? echo base_url("assets/photos/paulo.png");?>">
				</div>
				<div class="post-content">
					<strong>Paulo Sergio Lopes de Souza</strong> holds a joint MSc (1996) and PhD (2000) degree in Computer Science from the University of Sao Paulo (USP), Brazil. From 2010 to 2011 he was a visiting scientist at the University of Southampton, England. He is an associate professor of distributed systems at the Institute of Mathematics Science and Computer at the University of Sao Paulo (ICMC/USP, Brazil) since 2005. In the past, he was a lecturer at the Informatics Department at the State University of Ponta Grossa (UEPG), Parana, Brazil from 1991 to 2005. Currently, he has conducted research in distributed systems, parallel computing, development of high-performance  applications, software testing, and open educational resources applied to computer education.
				</div>
			</div>
		</div>
		
		<!-- Simone -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="post-container">                
				<div class="post-thumb">
					<img src="<? echo base_url("assets/photos/simone.png");?>">
				</div>
				<div class="post-content">		
					<strong>Simone do Rocio Senger de Souza</strong> holds a joint MSc (1996) and PhD (2000) degree in Computer Science from the University of Sao Paulo (USP), Brazil. From 2010 to 2011 she was a visiting scientist at the University of Southampton, England. She is an associate professor of software engineering at the Institute of Mathematics Science and Computer at the University of Sao Paulo (ICMC/USP, Brazil) since 2005. In the past, she was a lecturer at the Informatics Department at the State University of Ponta Grossa (UEPG), Parana, Brazil from 1991 to 2005. Currently, she has conducted research in concurrent software testing, structural testing, mutation testing, and software engineering experimentation.
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="padding-top: 40px;">
		<!-- Silvana -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="post-container">                
				<div class="post-thumb">
					<img src="<? echo base_url("assets/photos/silvana.png");?>">
				</div>
				<div class="post-content">		
					<strong>Silvana Morita Melo</strong> holds a B.Sc. degree in Information Systems from Federal University of Mato Grosso do Sul - UFMS (2009) and a M.Sc. in Computer Sciene and Computational Mathematics from University of Sao Paulo - USP (2013). She is currently a Ph.D. student in the Institute of Mathematics and Computer Science (ICMC/USP) and a visiting student researcher at the University of Alabama (UA). Her research interests include software testing, concurrent programming, concurrente software testing, and empirical software engineering.
				</div>
			</div>
		</div>

		<!-- Felipe -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="post-container">                
				<div class="post-thumb">
					<img src="<? echo base_url("assets/photos/felipe.png");?>">
				</div>
				<div class="post-content">		
					<strong>Felipe Moreira Moura</strong> is currently a Bachelor in Computer Engineering student in the Institute of Mathematics and Computer Science (ICMC/USP) and  Sao Carlos School of Engineering(EESC/USP), Brazil. His research interests include software testing, concurrent programming, concurrente software testing, and web applications.
				</div>
			</div>
		</div>

	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>
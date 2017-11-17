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
		<h1>About SelecTT</h1>
		
		<p align="justify">
		The project aims to provide a computational infrastructure to automate the process of selecting testing techniques for concurrent software. Based on information contained in a repository with characteristics of the test techniques that influence the decision-making process. The repository is developed in the doctoral project to which this project is linked. The computational structure is defined as a web system that requires as input information about the software project to be developed (type of platform to be used, software programming language, etc.) provided by the user (test team) and compares to the information extracted from the repository (characteristics of the test techniques) in order to compare and establish a ranking on which techniques are most appropriate for the project in question. 
		To calculate the most appropriate technique to the project, weights should be established for the characteristics (adequacy criteria) and mathematical calculations in order to obtain a list of the most appropriate techniques, facilitating the decision making of the test team. However, the purpose of this project is the development of a web site that receives as inputs information about a test project and search in a database of test techniques, which technique presents characteristics more appropriate to this project. The final decision about which test technique to use in the project is up to the test designer, who uses the result obtained by the site as support. In view of the technological contribution of this project, the construction of a computational infrastructure to support the selection of testing techniques for concurrent software. The scientific contribution is related to the study of specific characteristics of the concurrent programming that influence during the process of selection of test techniques and must be considered for the definition of a suitable recommendation mechanism in this context that helps researchers and test professionals in the choice the most appropriate technique for your software project.
		</p>
	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->
</body>
</html>
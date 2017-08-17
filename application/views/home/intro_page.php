<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<style type="text/css">
	/* Style the tab */
	div.tab {
		float: left;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		width: 15%;
		height: 100%;
	}

	/* Style the buttons inside the tab */
	div.tab button {
		display: block;
		background-color: inherit;
		color: black;
		padding: 22px 16px;
		width: 100%;
		border: none;
		outline: none;
		text-align: left;
		cursor: pointer;
		transition: 0.3s;
	}

	/* Change background color of buttons on hover */
	div.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current "tab button" class */
	div.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		float: left;
		padding: 0px 12px;
		border: 1px solid #ccc;
		width: 85%;
		border-left: none;
		height: 100%;
	}

	.container {
		font-size: 12pt;
	}

	.carousel-caption {
		color: black;
	}

	.carousel-indicators li {
		display: inline-block;
		width: 12px;
		height: 12px;
		margin: 10px;
		text-indent: 0;
		cursor: pointer;
		border: none;
		border-radius: 50%;
		background-color: #AAAAAA;
		box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.5);    
	}

	.carousel-indicators .active {
		width: 12px;
		height: 12px;
		margin: 10px;
		background-color: #001f3f;
	}
</style>

<div class="container animated fadeIn">
	<h1>Introduction</h1>

	<div class="tab">
		<button class="tablinks" onclick="openInfo(event, 'whatIs')">What is ?</button>
		<button class="tablinks" onclick="openInfo(event, 'screenshots')">Screenshots</button>
	</div>

	<div id="whatIs" class="tabcontent">
		<h3>What is ?</h3>
		<p align="justify">
		O projeto  tem como objetivo prover uma infraestrutura computacional para automatizar o processo de seleção de técnicas de teste de software concorrente. Baseadas em informações contidas em um repositório com características das técnicas de teste que influenciam no processo de tomada de decisão. O repositório é desenvolvido no projeto de doutorado ao qual esse projeto está vinculado. A estrutura computacional é definida como um sistema web que requer como entrada informações a respeito do projeto de software a ser desenvolvido (tipo de plataforma a ser utilizada, linguagem de programação do software, etc) fornecida pelo usuário (equipe de teste) e compara às informações extraídas do repositório (características das técnicas de teste) a fim de comparar e estabelecer um ranking sobre quais as técnicas mais adequadas para o projeto em questão. Para o cálculo da técnica adequada ao projeto devem ser estabelecidos pesos as características (critérios de adequação) e cálculos matemáticos a fim de obter uma lista das técnicas mais adequadas, facilitando a tomada de decisão da equipe de teste. Em síntese, o propósito deste projeto é o desenvolvimento de um site web que recebe como entradas informações a respeito de um projeto de teste e busca em um banco de dados de técnicas de teste, qual técnica apresenta características mais adequadas
		a este projeto. A decisão final sobre qual técnica de teste usar no projeto cabe ao projetista de teste, que usa como apoio o resultado obtido pelo site.
		Tendo em vista como contribuição tecnoló́gica deste projeto a construção de uma infraestrutura computacional de suporte a seleção de técnicas de teste de software concorrente. A contribuição científica está relacionada ao estudo de características específicas da programação concorrente que influenciam durante o processo de seleção de técnicas de teste e devem ser consideradas para a definição de um mecanismo de recomendação adequado a este contexto, que auxilie pesquisadores e profissionais de teste na escolha da técnica mais adequada a seu projeto de software.
		</p>
	</div>

	<div id="screenshots" class="tabcontent" hidden>
		<h3>Screenshots</h3>
		<p align="justify">
			SeleCTT is defined as a web tool composed of four main modules:
			<ul>
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
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

<script type="text/javascript">
	function openInfo(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    	tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    	tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</body>
</html>
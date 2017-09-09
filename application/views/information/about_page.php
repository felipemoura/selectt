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
		O projeto  tem como objetivo prover uma infraestrutura computacional para automatizar o processo de seleção de técnicas de teste de software concorrente. Baseadas em informações contidas em um repositório com características das técnicas de teste que influenciam no processo de tomada de decisão. O repositório é desenvolvido no projeto de doutorado ao qual esse projeto está vinculado. A estrutura computacional é definida como um sistema web que requer como entrada informações a respeito do projeto de software a ser desenvolvido (tipo de plataforma a ser utilizada, linguagem de programação do software, etc) fornecida pelo usuário (equipe de teste) e compara às informações extraídas do repositório (características das técnicas de teste) a fim de comparar e estabelecer um ranking sobre quais as técnicas mais adequadas para o projeto em questão. Para o cálculo da técnica adequada ao projeto devem ser estabelecidos pesos as características (critérios de adequação) e cálculos matemáticos a fim de obter uma lista das técnicas mais adequadas, facilitando a tomada de decisão da equipe de teste. Em síntese, o propósito deste projeto é o desenvolvimento de um site web que recebe como entradas informações a respeito de um projeto de teste e busca em um banco de dados de técnicas de teste, qual técnica apresenta características mais adequadas
		a este projeto. A decisão final sobre qual técnica de teste usar no projeto cabe ao projetista de teste, que usa como apoio o resultado obtido pelo site.
		Tendo em vista como contribuição tecnoló́gica deste projeto a construção de uma infraestrutura computacional de suporte a seleção de técnicas de teste de software concorrente. A contribuição científica está relacionada ao estudo de características específicas da programação concorrente que influenciam durante o processo de seleção de técnicas de teste e devem ser consideradas para a definição de um mecanismo de recomendação adequado a este contexto, que auxilie pesquisadores e profissionais de teste na escolha da técnica mais adequada a seu projeto de software.
		</p>
	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->
</body>
</html>
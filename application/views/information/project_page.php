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
	<img class="img-responsive center-block" alt="HomeImage" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/testpar.png");?>" >

	<div class="container center-block">
		<p align="justify">O projeto <strong>TestPar</strong>- Mecanismos de Apoio ao Teste de Programas Paralelos – existe para melhorar a qualidade das aplicações distribuídas e paralelas.
		A computação nos dias atuais é composta fundamentalmente por aplicações distribuídas que interagem para melhorar a nossa qualidade de vida. Alguns poucos exemplos dessas aplicações são: telefonia móvel, sistemas automatizados em veículos que se comunicam para oferecer mais segurança, eletrodomésticos inteligentes, compras na WEB e pagas através do telefone celular, acesso remoto a sistemas web corporativos e integrados sob o paradigma SOA (Service-Oriented Architecture) e cloud computing. A computação distribuída está no centro de um ciclo virtuoso, auto alimentando-se de novas tecnologias de hardware e software. Essas tecnologias vêm mudando a nossa percepção de mundo, o qual interage para agregar recursos e alcançar metas cada vez mais ambiciosas.</p>

		<p align="justify">A programação concorrente é um ponto em comum nessas tecnologias, oferecendo primitivas à gerência de processos e à interação (comunicação e sincronização) dos mesmos. Primitivas de comunicação e sincronização são muito utilizadas e são responsáveis por erros difíceis de serem detectados, os quais podem facilmente gerar resultados corretos e/ou incorretos com a mesma entrada de dados.</p>

		<p align="justify">O teste e a depuração de aplicações distribuídas é um desafio neste cenário. Diferentemente dos programas seqüenciais, o teste de aplicações distribuídas ainda é pouco desenvolvido e menos ainda utilizado apropriadamente. Isso ocorre devido à necessidade de modelos de teste específicos que extraiam das aplicações distribuídas informações relevantes para se testar, principalmente aquelas relacionadas à comunicação, sincronização e ao não determinismo inerentes ao comportamento dinâmico de tais aplicações. Associados a esses modelos de teste, também se fazem necessários novos critérios e ferramentas que permitam conduzir a atividade de teste dentro de um custo aceitável.</p>

		<p align="justify">De uma forma geral, todas essas questões vêm sendo investigadas no projeto <strong>TestPar</strong>. Os modelos de teste já desenvolvidos no projeto <strong>TestPar</strong> permitem representar informações sobre fluxos de controle e de dados de processos concorrentes, considerando seus aspectos sequenciais e concorrentes. Os critérios fornecem uma medida de cobertura que pode ser usada para avaliar o progresso da atividade de teste e também pode fornecer diretrizes para a geração de dados de teste. A ferramenta <strong>ValiPar</strong> implementa os conceitos investigados e instanciados nos modelos e critérios de teste.</p>

	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>
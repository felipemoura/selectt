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
	<a href="http://testpar.icmc.usp.br" target="_blank"><img class="img-responsive center-block" alt="HomeImage" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/testpar.png");?>" ></a>

	<div class="container center-block">
		<p align="justify">
		The project <strong>TestPar</strong> - Parallel Program Test Support Mechanisms - exists to improve the quality of distributed and parallel applications. Today's computing is fundamentally composed of distributed applications that interact to improve our quality of life. A few examples of such applications are: mobile telephony, automated systems in vehicles that communicate to provide more security, smart home appliances, Web and cellular phone purchases, remote access to corporate web systems and integrated under the SOA (Service-Oriented Architecture) paradigm and cloud computing. Distributed computing is at the center of a virtuous cycle, self-feeding from new hardware and software technologies. These technologies have been changing our perception of the world, which interacts to aggregate resources and achieve increasingly ambitious goals.</p>

		<p align="justify">Concurrent programming is a commonality in these technologies, providing primitives to process management and interaction (communication and synchronization) of processes. Communication and synchronization primitives are widely used and are responsible for errors that are difficult to detect, which can easily generate correct and / or incorrect results with the same data entry.</p>

		<p align="justify">Testing and debugging distributed applications is a challenge in this scenario. Unlike the sequential programs, distributed application testing is still underdeveloped and still less used properly. This is due to the need for specific test models that extract from the distributed applications relevant information for testing, especially those related to the communication, synchronization and non-determinism inherent to the dynamic behavior of such applications. Associated with these test models, new criteria and tools are also necessary to conduct the test activity within an acceptable cost.</p>

		<p align="justify">In general, all of these issues are being investigated without a <strong>TestPar</strong> project. Test models have already been developed without the <strong>TestPar</strong> project, please show information about control flows and data from competing processes, considering their sequential and competitors. The criteria are a coverage measure that can be used to evaluate the progress of the test activity and can also provide guidelines for a generation of test data. The <strong>ValiPar</strong> tool implements the concepts investigated and instantiated in the models and test criteria.</p>

	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>
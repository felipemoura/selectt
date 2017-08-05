<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Results extends MY_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique_model', 'technique');
        $this->load->model('Result_model', 'result');
    }

	public function index()
	{
		if ( !$this->session->has_userdata('result_user') ) {
			$this->load->view('form/results_page_none');

		} else {
			$idResult = $this->session->userdata('result_user');
			$this->resultsTechniques($idResult);
		}
	}

	protected function resultsTechniques ($id)
	{
		// echo $id;
		$allWeights    	 = $this->utility->getFields();
		$allTechniques 	 = $this->technique->buildTechniques();
		$resultTechnique = $this->result->buildTechniqueResult($id);

		// echo "<pre>";
		// print_r($resultTechnique);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($allTechniques);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($allWeights);
		// echo "</pre>";

		$result = array ();
		$count	= 0;

		foreach ($allTechniques as $technique) {
			$result[$count]['id']	 = $technique['id']; 
			$result[$count]['title'] = $technique['title'];
			$resultWeight = 0.000;

			foreach ($allWeights['fields'] as $weight) {
					// just to help reading the code ...
				$idTemp 		= $weight['html_id'];
				$compareField 	= $resultTechnique[$idTemp];
				$originalField  = $technique[ucfirst($idTemp)];
				$weightValue 	= $weight['weight'];

				$result[$count][$idTemp] = $this->utility->generateFieldsForCompare ($originalField, $compareField, $weightValue );
				$resultWeight += $result[$count][$idTemp]['max_value'];
			}
			$result[$count]['result_weight'] = $resultWeight;

			$count++;
		}

		 // echo "<pre>";
		 // print_r($result);
		 // echo "</pre>";

		 // foreach ($result as $value) {
		 // 	echo $value['result_weight'];
		 // 	echo "<br>";
		 // }
		$data['info'] = $resultTechnique;

		$this->load->view('form/results_page', $data);
	}


}

?>

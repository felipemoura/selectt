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

		$result = array ();
		$count	= 0;

		foreach ($allTechniques as $technique) {
			$result[$count]['id']	 = $technique['id']; 
			$result[$count]['title'] = $technique['title'];

			$resultWeight = floatval(0.000);

			$result[$count]['Programming model'] = floatval(0.000);
			$result[$count]['General testing characteristics'] = floatval(0.000);
			$result[$count]['Concurrent testing characteristics'] = floatval(0.000);
			$result[$count]['Testing tool support'] = floatval(0.000);

			foreach ($allWeights['fields'] as $weight) {
				// just to help reading the code ...
				$idTemp 		= $weight['html_id'];
				$compareField 	= $resultTechnique[$idTemp];
				$originalField  = $technique[ucfirst($idTemp)];
				$weightValue 	= $weight['weight'];

				$result[$count][$idTemp] = $this->utility->generateFieldsForCompare ($originalField, $compareField, $weightValue );
				$resultWeight += floatval($result[$count][$idTemp]['max_value']);

				// category progress bar each category has a limit !
				$result[$count][$weight['category']] += floatval($result[$count][$idTemp]['max_value']);

				$result[$count][$idTemp]['atribute'] = $weight['atribute'];
				$result[$count][$idTemp]['match'] = $result[$count][$idTemp]['isMatch'];
				
			}
			$result[$count]['result_weight'] = $resultWeight;

			$count++;
		}

		// order by weight
		for ($i = 0; $i < count($result) - 1; $i++) { 
			for ($j = 0; $j < count($result) - $i - 1; $j++) { 
				if ($result[$j+1]['result_weight'] > $result[$j]['result_weight']) {
					$temp = $result[$j];
					$result[$j] =  $result[$j+1];
					$result[$j+1] = $temp;
				}
			}
		}

		// echo "<pre>";
		// print_r($result);
		// echo "<pre>";
		
		$data['info'] 	= $resultTechnique;
		$data['result'] = $result;
		
		$this->load->view('form/results_page', $data);
	}
}

?>

<?php 
class Evaluation_Model extends CI_Model {

	// View Evaluation
	function viewEvaluation(){

	}

	// Add Evaluation
	function addEvaluation(){
		$checkIfExists = "CALL checkIfEvalRecExists(?)";
		$query = $this->db->query($checkIfExists, array('evaluationID' =>  $this->input->post('evaluationID')));

		if ( sizeof($query->row_array()) == 0) {

			$sql = "CALL addEvaluation(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$parameters = array(
				'studentName' 			=> $this->input->post('studentName')
				, 'department'	 		=> $this->input->post('department')
				, 'startDate' 			=> $this->input->post('startDate') 
				, 'endDate' 			=> $this->input->post('endDate') 
				, 'evaluatorName' 		=> $this->input->post('evaluatorName')
				, 'evaluatorPosition' 	=> $this->input->post('evaluatorPosition')
				, 'scoreKnowledge' 		=> $this->input->post('knowledge')
				, 'scoreQuantity' 		=> $this->input->post('quantity')
				, 'scoreQuality' 		=> $this->input->post('quality')
				, 'scoreAttendance' 	=> $this->input->post('attendance')
				, 'scoreInterpersonal' 	=> $this->input->post('interpersonal')
				, 'scoreDependability' 	=> $this->input->post('dependability')
				, 'scoreWillingness' 	=> $this->input->post('willingness')
				, 'scoreInitiative' 	=> $this->input->post('initiative')
				, 'remarks' 			=> $this->input->post('remarks')			//15th
				//, 'isVerified' => $this->input->post('isVerified')				//16th	
			);

			$this->db->reconnect();
			$data = $this->db->query($sql, $parameters);
		}
	}

	// Approve Evaluation
	function verifyEvaluation(){

	}

	// Disable Evaluation
	function disableEvaluation(){

	}

}
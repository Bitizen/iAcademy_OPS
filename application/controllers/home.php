<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	function __construct(){
        parent::__construct();
        
    }

	public function index(){
		
		$this->data['title'] = "Login";
		
			if ($this->ion_auth->in_group('superadmin')){
				$view = 'admin/index';
			}else if ($this->ion_auth->in_group('admin')){
				$view = 'admin/index';
			}else if ($this->ion_auth->in_group('employer')){

				$this->load->model('EmployerModel');
		        $data['myEmployer'] = $this->EmployerModel->viewEmployerOfRepresentative();

				$this->load->helper('form');
				$this->load->view('employer/index', $data);
				//$view = 'employer/index';
				//$this->load->view($view);
			}else if ($this->ion_auth->in_group('intern')){
				$view = 'intern/index';
			}

			//$this->load->view($view);

	}

}//end


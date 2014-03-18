<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OpsController extends MY_Controller {

	// View All Students
	function index() {
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$this->load->model('OpsModel');
        $data['students'] = $this->OpsModel->viewStudents();
      	$this->load->helper('form');
        $this->load->view('OpsHomeView', $data);

        $data['base'] = $this->config->item('base_url');
    	$data['css'] = $this->config->item('css');  
	}

	// Add Student
	function add_student() {
		$this->load->model('OpsModel');
		$this->OpsModel->createStudent();

		// Load Admin/Emplyer/Student Lists
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$this->load->model('OpsModel');
        $data['students'] = $this->OpsModel->viewStudents();
      	$this->load->helper('form');
        $this->load->view('OpsHomeView', $data);
	}

	// Add Admin
	function add_admin(){
		$this->load->model('AdminModel');
		$this->AdminModel->createData();

		// Load Admin/Emplyer/Student Lists		
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$this->load->model('OpsModel');
        $data['students'] = $this->OpsModel->viewStudents();
      	$this->load->helper('form');
        $this->load->view('OpsHomeView', $data);
	}

	// Add Employer
	function add_employer(){
		$this->load->model('EmployerModel');
		$this->EmployerModel->createData();

		// Load Admin/Emplyer/Student Lists
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$this->load->model('OpsModel');
        $data['students'] = $this->OpsModel->viewStudents();
      	$this->load->helper('form');
        $this->load->view('OpsHomeView', $data);
	}

	// View Specific Student
	function view_student() {
		$this->load->model('OpsModel');
		$data['studentChosen'] = $this->OpsModel->viewStudent();

		// Load Admin/Emplyer/Student Lists
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$data['students'] = $this->OpsModel->viewStudents();
		$this->load->helper('form');
		$this->load->view('OpsHomeView', $data);
	}

	// Update Specific Student
	function update_student() {
		$this->load->model('OpsModel');
		$this->OpsModel->updateStudent();

		// Load Admin/Emplyer/Student Lists
		$this->load->model('AdminModel');
        $data['admins'] = $this->AdminModel->getAdminData();

		$this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->getEmployerData();

		$this->load->model('OpsModel');
        $data['students'] = $this->OpsModel->viewStudents();
      	$this->load->helper('form');
        $this->load->view('OpsHomeView', $data);
	}

}
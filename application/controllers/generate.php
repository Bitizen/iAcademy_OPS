<?php

class Generate extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('generate_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['member'] = $this->generate_model->alldata();
        $this->load->view('employer/generateView', $data);
    }

    function topdf () {
        $this->load->library('cezpdf');
        $this->load->helper('pdf');
        prep_pdf();
        $data['member']= $this->generate_model->alldata(); 
        $titlecolumn = array(
                            'companyName' => 'Company',
                            'industryType' => 'Industry Type',
                            'completeMailingAddress' => 'Location',
                            'telephoneNumber' => 'Telephone',
                            'faxNumber' => 'Fax',
                            'website' => 'Website',                    
        );
        $this->cezpdf->ezTable($data['member'], $titlecolumn,'View Employer Report');
        $this->cezpdf->ezStream();
    }
}
?>





<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
 
class MY_Controller extends CI_Controller {

    public function __construct() {
       parent::__construct();
        
        if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = (String) $session_data['username'];

         $this->load->view('OpsHomeView', $data);
       }
       else
       {
         //If no session, redirect to login page
         redirect('login', 'refresh');
       }
       
    } 

}


 class Admin_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->is_admin()) {

            //Put User in Class-wide variable
            $this->the_user = $this->ion_auth
                ->user()
                ->row();

            //Store user in $data
            $data->the_user = $this->the_user;

            //Load $the_user in all views
            $this->load->vars($data);
        }
        else {
            redirect('auth/login');
        }
    }
}

class User_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->in_group('user')) {
            $this->the_user = $this->ion_auth
                ->user()
                ->row();

            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('auth/login');
        }
    }
}

class Common_Auth_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->logged_in()) {
            $this->the_user = $this->ion_auth
                ->user()
                ->row();

            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('auth/login');
        }
    }
}

?>
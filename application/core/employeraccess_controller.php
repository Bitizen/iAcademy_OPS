<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmployerAccess_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();        

            if(! $this->ion_auth->in_group('employer')){
                //Someone is playing here - lets logout to be safe
                redirect('auth/logout', 'refresh');
                //You can instead show a 404 Error page here. Your call!
            }
    }
}



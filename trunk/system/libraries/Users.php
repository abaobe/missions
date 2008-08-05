<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Users {

    function log_out()
    {
		$this->session->sess_destroy();
		header('Location: /index.php');
    }
}

?>
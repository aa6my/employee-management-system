<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resolver extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    	header("Location: http://segimidae.net/");
		die();
        
    }
}

/* End of file Resolver.php */
/* Location: ./application/controller/resolver.php/ */

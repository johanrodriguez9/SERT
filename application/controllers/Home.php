<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        
        if ($this->ion_auth->logged_in()) 
            redirect(site_url(Hasher::make(1)));
	}

	public function index(){
		$this->data['subtitle'] = 'tech';
		$this->load->view('login');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
	        //verifica login usuario
			redirect('sali', 'refresh');
		} else {
	            if (!$this->ion_auth->in_group('kardixta')) { //verifica grupo
	        	redirect('auth/logout', 'refresh');
	             }
		}
	}



	public function inscribir()
	{
	$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('dashboard');
			$this->data['page_content'] = 'backend/dashboard';
			$this->render();
	}
}
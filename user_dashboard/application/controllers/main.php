<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $view_data = array();
	protected $user_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->view_data['user_info'] = $this->user_data['user_info'] = $this->session->userdata('user');
	}

	protected function is_login()
	{
		if($this->user_data["user_info"]["is_login"])
			return TRUE;
		else
			return FALSE;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("/login"));
	}

}

//end of file
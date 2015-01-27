<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("main.php");

class Users extends Main {

	public function __construct()
	{
		parent::__construct();
	}

	public function profile()
	{
		if($this->is_login())
		{
			$this->load->view("user_info", $this->view_data);
		}
		else
			redirect(base_url("/login"));
	}

}

//end of file
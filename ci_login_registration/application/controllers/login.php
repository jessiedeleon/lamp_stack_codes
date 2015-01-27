<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("main.php");

class Login extends Main {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		if(! $this->is_login())
			$this->load->view('login_registration');
		else
			redirect(base_url("/user/profile"));
	}

	public function log_in()
	{
		if(! $this->is_login())
		{
			$this->load->model("login_model");
			$login_user = $this->login_model->login($this->input->post());

			if($login_user["success"])
				redirect(base_url("/user/profile"));
			else
			{
				$this->view_data["login_user"] = $login_user;
				$this->load->view('login_registration', $this->view_data);
			}
		}
		else
			redirect(base_url("/user/profile"));
	}

	public function register()
	{
		$this->load->model("login_model");
		$this->view_data["add_user"] = $this->login_model->register_user($this->input->post());

		$this->load->view('login_registration', $this->view_data);
	}
	
}
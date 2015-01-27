<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("main.php");

class Users extends Main {

	public function __construct()
	{
		parent::__construct();
	}

	public function profile($user_id = NULL)
	{
		if($user_id == NULL)
		{
			if($this->is_login())
			{
				$this->load->view("user_info", $this->view_data);
			}
			else
				redirect(base_url("/login"));
		}
		else
		{
			$this->load->model("user");
			$this->view_data["user_info"] = $this->user->get_user_by_id($user_id);
			
			$this->load->view("user_info", $this->view_data);
		}
	}

	public function all_users()
	{
		$this->load->model("user");
		$this->view_data["users"] = $this->user->get_all_users();

		$this->load->view("all_users", $this->view_data);
	}

	public function add_user()
	{
		if($this->input->post())
		{
			$this->load->model("user");
			$this->view_data["add_user"] = $this->user->register_user($this->input->post());

			$this->load->view("add_user", $this->view_data);
		}
		else
			$this->load->view("add_user");
	}

}

//end of file
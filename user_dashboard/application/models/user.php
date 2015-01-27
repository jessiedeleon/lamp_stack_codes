<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    function login($user)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $data['success'] = FALSE;

        if($this->form_validation->run() === FALSE)
            $data['error_message'] = validation_errors();
        else
        {   
            $current_user = $this->db->query("SELECT * FROM users WHERE email = ?", array($user['email']))->row_array();

            if(!empty($current_user))
            {
                if(md5($user["password"]) != $current_user["password"])
                    $data['error_message'] = '<p>Incorrect Password</p>';
                else
                {
                    $current_user["is_login"] = TRUE;
                    $this->session->set_userdata('user', $current_user);

                    $data['success'] = TRUE;
                    $data['success_message'] = '<p>Successfully Login</p>';
                }
            }
            else
                $data['error_message'] = '<p>Email not registered</p>';
        }
        
        return $data;
    }

    function register_user($user)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emai|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $data['success'] = FALSE;
            $data['error_message'] = validation_errors();
        }
        else
        {
            unset($user["confirm_password"]);

            $add_user_query = "INSERT INTO users (email, password, first_name, last_name, created_at)
                               VALUES (?,?,?,?, NOW())";

            $user_data =  array($user["email"], md5($user["password"]), $user["first_name"], $user["last_name"]);            
            
            $add_user = $this->db->query($add_user_query, $user_data);
            
            if($add_user)
            {
                $data['success'] = TRUE;
                $data['success_message'] = '<p>Successfully added!</p>';
            }
            else
            {
                $data['success'] = FALSE;
                $data['error_message'] = '<p>Failed to add user into the database.</p>';
            }
        }

        return $data;
    }

    function get_user_by_email($email)
    { 
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

    function get_user_by_id($user_id)
    { 
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
    }


    function get_all_users()
    { 
        //return $this->db->query("SELECT * FROM users")->row_array();
        return $this->db->get("users")->result_array();
    }
}
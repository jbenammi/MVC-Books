<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booklists extends CI_Controller{

	public function index (){
		$this->load->view('main');
	}
	public function view_home_page(){
		$this->load->view('home_page');
	}

	public function register(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules("email", "E-Mail", "trim|required|valid_email");
		$this->form_validation->set_rules("confirmpass", "Confirm Password", "trim|required|matches[password]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|do_hash");
		$this->form_validation->set_rules("user_name", "Full Name", "trim|required|xss_clean");
		$this->form_validation->set_rules("alias", "Alias", "trim|required|xss_clean");
		if($this->form_validation->run() === FALSE){
			$errors = $this->form_validation->getErrorsArray();
			$this->session->set_flashdata("errors", $errors);
			redirect(base_url("/"));
		}
		else{
			$this->load->model("Booklist");
			$user_info = $this->input->post();
			$add_user = $this->Booklist->add_user($user_info);
			$session_id = $this->session->userdata('logged_info');

			if ($add_user){
				redirect("/home_page");
			}
			else{
				$this->session->set_flashdata("login_error", "E-Mail Address is already registered");
				redirect($uri = base_url('/'));
			}
		}
	}




}

 ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booklists extends CI_Controller{

	public function index (){
		$this->load->view('main');
	}
	public function view_home_page(){
		$this->load->model('Booklist');
		$reviews = $this->Booklist->get_reviews();
		$books = $this->Booklist->get_booklist();
		$this->load->view('home_page', ['review_info' =>$reviews, 'book_list' => $books]);
	}
	public function view_book($id){
		$this->load->model('Booklist');
		$book_info = $this->Booklist->get_book($id);
		$this->load->view('book_page', ['book_info' => $book_info]);
	}	
	public function view_user($id){
		$this->load->model('Booklist');
		$user_info = $this->Booklist->get_user($id);
		$book_list = $this->Booklist->get_user_booklist($id);
		$this->load->view('user_page', ['user_info' => $user_info, 'book_list' => $book_list]);
	}
	public function view_book_add (){
		$this->load->model('Booklist');
		$authors = $this->Booklist->get_author_list();
		$this->load->view('new_book_review', ['authors' => $authors]);
	}
	public function add_new_book(){
		$this->load->model('Booklist');
		$this->Booklist->add_book($this->input->post());
		redirect("/home_page");

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
			if ($add_user){
				$this->session->set_userdata(['logged_info' => $add_user]);
				redirect("/home_page");
			}
			else{
				$this->session->set_flashdata("login_error", "E-Mail Address is already registered");
				redirect($uri = base_url('/'));
			}
		}
	}

		public function signin_process(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules("email", "E-Mail Address", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|do_hash");

		if($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->getErrorsArray();
			$this->session->set_flashdata("errors", $errors);
			redirect($uri = base_url("/"));
		}
		else {
			$this->load->model('Booklist');
			$user_info = $this->input->post();
			$user_signin = $this->Booklist->signin($user_info);
			if($user_signin) {
				$this->session->set_userdata(['logged_info' => $user_signin]);
				redirect('/Booklists/view_home_page');
			}
			else {
				$this->session->set_flashdata("login_error", "The E-Mail or Password information is incorrect.");
				redirect($uri = base_url("/"));
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect($uri = base_url());
	}


}

 ?>
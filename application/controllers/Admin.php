<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('m_admin');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
				redirect('admin/admin');
		}

		$this->load->view('login');
	}

	public function admin()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('admin');
		}
	    $data['totalBarang'] = $this->m_admin->get_total_barang();

		$this->load->view('sidebaradmin');
		$this->load->view('admin', $data);
		$this->load->view('footer');
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			// $password = $this->input->post('password');
			$id = $this->m_admin->login($username, $password);

			if($id){
				// Buat session
				$user_data = array(
					'id' => $id,
					'username' => $username,
					'logged_in' => true
				);
				$this->session->set_userdata($user_data);
				// Set message
				$this->session->set_flashdata('user_loggedin', 'Anda sudah login');
				redirect('admin/admin');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Login invalid');
				redirect('admin');
			}		
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('admin');
	}
}

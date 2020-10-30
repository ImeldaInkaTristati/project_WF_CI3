<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('sidebaradmin');
		$this->load->model('m_pembeli');
		$data['result'] = $this->m_pembeli->get_all_pembeli();
		$this->load->view('pembeli', $data);
		$this->load->view('footer');
	}

	public function addPembeli()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('addPembeli');
		$this->load->view('footer');
	}

	public function do_insert(){
	    $this->form_validation->set_rules('nm_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('telpon', 'Telpon', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
		    $this->load->view('sidebaradmin');
			$this->load->view('addPembeli');
			$this->load->view('footer');
	    } else {

	    	$this->load->model('m_pembeli');
			$this->m_pembeli->create_pembeli();
			redirect('Pembeli');
		}
	}

	public function edit($kd_pembeli='')
	{	
		$this->load->model('m_pembeli');
		$data['pembeli'] = $this->m_pembeli->GetPreview($kd_pembeli);

		//????
		// $data = array(
		// 	'nm_pembeli' 	=> $kategori[0]['nm_pembeli'],
		// 	'alamat' 		=> $kategori[0]['alamat'],
		// 	'telpon'		=> $kategori[0]['telpon'],
		// 	'email'			=> $kategori[0]['email']
		// );
		
	    $this->form_validation->set_rules('nm_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('telpon', 'Telpon', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editPembeli', $data);
			$this->load->view('footer');

	    } else {

	    	$data_update 	= array(
				// 'kd_pembeli' 		=> $this->input->post('kd_pembeli'),
				'nm_pembeli'  	=> $this->input->post('nm_pembeli'),
				'alamat'	=> $this->input->post('alamat'),
				'telpon'  	=> $this->input->post('telpon'),
				'email'  	=> $this->input->post('email')
			);


    		$this->load->model('m_pembeli');
			$where = array('kd_pembeli' => $kd_pembeli);
			print_r($data_update);
			$res = $this->m_pembeli->UpdateData('pembeli',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('pembeli');
			}
	    }
	}

	public function do_delete($kd_pembeli){
		$this->load->model('m_pembeli');
		$where 	= array('kd_pembeli' => $kd_pembeli);
		$res 	= $this->m_pembeli->delete_pembeli('pembeli',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('pembeli');
			}
		}
}

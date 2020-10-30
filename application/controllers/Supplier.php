<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('sidebaradmin');
		$this->load->model('m_supplier');
		$data['result'] = $this->m_supplier->get_all_supplier();
		$this->load->view('supplier', $data);
		$this->load->view('footer');
	}
	public function addSupplier()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('addSupplier');
		$this->load->view('footer');
	}

	public function do_insert(){
	    // $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
	    $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('telpon', 'Telpon', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
		    $this->load->view('sidebaradmin');
			$this->load->view('addSupplier');
			$this->load->view('footer');
	    } else {

	    	$this->load->model('m_supplier');
			$this->m_supplier->create_supplier();
			redirect('supplier');
		}
	}

	public function edit($kd_supplier='')
	{	
		$this->load->model('m_supplier');

		$data['supplier'] = $this->m_supplier->GetPreview($kd_supplier);

		// $kategori = $this->m_supplier->GetPreview($kd_supplier);
		// $data = array(
		// 	'kd_supplier'	=> $kategori[0]['kd_supplier'],
		// 	'nama' 	=> $kategori[0]['nama'],
		// 	'alamat' 		=> $kategori[0]['alamat'],
		// 	'telpon'		=> $kategori[0]['telpon'],
		// 	'email'			=> $kategori[0]['email']
		// );
		
		// $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
	    $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('telpon', 'Telpon', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editSupplier', $data);
			$this->load->view('footer');

	    } else {

	    	$data_update 	= array(
				// 'kd_supplier' 		=> $this->input->post('kd_supplier'),
				'nama'  	=> $this->input->post('nama'),
				'alamat'	=> $this->input->post('alamat'),
				'telpon'  	=> $this->input->post('telpon'),
				'email'  	=> $this->input->post('email')
			);


    		$this->load->model('m_supplier');
			$where = array('kd_supplier' => $kd_supplier);
			print_r($data_update);
			$res = $this->m_supplier->UpdateData('supplier',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('supplier');
			}
	    }
	}

	public function do_delete($kd_supplier){
		$this->load->model('m_supplier');
		$where 	= array('kd_supplier' => $kd_supplier);
		$res 	= $this->m_supplier->delete_supplier('supplier',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('supplier');
			}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_barangKeluar');
		$this->load->model('m_order');
	}

	public function index()
	{
		$data['result'] = $this->m_barangKeluar->get_join();

		$this->load->view('sidebaradmin');
		$this->load->view('barangKeluar', $data);
		$this->load->view('footer');
	}

	public function addBarangKeluar()
	{
		$data['barang'] = $this->m_order->dropdown_barang();
		$data['pembeli'] = $this->m_order->dropdown_pembeli();

		$this->form_validation->set_rules('kd_brg', 'Nama Barang', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
	        $this->load->view('addBarangKeluar', $data);
	        $this->load->view('footer');
	    } else {
	        $this->m_barangKeluar->create_barangKeluar();

	        $kd_keluar = $this->db->insert_id();
			$data["detail"] = $this->m_barangKeluar->GetPreview($kd_keluar);
			$kd_brg = $data['detail']->kd_brg;
			$jumlah = $data['detail']->jumlah;
			$keluar = $data['detail']->jumlahKeluar;
	    	$this->m_barangKeluar->totalBarang($kd_brg, $jumlah, $keluar);

	        redirect('BarangKeluar');
		}
	}

	public function edit($kd_keluar='')
	{	
		$this->load->model('m_barangKeluar');

		$kategori = $this->m_barangKeluar->GetPreview($kd_keluar);
		$data = array(
			'kd_pembeli'	=> $kategori[0]['kd_pembeli'],
			'nm_pembeli' 	=> $kategori[0]['nm_pembeli'],
			'alamat' 		=> $kategori[0]['alamat'],
			'telpon'		=> $kategori[0]['telpon'],
			'email'			=> $kategori[0]['email']
		);
		
		$this->form_validation->set_rules('kd_pembeli', 'Kode Pembeli', 'required');
	    $this->form_validation->set_rules('nm_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	    $this->form_validation->set_rules('telpon', 'Telpon', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editBarangKeluar', $data);
			$this->load->view('footer');

	    } else {

	    	$data_update 	= array(
				'kd_pembeli' 		=> $this->input->post('kd_pembeli'),
				'nm_pembeli'  	=> $this->input->post('nm_pembeli'),
				'alamat'	=> $this->input->post('alamat'),
				'telpon'  	=> $this->input->post('telpon'),
				'email'  	=> $this->input->post('email')
			);


    		$this->load->model('m_barangKeluar');
			$where = array('kd_keluar' => $kd_keluar);
			print_r($data_update);
			$res = $this->m_barangKeluar->UpdateData('barangKeluar',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('barangKeluar');
			}
	    }
	}

	public function hapusKeluar($kd_keluar){
		$where 	= array('kd_keluar' => $kd_keluar);
		$res 	= $this->m_barangKeluar->delete_barangKeluar('barangKeluar',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('barangKeluar');
		}
	}
}

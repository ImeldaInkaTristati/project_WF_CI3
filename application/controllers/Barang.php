<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_supplier');
		// $this->load->helper('url_helper','form','file','pagination');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["barang"] = $this->m_barang->get_join();

		$this->load->view('sidebaradmin');
		$this->load->view('barang', $data);
		$this->load->view('footer');
	}

	public function addBarang()
	{
		$data['supplier'] = $this->m_supplier->dropdown_supplier();

		$this->form_validation->set_rules('nm_brg', 'nm_brg', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
	        $this->load->view('addBarang', $data);
	        $this->load->view('footer');
	    } else {
	        $this->m_barang->create_barang();
	        redirect('Barang/');
		}
	}

	public function editBarang($kd_brg='')
	{	
		$data['supplier'] = $this->m_supplier->dropdown_supplier();
		$data['barang'] = $this->m_barang->GetPreview($kd_brg);
		
	    $this->form_validation->set_rules('nm_brg', 'Nama Barang', 'required');
	    $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
	    
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editBarang', $data);
			$this->load->view('footer');

	    } else {

	    	$data_update 	= array(
				'nm_brg'  		=> $this->input->post('nm_brg'),
				'kd_supplier'	=> $this->input->post('kd_supplier')
			);

			$where = array('kd_brg' => $kd_brg);
			print_r($data_update);
			$res = $this->m_barang->UpdateData('barang',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('barang');
			}
	    }
	}

	public function hapusBarang($kd_brg){
		$where 	= array('kd_brg' => $kd_brg);
		$res 	= $this->m_barang->hapus_barang('barang',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('barang');
		}
	}

	public function barangMasuk(){
		// $data['barang'] = $this->m_barang->get_join_masuk();
		$data['barang'] = $this->m_barang->get_join_sm();
		// $data['sortir'] = $this->m_barang->get_join_sortir();

		$this->load->view('sidebaradmin');
		$this->load->view('barangMasuk', $data);
		$this->load->view('footer');
	}

	public function addBarangMasuk(){
		$data['barang'] = $this->m_barang->dropdown_barang();
		$data['supplier'] = $this->m_supplier->dropdown_supplier();

		$this->form_validation->set_rules('kd_brg', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlahMasuk', 'Jumlah', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
	        $this->load->view('addBarangMasuk', $data);
	        $this->load->view('footer');
	    } else {
	        $this->m_barang->create_barangMasuk();

			$id = $this->db->insert_id();
			$this->m_barang->isi_sortir($id);
	        redirect('Barang/barangMasuk');
		}
	}
	// public function barangKeluar(){
	// 	$data['barang'] = $this->m_barang->get_join_keluar();

	// 	$this->load->view('sidebaradmin');
	// 	$this->load->view('barangKeluar', $data);
	// 	$this->load->view('footer');
	// }
	// public function addBarangKeluar(){
	// 	$this->load->view('sidebaradmin');
	// 	$this->load->view('addBarangKeluar');
	// 	$this->load->view('footer');
	// }
	public function sortirBarang($kd_masuk=''){
		$data["barang"] = $this->m_barang->GetPreviewMasuk($kd_masuk);
		$jumlahMasuk = $data['barang']->jumlahMasuk;

		$this->form_validation->set_rules('ready', 'Ready', 'required');	    
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('sortirBarang', $data);
			$this->load->view('footer');

	    } else {
	    	$this->m_barang->update_sortir($kd_masuk, $jumlahMasuk);

			$data["detail"] = $this->m_barang->preview_barang($kd_masuk);
			$kd_brg = $data['detail']->kd_brg;
			$jumlah = $data['detail']->jumlah;
			$ready = $data['detail']->ready;
	    	$this->m_barang->totalBarang($kd_brg, $jumlah, $ready);
	    	
	        redirect('Barang/barangMasuk');
	    }
	}
}

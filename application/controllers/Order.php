<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
		$this->load->model('m_order');
		$this->load->model('m_barangKeluar');
		$this->load->helper('date');
	}

	public function index()
	{
		$data['result'] = $this->m_order->get_join();

		$this->load->view('sidebaradmin');
		$this->load->view('order', $data);
		$this->load->view('footer');
	}

	public function addOrder()
	{	
		$data['pembeli'] = $this->m_order->dropdown_pembeli();
		$data['barang'] = $this->m_order->dropdown_barang();

		$this->load->view('sidebaradmin');
		$this->load->view('addOrder', $data);
		$this->load->view('footer');
	}
	public function do_insert(){
	    $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
	    $this->form_validation->set_rules('kd_brg', 'Nama Barang', 'required');
	    $this->form_validation->set_rules('kd_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('jumlahOrder', 'Jumlah', 'required');
	    $this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
		    $this->load->view('sidebaradmin');
			$this->load->view('addOrder');
			$this->load->view('footer');
	    } else {
			$this->m_order->create_order();
			redirect('order/');
		}
	}

	public function edit($id_order='')
	{	
		$data['pembeli'] = $this->m_order->dropdown_pembeli();
		$data['barang'] = $this->m_order->dropdown_barang();
		$data['order'] = $this->m_order->GetPreview($id_order);
		// $kategori = $this->m_order->GetPreview($id_order);
		// $data = array(
		// 	// 'id_order'	  => $kategori[0]['id_order'],
		// 	'tgl_pesan'   => $kategori[0]['tgl_pesan'],
		// 	'kd_brg' 	  => $kategori[0]['kd_brg'],
		// 	'kd_pembeli'  => $kategori[0]['kd_pembeli'],
		// 	// 'alamat'	  => $kategori[0]['alamatl'],
		// 	'jumlahOrder' => $kategori[0]['jumlahOrder'],
		// 	'tgl_kirim'	  => $kategori[0]['tgl_kirim']
		// );
		
	    $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
	    $this->form_validation->set_rules('kd_brg', 'Nama Barang', 'required');
	    $this->form_validation->set_rules('kd_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('jumlahOrder', 'Jumlah', 'required');
	    $this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'required');
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editOrder', $data);
			$this->load->view('footer');

	    } else {
	    	$data_update 	= array(
				'kd_pembeli'  	=> $this->input->post('kd_pembeli'),
				'kd_brg'		=> $this->input->post('kd_brg'),
				'jumlahOrder'  	=> $this->input->post('jumlahOrder'),
				'tgl_pesan'  	=> $this->input->post('tgl_pesan'),
				'tgl_kirim'  	=> $this->input->post('tgl_kirim')
			);

			$where = array('id_order' => $id_order);
			print_r($data_update);
			$res = $this->m_order->UpdateData('order',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('order');
			}
	    }
	}

	public function do_delete($id_order){
		$where 	= array('id_order' => $id_order);
		$res 	= $this->m_order->delete_order('order',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('order');
		}
	}

	public function kirim($id_order){
		$data["detail"] = $this->m_order->GetPreview($id_order);

		$kd_pembeli = $data['detail']->kd_pembeli;
		$kd_brg = $data['detail']->kd_brg;
		$jumlah = $data['detail']->jumlah;
		$jumlahKeluar = $data['detail']->jumlahOrder;
		$tgl_keluar = $data['detail']->tgl_kirim;
		// $status = $data['detail']->status;

    	$this->m_order->kirim_order($kd_pembeli, $kd_brg, $jumlahKeluar, $tgl_keluar);

    	$this->m_barangKeluar->totalBarang($kd_brg, $jumlah, $jumlahKeluar);

    	$where = array('id_order' => $id_order);
		// print_r($data_update);
		$res = $this->m_order->update_status('order',$where);

    	redirect('order');
	}
}


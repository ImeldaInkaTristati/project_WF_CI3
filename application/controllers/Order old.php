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
	}

	public function index()
	{
		$this->load->view('sidebaradmin');
		$this->load->model('M_order');
		$data['result'] = $this->m_order->get_all_order();
		$this->load->view('order', $data);
		$this->load->view('footer');
	}

	public function addOrder()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('addOrder');
		$this->load->view('footer');
	}
	public function do_insert(){
	    $this->form_validation->set_rules('id_order', 'Kode', 'required');
	    $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
	    $this->form_validation->set_rules('nm_brg', 'Nama Barang', 'required');
	    $this->form_validation->set_rules('nm_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('jumlah_order', 'Jumlah', 'required');
	    $this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'required');

		if ($this->form_validation->run() === FALSE)
	    {
		    $this->load->view('sidebaradmin');
			$this->load->view('addOrder');
			$this->load->view('footer');
	    } else {

	    	$this->load->model('m_order');
			$this->m_pembeli->create_order();
			redirect('order');
		}
	}

	public function edit($id_order='')
	{	
		$this->load->model('m_order');

		$kategori = $this->m_order->GetPreview($id_order);
		$data = array(
			'id_order'	=> $kategori[0]['id_order'],
			'tgl_pesan' 	=> $kategori[0]['tgl_pesan'],
			'nm_brg' 		=> $kategori[0]['nm_brg'],
			'nm_pembeli'		=> $kategori[0]['nm_pembeli'],
			'alamat'			=> $kategori[0]['alamatl'],
			'jumlah_order'		=> $kategori[0]['jumlah_order'],
			'tgl_kirim'			=> $kategori[0]['tgl_kirim']
		);
		
		 $this->form_validation->set_rules('id_order', 'Kode', 'required');
	    $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
	    $this->form_validation->set_rules('nm_brg', 'Nama Barang', 'required');
	    $this->form_validation->set_rules('nm_pembeli', 'Nama Pembeli', 'required');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	     $this->form_validation->set_rules('jumlah_order', 'Jumlah', 'required');
	    $this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'required');
        
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('sidebaradmin');
			$this->load->view('editOrder', $data);
			$this->load->view('footer');

	    } else {

	    	$data_update 	= array(
				'id_order'	 		=> $this->input->post('id_order'),
				'tgl_pesan'  	=> $this->input->post('ntgl_pesan'),
				'nm_brg'	=> $this->input->post('nm_brg'),
				'nm_pembeli'  	=> $this->input->post('nm_pembeli'),
				'alamat'  	=> $this->input->post('alamat'),
				'jumlah_order'  	=> $this->input->post('jumlah_order'),
				'tgl_kirim'  	=> $this->input->post('tgl_kirim')
			);


    		$this->load->model('id_order');
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
		$this->load->model('m_order');
		$where 	= array('id_order' => $id_order);
		$res 	= $this->m_order->delete_order('order',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('order');
			}
		}
}


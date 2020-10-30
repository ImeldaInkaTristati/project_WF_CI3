<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		// parent::__construct();
		parent::__construct();
		// parent::Controller();
        $this->load->helper('fpdf');
		$this->load->model('m_barangKeluar');
		$this->load->model('m_barang');
		$this->load->model('m_order');
		$this->load->library('form_validation');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{

	}

	public function filterKeluar()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('filterKeluar');
		$this->load->view('footer');
		$data = array(
			'awal' => $this->input->post('tglAwal'),
			'akhir'=> $this->input->post('tglAkhir')
        );
        return $data;
	}

	public function cetakLaporanKeluar(){
		$dataa = $this->filterKeluar();
		$awal = $dataa['awal'];
		$akhir = $dataa['akhir'];
		$tglAwal = mediumdate_indo($awal);
		$tglAkhir = mediumdate_indo($akhir);

		$pdf = new FPDF('p','mm','A4');
	    // membuat halaman baru
	    $pdf->AddPage();
	    // setting jenis font yang akan digunakan
	    $pdf->SetFont('Arial','B',16);
	    // mencetak string 
	    $pdf->Cell(200,7,'Sistem Informasi Inventory',0,1,'C');
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(200,7,'LAPORAN DATA BARANG KELUAR',0,1,'C');
	    $pdf->Cell(200,7,$tglAwal.' Sampai '.$tglAkhir,0,1,'C');
	    // Memberikan space kebawah agar tidak terlalu rapat
	    $pdf->Cell(10,7,'',0,1);
	    $pdf->SetFont('Arial','B',10);
	    $pdf->Cell(10,6,'ID',1,0);
	    $pdf->Cell(50,6,'Nama Pembeli',1,0);
	    $pdf->Cell(50,6,'Nama Barang',1,0);
	    $pdf->Cell(50,6,'Jumlah Barang Keluar',1,0);
	    $pdf->Cell(30,6,'Tanggal',1,1);
	    $pdf->SetFont('Arial','',10);;

		if($awal == "" AND $akhir == ""){
	        $data = $this->m_barangKeluar->get_join();;
	    } else {
	    	$data = $this->m_barangKeluar->filter($awal, $akhir);
		}			
        foreach ($data as $row){
            $pdf->Cell(10,6,$row->kd_keluar,1,0);
            $pdf->Cell(50,6,$row->nm_pembeli,1,0);
            $pdf->Cell(50,6,$row->nm_brg,1,0);
            $pdf->Cell(50,6,$row->jumlahKeluar,1,0);
            $pdf->Cell(30,6,$row->tanggalKeluar,1,1); 
        }
        $pdf->Output();
	}

	public function filterMasuk()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('filterMasuk');
		$this->load->view('footer');
		$data = array(
			'awal' => $this->input->post('tglAwal'),
			'akhir'=> $this->input->post('tglAkhir')
        );
        return $data;
	}

	public function cetakLaporanMasuk(){
		$dataa = $this->filterMasuk();
		$awal = $dataa['awal'];
		$akhir = $dataa['akhir'];
		$tglAwal = mediumdate_indo($awal);
		$tglAkhir = mediumdate_indo($akhir);

		$pdf = new FPDF('p','mm','A4');
	    // membuat halaman baru
	    $pdf->AddPage();
	    // setting jenis font yang akan digunakan
	    $pdf->SetFont('Arial','B',16);
	    // mencetak string 
	    $pdf->Cell(200,7,'Sistem Informasi Inventory',0,1,'C');
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(200,7,'LAPORAN DATA SORTIR BARANG',0,1,'C');
	    $pdf->Cell(200,7,$tglAwal.' Sampai '.$tglAkhir,0,1,'C');
	    // Memberikan space kebawah agar tidak terlalu rapat
	    $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'ID',1,0);
        $pdf->Cell(50,6,'Nama Barang',1,0);
        $pdf->Cell(30,6,'Barang Masuk',1,0);
        $pdf->Cell(30,6,'Ready',1,0);
        $pdf->Cell(30,6,'Reject',1,0);
        $pdf->Cell(30,6,'Tanggal',1,1);
        $pdf->SetFont('Arial','',10);

		if($awal == "" AND $akhir == ""){
	        $data = $this->m_barang->get_join_sm();
	    } else {
	    	$data = $this->m_barang->filter($awal, $akhir);
		}			
        foreach ($data as $row){
            $pdf->Cell(20,6,$row->kd_masuk,1,0);
            $pdf->Cell(50,6,$row->nm_brg,1,0);
            $pdf->Cell(30,6,$row->jumlahMasuk,1,0);
            $pdf->Cell(30,6,$row->ready,1,0);
            $pdf->Cell(30,6,$row->reject,1,0);
            $pdf->Cell(30,6,$row->tanggal,1,1); 
        }
        $pdf->Output();
	}

	public function filterOrder()
	{
		$this->load->view('sidebaradmin');
		$this->load->view('filterOrder');
		$this->load->view('footer');
		$data = array(
			'awal' => $this->input->post('tglAwal'),
			'akhir'=> $this->input->post('tglAkhir')
        );
        return $data;
	}

	public function cetakLaporanOrder(){
		$dataa = $this->filterOrder();
		$awal = $dataa['awal'];
		$akhir = $dataa['akhir'];
		$tglAwal = mediumdate_indo($awal);
		$tglAkhir = mediumdate_indo($akhir);

		$pdf = new FPDF('p','mm','A4');
	    // membuat halaman baru
	    $pdf->AddPage();
	    // setting jenis font yang akan digunakan
	    $pdf->SetFont('Arial','B',16);
	    // mencetak string 
	    $pdf->Cell(200,7,'Sistem Informasi Inventory',0,1,'C');
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(200,7,'LAPORAN DATA ORDER BARANG',0,1,'C');
	    $pdf->Cell(200,7,$tglAwal.' Sampai '.$tglAkhir,0,1,'C');
	    // Memberikan space kebawah agar tidak terlalu rapat
	    $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(9,6,'ID',1,0);
        $pdf->Cell(35,6,'Nama Pembeli',1,0);
        $pdf->Cell(40,6,'Alamat',1,0);
        $pdf->Cell(35,6,'Nama Barang',1,0);
        $pdf->Cell(18,6,'Pesanan',1,0);
        $pdf->Cell(27,6,'Tanggal Pesan',1,0);
        $pdf->Cell(27,6,'Tanggal Kirim',1,1);
        $pdf->SetFont('Arial','',10);

		if($awal == "" AND $akhir == ""){
	        $data = $this->m_order->get_join();
	    } else {
	    	$data = $this->m_order->filter($awal, $akhir);
		}			
        foreach ($data as $row){
            $pdf->Cell(9,6,$row->id_order,1,0);
            $pdf->Cell(35,6,$row->nm_pembeli,1,0);
            $pdf->Cell(40,6,$row->alamat,1,0);
            $pdf->Cell(35,6,$row->nm_brg,1,0);
            $pdf->Cell(18,6,$row->jumlahOrder,1,0);
            $pdf->Cell(27,6,$row->tgl_pesan,1,0); 
            $pdf->Cell(27,6,$row->tgl_kirim,1,1);  
        }
        $pdf->Output();
	}
}

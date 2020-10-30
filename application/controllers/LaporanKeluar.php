<?php
// require('fpdf.php');
Class LaporanKeluar extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('fpdf');
        $this->load->model('m_barangKeluar');
    }
    
    function index(){
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(200,7,'Sistem Informasi Inventory',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(200,7,'LAPORAN DATA BARANG KELUAR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(50,6,'Nama Pembeli',1,0);
        $pdf->Cell(50,6,'Nama Barang',1,0);
        $pdf->Cell(50,6,'Jumlah Barang Keluar',1,0);
        $pdf->Cell(30,6,'Tanggal',1,1);
        $pdf->SetFont('Arial','',10);

        // $this->db->select('*');
        // $this->db->join('barang', 'barang.kd_brg = barangKeluar.kd_brg');
        // $this->db->join('pembeli', 'pembeli.kd_pembeli = barangKeluar.kd_pembeli', 'left');
        // $this->db->from('barangKeluar');
        // $query = $this->db->get()->result();

        $data = $this->m_barangKeluar->get_join();

        foreach ($data as $row){
            $pdf->Cell(10,6,$row->kd_keluar,1,0);
            $pdf->Cell(50,6,$row->nm_pembeli,1,0);
            $pdf->Cell(50,6,$row->nm_brg,1,0);
            $pdf->Cell(50,6,$row->jumlahKeluar,1,0);
            $pdf->Cell(30,6,$row->tanggalKeluar,1,1); 
        }
        $pdf->Output();
    }
}
<?php
// require('fpdf.php');
Class LaporanMasuk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('fpdf');
        $this->load->model('m_barang');
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
        $pdf->Cell(200,7,'LAPORAN DATA SORTIR BARANG',0,1,'C');
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

        // $this->db->select('*');
        // $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        // $this->db->join('sortir', 'sortir.kd_masuk = barangMasuk.kd_masuk', 'left');
        // $this->db->from('barangMasuk');
        // $this->db->order_by('tanggal', 'DESC');
        // $query = $this->db->get()->result();
        $query = $this->m_barang->get_join_sm();

        foreach ($query as $row){
            $pdf->Cell(20,6,$row->kd_masuk,1,0);
            $pdf->Cell(50,6,$row->nm_brg,1,0);
            $pdf->Cell(30,6,$row->jumlahMasuk,1,0);
            $pdf->Cell(30,6,$row->ready,1,0);
            $pdf->Cell(30,6,$row->reject,1,0);
            $pdf->Cell(30,6,$row->tanggal,1,1); 
        }
        $pdf->Output();
    }
}
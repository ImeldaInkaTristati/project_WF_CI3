<?php
// require('fpdf.php');
Class LaporanStok extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('fpdf');
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
        $pdf->Cell(200,7,'LAPORAN DATA STOK BARANG',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(60,6,'Nama Barang',1,0);
        $pdf->Cell(60,6,'Stok Barang',1,0);
        $pdf->Cell(50,6,'Nama Supplier',1,1);
        $pdf->SetFont('Arial','',10);

        $this->db->join('supplier', 'supplier.kd_supplier = barang.kd_supplier');
        $pembeli = $this->db->get('barang')->result();

        foreach ($pembeli as $row){
            $pdf->Cell(10,6,$row->kd_brg,1,0);
            $pdf->Cell(60,6,$row->nm_brg,1,0);
            $pdf->Cell(60,6,$row->jumlah,1,0);
            $pdf->Cell(50,6,$row->nama,1,1); 
        }
        $pdf->Output();
    }
}
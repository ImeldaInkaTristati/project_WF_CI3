<?php
// require('fpdf.php');
Class LaporanSupplier extends CI_Controller{
    
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
        $pdf->Cell(200,7,'LAPORAN DATA SUPPLIER',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(40,6,'Nama Supplier',1,0);
        $pdf->Cell(60,6,'Alamat',1,0);
        $pdf->Cell(30,6,'No Telpon',1,0);
        $pdf->Cell(50,6,'Email',1,1);
        $pdf->SetFont('Arial','',10);
        $pembeli = $this->db->get('supplier')->result();
        foreach ($pembeli as $row){
            $pdf->Cell(10,6,$row->kd_supplier,1,0);
            $pdf->Cell(40,6,$row->nama,1,0);
            $pdf->Cell(60,6,$row->alamat,1,0);
            $pdf->Cell(30,6,$row->telpon,1,0);
            $pdf->Cell(50,6,$row->email,1,1); 
        }
        $pdf->Output();
    }
}
<?php
// require('fpdf.php');
Class LaporanOrder extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('fpdf');
        $this->load->model('m_order');
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
        $pdf->Cell(9,6,'ID',1,0);
        $pdf->Cell(35,6,'Nama Pembeli',1,0);
        $pdf->Cell(40,6,'Alamat',1,0);
        $pdf->Cell(35,6,'Nama Barang',1,0);
        $pdf->Cell(18,6,'Pesanan',1,0);
        $pdf->Cell(27,6,'Tanggal Pesan',1,0);
        $pdf->Cell(27,6,'Tanggal Kirim',1,1);
        $pdf->SetFont('Arial','',10);

        // $this->db->select('*');
        // $this->db->join('barang', 'barang.kd_brg = order.kd_brg');
        // $this->db->join('pembeli', 'pembeli.kd_pembeli = order.kd_pembeli');
        // $this->db->from('order');
        // $query = $this->db->get()->result();
        $query = $this->m_order->get_join();

        foreach ($query as $row){
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
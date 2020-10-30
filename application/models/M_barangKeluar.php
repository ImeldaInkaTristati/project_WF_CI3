<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barangKeluar extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_barangKeluar()
    {
       $data = $this->db->get('barangKeluar');
        return $data->result_array();
    }

    public function create_barangKeluar()
    {
        $data = array(
            'kd_pembeli'    => $this->input->post('kd_pembeli'),
            'kd_brg'        => $this->input->post('kd_brg'),
            'jumlahKeluar'  => $this->input->post('jumlahKeluar'),
            'tanggalKeluar' => $this->input->post('tanggal')
        );
        return $this->db->insert('barangKeluar', $data);
    }

   public function GetPreview($kd_keluar='')
    {
        // $isi = $this->db->get_where('order', array('kd_keluar' => $kd_keluar));
        // return $isi->result_array();

        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangKeluar.kd_brg');
        // $this->db->join('sortir', 'sortir.kd_masuk = barangMasuk.kd_masuk', 'left');
        $isi = $this->db->get_where('barangKeluar', array('barangKeluar.kd_keluar' => $kd_keluar));
        return $isi->row();
    }
    public function UpdateData($tabelNama,$data,$where){
        $res = $this->db->update($tabelNama,$data,$where);
        return $res;
    }
    public function delete_barangKeluar($tabelNama,$where)
    {
        $res = $this->db->delete($tabelNama,$where);
        return $res;
    }

    public function get_join(){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangKeluar.kd_brg');
        $this->db->join('pembeli', 'pembeli.kd_pembeli = barangKeluar.kd_pembeli', 'left');
        $this->db->from('barangKeluar');
        $query = $this->db->get();

        return $query->result();
    }

    public function totalBarang($kd_brg, $jumlah, $keluar){
        $data = array(
            'jumlah' => $jumlah - $keluar
        );

        $where = array('kd_brg' => $kd_brg);
        $res = $this->db->update('barang',$data,$where);
        return $res;
    }

    public function filter($awal, $akhir){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangKeluar.kd_brg');
        $this->db->join('pembeli', 'pembeli.kd_pembeli = barangKeluar.kd_pembeli', 'left');
        // $this->db->from('barangKeluar');
        // $query = $this->db->get();
        // return $query->result();
        $this->db->where('tanggalKeluar >=',$awal);
        $this->db->where('tanggalKeluar <=',$akhir);

        $data = $this->db->get('barangKeluar');
        return $data->result();
    }
}

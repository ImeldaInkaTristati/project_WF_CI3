<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function __construct() 
    {
        parent::__construct(); 
    }

    public function get_all_barang()
    {
       $data = $this->db->get('barang');
        return $data->result_array();
    }

    public function create_barang()
    {
        $data = array(
            // 'kd_supplier'          => $this->input->post('kd_supplier'),
            'nm_brg'      => $this->input->post('nm_brg'),
            'kd_supplier' => $this->input->post('kd_supplier')
        );
        return $this->db->insert('barang', $data);
    }

   public function GetPreview($kd_brg='')
    {
        $isi = $this->db->get_where('barang', array('kd_brg' => $kd_brg));
        // return $isi->result_array();
        return $isi->row();
    }
    public function UpdateData($tabelNama,$data,$where){
        $res = $this->db->update($tabelNama,$data,$where);
        return $res;
    }
    public function hapus_barang($tabelNama,$where)
    {
        // $this->db->select('kd_masuk');
        // $kd_masuk['kd_masuk'] = $this->db->get_where('barangMasuk', $where)->row_array();
        // $this->db->where($kd_masuk);
        // $this->db->delete('sortir');
        // $this->db->delete('barangKeluar',$where);
        // $this->db->delete('barangMasuk',$where);
        // $this->db->delete('order',$where);
        $res = $this->db->delete($tabelNama,$where);
        return $res;
    }

    public function totalBarang($kd_brg, $jumlah, $ready){
        $data = array(
            'jumlah' => $jumlah + $ready
        );

        $where = array('kd_brg' => $kd_brg);
        $res = $this->db->update('barang',$data,$where);
        return $res;
    }

    public function get_join() 
    {
        $this->db->join('supplier', 'supplier.kd_supplier = barang.kd_supplier');
        
        $query = $this->db->get('barang');

     return $query->result();
    }

    public function create_barangMasuk()
    {
        $data = array(
            'kd_brg'      => $this->input->post('kd_brg'),
            'jumlahMasuk' => $this->input->post('jumlahMasuk'),
            'tanggal'     => $this->input->post('tanggal')
        );
        return $this->db->insert('barangMasuk', $data);
    }

    public function isi_sortir($kd_masuk)
    {
        $data = array(
            'kd_masuk' => $kd_masuk,
            'ready'    => 0,
            'reject'   => 0
        );
        return $this->db->insert('sortir', $data);
    }

    public function get_join_masuk() 
    {
        $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        // $this->db->join('barangMasuk', 'barangMasuk.kd_masuk = sortir.kd_masuk');
        
        $query = $this->db->get('barangMasuk');

     return $query->result();
    }

    public function update_sortir($kd_masuk, $jumlahMasuk)
    {
        $data = array(
            'kd_masuk'=> $kd_masuk,
            'ready'   => $this->input->post('ready'),
            'reject'  => $jumlahMasuk - $this->input->post('ready')
        );
        // return $this->db->insert('sortir', $data);
        $where = array('kd_masuk' => $kd_masuk);
        $res = $this->db->update('sortir',$data,$where);
        return $res;
    }

    public function get_join_sm(){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        $this->db->join('sortir', 'sortir.kd_masuk = barangMasuk.kd_masuk', 'left');
        $this->db->from('barangMasuk');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function preview_barang($kd_masuk){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        $this->db->join('sortir', 'sortir.kd_masuk = barangMasuk.kd_masuk', 'left');
        $isi = $this->db->get_where('barangMasuk', array('sortir.kd_masuk' => $kd_masuk));
        return $isi->row();
    }

    public function get_join_sortir() 
    {
        $this->db->join('barangMasuk', 'barangMasuk.kd_masuk = sortir.kd_masuk');
        
        $query = $this->db->get('sortir');

     return $query->result();
    }

    public function GetPreviewMasuk($kd_masuk='')
    {
        // $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        // $this->db->join('barangMasuk', 'barangMasuk.kd_masuk = sortir.kd_masuk');
        $isi = $this->db->get_where('barangMasuk', array('kd_masuk' => $kd_masuk));
        // return $isi->result_array();
        return $isi->row();
    }

    public function get_join_keluar() 
    {
        $this->db->join('barang', 'barang.kd_brg = barangKeluar.kd_brg');
        
        $query = $this->db->get('barangKeluar');

     return $query->result();
    }

    public function get_join_pembeli() 
    {
        $this->db->join('pembeli', 'pembeli.kd_pembeli = barangKeluar.kd_pembeli');
        
        $query = $this->db->get('barangKeluar');

     return $query->result();
    }

    public function dropdown_barang()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            barang.kd_brg,
            barang.nm_brg
        ');

        // Urut abjad
        $this->db->order_by('nm_brg');

        $result = $this->db->get('barang');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = '--Pilih Barang--';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['kd_brg']] = $row['nm_brg'];
            }
        }

        return $dropdown;
    }

    public function filter($awal, $akhir){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = barangMasuk.kd_brg');
        $this->db->join('sortir', 'sortir.kd_masuk = barangMasuk.kd_masuk', 'left');
        // $this->db->from('barangKeluar');
        // $query = $this->db->get();
        // return $query->result();
        $this->db->where('tanggal >=',$awal);
        $this->db->where('tanggal <=',$akhir);

        $data = $this->db->get('barangMasuk');
        return $data->result();
    }
}

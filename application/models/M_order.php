<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_order()
    {
       $data = $this->db->get('order');
        return $data->result_array();
    }

    public function create_order()
    {
        $data = array(
                'kd_pembeli'    => $this->input->post('kd_pembeli'),
                'kd_brg'        => $this->input->post('kd_brg'),
                'jumlahOrder'   => $this->input->post('jumlahOrder'),
                'tgl_pesan'     => $this->input->post('tgl_pesan'),
                'tgl_kirim'     => $this->input->post('tgl_kirim')
        );
        return $this->db->insert('order', $data);
    }

   public function GetPreview($id_order)
    {
        $this->db->select ( '*' );
        $this->db->join('pembeli', 'pembeli.kd_pembeli = order.kd_pembeli');
        $this->db->join('barang', 'barang.kd_brg = order.kd_brg', 'left');

        $query = $this->db->get_where('order', array('order.id_order' => $id_order));
                    
        return $query->row();
    }
    public function UpdateData($tabelNama,$data,$where){
            $res = $this->db->update($tabelNama,$data,$where);
            return $res;
    }
    public function delete_order($tabelNama,$where)
    {
            $res = $this->db->delete($tabelNama,$where);
            return $res;
    }

    public function dropdown_pembeli()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            pembeli.kd_pembeli,
            pembeli.nm_pembeli
        ');

        // Urut abjad
        $this->db->order_by('nm_pembeli');

        $result = $this->db->get('pembeli');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = '--Pilih Pembeli--';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['kd_pembeli']] = $row['nm_pembeli'];
            }
        }

        return $dropdown;
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

    public function get_join(){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = order.kd_brg');
        $this->db->join('pembeli', 'pembeli.kd_pembeli = order.kd_pembeli');
        $this->db->from('order');
        // $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function kirim_order($kd_pembeli, $kd_brg, $jumlahKeluar, $tgl_keluar)
    {
        $data = array(
            'kd_pembeli'    => $kd_pembeli,
            'kd_brg'        => $kd_brg,
            'jumlahKeluar'  => $jumlahKeluar,
            'tanggalKeluar' => date('Y-m-d')
        );
        return $this->db->insert('barangKeluar', $data);
    }

    public function update_status($tabelNama,$where){
        $data = array(
            'status' => 1
        );
        $res = $this->db->update($tabelNama,$data,$where);
        return $res;
    }

    public function filter($awal, $akhir){
        $this->db->select('*');
        $this->db->join('barang', 'barang.kd_brg = order.kd_brg');
        $this->db->join('pembeli', 'pembeli.kd_pembeli = order.kd_pembeli');
        // $this->db->from('barangKeluar');
        // $query = $this->db->get();
        // return $query->result();
        $this->db->where('tgl_pesan >=',$awal);
        $this->db->where('tgl_pesan <=',$akhir);

        $data = $this->db->get('order');
        return $data->result();
    }
}
 
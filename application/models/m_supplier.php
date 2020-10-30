<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_supplier()
    {
       $data = $this->db->get('supplier');
        return $data->result_array();
    }

    public function create_supplier()
    {
        $data = array(
            // 'kd_supplier'          => $this->input->post('kd_supplier'),
            'nama'   => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telpon'   => $this->input->post('telpon'),
            'email'        => $this->input->post('email')
        );
        return $this->db->insert('supplier', $data);
    }

   public function GetPreview($kd_supplier='')
    {
        $isi = $this->db->get_where('supplier', array('kd_supplier' => $kd_supplier));
        // return $isi->result_array();
        return $isi->row();
    }
    public function UpdateData($tabelNama,$data,$where){
        $res = $this->db->update($tabelNama,$data,$where);
        return $res;
    }
    public function delete_supplier($tabelNama,$where)
    {
        $res = $this->db->delete($tabelNama,$where);
        return $res;
    }

    public function dropdown_supplier()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            supplier.kd_supplier,
            supplier.nama
        ');

        // Urut abjad
        $this->db->order_by('nama');

        $result = $this->db->get('supplier');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = '--Pilih Supplier--';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['kd_supplier']] = $row['nama'];
            }
        }

        return $dropdown;
    }
}

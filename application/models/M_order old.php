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
       $data = $this->db->get('work_order');
        return $data->result_array();
    }

    public function create_order()
    {
        $data = array(
            'id_order'          => $this->input->post('id_order'),
                'nm_brg'    => $this->input->post('nm_brg'),
                // 'nm_pembeli'    => $this->input->post('nm_pembeli'),
                // 'alamat'    => $this->input->post('alamat'),
                'jumlah_order'      => $this->input->post('jumlah_order'),
                'tgl_kirim'     => $this->input->post('tgl_kirim'),
                'tgl_pesan'     => $this->input->post('ntgl_pesan')
        );
        return $this->db->insert('order', $data);
    }

   public function GetPreview($kd_order='')
    {
        $isi = $this->db->get_where('order', array('kd_order' => $kd_order));
        return $isi->result_array();
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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembeli extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_pembeli()
    {
       $data = $this->db->get('pembeli');
        return $data->result_array();
    }

    public function create_pembeli()
    {
        $data = array(
            'nm_pembeli'   => $this->input->post('nm_pembeli'),
            'alamat'        => $this->input->post('alamat'),
            'telpon'   => $this->input->post('telpon'),
            'email'        => $this->input->post('email')
        );
        return $this->db->insert('pembeli', $data);
    }

   public function GetPreview($kd_pembeli='')
    {
        $isi = $this->db->get_where('pembeli', array('kd_pembeli' => $kd_pembeli));
        return $isi->row();
    }
public function UpdateData($tabelNama,$data,$where){
        $res = $this->db->update($tabelNama,$data,$where);
        return $res;
        }
    public function delete_pembeli($tabelNama,$where)
    {
        $res = $this->db->delete($tabelNama,$where);
        return $res;
    }
}

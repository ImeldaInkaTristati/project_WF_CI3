<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

   public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('admin');


        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function get_total_barang() 
    {
        return $this->db->count_all("barang");
    } 
    public function get_total_supplier() {

     return $this ->db->count_all("supplier");
	}
	public function get_total_pembeli() {

	     return $this ->db->count_all("pembeli");
	}
	public function get_total_order() {

	     return $this ->db->count_all("order");
	}
}

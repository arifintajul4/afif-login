<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi_models extends CI_Model
{
    public function getAllPreferensi()
    {
    	$this->db->order_by('nilai', 'DESC');
    	return $this->db->get('nilai_preferensi')->result_array();   
    }

    public function storeNilaiPreferensi($nama, $nilai)
    {
    	$data=[
    		'nama_alternatif' => $nama,
    		'nilai' => $nilai,
    	];
    	$this->db->insert('nilai_preferensi', $data);
    }

    public function hapusNilaiPreferensi()
    {
    	$this->db->empty_table('nilai_preferensi');
    }
}

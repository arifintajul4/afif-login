<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif_models extends CI_Model
{
    public function getAllAlternatif()
    {
    	return $this->db->get('alternatif')->result_array(); 
    }

    public function storeAlternatif()
    {
     	$data = [
            'nama_alternatif' => $this->input->post('nama')
        ];

      	$this->db->insert('alternatif', $data);
    }

    public function getAlternatifById($id)
    {
    	$this->db->where('id', $id);
    	return $this->db->get('alternatif')->row();
    }

    public function updateAlternatif($id)
    {
    	$data = [
            'nama_alternatif' => $this->input->post('nama')
        ];

      	$this->db->where('id', $id);
      	$this->db->update('alternatif', $data);
    }

    public function hapusAlternatif($id)
    {
    	$this->db->where('id', $id);
      	$this->db->delete('alternatif');
    }  

    public function cekIdAlternatif($id)
    {
        return $this->db->get('nilai_matrik', ['id' => $id])->num_rows();
    }

    public function jumlahAlternatif()
    {
        return $this->db->get('alternatif')->num_rows();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_models extends CI_Model
{
    public function getAllKriteria()
    {
    	return $this->db->get('kriteria')->result_array(); 
    }

    public function storeKriteria()
    {
     	$data = [
            'nama_kriteria' => $this->input->post('nama'),
            'bobot' => $this->input->post('bobot'),
            'poin1' => $this->input->post('poin1'),
            'poin2' => $this->input->post('poin2'),
            'poin3' => $this->input->post('poin3'),
            'poin4' => $this->input->post('poin4'),
            'poin5' => $this->input->post('poin5'),
            'sifat' => $this->input->post('sifat')
       ];

      	$this->db->insert('kriteria', $data);
    }

    public function getKriteriaById($id)
    {
    	$this->db->where('id', $id);
    	return $this->db->get('kriteria')->row();
    }

    public function updateKriteria($id)
    {
    	$data = [
            'nama_kriteria' => $this->input->post('nama'),
            'bobot' => $this->input->post('bobot'),
            'poin1' => $this->input->post('poin1'),
            'poin2' => $this->input->post('poin2'),
            'poin3' => $this->input->post('poin3'),
            'poin4' => $this->input->post('poin4'),
            'poin5' => $this->input->post('poin5'),
            'sifat' => $this->input->post('sifat')
       ];

      	$this->db->where('id', $id);
      	$this->db->update('kriteria', $data);
    }

    public function hapusKriteria($id)
    {
    	$this->db->where('id', $id);
      	$this->db->delete('kriteria');
    }

    public function kriteriaNumRows()
    {
        return $this->db->get('kriteria')->num_rows(); 
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matriks_models extends CI_Model
{
    public function getAllNilai()
    {
    	return $this->db->get('nilai_matrik')->result_array(); 
    }

    public function getNilaiByAlternatif($id)
    {
        $this->db->where('id_alternatif', $id);
        return $this->db->get('nilai_matrik')->result_array();
    }

    public function getNilaiByKriteria($id)
    {
        return $this->db->get_where('nilai_matrik', ['id_kriteria' => $id])->result_array();
    }

    public function storeNilaiMatrik($id_alt, $id_k, $nilai_k)
    {
        $data = [
            'id_alternatif' => $id_alt,
            'id_kriteria' => $id_k,
            'nilai' => $nilai_k
        ];

        $this->db->insert('nilai_matrik', $data);
    }

    public function deletNilMatrik($id){
        $this->db->where('id_alternatif', $id);
        $this->db->delete('nilai_matrik');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto_models extends CI_Model
{
	public function getAllFoto()
	{
		return $this->db->get('tbl_foto')->result_array();
	}

	public function jumlahData()
	{
		return $this->db->get('tbl_foto')->num_rows();
	}

	public function data($limit, $start)
	{
		return $this->db->get('tbl_foto', $limit, $start)->result_array();
	}
}
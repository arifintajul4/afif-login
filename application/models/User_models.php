<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_models extends CI_Model
{
	public function getAllUsers()
	{
		return $this->db->get('user')->result_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id'=>$id])->row();
	}

	public function editMember($id)
	{
		$data = [
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'role_id' => $this->input->post('role')
        ];

      	$this->db->where('id', $id);
      	$this->db->update('user', $data);
	}

	public function hapusMember($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	public function countAllUsers()
	{
		return $this->db->get('user')->num_rows();
	}

	public function countMembers()
	{
		return $this->db->get_where('user', ['role_id' => 2])->num_rows();
	}

	public function countAdmin()
	{
		return $this->db->get_where('user', ['role_id' => 1])->num_rows();
	}

	public function countActiveMember()
	{
		return $this->db->get_where('user', ['is_active' => 1])->num_rows();
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->User_models->getAllUsers();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function getubah()
    {
        echo json_encode($this->User_models->getUserById($_POST['id']));
    }

    public function edit($id)
    {
        $this->User_models->editMember($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Member!</div>');
        redirect('admin');
    }

    public function hapus($id)
    {
        $this->User_models->hapusMember($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Member!</div>');
        redirect('admin');
    }
}

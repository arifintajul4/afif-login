<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
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
        $data['tittle'] = 'Alternatif';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alternatif'] = $this->Alternatif_models->getAllAlternatif();

        $this->form_validation->set_rules('nama', 'Nama Alternatif', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/alternatif', $data);
            $this->load->view('templates/footer');
        }else{ 
            $this->Alternatif_models->storeAlternatif();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Alternatif!</div>');
            redirect('alternatif');
        }
    }

    public function getubah()
    {
       echo json_encode($this->Alternatif_models->getAlternatifById($_POST['id']));
    }

    public function edit($id)
    {
        $this->Alternatif_models->updateAlternatif($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Alternatif!</div>');
        redirect('alternatif');
    }

    public function hapus($id)
    {
        $this->Alternatif_models->hapusAlternatif($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Alternatif!</div>');
        redirect('alternatif');
    }
}

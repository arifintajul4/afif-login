<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
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
        $data['tittle'] = 'Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->Kriteria_models->getAllKriteria();

        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');
        $this->form_validation->set_rules('poin1', 'Poin 1', 'required|trim');
        $this->form_validation->set_rules('poin2', 'Poin 2', 'required|trim');
        $this->form_validation->set_rules('poin3', 'Poin 3', 'required|trim');
        $this->form_validation->set_rules('poin4', 'Poin 4', 'required|trim');
        $this->form_validation->set_rules('poin5', 'Poin 5', 'required|trim');
        $this->form_validation->set_rules('sifat', 'Sifat', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kriteria', $data);
            $this->load->view('templates/footer');
        }else{ 
            $this->Kriteria_models->storeKriteria();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Kriteria!</div>');
            redirect('kriteria');
        }

    }

    public function getubah()
    {
       echo json_encode($this->Kriteria_models->getKriteriaById($_POST['id']));
    }

    public function edit($id)
    {
        $this->Kriteria_models->updateKriteria($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Kriteria!</div>');
        redirect('kriteria');
    }

    public function hapus($id)
    {
        $this->Kriteria_models->hapusKriteria($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Kriteria!</div>');
        redirect('kriteria');
    }
}

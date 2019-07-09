<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matriks extends CI_Controller
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
        $data['tittle'] = 'Nilai Matriks';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->Kriteria_models->getAllKriteria();
        $data['alternatif'] = $this->Alternatif_models->getAllAlternatif();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/matriks', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $o=1;
        $id_alt=$_POST['alternatif'];

        $jml_krit = $this->Kriteria_models->kriteriaNumRows();
        $cek = $this->Alternatif_models->cekIdAlternatif($id_alt);

        if($cek > 0){
            $this->Matriks_models->deletNilMatrik($id_alt);
        }

        for($n=1; $n<=$jml_krit; $n++){

            $id_k=$_POST['id_krite'.$o];
            $nilai_k=$_POST['nilai'.$o];

            $this->Matriks_models->storeNilaiMatrik($id_alt, $id_k, $nilai_k);

            $o++;
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Nilai Matriks!</div>');
        redirect('matriks');
        
    }
}

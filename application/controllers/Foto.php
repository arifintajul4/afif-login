<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Foto_models');

    }

	public function index()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url().'foto/index/';
        $config['total_rows'] = $this->Foto_models->jumlahData();
        $config['per_page'] = 8;
        $from = $this->uri->segment(3);
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);  

        $data['pagination'] = $this->pagination->create_links();
        $data['foto'] = $this->Foto_models->data($config['per_page'],$from);

		$data['tittle'] = 'Kelola Foto';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/foto', $data);
        $this->load->view('templates/footer');	
    }

    public function tambah()
    {
    	if(isset($_POST['upload'])){
    		// cek jika ada gambar yang di upload
            $upload_image = $_FILES['gambar']['name'];

            if (isset($upload_image)) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/galery/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                    $this->db->insert('tbl_foto');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Upload Foto!!</div>');
                    redirect('foto');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('foto');
                }
            }else {
            	redirect('foto');
            }
    	}else {
    		redirect('foto');
    	}
    }
}
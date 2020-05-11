<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('M_Buku');
        $this->load->library('session');
        $this->load->model('M_Peminjaman');
    }
    public function pinjamBuku(){
        $data = [
			"Tgl_Pinjam" => $this->input->get('tgl_pinjam', true),
			"Tgl_Hrs_Kembali" => $this->input->get('tgl_kembali', true),
			"NIM" => $this->session->userdata('username'),
			"NIP" => '1',
			"Kode_Buku" => $this->input->get('pinjam', true)
        ];
        $data = $this->M_Peminjaman->getDataPeminjamanByBuku($this->input->get('pinjam', true));
		if ($data) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Buku sudah ada di pinjam!
		  </div>');
		} else {
			$do = $this->M_Peminjaman->TambahPeminjaman($data);
			if ($do) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Buku berhasil dipinjam!
		  </div>');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Buku gagal dipinjam!
		  </div>');
			}
        }
        redirect('home');
    }
}
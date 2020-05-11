<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->library('session');
		$this->load->model('M_Buku');
	}


	public function tambahbuku(){
		$buku = [
			"Judul" => $this -> input -> post('Judul',true),
			"Kode_Buku" => $this -> input -> post('Kode_Buku',true),
			"Penulis" => $this -> input -> post('Penulis',true),
			"Penerbit" => $this -> input -> post('Penerbit',true),
			"Tahun_Terbit" => $this -> input -> post('Tahun_Terbit',true),
			"ID_Rak" => $this -> input -> post('ID_Rak',true),
		];
		$data = $this->M_Buku->getDataBukuById($buku['Kode_Buku']);
		if ($data) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Buku sudah ada di database!
		  </div>');
		} else {
			$do = $this->M_Buku->tambahbuku($buku);
			if ($do) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Buku berhasil ditambahkan!
		  </div>');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Buku gagal ditambahkan!
		  </div>');
			}
		}
		redirect('home/tambahbuku');
	}
}

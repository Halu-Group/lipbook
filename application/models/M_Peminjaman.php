<?php
class M_Peminjaman extends CI_Model
{
	public function getAllDataPeminjaman(){
		//JOIN table peminjaman, anggota, buku, pegawai, buku dan Rak Buku
		$this -> db -> table ('peminjaman');
		$this -> db -> select ('Tgl_Pinjam', 'Tgl_Hrs_Kembali', 'anggota.Nama','pegawai.Nama', 'buku.Nama', 'rak_buku.Nama_Rak');
		$this -> db -> join('anggota', 'anggota.ID_Anggota = peinjaman.ID_Anggota');
		$this -> db -> join('buku', 'buku.ID_Buku = peminjaman.ID_Buku');
		$this -> db -> join('rak_buku', 'rak_buku.ID_Rak = buku.ID_Rak');
		$this -> db -> join('pegawai', 'pegawai.ID_Pegawai = peminjaman.ID_Pegawai');
		//tampilin semua data baris
		$query = $this -> db -> get();
		return $query -> result_array();
	}
	public function TambahPeminjaman()
	{
		//ini sama dengan ID_Anggota => $_POST('ID_Anggota')
		//parameter true untuk keamanan
		$data = [
			"Tgl_Pinjam" => $this->input->post('Tgl_Pinjam', true),
			"Tgl_Hrs_Kembali" => $this->input->post('Tgl_Hrs_Kembali', true),
			"ID_Anggota" => $this->input->post('ID_Anggota', true),
			"ID_Pegawai" => $this->input->post('ID_Pegawai', true),
			"ID_Buku" => $this->input->post('ID_Buku', true)
		];
		$this->db->insert('peminjaman', $data);
	}

	//Untuk Detail Buku (hanya satu baris yang tampil)
	public function getDataPeminjamanById($id)
	{
		$this -> db -> where ('ID_Pinjam', $id);
		//JOIN table peminjaman, anggota, buku, pegawai, buku dan Rak Buku
		$this -> db -> table ('peminjaman');
		$this -> db -> select ('Tgl_Pinjam', 'Tgl_Hrs_Kembali', 'anggota.Nama','pegawai.Nama', 'buku.Nama', 'rak_buku.Nama_Rak');
		$this -> db -> join('anggota', 'anggota.ID_Anggota = peinjaman.ID_Anggota');
		$this -> db -> join('buku', 'buku.ID_Buku = peminjaman.ID_Buku');
		$this -> db -> join('rak_buku', 'rak_buku.ID_Rak = buku.ID_Rak');
		$this -> db -> join('pegawai', 'pegawai.ID_Pegawai = peminjaman.ID_Pegawai');
		//tampilin hanya dengan 1 baris
		$query = $this -> db -> get();
		return $query -> row_array();
	}
}

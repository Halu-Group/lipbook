<?php
class M_Pengembalian extends CI_Model
{
	public function getAllDataPengembalian(){
		//JOIN table buku dan Rak Buku
		$this -> db -> table ('pengembalian');
		$this -> db -> select ('Tgl_Kembali', 'Tgl_JatuhTempo', 'Denda','ID_Pinjam', 'pegawai.Nama');
		$this -> db -> join('pegawai', 'pegawai.ID_Pegawai = pengembalian.ID_Pegawai');
		//tampilin semua data baris
		$query = $this -> db -> get();
		return $query -> result_array();
	}
	public function TambahPengembalian()
	{
		//ini sama dengan ID_Anggota => $_POST('ID_Anggota')
		//parameter true untuk keamanan
		$data = [
			"Tgl_Kembali" => $this->input->post('Tgl_Kembali', true),
			"Tgl_JatuhTempo" => $this->input->post('Tgl_JatuhTempo', true),
			"Denda" => $this->input->post('Denda', true),
			"ID_Pinjam" => $this->input->post('ID_Pinjam', true),
			"ID_Pegawai" => $this->input->post('ID_Pegawai', true)
		];
		$this->db->input('pengembalian', $data);
	}

	//Untuk Detail Buku (hanya satu baris yang tampil)
	public function getDataPengembalianById($id)
	{
		$this -> db -> where ('ID_Kembali', $id);
		//JOIN table buku dan Rak Buku
		$this -> db -> table ('pengembalian');
		$this -> db -> select ('Tgl_Kembali', 'Tgl_JatuhTempo', 'Denda','ID_Pinjam', 'pegawai.Nama');
		$this -> db -> join('pegawai', 'pegawai.ID_Pegawai = pengembalian.ID_Pegawai');
		//tampilin semua data baris
		$query = $this -> db -> get();
		return $query -> row_array();
	}
}

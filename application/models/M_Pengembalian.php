<?php
class M_Pengembalian extends CI_Model
{
	public function getAllDataPengembalian(){
		//JOIN table buku dan Rak Buku
		$this -> db -> table ('anggota');
		$this -> db -> select ('peminjaman.ID_Pinjam', 'anggota.Nama','peminjaman.Tgl_pinjam', 'pengembalian.Tgl_JatuhTempo', 'pengembalian.denda');
		$this -> db -> join('peminjaman', 'anggota.ID_Anggota = peminjaman.ID_Anggota');
		$this -> db -> join('pengembalian', 'peminjaman.ID_Pinjam = pengembalian.ID_Pinjam');
		//tampilin data 1 baris
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

		$this -> db -> table ('anggota');
		$this -> db -> select ('peminjaman.ID_Pinjam', 'anggota.Nama','peminjaman.Tgl_pinjam', 'pengembalian.Tgl_JatuhTempo','pengembalian.Denda');
		$this -> db -> join('peminjaman', 'anggota.ID_Anggota = peminjaman.ID_Anggota');
		$this -> db -> join('pengembalian', 'peminjaman.ID_Pinjam = pengembalian.ID_Pinjam');
		//tampilin data 1 baris
		$query = $this -> db -> get();
		return $query -> row_array();
	}

	public function getDataBukuBelumDikembalikan(){
		$this -> db -> where ('pengembalian.ID_Pinjam => null');
		$this -> db -> table ('anggota');
		$this -> db -> select ('peminjaman.ID_Pinjam', 'anggota.Nama','peminjaman.Tgl_pinjam', 'pengembalian.Tgl_JatuhTempo', 'pengembalian.Denda');
		$this -> db -> join('peminjaman', 'anggota.ID_Anggota = peminjaman.ID_Anggota');
		$this -> db -> join('pengembalian', 'peminjaman.ID_Pinjam = pengembalian.ID_Pinjam');
		return $this -> db -> get() -> result_array();
	}

	public function getDenda(){
		$terlambat = $this -> db -> DATEDIFF ('pengembalian','Tgl_Kembali', 'Tgl_JatuhTempo');
		if($terlambat > 0){
			$denda = $terlambat * 2000;
		}else {
			$denda = 0;
		}
		$this -> db -> table ('anggota');
		$this -> db -> select ('peminjaman.ID_Pinjam', 'anggota.Nama','peminjaman.Tgl_pinjam', 'pengembalian.Tgl_JatuhTempo', 'denda'.$denda);
		$this -> db -> join('peminjaman', 'anggota.ID_Anggota = peminjaman.ID_Anggota');
		$this -> db -> join('pengembalian', 'peminjaman.ID_Pinjam = pengembalian.ID_Pinjam');
	}
}

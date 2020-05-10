<?php
class M_Buku extends CI_Model {

	//Untuk menampilin semua data buku
	public function getAllDataBuku()
	{
		//Select * from mytable
		return $this -> db -> get('buku') -> resullt_array() ;
	}
	public function TambahBuku()
	{
		//ini sama dengan kode_buku => $_POST('Kode_Buku')
		//parameter true untuk keamanan
		$data = [
			"Judul" => $this -> input -> post('Judul',true),
			"Kode_Buku" => $this -> input -> post('Kode_buku',true),
			"Penulis" => $this -> input -> post('Penulis',true),
			"Penerbit" => $this -> input -> post('Penerbit',true),
			"Tahun_Terbit" => $this -> input -> post('Tahun_Terbit',true),
			"ID_Rak" => $this -> input -> post('ID_Rak',true),
		];
		$this -> db -> insert('buku', $data);
	}

	public function HapusBuku($id)
	{
		//Delete Buku where ID_Buku = $id
		$this -> db -> delete('buku', ['ID_Buku' => $id]);
	}

	//Untuk Detail Buku (hanya satu baris yang tampil)
	public function getDataBukuById($id)
	{
		//JOIN table buku dan Rak Buku
		$this -> db -> table ('buku');
		$this -> db -> select ('Judul', 'Kode_Buku', 'Penulis', 'Penerbit','Tahun_Terbit', 'Nama_Rak');
		$this -> db -> join('rak_buku', 'rak_buku.ID_Rak = buku.ID_Rak');
		$query = $this -> db -> get();
		return $query -> row_array();
	}

	public function EditBuku()
	{
		//ini sama dengan ID_Buku => $_POST('ID_buku')
		//parameter true untuk keamanan
		$data = [
			"Judul" => $this -> input -> post('Judul',true),
			"Kode_Buku" => $this -> input -> post('Kode_buku',true),
			"Penulis" => $this -> input -> post('Penulis',true),
			"Penerbit" => $this -> input -> post('Penerbit',true),
			"Tahun_Terbit" => $this -> input -> post('Tahun_Terbit',true),
			"ID_Rak" => $this -> input -> post('ID_Rak',true)
		];
		//UPDATE buku SET ...... WHERE Kode_Buku = $id.
		$this -> db -> where('ID_Buku', $this -> input -> post('ID_Buku'));
		$this -> db -> update('buku', $data);
	}

	public function CariDataBuku()
	{
		$Keyword = $this -> input -> post('keyword', true);
		$this -> db -> like ('Judul', $Keyword);
		$this -> db -> or_like ('Penulis', $Keyword);
		$this -> db -> or_like ('Penerbit', $Keyword);
		return $this -> db -> get('buku') -> result_array();
	}
}

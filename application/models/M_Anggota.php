<?php
class M_Anggota extends CI_Model {

	public function getAllDataAnggota()
	{
		/*nampilin-nya di view pakek foreach
		contoh : <?php foreach (anggota as ang) : ?>
		terus di tampilin <?= ang; ?>
		terus <?php endforeach; ?>
		Select * from mytable
		*/
		return $this -> db -> get('anggota') -> resullt_array() ;
	}

	public function TambahAnggota()
	{
		//ini sama dengan ID_Anggota => $_POST('ID_Anggota')
		//parameter true untuk keamanan
		$data = [
			"Nama" => $this -> input -> post('Nama',true),
			"NIM" => $this -> input -> post('NIM',true),
			"Jurusan" => $this -> input -> post('Jurusan',true),
			"Angkatan" => $this -> input -> post('Angkatan',true),
			"Alamat" => $this -> input -> post('Alamat',true)
		];
		$this -> db -> input('anggota', $data);
	}
	public function HapusAnggota($id)
	{
		$this -> db -> delete('anggota', ['ID_Anggota' => $id]);
	}

	public function getDataAnggotaById($id)
	{
		//untuk menampilkan satu baris berdasarkan ID_Anggota kalo mau kasih Detail anggota
		return $this -> db -> get_where ('anggota', ['ID_Anggota' => $id]) -> row_array();
	}

	public function Edit()
	{
		//ini sama dengan kode_buku => $_POST('ID_Aggota')
		//parameter true untuk keamanan
		$data = [
			"Nama" => $this -> input -> post('Nama',true),
			"NIM" => $this -> input -> post('NIM',true),
			"Jurusan" => $this -> input -> post('Jurusan',true),
			"Angkatan" => $this -> input -> post('Angkatan',true),
			"Alamat" => $this -> input -> post('Alamat',true)
		];
		//UPDATE anggota SET ...... WHERE ID_Anggota = $id.
		$this -> db -> where('ID_Anggota', $this -> input -> post('ID_Anggota'));
		$this -> db -> update('anggota', $data);
	}

	public function CariDataAnggota()
	{
		$Keyword = $this -> input -> post('keyword', true);
		$this -> db -> like ('Nama', $Keyword);
		$this -> db -> or_like ('NIM', $Keyword);
		$this -> db -> or_like ('Anggota', $Keyword);
		$this -> db -> or_like ('Jurusan', $Keyword);
		$this -> db -> or_like ('Alamat', $Keyword);
		return $this -> db -> get('anggota') -> result_array();
	}
}

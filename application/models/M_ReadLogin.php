<?php

class Mread extends CI_Model
{

	function export_kontak()
	{
		$query = $this->db->get('pegawai');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model {

	//query login
	public function getLoginUser($usr)
	{
		$user = $this->db->get_where('anggota', ['nim' => $usr])->row_array();
		return $user;
	}
	public function getLoginPegawai($usr)
	{
		$user = $this->db->get_where('anggota', ['nip' => $usr])->row_array();
		return $user;
	}

}


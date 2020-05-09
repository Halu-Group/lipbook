<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perpus_model extends CI_Model {

	//query login
	public function getLoginData($usr,$psw)
	{
		$u = $usr;
		$p = md5($psw);
		$cek_login = $this->db->get_where('pegawai', ['NIP' => $u, 'Password' => $p]);
		if(count($cek_login->result())>0)
		{
			header('location:'.base_url().'home');
		}
		else
		{
			header('location:'.base_url().'home/loggin');
		}
	}

}


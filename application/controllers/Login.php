<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Login');
        $this->load->library('session');
	}

	//getLogin data
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		if($this->form_validation->run() == false){
			$this->load->view('templates/auth_header.php');
			$this->load->view('auth/login.php');
			$this->load->view('templates/auth_footer.php');
		}else{	
			$user = $this->M_Login->getLoginUser($u);
			$admin = $this->M_Login->getLoginPegawai($u);
			if($user){
				if($user['password']==$p){
					$data = [
						'username' => $user['NIM'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('home');
				}else{	
					$this->session->set_flashdata('message', 'username wrong!');
					redirect('home');
				}
			}else if($admin){
				if($admin['Password']==$p){
					$data = [
						'username' => $admin['NIP'],
						'role_id' => $admin['role_id']
					];
					$this->session->set_userdata($data);
					redirect('home');
				}else{	
					$this->session->set_flashdata('message', 'username wrong!');
					redirect('home/tes');
				}
			}else{
				$this->session->set_flashdata('message', 'username wrong!');
				redirect('login');
		}
	}
	//halamanLogin
}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	//getLogin data
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		if($this->form_validation->run() == false){

		}else{	
			$user = $this->M_Login->getLoginUser($u);
			$admin = $this->M_Login->getLoginPegawai($u);
			if($user){
				if($user['password']==$p){
					$data = [
						'username' => $user['nim'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('home');
				}else{	
					$this->session->set_flashdata('message', 'username wrong!');
					redirect('login');
				}
			}else if($admin){
				if($user['password']==$p){
					$data = [
						'username' => $user['nim'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('home');
				}else{	
					$this->session->set_flashdata('message', 'username wrong!');
					redirect('login');
			}
			else{
				$this->session->set_flashdata('message', 'username wrong!');
				redirect('login');
			}
		}
	}
	//halamanLogin
	public function log()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{

			//buat atribut form
			$frm['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => '',
				'class' => 'form-control',
				'placeholder' => 'Username'
			);
			$frm['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => '',
				'class' => 'form-control',
				'placeholder' => 'Password'
			);

			$frm['title']='Login & Register';
			$tmp['content']=$this->load->view('global/login',$frm);
	
		}
		else
		{
			$st = $this->session->userdata('stts');
			echo $s = $this->session->userdata('username');
			if($st=='admin')
			{				
				header('location:'.base_url().'admin/Home');
			}
			else if($st=='petugas')
			{
				header('location:'.base_url().'petugas/Home');
			}
		
		}
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
	{
        parent::__construct();
        $this->load->library('session');
		$this->load->model('M_Login');
	}

    public function index(){
        if($this->session->userdata('role_id') == 2){
            $data['user'] = $this->M_Login->getLoginUser($this->session->userdata('username'));
            $this->load->view('user/index.php', $data);
        }else if($this->session->userdata('role_id') == 1){
            $data['user'] = $this->M_Login->getLoginPegawai($this->session->userdata('username'));
            $this->load->view('admin/index.php', $data);
        } else {
            redirect('login');
        }
    }
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        redirect('login');
    }
}
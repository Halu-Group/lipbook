<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

    public function index(){
        if($this->session->userdata->('role_id') == 2){
          $user = $this->M_Login->getLoginUser($this->session->userdata->('username'));
        }else if($this->session->userdata->('role_id') == 1){
            $user = $this->M_Login->getLoginPegawai($this->session->userdata->('username'));
        } else {
            redirect('login');
        }
    }
}
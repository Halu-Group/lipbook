<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
	{
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_Login');
        $this->load->model('M_Buku');
        $this->load->library('pagination');
	}

    public function index(){
        if($this->session->userdata('role_id') == 2){
            $data['user'] = $this->M_Login->getLoginUser($this->session->userdata('username'));
            
            
            $this->load->view('user/home_header.php', $data);
            $this->load->view('user/home_sidebar.php', $data);
            $this->load->view('user/home_topbar.php', $data);
            $this->_indexUser();
            $this->load->view('user/home_footer.php', $data);
            
        }else if($this->session->userdata('role_id') == 1){
            $data['user'] = $this->M_Login->getLoginPegawai($this->session->userdata('username'));
            $this->load->view('admin/home_header.php', $data);
            $this->load->view('admin/home_sidebar.php', $data);
            $this->load->view('admin/home_topbar.php', $data);
            $this->load->view('admin/index.php', $data);
            $this->load->view('admin/home_footer.php', $data);
        } else {
            redirect('login');
        }
    }
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        redirect('login');
    }
    public function tambahbuku(){
		$data['user'] = $this->M_Login->getLoginPegawai($this->session->userdata('username'));
		$this->load->view('admin/home_header.php', $data);
		$this->load->view('admin/home_sidebar.php', $data);
		$this->load->view('admin/home_topbar.php', $data);
		$this->load->view('admin/tambahbuku.php', $data);
		$this->load->view('admin/home_footer.php', $data);

    }
    public function pinjambuku(){
		    $data['user'] = $this->M_Login->getLoginPegawai($this->session->userdata('username'));
            $data['databuku'] = $this->M_Buku->getDataBukuById($this->input->get('pinjam', true));
            $this->load->view('user/home_header.php', $data);
            $this->load->view('user/home_sidebar.php', $data);
            $this->load->view('user/home_topbar.php', $data);
            $this->load->view('user/pinjambuku.php', $data);
            $this->load->view('user/home_footer.php', $data);
    }
    public function _indexUser(){
         //konfigurasi pagination
         $config['base_url'] = site_url('Home/index'); //site url
         $config['total_rows'] = $this->db->count_all('buku'); //total row
         $config['per_page'] = 3;  //show record per halaman
         $config["uri_segment"] = 3;  // uri parameter
         $choice = $config["total_rows"] / $config["per_page"];
         $config["num_links"] = floor($choice);
  
         // Membuat Style pagination untuk BootStrap v4
       $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';
  
         $this->pagination->initialize($config);
         $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
         //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
         $data['data'] = $this->M_Buku->getDataBuku($config["per_page"], $data['page']);           
  
         $data['pagination'] = $this->pagination->create_links();
  
         //load view mahasiswa view
         $this->load->view('user/index',$data);
    }
}
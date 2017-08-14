<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_pengelola', 'PGL', TRUE);
    }

	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('pengelola/','refresh');
        } else {     
		//$this->load->vars($data);
		$this->load->view('pengelola/login');
		 }
	}
	
	public function ceklogin()
	{
		$username		= validasi_sql($this->input->post('username'));
		$password		= validasi_sql($this->input->post('password'));
		$do				= validasi_sql($this->input->post('masuk'));
		
		$where_login['pengelola_username']	= $username;
		$where_login['pengelola_password']	= do_hash($password, 'md5');
		
		
		if ($do && $this->PGL->cek_login($where_login) === TRUE){
			redirect("ukm/");
		} else {
			$this->session->set_flashdata('warning',' Username atau Password tidak cocok!');
            redirect("pengelola");
		}
		
	}
	
	public function keluar()
	{
		$this->PGL->remov_session();
       // session_destroy();
		redirect("pengelola");
	}
}
	
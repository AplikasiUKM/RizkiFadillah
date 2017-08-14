<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Internal extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_internal', 'INT', TRUE);
    }

	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('internal/','refresh');
        } else {     
		//$this->load->vars($data);
		$this->load->view('internal/login');
		 }
	}
	
	public function ceklogin()
	{
		$username		= validasi_sql($this->input->post('username'));
		$password		= validasi_sql($this->input->post('password'));
		$do				= validasi_sql($this->input->post('masuk'));
		
		$where_login['admin_username']	= $username;
		$where_login['admin_password']	= do_hash($password, 'md5');
		
		
		if ($do && $this->INT->cek_login($where_login) === TRUE){
			redirect("admin/");
		} else {
			$this->session->set_flashdata('warning',' Username atau Password tidak cocok!');
            redirect("internal");
		}
		
	}
	
	public function keluar()
	{
		$this->INT->remov_session();
       // session_destroy();
		redirect("internal");
	}
}
	
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_mahasiswa', 'MHS', TRUE);
		$this->load->model('M_internal', 'INT', TRUE);
    }

	public function index()
	{
        if ($this->session->userdata('logged_in2') == TRUE){       
            redirect('mahasiswa/','refresh');
        } else {     
		//$this->load->vars($data);
		$this->load->view('mahasiswa/login');
		 }
	}
	
	public function ceklogin()
	{
		$mhs_npm		= validasi_sql($this->input->post('mhs_npm'));
		$mhs_password	= validasi_sql($this->input->post('mhs_password'));
		$do				= validasi_sql($this->input->post('masuk'));
		
		$where_login['mhs_npm']	= $mhs_npm;
		$where_login['mhs_password']	= do_hash($mhs_password, 'md5');
		
		
		if ($do && $this->MHS->cek_login($where_login) === TRUE){
			redirect("mahasiswa/home");
		} else {
			$this->session->set_flashdata('warning',' NPM atau Password tidak cocok!');
            redirect("mahasiswa");
		}
		
	}
	
	public function keluar()
	{
		$this->MHS->remov_session();
      	session_destroy();
		redirect("mahasiswa");
	}

	public function home ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_mahasiswa['mhs_npm']		= $this->session->userdata('mhs_npm');
			$data['mahasiswa']				= $this->MHS->get_mahasiswa('',$where_mahasiswa);
			$data['content']				= '/mahasiswa/content/home';
			$data['action']					= (empty($filter1))?'view':$filter1;
			if($data['action'] == 'tambah' ) {
				$data['mhs_npm']				=  $this->session->userdata('mhs_npm');
				$data['ukm_id']					= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):'';		
				$data['pendaftaran_status']		= '?';		
				$data['pendaftaran_tahun']		= date("Y");
				$simpan								= $this->input->post('simpan');
				if ($simpan) {
					$insert['mhs_npm']	 	 		= validasi_sql($data['mhs_npm']);
					$insert['ukm_id']	 			 = validasi_sql($data['ukm_id']);
					$insert['pendaftaran_status']	 = validasi_sql($data['pendaftaran_status']);
					$insert['pendaftaran_tahun']	 = validasi_sql($data['pendaftaran_tahun']);
					$this->MHS->insert_pendaftaran($insert);
					$this->session->set_flashdata('success','Pendaftaran telah berhasil dilakukan!');
					redirect("mahasiswa/home");
				} else {
					$this->session->set_flashdata('error','Pendaftaran tidak berhasil!');
					redirect("mahasiswa/home");	
				}
			}
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("mahasiswa");
		}
		
	}

	public function pengumuman ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_mahasiswa['mhs_npm']		= $this->session->userdata('mhs_npm');
			$data['mahasiswa']				= $this->MHS->get_mahasiswa('',$where_mahasiswa);
			$data['content']				= '/mahasiswa/content/pengumuman';
		
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("mahasiswa");
		}
		
	}

}
	
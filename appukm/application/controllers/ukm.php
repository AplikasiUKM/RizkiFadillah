<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ukm extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_pengelola', 'PGL', TRUE);
    }

	public function index ()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/home';
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
//pendaftaran-----------------==================--------=============================================--------------=============================
    public function pendaftaran ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/pendaftaran';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['pendaftaran_id']		= ($this->input->post('pendaftaran_id'))?$this->input->post('pendaftaran_id'):'';
                    $data['pendaftaran_status']		= ($this->input->post('pendaftaran_status'))?$this->input->post('pendaftaran_status'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['pendaftaran_id']	= validasi_sql($data['pendaftaran_id']);
					$insert['pendaftaran_status']	= validasi_sql($data['pendaftaran_status']);
					$this->PGL->insert_pendaftaran($insert);
					$this->session->set_flashdata('success','pendaftaran baru telah berhasil ditambahkan!,');
					redirect("ukm/pendaftaran");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_pendaftaran['pendaftaran_id']	= $filter2; 
				$pendaftaran 						= $this->PGL->get_pendaftaran('*', $where_pendaftaran);
                 $data['pendaftaran_id']			= ($this->input->post('pendaftaran_id'))?$this->input->post('pendaftaran_id'):$pendaftaran->pendaftaran_id;
                 $data['pendaftaran_status']			= ($this->input->post('pendaftaran_status'))?$this->input->post('pendaftaran_status'):$pendaftaran->pendaftaran_status;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['pendaftaran_id']	= validasi_sql($data['pendaftaran_id']);
					$edit['pendaftaran_status']	= validasi_sql($data['pendaftaran_status']);
					$this->PGL->update_pendaftaran($where_edit, $edit);
					$this->session->set_flashdata('success','pendaftaran telah berhasil diedit!,');
					redirect("ukm/pendaftaran");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['pendaftaran_id']		= validasi_sql($filter2);
				$this->PGL->delete_pendaftaran($where_delete);
				$this->session->set_flashdata('success','Data pendaftaran telah berhasil dihapus!,');
					redirect("ukm/pendaftaran");
                }
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
//deadline----------------==============----------------=============================================--------------=============================
    public function deadline ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/deadline';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['deadline_id']		= ($this->input->post('deadline_id'))?$this->input->post('deadline_id'):'';
                    $data['deadline_tgl']		= ($this->input->post('deadline_tgl'))?$this->input->post('deadline_tgl'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['deadline_id']	= validasi_sql($data['deadline_id']);
					$insert['deadline_tgl']	= validasi_sql($data['deadline_tgl']);
					$this->PGL->insert_deadline($insert);
					$this->session->set_flashdata('success','deadline baru telah berhasil ditambahkan!,');
					redirect("ukm/deadline");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_deadline['deadline_id']	= $filter2; 
				$deadline 						= $this->PGL->get_deadline('*', $where_deadline);
                 $data['deadline_id']			= ($this->input->post('deadline_id'))?$this->input->post('deadline_id'):$deadline->deadline_id;
                 $data['deadline_tgl']			= ($this->input->post('deadline_tgl'))?$this->input->post('deadline_tgl'):$deadline->deadline_tgl;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['deadline_id']	= validasi_sql($data['deadline_id']);
					$edit['deadline_tgl']	= validasi_sql($data['deadline_tgl']);
					$this->PGL->update_deadline($where_edit, $edit);
					$this->session->set_flashdata('success','deadline telah berhasil diedit!,');
					redirect("ukm/deadline");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['deadline_id']		= validasi_sql($filter2);
				$this->PGL->delete_deadline($where_delete);
				$this->session->set_flashdata('success','Data deadline telah berhasil dihapus!,');
					redirect("ukm/deadline");
                }
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
    //anggota-----------------==================--------=============================================--------------=============================
    public function anggota ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/anggota';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
    //history-----------------==================--------=============================================--------------=============================
    public function history ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/history';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
    //alumni-----------------==================--------=============================================--------------=============================
    public function alumni ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_pengelola['pengelola_id']	= $this->session->userdata('pengelola_id');
			$data['pengelola']					= $this->PGL->get_pengelola('',$where_pengelola);
			$data['content']			= '/pengelola/content/alumni';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }
			$this->load->vars($data);
			$this->load->view('pengelola/home');
		} else {
			redirect("pengelola");
		}
		
	}
}
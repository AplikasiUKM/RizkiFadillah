<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_internal', 'INT', TRUE);
    }

	public function index ()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/home';
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
    
    //MAHASISWA================----------------=================---------------=================---------------==============---------==========
    public function mahasiswa ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/mahasiswa';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah') {
                    $data['mhs_npm']		= ($this->input->post('mhs_npm'))?$this->input->post('mhs_npm'):'';
                    $data['mhs_nama']		= ($this->input->post('mhs_nama'))?$this->input->post('mhs_nama'):'';
                    $data['mhs_password']		= ($this->input->post('mhs_password'))?$this->input->post('mhs_password'):'';
                    $data['kelas_id']		= ($this->input->post('kelas_id'))?$this->input->post('kelas_id'):'';
                    $data['prodi_id']		= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):'';
                    $data['mhs_tahun_masuk']		= ($this->input->post('mhs_tahun_masuk'))?$this->input->post('mhs_tahun_masuk'):'';
                    $data['mhs_foto']		= ($this->input->post('mhs_foto'))?$this->input->post('mhs_foto'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
                    $gambar = upload_image("mhs_foto", "./assets/images/mahasiswa/", "230x160", seo($data['mhs_nama']));
					$data['mhs_foto']	= $gambar;
                    $insert['mhs_npm']	= validasi_sql($data['mhs_npm']);
					$insert['mhs_nama']	= validasi_sql($data['mhs_nama']);
                    $insert['mhs_password']	= validasi_sql(do_hash(($data['mhs_password']), 'md5'));
                    $insert['kelas_id'] = validasi_sql($data['kelas_id']);
                    $insert['prodi_id'] = validasi_sql($data['prodi_id']);
                    //$insert['mhs_tahun_masuk'] = validasi_sql($data['mhs_tahun_masuk']);
                    $insert['mhs_tahun_masuk']  = $data['mhs_tahun_masuk'];
                    if ($data['mhs_foto']) { $insert['mhs_foto'] = validasi_sql($data['mhs_foto']); }
                    $insert['mhs_foto'] = validasi_sql($data['mhs_foto']);
					$this->INT->insert_mahasiswa($insert);
					$this->session->set_flashdata('success','Mahasiswa baru telah berhasil ditambahkan!,');
					redirect("admin/mahasiswa");
                    }
                }  elseif ($data['action'] == 'edit') {
                    $data['onload']				= 'menu_nama';
				$where_mahasiswa['mhs_npm']	= $filter2; 
				$mahasiswa 						= $this->INT->get_mahasiswa('*', $where_mahasiswa);
                 $data['mhs_npm']			= ($this->input->post('mhs_npm'))?$this->input->post('mhs_npm'):$mahasiswa->mhs_npm;
                 $data['mhs_nama']			= ($this->input->post('mhs_nama'))?$this->input->post('mhs_nama'):$mahasiswa->mhs_nama;
                 $data['mhs_password']			= ($this->input->post('mhs_password'))?$this->input->post('mhs_password'):$mahasiswa->mhs_nama;
                 $data['kelas_id']			= ($this->input->post('kelas_id'))?$this->input->post('kelas_id'):$mahasiswa->prodi_id;
                 $data['prodi_id']			= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$mahasiswa->prodi_id;
                 $data['mhs_tahun_masuk']			= ($this->input->post('mhs_tahun_masuk'))?$this->input->post('mhs_tahun_masuk'):$mahasiswa->mhs_tahun_masuk;
                 $data['mhs_foto']			= ($this->input->post('mhs_foto'))?$this->input->post('mhs_foto'):$mahasiswa->mhs_foto;
				    $simpan						= $this->input->post('simpan');
                if ($simpan) {
					$tags = "";
					if ($this->input->post('tag')) {
						$tags = implode(',', $this->input->post('tag'));
					}
					$gambar = upload_image("mhs_foto", "./assets/images/mahasiswa/", "230x160", seo($data['mhs_nama']));
					$data['mhs_foto']		= $gambar;
					$where_edit['mhs_npm']	= validasi_sql($data['mhs_npm']);
					$edit['mhs_nama']	= validasi_sql($data['mhs_nama']);
                    $edit['mhs_password']	= validasi_sql(do_hash(($data['mhs_password']), 'md5'));
                    $edit['kelas_id']	= validasi_sql($data['kelas_id']);
                    $edit['prodi_id']	= validasi_sql($data['prodi_id']);
                    $edit['mhs_tahun_masuk']	= validasi_sql($data['mhs_tahun_masuk']);
                    if ($data['mhs_foto']) {
						$row = $this->INT->get_mahasiswa('*', $where_edit);
						@unlink('./assets/images/mahasiswa/'.$row->mhs_foto);
						@unlink('./assets/images/mahasiswa/kecil_'.$row->mhs_foto);
						$edit['mhs_foto']	= $data['mhs_foto']; 
					}
					$this->INT->update_mahasiswa($where_edit, $edit);
					$this->session->set_flashdata('success','Mahasiswa telah berhasil diedit!,');
					redirect("admin/mahasiswa");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['mhs_npm']		= validasi_sql($filter2);
				$this->INT->delete_mahasiswa($where_delete);
				$this->session->set_flashdata('success','Data Mahasiswa telah berhasil dihapus!,');
					redirect("admin/mahasiswa");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
        
    }
    //prodiIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII=============================================--------------=============================
    public function prodi ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/prodi';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['prodi_id']		= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):'';
                    $data['prodi_nama']		= ($this->input->post('prodi_nama'))?$this->input->post('prodi_nama'):'';
                    $data['prodi_desk']		= ($this->input->post('prodi_desk'))?$this->input->post('prodi_desk'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['prodi_id']	= validasi_sql($data['prodi_id']);
					$insert['prodi_nama']	= validasi_sql($data['prodi_nama']);
                    $insert['prodi_desk'] = validasi_sql($data['prodi_desk']);
					$this->INT->insert_prodi($insert);
					$this->session->set_flashdata('success','prodi baru telah berhasil ditambahkan!,');
					redirect("admin/prodi");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_prodi['prodi_id']	= $filter2; 
				$prodi 						= $this->INT->get_prodi('*', $where_prodi);
                 $data['prodi_id']			= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$prodi->prodi_id;
                 $data['prodi_nama']			= ($this->input->post('prodi_nama'))?$this->input->post('prodi_nama'):$prodi->prodi_nama;
                 $data['prodi_desk']			= ($this->input->post('prodi_desk'))?$this->input->post('prodi_desk'):$prodi->prodi_desk;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['prodi_id']	= validasi_sql($data['prodi_id']);
					$edit['prodi_nama']	= validasi_sql($data['prodi_nama']);
                    $edit['prodi_desk']	= validasi_sql($data['prodi_desk']);
					$this->INT->update_prodi($where_edit, $edit);
					$this->session->set_flashdata('success','prodi telah berhasil diedit!,');
					redirect("admin/prodi");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['prodi_id']		= validasi_sql($filter2);
				$this->INT->delete_prodi($where_delete);
				$this->session->set_flashdata('success','Data prodi telah berhasil dihapus!,');
					redirect("admin/prodi");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
    
//==KELASS===============================================================================================================
    public function kelas ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/kelas';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['kelas_id']		= ($this->input->post('kelas_id'))?$this->input->post('kelas_id'):'';
                    $data['kelas_nama']		= ($this->input->post('kelas_nama'))?$this->input->post('kelas_nama'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['kelas_id']	= validasi_sql($data['kelas_id']);
					$insert['kelas_nama']	= validasi_sql($data['kelas_nama']);
					$this->INT->insert_kelas($insert);
					$this->session->set_flashdata('success','Kelas baru telah berhasil ditambahkan!,');
					redirect("admin/kelas");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_kelas['kelas_id']	= $filter2; 
				$kelas 						= $this->INT->get_kelas('*', $where_kelas);
                 $data['kelas_id']			= ($this->input->post('kelas_id'))?$this->input->post('kelas_id'):$kelas->kelas_id;
                 $data['kelas_nama']			= ($this->input->post('kelas_nama'))?$this->input->post('kelas_nama'):$kelas->kelas_nama;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['kelas_id']	= validasi_sql($data['kelas_id']);
					$edit['kelas_nama']	= validasi_sql($data['kelas_nama']);
					$this->INT->update_kelas($where_edit, $edit);
					$this->session->set_flashdata('success','Kelas telah berhasil diedit!,');
					redirect("admin/kelas");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['kelas_id']		= validasi_sql($filter2);
				$this->INT->delete_kelas($where_delete);
				$this->session->set_flashdata('success','Data kelas telah berhasil dihapus!,');
					redirect("admin/kelas");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
     //ukmIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII=============================================--------------=============================
    public function ukm ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/ukm';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['ukm_id']		= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):'';
                    $data['ukm_nama']		= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):'';
                    $data['ukm_desk']		= ($this->input->post('ukm_desk'))?$this->input->post('ukm_desk'):'';
                    $data['ukm_logo']		= ($this->input->post('ukm_logo'))?$this->input->post('ukm_logo'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
                    $gambar = upload_image("ukm_logo", "./assets/images/ukm/", "230x160", seo($data['ukm_nama']));
                    $data['mhs_logo']	= $gambar;
					$insert['ukm_id']	= validasi_sql($data['ukm_id']);
					$insert['ukm_nama']	= validasi_sql($data['ukm_nama']);
                    $insert['ukm_desk'] = validasi_sql($data['ukm_desk']);
                    if ($data['ukm_logo']) { $insert['ukm_logo'] = validasi_sql($data['ukm_logo']); }
                    $insert['ukm_logo'] = validasi_sql($data['ukm_logo']);
					$this->INT->insert_ukm($insert);
					$this->session->set_flashdata('success','ukm baru telah berhasil ditambahkan!,');
					redirect("admin/ukm");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_ukm['ukm_id']	= $filter2; 
				$ukm 						= $this->INT->get_ukm('*', $where_ukm);
                 $data['ukm_id']			= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):$ukm->ukm_id;
                 $data['ukm_nama']			= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):$ukm->ukm_nama;
                 $data['ukm_desk']			= ($this->input->post('ukm_desk'))?$this->input->post('ukm_desk'):$ukm->ukm_desk;
                 $data['ukm_logo']			= ($this->input->post('ukm_logo'))?$this->input->post('ukm_logo'):$ukm->ukm_logo;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['ukm_id']	= validasi_sql($data['ukm_id']);
					$edit['ukm_nama']	= validasi_sql($data['ukm_nama']);
                    $edit['ukm_desk']	= validasi_sql($data['ukm_desk']);
                    $edit['ukm_logo']	= validasi_sql($data['ukm_logo']);
					$this->INT->update_ukm($where_edit, $edit);
					$this->session->set_flashdata('success','ukm telah berhasil diedit!,');
					redirect("admin/ukm");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['ukm_id']		= validasi_sql($filter2);
				$this->INT->delete_ukm($where_delete);
				$this->session->set_flashdata('success','Data ukm telah berhasil dihapus!,');
					redirect("admin/ukm");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
    
  //pengelolaIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII=============================================--------------=============================
    public function pengelola ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/pengelola';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['pengelola_id']		= ($this->input->post('pengelola_id'))?$this->input->post('pengelola_id'):'';
                    $data['pengelola_username']		= ($this->input->post('pengelola_username'))?$this->input->post('pengelola_username'):'';
                    $data['pengelola_password']		= ($this->input->post('pengelola_password'))?$this->input->post('pengelola_password'):'';
                    $data['ukm_id']		= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['pengelola_id']	= validasi_sql($data['pengelola_id']);
					$insert['pengelola_username']	= validasi_sql($data['pengelola_username']);
                    $insert['pengelola_password'] = validasi_sql(do_hash(($data['pengelola_password']), 'md5'));
                    $insert['ukm_id'] = validasi_sql($data['ukm_id']);
					$this->INT->insert_pengelola($insert);
					$this->session->set_flashdata('success','pengelola baru telah berhasil ditambahkan!,');
					redirect("admin/pengelola");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_pengelola['pengelola_id']	= $filter2; 
				$pengelola 						= $this->INT->get_pengelola('*', $where_pengelola);
                 $data['pengelola_id']			= ($this->input->post('pengelola_id'))?$this->input->post('pengelola_id'):$pengelola->pengelola_id;
                 $data['pengelola_username']			= ($this->input->post('pengelola_username'))?$this->input->post('pengelola_username'):$pengelola->pengelola_username;
                 $data['pengelola_password']			= ($this->input->post('pengelola_password'))?$this->input->post('pengelola_password'):$pengelola->pengelola_password;
                 $data['ukm_id']			= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):$pengelola->ukm_id;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['pengelola_id']	= validasi_sql($data['pengelola_id']);
					$edit['pengelola_username']	= validasi_sql($data['pengelola_username']);
                    $edit['pengelola_password']	= validasi_sql(do_hash(($data['pengelola_password']), 'md5'));
                    $edit['ukm_id']	= validasi_sql($data['ukm_id']);
					$this->INT->update_pengelola($where_edit, $edit);
					$this->session->set_flashdata('success','pengelola telah berhasil diedit!,');
					redirect("admin/pengelola");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['pengelola_id']		= validasi_sql($filter2);
				$this->INT->delete_pengelola($where_delete);
				$this->session->set_flashdata('success','Data pengelola telah berhasil dihapus!,');
					redirect("admin/pengelola");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
//pendaftaranIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII=============================================--------------=============================
    public function pendaftaran ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/pendaftaran';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
//deadline----------------==============----------------=============================================--------------=============================
    public function deadline ($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_id']	= $this->session->userdata('admin_id');
			$data['admin']					= $this->INT->get_admin('',$where_admin);
			$data['content']			= '/internal/content/deadline';
			$data['action']				= (empty($filter1))?'view':$filter1;
                if ($data['action'] == 'view'){
                }  elseif ($data['action'] == 'tambah'){
                    $data['deadline_id']		= ($this->input->post('deadline_id'))?$this->input->post('deadlinea_id'):'';
                    $data['deadline_tgl']		= ($this->input->post('deadline_tgl'))?$this->input->post('deadline_tgl'):'';
                    $data['ukm_id']		= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):'';
				    $simpan						= $this->input->post('simpan');
                    if ($simpan){
					$insert['deadline_id']	= validasi_sql($data['deadline_id']);
					$insert['deadline_tgl']	= validasi_sql($data['deadline_tgl']);
                    $insert['ukm_id'] = validasi_sql($data['ukm_id']);
					$this->INT->insert_deadline($insert);
					$this->session->set_flashdata('success','deadline baru telah berhasil ditambahkan!,');
					redirect("admin/deadline");
				}
                }  elseif ($data['action'] == 'edit'){
                    $data['onload']				= 'menu_nama';
				$where_deadline['deadline_id']	= $filter2; 
				$deadline 						= $this->INT->get_deadline('*', $where_deadline);
                 $data['deadline_id']			= ($this->input->post('deadline_id'))?$this->input->post('deadline_id'):$deadline->deadline_id;
                 $data['deadline_tgl']			= ($this->input->post('deadline_tgl'))?$this->input->post('deadline_tgl'):$deadline->deadline_tgl;
				    $simpan						= $this->input->post('simpan');
                if ($simpan){
					$where_edit['deadline_id']	= validasi_sql($data['deadline_id']);
					$edit['deadline_tgl']	= validasi_sql($data['deadline_tgl']);
					$this->INT->update_deadline($where_edit, $edit);
					$this->session->set_flashdata('success','deadline telah berhasil diedit!,');
					redirect("admin/deadline");
				}
                }  elseif ($data['action'] == 'hapus'){
                    
				$where_delete['deadline_id']		= validasi_sql($filter2);
				$this->INT->delete_deadline($where_delete);
				$this->session->set_flashdata('success','Data deadline telah berhasil dihapus!,');
					redirect("admin/deadline");
                }
			$this->load->vars($data);
			$this->load->view('internal/home');
		} else {
			redirect("internal");
		}
		
	}
}
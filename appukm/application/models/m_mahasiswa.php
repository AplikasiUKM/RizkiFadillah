<?php
class M_mahasiswa extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("t_mahasiswa");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'mhs_npm' 	   	=> $data->mhs_npm,
					'mhs_password' 	=> $data->mhs_password,
					'mhs_nama' 		=> $data->mhs_nama,
					'logged_in2'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['mhs_npm'] 		=	 $data->mhs_npm;
		$where['mahasiswa_nama'] = $data->mahasiswa_nama;
		$data['mahasiswa_ip']	 = $_SERVER['REMOTE_ADDR'];
		$data['mahasiswa_online']= time();
		$this->db->update('t_mahasiswa',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'mhs_npm'  =>'',
					'mhs_nama' =>'',
					'logged_in2'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
    
    //WEB SERVICE NYA
    
    public function insert_pendaftaran($data){
        $this->db->insert("t_pendaftaran",$data);
    }
    
    public function get_mahasiswa($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_mahasiswa");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
    }
    
    public function tampilkan_ukm(){
        $sql = "SELECT * FROM t_ukm ORDER BY ukm_id";
        return $this->db->query($sql)->result_array();
    }
}
    
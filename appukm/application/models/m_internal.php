<?php
class M_internal extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("t_admin");
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
					'admin_id' 	   => $data->admin_id,
					'admin_username' 	=> $data->admin_username,
					'admin_password' 	=> $data->admin_password,
					'admin_nama' 	=> $data->admin_nama,
					'logged_in'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['admin_id'] = $data->admin_id;
		$where['admin_user'] = $data->admin_user;
		$where['admin_nama'] = $data->admin_nama;
		$data['admin_ip']	 = $_SERVER['REMOTE_ADDR'];
		$data['admin_online']= time();
		$this->db->update('admin',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'admin_id'  =>'',
					'admin_user'  =>'',
					'admin_nama' =>'',
					'logged_in'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
    
    
    
    //configurasi admin
    public function insert_admin($data){
        $this->db->insert("t_admin",$data);
    }
    
    public function update_admin($where,$data){
        $this->db->update("t_admin",$data,$where);
    }
    public function delete_admin($where){
        $this->db->delete("t_admin", $where);
    }
	public function get_admin($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_admin");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_admin($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_admin");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_admin($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_admin");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	//configurasi mahasiswa=====================================================================================================================
    public function insert_mahasiswa($data){
        $this->db->insert("t_mahasiswa",$data);
    }
    
    public function update_mahasiswa($where,$data){
        $this->db->update("t_mahasiswa",$data,$where);
    }
    public function delete_mahasiswa($where){
        $this->db->delete("t_mahasiswa", $where);
    }
	public function get_mahasiswa($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_mahasiswa m");
        $this->db->join('t_kelas k', 'm.kelas_id= k.kelas_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_mahasiswa($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_mahasiswa m");
        $this->db->join('t_kelas k', 'm.kelas_id= k.kelas_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_mahasiswa($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_mahasiswa");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    // CONFIGURATION COMBO BOX WITH DATABASE
	public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
    
    //configurasi prodi=====================================================================================================================
    
        public function insert_prodi($data){
        $this->db->insert("t_prodi",$data);
    }
    
    public function update_prodi($where,$data){
        $this->db->update("t_prodi",$data,$where);
    }
    public function delete_prodi($where){
        $this->db->delete("t_prodi", $where);
    }
	public function get_prodi($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_prodi");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_prodi($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_prodi");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_prodi($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_prodi");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    //configurasi kelas=====================================================================================================================
    public function insert_kelas($data){
        $this->db->insert("t_kelas",$data);
    }
    
    public function update_kelas($where,$data){
        $this->db->update("t_kelas",$data,$where);
    }
    public function delete_kelas($where){
        $this->db->delete("t_kelas", $where);
    }
	public function get_kelas($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_kelas");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_kelas($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_kelas");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_kelas($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_kelas");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
//configurasi ukm=====================================================================================================================
    public function insert_ukm($data){
        $this->db->insert("t_ukm",$data);
    }
    
    public function update_ukm($where,$data){
        $this->db->update("t_ukm",$data,$where);
    }
    public function delete_ukm($where){
        $this->db->delete("t_ukm", $where);
    }
	public function get_ukm($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_ukm");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_ukm($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_ukm");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_ukm($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_ukm");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
//configurasi pengelola=====================================================================================================================
    public function insert_pengelola($data){
        $this->db->insert("t_pengelola",$data);
    }
    
    public function update_pengelola($where,$data){
        $this->db->update("t_pengelola",$data,$where);
    }
    public function delete_pengelola($where){
        $this->db->delete("t_pengelola", $where);
    }
	public function get_pengelola($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_pengelola");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_pengelola($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_pengelola");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_pengelola($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_pengelola");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
//configurasi pendaftaran=====================================================================================================================
//
  public function insert_pendaftaran($data){
        $this->db->insert("t_pendaftaran",$data);
    }
    
    public function update_pendaftaran($where,$data){
        $this->db->update("t_pendaftaran",$data,$where);
    }
    public function delete_pendaftaran($where){
        $this->db->delete("t_pendaftaran", $where);
    }
    public function get_pendaftaran($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_pendaftaran");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_pendaftaran($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_pendaftaran");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_pendaftaran($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_pendaftaran");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
//configurasi deadline=====================================================================================================================
    
    public function insert_deadline($data){
        $this->db->insert("t_deadline",$data);
    }
    
    public function update_deadline($where,$data){
        $this->db->update("t_deadline",$data,$where);
    }
    public function delete_deadline($where){
        $this->db->delete("t_deadline", $where);
    }
	public function get_deadline($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("t_deadline");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_deadline($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("t_deadline");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_deadline($where="", $like=""){
        $this->db->select("*");
        $this->db->from("t_deadline");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
}

<?php
class M_Pengelola extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("t_pengelola");
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
					'pengelola_id' 	   => $data->pengelola_id,
					'pengelola_username' 	=> $data->pengelola_username,
					'pengelola_password' 	=> $data->pengelola_password,
					'ukm_id' 	=> $data->ukm_id,
					'logged_in'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['pengelola_id'] = $data->pengelola_id;
		$where['pengelola_user'] = $data->pengelola_user;
		$where['ukm_id'] = $data->ukm_id;
		$data['pengelola_ip']	 = $_SERVER['REMOTE_ADDR'];
		$data['pengelola_online']= time();
		$this->db->update('pengelola',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'pengelola_id'  =>'',
					'pengelola_user'  =>'',
					'ukm_id' =>'',
					'logged_in'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
//configurasi pengelola
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
    //configurasi riwayat pendaftaran============================================================================================================
    
    public function insert_log_pendaftaran($data){
        $this->db->insert("log_pendaftaran",$data);
    }
    
    public function update_log_pendaftaran($where,$data){
        $this->db->update("log_pendaftaran",$data,$where);
    }
    public function delete_log_pendaftaran($where){
        $this->db->delete("log_pendaftaran", $where);
    }
	public function get_log_pendaftaran($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("log_pendaftaran");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    public function grid_all_log_pendaftaran($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("log_pendaftaran");
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
    public function count_all_log_pendaftaran($where="", $like=""){
        $this->db->select("*");
        $this->db->from("log_pendaftaran");
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
    //configurasi alumni============================================================================================================
    
    public function insert_alumni($data){
        $this->db->insert("t_pendaftaran",$data);
    }
    
    public function update_alumni($where,$data){
        $this->db->update("t_pendaftaran",$data,$where);
    }
    public function delete_alumni($where){
        $this->db->delete("t_pendaftaran", $where);
    }
	public function get_alumni($select, $where){
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
    public function grid_all_alumni($select, $sidx, $sord, $limit, $start, $where="", $like=""){
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
    public function count_all_alumni($where="", $like=""){
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

}
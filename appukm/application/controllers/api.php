<?php
// server
class Api extends CI_Controller{
    
    function get_pendaftaran(){
        header("Content-Type:text/xml");
        echo "<?xml version='1.0'?>";
        echo "<data>";
        $pendaftaran = $this->db->get('t_pendaftaran');
        foreach ($pendaftaran->result() as $o)
        {
            echo "<pendaftaran>";
            echo "<id>$o->pendaftaran_id</id>";
            echo "<npm>$o->mhs_npm</npm>";
            echo "<ukm>$o->ukm_id</ukm>";
            echo "<status>$o->pendaftaran_status</status>";
            echo "<tahun>$o->pendaftaran_tahun</tahun>";
            echo"</pendaftaran>";
        }
        echo "</data>";
    }
    
    function hapuspendaftaran(){
        $pendaftaran_id = $this->uri->segment(3);
        header("Content-Type:text/xml");
        echo "<?xml version='1.0'?>";
        echo "<data>";
        $this->db->where('pendaftaran_id',$pendaftaran_id);
        $this->db->delete('t_pendaftaran');
        echo "</data>";
    }
    
}
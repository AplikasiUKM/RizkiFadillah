<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Anggota UKM</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Anggota UKM
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mahasiswa NPM</th>
                                        <th>UKM ID</th>
                                        <th>Status</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                            $sess_level = $this->session->userdata('pengelola_id');
                            if ($sess_level == 2) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=1 ORDER BY pendaftaran_id ");
                            } else if ($sess_level == 3) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=3 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 4) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=4 and pn.pendaftaran_status = 'diterima' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 1) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=2 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 5) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=5 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 6) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=6 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 7) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=7 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 8) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=8 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 9) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=9 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 10) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=10 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 11) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=11 ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 12) {
                            $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=12 ORDER BY pendaftaran_id ");
                            } else {
                                    $query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where pn.pendaftaran_status = 'diterima' ORDER BY pendaftaran_id ");
                            }
    
                            //$query = $this->db->query("SELECT * FROM log_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=1 ORDER BY pendaftaran_id ");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->mhs_npm; ?></td>
                                        <td><?php echo $row->ukm_nama; ?></td>
                                        <td><?php echo $row->pendaftaran_status; ?></td>
                                        <td><?php echo $row->pendaftaran_tahun; ?></td>
                                    </tr>
                              <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
	</div>
<?php } ?>
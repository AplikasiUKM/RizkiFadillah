<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Konfirmasi Pendaftaran</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Konfirmasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Pendaftaran ID</th>
                                        <th>Mahasiswa NPM</th>
                                        <th>UKM ID</th>
                                        <th>Status</th>
                                        <th>Tahun</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                            $sess_level = $this->session->userdata('pengelola_id');
                            if ($sess_level == 2) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id join t_mahasiswa on pn.mhs_npm=t_mahasiswa.mhs_npm where u.ukm_id=1 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            } else if ($sess_level == 3) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id join t_mahasiswa on pn.mhs_npm=t_mahasiswa.mhs_npm where u.ukm_id=3 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 4) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=4 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 1) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=2 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 5) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=5 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 6) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=6 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 7) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=7 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 8) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=8 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 9) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=9 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 10) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=10 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 11) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=11 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }else if ($sess_level == 12) {
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=12 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            } else {
                                    $query = $this->db->query("SELECT * FROM t_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=4 and pn.pendaftaran_status = '?' ORDER BY pendaftaran_id ");
                            }
    
                            //$query = $this->db->query("SELECT * FROM t_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id where u.ukm_id=1 ORDER BY pendaftaran_id ");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->pendaftaran_id; ?></td>
                                        <td><?php echo $row->mhs_npm; ?></td>
                                        <td><?php echo $row->ukm_nama; ?></td>
                                        <td><?php echo $row->pendaftaran_status; ?></td>
                                        <td><?php echo $row->pendaftaran_tahun; ?></td>
                                        <td><a href="<?php echo base_url();?>ukm/pendaftaran/edit/<?php echo $row->pendaftaran_id; ?>"class="btn btn-lg btn-info btn-xs">Konfirmasi</a></td>
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

<?php } elseif ($action == 'edit') { ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Konfirmasi Pendaftaran</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pendaftaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <!-- ========== Flashdata ========== -->
			                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
			                        <?php if ($this->session->flashdata('success')) { ?>
			                            <div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
			                            </div>
			                        <?php } else if ($this->session->flashdata('warning')) { ?>
			                            <div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
			                            </div>
			                        <?php } else { ?>
			                            <div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
			                            </div>
			                        <?php } ?>
			                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                                    <form role="form" action="<?php echo base_url();?>ukm/pendaftaran/edit" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <input type="hidden" name="pendaftaran_id" value="<?php echo $pendaftaran_id;?>" />
                                        <div class="form-group">
                                            <label>Status <span class="required">*</span></label>
                                            <select name="pendaftaran_status" id="pendaftaran_status" required="" class="form-control">
								                    <option value=""></option>
								                    <option value="DITERIMA">DITERIMA</option>
								                    <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
							                 </select>
                                           <!-- <input type="text" name="pendaftaran_status" value="<?php echo $pendaftaran_status;?>"   id="pendaftaran_status" required="" class="form-control"> -->
                                        </div>
                                        <div class="form-group">
                                			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
								</div>
								</form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
            </div>

                                            <!-- <select name="pendaftaran_status" id="pendaftaran_status" required="" class="form-control">
								                    <option value=""></option>
								                    <option value="DITERIMA">DITERIMA</option>
								                    <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
							                 </select>   -->
<?php } ?>
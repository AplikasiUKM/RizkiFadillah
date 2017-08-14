<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengelola</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pengelola
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="<?php echo base_url();?>admin/pengelola/tambah" class="btn btn-lg btn-success">Tambah Pengelola</a><br><br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>UKM</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            $query = $this->db->query("SELECT * FROM t_pengelola pg left join t_ukm u on pg.ukm_id=u.ukm_id ORDER BY pengelola_id");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->pengelola_id; ?></td>
                                        <td><?php echo $row->pengelola_username; ?></td>
                                        <td><?php echo $row->ukm_nama; ?></td>
                                        <td><a href="<?php echo base_url();?>admin/pengelola/edit/<?php echo $row->pengelola_id; ?>" class="btn btn-lg btn-info btn-xs">Edit</a>  <a href="<?php echo base_url();?>admin/pengelola/hapus/<?php echo $row->pengelola_id; ?>" class="btn btn-lg btn-danger btn-xs">Hapus</a></td>
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

<?php } elseif ($action == 'tambah') { ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Penambahan Pengelola</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pengelola
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
                                    <form role="form" action="<?php echo base_url();?>admin/pengelola/tambah" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Pengelola Username <span class="required">*</span></label>
                                            <input type="text" value=""  name="pengelola_username" id="pengelola_username" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Pengelola Password <span class="required">*</span></label>
                                            <input type="password" value=""  name="pengelola_password" id="pengelola_password" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>UKM<span class="required">*</span></label>
                                            <td><?php $this->INT->combo_box("SELECT * FROM t_ukm", 'ukm_id', 'ukm_id', 'ukm_nama', $ukm_id);?></td>
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
<?php } elseif ($action == 'edit') { ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengelola</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pengelola
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
                                    <form role="form" action="<?php echo base_url();?>admin/pengelola/edit" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <input type="hidden" name="pengelola_id" value="<?php echo $pengelola_id;?>" />
                                        <div class="form-group">
                                            <label>Pengelola Username <span class="required">*</span></label>
                                            <input type="text" name="pengelola_username" value="<?php echo $pengelola_username;?>" id="pengelola_username" required="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru <span class="required">*</span></label>
                                            <input type="password" name="pengelola_password" id="pengelola_password" value="<?php echo $pengelola_password;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>UKM<span class="required">*</span></label>
                                            <td><?php $this->INT->combo_box("SELECT * FROM t_ukm", 'ukm_id', 'ukm_id', 'ukm_nama', $ukm_id);?></td>
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
<?php } ?>
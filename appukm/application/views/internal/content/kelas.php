<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kelas</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Kelas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="<?php echo base_url();?>admin/kelas/tambah" class="btn btn-lg btn-success">Tambah Kelas</a><br><br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            $query = $this->db->query("SELECT * FROM t_kelas ORDER BY kelas_id");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->kelas_id; ?></td>
                                        <td><?php echo $row->kelas_nama; ?></td>
                                        <td><a href="<?php echo base_url();?>admin/kelas/edit/<?php echo $row->kelas_id; ?>"class="btn btn-lg btn-info btn-xs">Edit</a> <a href="<?php echo base_url();?>admin/kelas/hapus/<?php echo $row->kelas_id; ?>"class="btn btn-lg btn-danger btn-xs">Hapus</a></td>
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
        <h1 class="page-header">Penambahan Kelas</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelas
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
                                    <form role="form" action="<?php echo base_url();?>admin/kelas/tambah" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Nama Kelas<span class="required">*</span></label>
                                            <input type="text" value=""  name="kelas_nama" id="kelas_nama" required="" class="form-control">
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
        <h1 class="page-header">Kelas</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelas
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
                                    <form role="form" action="<?php echo base_url();?>admin/kelas/edit" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id;?>" />
                                        <div class="form-group">
                                            <label>Nama kelas <span class="required">*</span></label>
                                            <input type="text" name="kelas_nama" value="<?php echo $kelas_nama;?>" id="kelas_nama" required="" class="form-control">
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
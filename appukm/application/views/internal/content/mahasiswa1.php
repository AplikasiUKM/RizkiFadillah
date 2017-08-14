<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mahasiswa</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Mahasiswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="<?php echo base_url();?>admin/mahasiswa/tambah" class="btn btn-lg btn-success">Tambah Mahasiswa</a><br><br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Mahasiswa</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th>Prodi</th>
                                        <th>Tahun</th>
                                        <th>Foto</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            $query = $this->db->query("SELECT * FROM t_mahasiswa ORDER BY mhs_npm");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->mhs_nama; ?></td>
                                        <td><?php echo $row->mhs_npm; ?></td>
                                        <td><?php echo $row->mhs_kelas; ?></td>
                                        <td><?php echo $row->mhs_prodi; ?></td>
                                        <td><?php echo $row->mhs_tahun_masuk; ?></td>
                                        <td><?php echo $row->mhs_foto; ?></td>
                                        <td><a href="<?php echo base_url();?>admin/mahasiswa/edit/<?php echo $row->mhs_npm; ?>">Edit</a> | <a href="<?php echo base_url();?>admin/mahasiswa/hapus/<?php echo $row->mhs_npm; ?>">Hapus</a></td>
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
        <h1 class="page-header">Penambahan Mahasiswa</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mahasiswa
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
                                    <form role="form" action="<?php echo base_url();?>admin/mahasiswa/tambah" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>NPM <span class="required">*</span></label>
                                            <input type="text" value=""  name="mhs_npm" id="mhs_npm" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama <span class="required">*</span></label>
                                            <input type="text" value=""  name="mhs_nama" id="mhs_nama" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas <span class="required">*</span></label>
                                            <input type="text" value=""  name="mhs_kelas" id="mhs_kelas" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Prodi <span class="required">*</span></label>
                                            <input type="text" value=""  name="mhs_prodi" id="mhs_prodi" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk <span class="required">*</span></label>
                                            <input type="text" value=""  name="mhs_tahun_masuk" id="mhs_tahun_masuk" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto <span class="required">*</span></label>
                                            <input type="file" value=""  name="mhs_foto" id="mhs_foto" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                			<input type="submit" class="btn btn-primary" name="simpan" value="Kirim Pengajuan">
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
        <h1 class="page-header">Pengajuan</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mahasiswa
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
                                    <form role="form" action="<?php echo base_url();?>admin/mahasiswa/edit" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <input type="hidden" name="mhs_npm" value="<?php echo $mhs_npm;?>" />
                                        <div class="form-group">
                                            <label>NPM <span class="required">*</span></label>
                                            <input type="text" name="mhs_npm" value="<?php echo $mhs_npm;?>" id="mhs_npm" required="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama <span class="required">*</span></label>
                                            <input type="text" name="mhs_nama" id="mhs_nama" value="<?php echo $mhs_nama;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas <span class="required">*</span></label>
                                            <input type="text" name="mhs_kelas" id="mhs_kelas" value="<?php echo $mhs_kelas;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Prodi <span class="required">*</span></label>
                                            <input type="text" name="mhs_prodi" id="mhs_prodi" value="<?php echo $mhs_prodi;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk <span class="required">*</span></label>
                                            <input type="text" name="mhs_tahun_masuk" id="mhs_tahun_masuk" value="<?php echo $mhs_tahun_masuk;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto <span class="required">*</span></label>
                                            <input type="text" name="mhs_foto" id="mhs_foto" value="<?php echo $mhs_foto;?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                			<input type="submit" class="btn btn-primary" name="simpan" value="Kirim Pengajuan">
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
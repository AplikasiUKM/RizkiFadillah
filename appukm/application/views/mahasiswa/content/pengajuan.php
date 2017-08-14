
<?php if ($action == 'view' || empty($action)){ ?>
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
                            Pengajuan
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
                                    <form role="form" action="<?php echo base_url();?>home/pengajuan/tambah" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Judul Karya Ilmiah <span class="required">*</span></label>
                                            <input type="text" value=""  name="pengajuan_judul" id="pengajuan_judul" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi singkat tentang judul karya ilmiah</label>
                                            <textarea name="pengajuan_deskripsi" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Karya Ilmiah yang diajukan</label>
                                              <?php $this->WEB->combo_box("SELECT * FROM katpengajuan", 'katpengajuan_id', 'katpengajuan_id', 'katpengajuan_nama', $katpengajuan_id);?>
                                        </div>
                                        <div class="form-group">
                                            <label>Dosen Pembimbing yang diajukan</label>
                                              <?php $this->WEB->combo_box("SELECT * FROM dosen", 'dosen_nip', 'dosen_nip', 'dosen_nama', $dosen_nip);?>
                                        </div>
                                        <div class="form-group">
                                            <label>Alasan mengajukan pembimbing</label>
                                            <textarea name="pengajuan_alasan" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Proposal</label>
                                            <input type="file" name="pengajuan_file" accept="application/pdf" class="form-control">
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
        <h1 class="page-header">Revisi Pengajuan</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Revisi Pengajuan
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
                                    <form role="form" action="<?php echo base_url();?>home/pengajuan/edit/<?php echo $pengajuan_id;?>" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                     <input type="hidden" name="identitas_id" value="<?php echo $pengajuan_id;?>" />
                                        <div class="form-group">
                                            <label>Judul Karya Ilmiah <span class="required">*</span></label>
                                            <input type="text"  name="pengajuan_judul" id="pengajuan_judul" required="" class="form-control" value="<?php echo $pengajuan_judul; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi singkat tentang judul karya ilmiah</label>
                                            <textarea name="pengajuan_deskripsi" class="form-control" rows="3"><?php echo $pengajuan_deskripsi; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Karya Ilmiah yang diajukan</label>
                                                 <input type="text"  name="katpengajuan_nama" id="katpengajuan_nama" readonly="readonly" class="form-control" value="<?php echo $katpengajuan_nama; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Dosen Pembimbing</label>
                                                 <input type="text"  name="dosen_nama" id="dosen_nama" readonly="readonly" class="form-control" value="<?php echo $dosen_nama; ?>">
                                        </div>
                                          <?php if ($pengajuan_file){?>
                                        <div class="form-group">
                                            <label>Ganti Proposal</label>
                                            <input type="file" name="pengajuan_file" accept="application/pdf" class="form-control">
                                            Proposal Sebelumnya <a href="<?php echo base_url(); ?>assets/files/pengajuan/<?php echo $pengajuan_file; ?>" target="_blank">Lihat</a>
                                        </div>
                                        <?php } else {?>
                                        <div class="form-group">
                                            <label>Upload Proposal</label>
                                            <input type="file" name="pengajuan_file" accept="application/pdf" class="form-control">
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                			<input type="submit" class="btn btn-primary" name="simpan" value="Kirim Pengajuan Ulang">
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

<script type="text/javascript" src="<?php echo base_url();?>templates/mahasiswa/js/jquery.parsley/parsley.js"></script>
<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kelola Deadline</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Deadline
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <a href="<?php echo base_url();?>admin/deadline/tambah" class="btn btn-lg btn-success">Tambah Deadline</a><br><br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama UKM</th>
                                        <th>Tanggal Deadline</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            
    
                           $query = $this->db->query("SELECT * FROM t_deadline d left join t_ukm u on d.ukm_id=u.ukm_id ORDER BY deadline_id");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->ukm_nama; ?></td>
                                        <td><?php echo $row->deadline_tgl; ?></td>
                                        <td><a href="<?php echo base_url();?>admin/deadline/edit/<?php echo $row->deadline_id; ?>"class="btn btn-lg btn-info btn-xs">Ubah Tanggal</a> <a href="<?php echo base_url();?>admin/deadline/hapus/<?php echo $row->deadline_id; ?>" class="btn btn-lg btn-danger btn-xs">Hapus</a></td></td>
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
        <h1 class="page-header">Deadline Pendaftaran</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Deadline
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
                                    <form role="form" action="<?php echo base_url();?>admin/deadline/tambah" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Tanggal Deadline <span class="required">*</span></label>
                                            <input type="date" value=""  name="deadline_tgl" id="deadline_tgl" required="" class="form-control">
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
        <h1 class="page-header">Deadline Pendaftaran</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Deadline
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
                                    <form role="form" action="<?php echo base_url();?>admin/deadline/edit" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <input type="hidden" name="deadline_id" value="<?php echo $deadline_id;?>" />
                                        <div class="form-group">
                                            <label>Status <span class="required">*</span></label>
                                            <input type="date" name="deadline_tgl" value="<?php echo $deadline_tgl;?>" id="deadline_tgl" required="" class="form-control">
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
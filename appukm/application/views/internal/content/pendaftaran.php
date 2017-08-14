<?php if ($action == 'view' || empty($action)){ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pendaftaran</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pendaftaran
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
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            $query = $this->db->query("SELECT * FROM t_pendaftaran pn left join t_ukm u on pn.ukm_id=u.ukm_id ORDER BY pendaftaran_id");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->pendaftaran_id; ?></td>
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
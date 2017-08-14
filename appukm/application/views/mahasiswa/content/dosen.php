<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dosen</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
       <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Dosen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Dosen</th>
                                        <th>NIP</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                            $query = $this->db->query("SELECT * FROM dosen ORDER BY dosen_nip");
                            foreach ($query->result() as $row){ 
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->dosen_nama; ?></td>
                                        <td><?php echo $row->dosen_nip; ?></td>
                                        <td><?php echo $row->dosen_email; ?></td>
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
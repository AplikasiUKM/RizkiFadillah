<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Form Absensi</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                            Form Absensi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                             <?php  
                                $npm1 = $mahasiswa->mahasiswa_npm;                      
                                $query = $this->db->query("SELECT * FROM pengajuan WHERE mahasiswa_npm ='$npm1' ORDER BY pengajuan_post DESC LIMIT 1");
                                 foreach ($query->result() as $row1){}
                            ?>
                            <?php error_reporting(0); if($row1->mahasiswa_npm == ''){ ?>
                            <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Tidak ada Form Absensi pengajuan Proposal Karya Ilmiah karena anda belum mengajukan.
                                    </div>
                            <?php } else { ?>
								 <?php  
                        $npm = $mahasiswa->mahasiswa_npm;                      
                        $query = $this->db->query("SELECT * FROM 
                        pengajuan WHERE mahasiswa_npm ='$npm' ORDER BY pengajuan_post DESC LIMIT 1");
                         foreach ($query->result() as $row){ 
                        ?>
                            <?php if($row->pengajuan_status == '?'){ ?>
                                        <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Harap Menunggu, karena Proposal Karya Ilmiah a/n:<strong><?php echo $mahasiswa->mahasiswa_nama; ?>!</strong> belum diperiksa, dan Print form absensi akan muncul ketika Proposal DITERIMA.
                                    </div>
                            <?php }elseif($row->pengajuan_status == 'DITERIMA') { ?>
                                    <a href="<?php echo base_url();?>home/print_absensi" class="btn btn-success btn-lg btn-block">Klik Untuk Print Absensi</a>
                                    </div>
                            <?php }else{ ?>
                                        <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Proposal Karya Ilmiah a/n:<strong><?php echo $mahasiswa->mahasiswa_nama; ?>!</strong> <strong>DITOLAK</strong>, jadi anda belum bisa mengeprint form absensi akan muncul ketika Proposal DITERIMA.
                                    </div>
                            <?php } ?>          
                        <?php } ?> 
                        <?php } ?>
							</div>
						</div>
	</div>
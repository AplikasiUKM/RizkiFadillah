<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi Pendaftaran UKM Politeknik Pos Indonesia</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>templates/admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>templates/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Social Buttons CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/gif">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>admin">Sistem Informasi Pendaftaran UKM Politeknik Pos Indonesia</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="<?php echo base_url();?>admin"><i class="fa fa-home fa-fw"></i> Beranda</a></li>
                        <li><a href="<?php echo base_url();?>admin/mahasiswa"><i class="fa fa-users fa-fw"></i> Data Mahasiswa</a></li>
                        <li><a href="<?php echo base_url();?>admin/prodi"><i class="fa fa-briefcase fa-fw"></i> Data Prodi</a></li>
                        <li><a href="<?php echo base_url();?>admin/kelas"><i class="fa fa-book fa-fw"></i> Data Kelas</a></li>
                        <li><a href="<?php echo base_url();?>admin/ukm"><i class="fa fa-university fa-fw"></i> Data UKM</a></li>
                        <li><a href="<?php echo base_url();?>admin/pengelola"><i class="fa fa-user fa-fw"></i> Data Pengelola</a></li>
                        <li><a href="<?php echo base_url();?>admin/deadline"><i class="fa fa-user fa-fw"></i> Data Deadline</a></li>
                        <li><a href="<?php echo base_url();?>internal/keluar"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             <?php $this->load->view($content);?>
         
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<script src="<?php echo base_url();?>templates/admin/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>templates/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>templates/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>templates/admin/vendor/metisMenu/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>templates/admin/dist/js/sb-admin-2.js"></script>
  <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>templates/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>templates/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>templates/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>

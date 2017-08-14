<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi Pendaftaran UKM POLTEKPOS</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>templates/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>templates/admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>templates/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/gif">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    <h2 class="panel-title"><center><img src="<?php echo base_url();?>assets/images/poltekpos.png" width="25">  PENGELOLA UKM POLTEKPOS</center></h2>
                    </div>
                    <div class="panel-body">
                        <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-close sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                        <form role="form" action="<?php echo base_url();?>pengelola/ceklogin" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required="" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="masuk" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/dist/js/sb-admin-2.js"></script>

</body>

</html>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Aplikasi UKM</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url();?>templates/mahasiswa/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url();?>templates/mahasiswa/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url();?>templates/mahasiswa/assets/css/style.css" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/gif">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>ukm@poltekpos.ac.id
                    &nbsp;&nbsp;
                    <strong>Support: </strong>(+62) 82112528591
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">

                    <img src="<?php echo base_url();?>templates/mahasiswa/assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div login-icon">
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Silahkan Login</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
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
                    <form role="form" action="<?php echo base_url();?>mahasiswa/ceklogin" method="post">
                        <label>NPM : </label>
                        <input type="text" name="mhs_npm" class="form-control" />
                        <label>Password :  </label>
                        <input type="password" name="mhs_password" class="form-control" />
                        <hr />
                        <input type="submit" name="masuk" value="Login" class="btn btn-info">
                    </form>
                </div>
                <br />
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <div style='text-align:justify;'>
                        <strong> Unit Kegiatan Mahasiswa</strong>
                        <br />
                        <ul>
                            <li>
                            Unit Kegiatan Mahasiswa (UKM) adalah wadah aktivitas kemahasiswaan luar kelas untuk mengembangkan minat, bakat dan keahlian tertentu.
                            </li>
                            <li>
                            Lembaga ini merupakan partner organisasi kemahasiswaan intra kampus lainnya seperti senat mahasiswa dan badan eksekutif mahasiswa, baik yang berada di tingkat program studi, jurusan, maupun universitas.
                            </li>
                            <li>
                            Lembaga ini bersifat otonom, dan bukan sebagai cabang dari badan eksekutif maupun senat mahasiswa.
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="alert alert-success">
                        <div style='text-align:justify;'>
                         <strong> Petunjuk Penggunaan :</strong>
                        <ul>
                            <li>
                                Sebelum melakukan pendaftaran mahasiswa diwajibkan Login terlebih dahulu
                            </li>
                            <li>
                                Setelah Login, mahasiswa bisa mendaftar UKM yang akan diikuti
                            </li>
                            <li>
                                Selesai Mendaftar, mahasiswa harap menunggu konfirmasi dari pihak UKM terkait
                            </li>
                        </ul>
                       
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 Politeknik Pos Indonesia | By : Aplikasi Pendaftaran UKM
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>templates/mahasiswa/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url();?>templates/mahasiswa/assets/js/bootstrap.js"></script>
</body>
</html>

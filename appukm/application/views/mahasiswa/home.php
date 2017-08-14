<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Pendaftaran UKM Politeknik Pos Indonesia</title>
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
                <a class="navbar-brand" href="<?php echo base_url();?>mahasiswa/home">

                    <img src="<?php echo base_url();?>templates/mahasiswa/assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div login-icon">
                <div class="user-settings-wrapper">
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url();?>mahasiswa/home">Home</a></li>
                            <li><a href="<?php echo base_url();?>mahasiswa/pengumuman">Pengumuman</a></li>
                            <li><a href="<?php echo base_url();?>mahasiswa/keluar">Keluar</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
           <?php $this->load->view($content);?>
          </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     &copy; 2017 Politeknik Pos Indonesia | By : Aplikasi Pendaftaran UKM</a>
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

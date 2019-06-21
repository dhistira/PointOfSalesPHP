<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Beri Nilai Pelayanan - E-Aspirasi</title>

   <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
   <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('username'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo site_url('login/logout');?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E-Aspirasi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="<?= base_url('page');?>"><i class="far fa-bell"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/laporkan-kerusakan');?>"><i class="far fa-bell"></i> <span>Laporkan Kerusakan</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/nilai-pelayanan');?>"><i class="far fa-bell"></i> <span>Beli Nilai Pelayanan</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/laporkan-kejahatan');?>"><i class="far fa-bell"></i> <span>Laporkan Kejahatan</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-envelope"></i> Contact Us
            </a>
          </div>        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Beri Nilai Pelayanan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Beri Nilai Pelayanan</h2>
            <p class="section-lead">
              Isi formulir untuk mengapresiasi atau mengomentari pelayanan
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Formulir Berikut</h4>
                  </div>
                  <div class="card-body">
                    <form id="myForm" style="width:60%;margin:0 auto;">
                      <div class="form-group">
                        <label>ID Staff (<a href="#">Apa ini?</a>)</label>
                        <canvas style="position: fixed;margin: 0 auto; top:0px;" id="canvascam"></canvas>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text" onclick="activeQR()">
                              QR Code Scan
                            </div>
                          </div>
                          <input type="text" name="idstaff" id="idstaff" class="form-control" placeholder="#-#-#-#">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal & Waktu Pelayanan</label>
                        <input type="text" class="form-control datetimepicker">
                      </div>
                      <div class="form-group">
                        <label>Nilai</label>
                        <select class="form-control">
                          <option>5 - Sangat Sempurna</option>
                          <option>4 - Cukup Sempurna</option>
                          <option>3 - Oke</option>
                          <option>2 - Kurang Baik</option>
                          <option>1 - Mengecewakan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Komentar / Pesan / Ucapan Terimakasih</label>
                        <div class="input-group">
                          <div class="col-md-12">
                            <textarea class="summernote-simple"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-warning">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> E-Aspirasi</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?= base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
  <script src="<?= base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
  <script src="<?= base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <script type="text/javascript" src="<?= base_url(); ?>webCodeCam/js/qrcodelib.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>webCodeCam/js/webcodecamjs.js"></script>
  <script type="text/javascript">
  function activeQR(){
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var x = document.getElementById('idfasilitas');
    var arg = {
      resultFunction: function(result) {
        x.setAttribute("value",result.code);
      }
    };
    new WebCodeCamJS("canvas").init(arg).play();
  }
  </script>
</body>
</html>
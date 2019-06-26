<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Manajemen Menu - <?= $this->session->userdata('tipe') == 1 ? 'Admin' : 'Kasir'; ?> Fremilt</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
  <!-- /END GA -->

  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>datatables/datatables.min.css"/>

</head>

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
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('fullname'); ?></div></a>
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
            <a href="index.html">Fremilt</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="<?= base_url('page');?>"><i class="far fa-bell"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/manajemen-menu');?>"><i class="far fa-bell"></i> <span>Manajemen Menu</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/manajemen-kasir');?>"><i class="far fa-bell"></i> <span>Manajemen Kasir</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/absensi-kasir');?>"><i class="far fa-bell"></i> <span>Absensi Kasir</span></a></li>
          </ul>        
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Menu</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Manajemen Menu</h2>
            <p class="section-lead">
              Silahkan menambahkan, mengedit, atau menghapus daftar menu.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manajemen Menu</h4>
                    <div class="card-header-action">
                      <a href="<?= base_url(); ?>page/tambah-menu" class="btn active">Tambah Menu</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <?= isset($_GET['s']) == 'true' ? '<div class="alert alert-success">Berhasil! Data berhasil ditambah</div>' : '';?>
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Item</th>
                                <th>Nama Item</th>
                                <th>Detail item</th>
                                <th>Harga item</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data as $b) {
                            echo '<tr>
                                <td>'.$b->id.'</td>
                                <td>'.$b->nama_item.'</td>
                                <td>'.$b->detail_item.'</td>
                                <td>'.$b->harga_item.'</td>
                                <td><a href="'.base_url().'page/edit/'.$b->id.'">Edit</a> - <a href="'.base_url().'page/delete/'.$b->id.'">Hapus</a></td>
                            </tr>';
                          }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID Item</th>
                                <th>Nama Item</th>
                                <th>Detail item</th>
                                <th>Harga item</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> PoS Fremilt</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>datatables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/chart.min.js"></script>
  
  <!-- CUSTOM DATATABLE -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
  
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
</body>
</html>
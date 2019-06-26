<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard - <?= $this->session->userdata('tipe') == 1 ? 'Admin' : 'Kasir'; ?> Fremilt</title>

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
        <?php include 'include/sidebar.php';?>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Dashboard</h2>
            <p class="section-lead">
              Semangat bekerja!
            </p>

            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Menu</h4>
                  </div>
                  <div class="card-body">
                    <?php if(isset($_GET['s'])){
                      if($_GET['s'] == 'true'){
                      echo '<div class="alert alert-success">Berhasil! Data berhasil diupdate</div>';
                      } else if ($_GET['s'] == 'notfound'){
                      echo '<div class="alert alert-danger">Data Tidak Ditemukan!</div>';
                      } else if ($_GET['s'] == 'false'){
                      echo '<div class="alert alert-danger">Oops! Terjadi Kesalahan</div>';
                      }}?>
                      <?php if(isset($_GET['t'])){
                      if($_GET['t'] == 'true'){
                      echo '<div class="alert alert-success">Berhasil! Transaksi Sukses</div>';
                      } else if ($_GET['t'] == 'false'){
                      echo '<div class="alert alert-danger">Oops! Terjadi Kesalahan</div>';
                      }}?>
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
                                <td><button type="submit" class="btn active" onClick="addtocart('.$b->id.',\''.$b->nama_item.'\',\''.$b->detail_item.'\','.$b->harga_item.')">Masukan ke Pesanan</button></td>
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
              <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Pesanan</h4>
                  <div class="card-header-action dropdown" id="button-selesai">
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border" id="cart">
                  </ul>
                </div>
                <div class="card-footer">
                    <input type="text" placeholder="Masukan Uang Dibayarkan" class="form-control uangtotal"><br>
                    <h5><b>Total:</b> Rp. <span id="subtotal">0</span><br>
                    <b>Kembalian:</b> Rp. <span id="kembalian">0</span></h5>
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
    <!-- ALERT DELETE -->
  <script type="text/javascript">
    function hapusPesanan(){
      var r=confirm("Apakah anda yakin ingin mengosongkan pesanan?");
        if (r==true){
          var cart = [];
          localStorage.cart = cart;
          subtotal = 0;
          localStorage.subtotal = subtotal;
          kembalian = 0;
          localStorage.kembalian = 0;
          document.getElementById('subtotal').innerHTML = localStorage.subtotal;
        document.getElementById('cart').innerHTML = "";
        document.getElementById('button-selesai').innerHTML = "";
        document.getElementById('kembalian').innerHTML = "0";
        } else {
          return false;
        } 
      }

    var cart = [];
    var subtotal = 0;
    var kembalian = 0;

    function addtocart(id,nama,detail,harga){
      cart.push(id);
      localStorage.cart = cart;
      subtotal = subtotal + harga;
      localStorage.subtotal = subtotal;
      document.getElementById('button-selesai').innerHTML = "<button type='submit' class='btn btn-danger' onClick='hapusPesanan()'>Hapus</button><button onClick='pesananSelesai()' type='submit' class='btn active'>Selesai</button>";
      document.getElementById('subtotal').innerHTML = numberWithCommas(localStorage.subtotal);
      document.getElementById('cart').innerHTML += "<li class='media'><h3> &nbsp;</h3><div class='media-body'><div class='float-right'><div class='font-weight-600 text-medium'>Rp. "+harga+"</div></div><div class='media-title'>"+nama+"</div><div class='mt-1'>"+detail+"</div></div></li>";
    }

    $( ".uangtotal" ).keyup(function() {
        var uangtotal = parseInt($( ".uangtotal" ).val());
        var kembalian = parseInt(uangtotal - subtotal);
        localStorage.kembalian = kembalian;
        document.getElementById('kembalian').innerHTML = numberWithCommas(localStorage.kembalian);
    });

    function numberWithCommas(x) {
      var parts = x.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return parts.join(".");
    }

    var url = "<?php echo base_url();?>";
    function pesananSelesai(){
      var r=confirm("Apakah anda yakin ingin menyelesaikan transaksi ini?");
        if (r==true){
          window.location = url+"page/kirim_transaksi?cart="+localStorage.cart+"&subtotal="+localStorage.subtotal;
        } else {
          return false;
        } 
      }
  </script>
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
<aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Fremilt</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          </div>
          <?php if($this->session->userdata('tipe')==='1'){?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="<?= base_url('page');?>"><i class="far fa-bell"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/manajemen-menu');?>"><i class="far fa-bell"></i> <span>Manajemen Menu</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/manajemen-kasir');?>"><i class="far fa-bell"></i> <span>Manajemen Kasir</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/manajemen-transaksi');?>"><i class="far fa-bell"></i> <span>Manajemen Transaksi</span></a></li>
            <li><a class="nav-link" href="<?= base_url('page/absensi-kasir');?>"><i class="far fa-bell"></i> <span>Absensi Kasir</span></a></li>
          </ul>
        <?php } ?>
        <?php if($this->session->userdata('tipe')==='2'){?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="<?= base_url('page');?>"><i class="far fa-bell"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?= base_url('login/logout');?>"><i class="far fa-bell"></i> <span>Logout</span></a></li>
          </ul>
        <?php } ?>
        </aside>
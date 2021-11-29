 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
     <!-- Brand Logo -->
     <a style="color: white;" href="<?= base_url() ?>admin" class="brand-link navbar-primary">
         <img src="<?php echo base_url() ?>assets/dist/img/LogoMitramas.jpg" class="brand-image img-circle elevation-3">
         <span class="brand-text font-weight-light" style="font-size: 17px;">Sistem Inventory Barang</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <?php if ($this->session->userdata('role') == 'gudang') {  ?>

                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>admin">
                             <i class="nav-icon fas fa-home"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <!-- Heading -->
                     <li class="nav-header">
                         DATA MASTER
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>supplier">
                             <i class="nav-icon fas fa-fw fa-users"></i>
                             <p>Supplier</p>
                         </a>
                     </li>
                     <li class="nav-item has-treeview">
                         <a href="#" class="nav-link active">
                             <i class="nav-icon fas fa-fw fa-folder"></i>
                             <p>
                                 Barang
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url() ?>satuan/satuan_barang" class="nav-link active">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Satuan Barang</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url() ?>jenis/jenis_barang" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Jenis Barang</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url() ?>barang/data_barang" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Data Barang</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-header">
                         TRANSAKSI
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>barangmasuk/barang_masuk">
                             <i class="nav-icon fas fa-fw fa-download"></i>
                             <p>Barang Masuk</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>barangkeluar/barang_keluar">
                             <i class="nav-icon fas fa-fw fa-upload"></i>
                             <p>Barang Keluar</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>perhitungan/perhitungan_eoq">
                             <i class="nav-icon fas fa-fw fa-upload"></i>
                             <p>Perhitungan EOQ</p>
                         </a>
                     </li>
                     <li class="nav-header">
                         REPORT
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>laporan">
                             <i class="nav-icon fas fa-fw fa-print"></i>
                             <p>Cetak Laporan</p>
                         </a>
                     </li>
                     <!-- <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('user'); ?>">
                             <i class="nav-icon fas fa-user-plus"></i>
                             <span>User</span>
                         </a>
                     </li> -->
                     <li class="nav-header">
                         EXIT
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>login/logout">
                             <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                             <p>Logout</p>
                         </a>
                     </li>

                 <?php  } else { ?>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>admin">
                             <i class="nav-icon fas fa-home"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <li class="nav-header">
                         TRANSAKSI
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>barangmasuk/barang_masuk">
                             <i class="nav-icon fas fa-fw fa-download"></i>
                             <p>Barang Masuk</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>barangkeluar/barang_keluar">
                             <i class="nav-icon fas fa-fw fa-upload"></i>
                             <p>Barang Keluar</p>
                         </a>
                     </li>
                     <li class="nav-header">
                         REPORT
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>laporan">
                             <i class="nav-icon fas fa-fw fa-print"></i>
                             <p>Cetak Laporan</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('user'); ?>">
                             <i class="nav-icon fas fa-user-plus"></i>
                             <span>User</span>
                         </a>
                     </li>
                     <li class="nav-header">
                         EXIT
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?= base_url() ?>login/logout">
                             <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                             <p>Logout</p>
                         </a>
                     </li>
                 <?php } ?>
                 <!-- <li class="nav-header">EXAMPLES</li> -->
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
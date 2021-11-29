<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perhitungan EOQ</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Edit Data Barang</li>
                    </ol>
                </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($this->session->flashdata('error') != '') {
        echo '<div class="alert alert-danger" role="alert">';
        echo $this->session->flashdata('error');
        echo '</div>';
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold">
                                    #1 Mencari Nilai pertahun
                                </h4>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url() ?>barang/data_barang" class="btn btn-sm btn-secondary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Demand</li>
                            D = Permintaan per Bulan x Satu Tahun.</br>
                            = 2 X 12</br>
                            = 24</br>
                            <li>Setup</li>
                            D = Permintaan per Bulan x Harga Per Satuan.</br>
                            = 2 X 35000</br>
                            = 70000</br>
                            <li>Holding</li>
                            H = Biaya Penyimpanan x Satu Tahun.</br>
                            = 3000 x 12</br>
                            = 36000</br>
                        </ul>
                        <h4 class="h5 align-middle m-0 font-weight-bold">
                            #2 Proses Perhitungan EOQ
                        </h4>
                        <ul>
                            EOQ = 2.D.S:H</br>
                            = 2.24.70000:36000.</br>
                            = 93.333333333333</br>
                            = 10 pcs</br>
                        </ul>
                        <h4 class="h5 align-middle m-0 font-weight-bold">
                            #3 Proses Mencari Frekuensi Pembelian Optimal
                        </h4>
                        <ul>
                            n = Permintaan per Bulan:EOQ</br>
                            = 2:9.660917830793</br>
                            = 2 x dalam Satu Tahun</br>

                            T = Jumlah Hari Dalam Tahun/n</br>
                            = 360/2.4842360136325</br>
                            = 145 Hari sekali</br>
                        </ul>
                        <h4 class="h5 align-middle m-0 font-weight-bold">
                            #4 Proses Mencari Inventory Cost
                        </h4>
                        <ul>
                            TC = ((EOQ:2)*H) + ((D:EOQ) * S)</br>
                            = ((9.660917830793:2)*3000) + ((2:9.660917830793)*70000)</br>
                            = 28,983 Rupiah</br>
                        </ul>
                        <a style="margin-right: 50px; margin-left:30px;" href="<?= base_url() ?>perhitungan/printlaporan" class="btn btn-danger">Cetak</>
                            <a href="<?= base_url() ?>perhitungan/perhitungan_eoq" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
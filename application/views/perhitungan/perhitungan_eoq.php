<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perhitungan EOQ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Perhitungan EOQ</a></li>
                        <li class="breadcrumb-item active">Data Perhitungan EOQ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('message'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold">
                                    Data Perhitungan EOQ
                                </h4>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url() ?>barang/tambah_barang" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">
                                        Tambah Perhitungan EOQ
                                    </span>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="exampleLaporan" width="100%">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Barang</th>
                                    <th>Perhitungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($barang) :
                                    foreach ($barang as $b) :
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $b['nama_barang']; ?></td>
                                            <td>
                                                <a href="<?= base_url('perhitungan/lihat_perhitungan/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i>Lihat Perhitungan</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Data Kosong
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
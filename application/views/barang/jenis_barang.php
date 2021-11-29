<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jenis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Jenis</a></li>
                        <li class="breadcrumb-item active">Data Jenis</li>
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
                                    Data Jenis
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url() ?>jenis/tambah_jenis" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">
                                        Tambah Jenis Barang
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="exampleLaporan" width="100%">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($jenis) :
                                    foreach ($jenis as $j) :
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $j['nama_jenis']; ?></td>
                                            <td>
                                                <a href="<?= base_url('jenis/edit/') . $j['id_jenis'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('jenis/delete/') . $j['id_jenis'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang Keluar</a></li>
                        <li class="breadcrumb-item active">Data Barang Keluar</li>
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
                                    Riwayat Data Barang Keluar
                                </h4>
                            </div>
                            <div class="col-auto">
                                <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                    <a href="<?= base_url() ?>barangkeluar/tambah_barang_keluar" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">
                                            Input Barang Keluar
                                        </span>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="exampleLaporan" width="100%">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>No Transaksi</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Keluar</th>
                                    <th>User</th>
                                    <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                        <th>Hapus</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($barangkeluar) :
                                    foreach ($barangkeluar as $bk) :
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $bk['id_barang_keluar']; ?></td>
                                            <td><?= $bk['tanggal_keluar']; ?></td>
                                            <td><?= $bk['nama_barang']; ?></td>
                                            <td><?= $bk['jumlah_keluar'] . ' ' . $bk['nama_satuan']; ?></td>
                                            <td><?= $bk['nama']; ?></td>
                                            <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                                <td>
                                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangkeluar/delete/') . $bk['id_barang_keluar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7" class="text-center">
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

        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
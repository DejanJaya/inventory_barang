<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Data Barang Masuk</li>
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
                                    Riwayat Data Barang Masuk
                                </h4>
                            </div>
                            <div class="col-auto">
                                <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                    <a href="<?= base_url() ?>barangmasuk/tambah_barang_masuk" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">
                                            Input Barang Masuk
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
                                    <th>Tanggal Masuk</th>
                                    <th>Supplier</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Masuk</th>
                                    <th>User</th>
                                    <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                        <th>Hapus</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($barangmasuk) :
                                    foreach ($barangmasuk as $bm) :
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $bm['id_barang_masuk']; ?></td>
                                            <td><?= $bm['tanggal_masuk']; ?></td>
                                            <td><?= $bm['nama_supplier']; ?></td>
                                            <td><?= $bm['nama_barang']; ?></td>
                                            <td><?= $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
                                            <td><?= $bm['nama']; ?></td>
                                            <?php if ($this->session->userdata('role') == 'gudang') {  ?>
                                                <td>
                                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangmasuk/delete/') . $bm['id_barang_masuk'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">
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
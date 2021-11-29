<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Tambah Data Barang</li>
                    </ol>
                </div>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold">
                                    Form Tambah Barang
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url() ?>barang/data_barang" class="btn btn-sm btn-secondary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>barang/proses_add" method="post">
                            <input type="hidden" name="stok" value="0" />
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="id_barang">ID Barang</label>
                                <div class="col-md-9">
                                    <input readonly value="<?= set_value('id_barang', $id_barang); ?>" name="id_barang" id="id_barang" type="text" class="form-control" placeholder="ID Barang...">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                                <div class="col-md-9">
                                    <input value="" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="jenis_id">Jenis Barang</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select name="jenis_id" id="jenis_id" class="custom-select">
                                            <option value="" selected disabled>Pilih Jenis Barang</option>
                                            <?php foreach ($jenis as $j) : ?>
                                                <option <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-primary" href="<?= base_url() ?>jenis/tambah_jenis"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="satuan_id">Satuan Barang</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select name="satuan_id" id="satuan_id" class="custom-select">
                                            <option value="" selected disabled>Pilih Satuan Barang</option>
                                            <?php foreach ($satuan as $s) : ?>
                                                <option <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-primary" href="<?= base_url() ?>satuan/tambah_satuan"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</bu>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
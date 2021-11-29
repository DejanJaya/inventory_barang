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
                        <li class="breadcrumb-item active">Tambah Data Barang Masuk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold">
                                    Form Input Barang Masuk
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url() ?>barangmasuk/barang_masuk" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <!-- <?= var_dump($this->session->userdata('id')); ?> -->
                    <div class="card-body">
                        <form action="<?= base_url() ?>barangmasuk/proses_add" method="post" accept-charset="utf-8">

                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="id_barang_masuk">ID Transaksi Barang Masuk</label>
                                <div class="col-md-4">
                                    <input value="<?= $id_barang_masuk ?>" type="text" readonly="readonly" class="form-control">
                                    <input type="hidden" name="id_barang_masuk" value="<?= $id_barang_masuk ?>" />
                                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('id_user'); ?>" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="tanggal_masuk">Tanggal Masuk</label>
                                <div class="col-md-4">
                                    <input value="<?= date('Y-m-d'); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="supplier_id">Supplier</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <select name="supplier_id" id="supplier_id" class="custom-select">
                                            <option value="" selected disabled>Pilih Supplier</option>
                                            <?php foreach ($supplier as $s) : ?>
                                                <option <?= set_select('supplier_id', $s['id_supplier']) ?> value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-primary" href="<?= base_url() ?>supplier/add"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="barang_id">Barang</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <select name="barang_id" id="barang_id" class="custom-select">
                                            <option value="" selected disabled>Pilih Barang</option>
                                            <?php foreach ($barang as $b) : ?>
                                                <option <?= $this->uri->segment(3) == $b['id_barang'] ? 'selected' : '';  ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-primary" href="<?= base_url() ?>barang/tambah_barang"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="stok">Stok</label>
                                <div class="col-md-5">
                                    <input readonly="readonly" id="stok" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="jumlah_masuk">Jumlah Masuk</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input value="<?= set_value('jumlah_masuk'); ?>" name="jumlah_masuk" id="jumlah_masuk" type="number" class="form-control" placeholder="Jumlah Masuk...">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="satuan">Satuan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4 text-md-right" for="total_stok">Total Stok</label>
                                <div class="col-md-5">
                                    <input readonly="readonly" id="total_stok" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col offset-md-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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
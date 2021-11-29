<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Tambah Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- <?= $this->session->flashdata('pesan'); ?> -->
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
                                    Form Tambah User
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url() ?>user" class="btn btn-sm btn-secondary btn-icon-split">
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
                        <form action="<?= base_url() ?>user/proses_add" method="post">
                            <!-- <input type="hidden" name="csrf_test_name" value="226f53f7746e2763f74d859263c94e5b" /> -->
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="nama">Nama User</label>
                                <div class="col-md-9">
                                    <div class="input-group">

                                        <input value="" name="nama" id="nama" type="text" class="form-control" placeholder="Nama User...">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="username">Username</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input value="" name="username" id="username" type="text" class="form-control" placeholder="Username...">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="email">Email</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input name="email" id="email" class="form-control" rows="4" placeholder="Email..."></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="no_telp">No Telpon</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input name="no_telp" id="no_telp" class="form-control" rows="4" placeholder="No Telepon..."></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="role">Role</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="form-control" name="role" id="role">
                                            <option value="">-- pilih role --</option>
                                            <option value="gudang">Gudang</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="password">Password</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" rows="4" placeholder="Password..."></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="password2">Konfirmasi Password</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="password" name="password2" id="password2" class="form-control" rows="4" placeholder="Konfirmasi Password..."></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-9 offset-md-3">
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
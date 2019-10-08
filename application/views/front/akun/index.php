<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
                <?php if ($this->session->flashdata()) { ?>
                    <div class="col s12 m12 l6">
                        <div id="card-alert" class="card green lighten-5">
                            <div class="card-content green-text">
                                <p>Akun berhasil <?= $this->session->flashdata('flashdata'); ?></p>
                            </div>
                            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-content">
                        <div class="container">
                            <div class="col s12 m12 l9">
                                <div class="row">
                                    <div class="col m6">
                                        <h5>Daftar Akun</h5>
                                    </div>
                                    <div class="col m6">
                                        <a href="<?= base_url('akun/tambah') ?>" class="waves-effect waves-light blue btn right"><i class="mdi-content-add"></i> Tambah Akun</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="col s12 m8 l9">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Deskripsi</th>
                                            <th>Tipe Akun</th>
                                            <th>Induk Akun</th>
                                            <th>Saldo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($akun !== NULL) : ?>
                                            <?php foreach ($akun as $value) : ?>
                                                <tr>
                                                    <th width="15%"><?= $value['kode_akun'] ?></th>
                                                    <td><?= $value['nama_akun'] ?></td>
                                                    <td><?= $value['deskripsi'] ?></td>
                                                    <td><?= $value['nama_tipe'] ?></td>
                                                    <td><?= $value['induk_akun'] ? $value['induk_akun'] : '-' ?></td>
                                                    <td>Rp. <?= $value['saldo_awal'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('akun/edit/') ?><?= $value['kode_akun'] ?>" class="waves-effect waves-light btn green">Edit</a>
                                                        <a href="<?= base_url('akun/hapus/') ?><?= $value['kode_akun'] ?>" class="waves-effect waves-light btn red">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--card widgets end-->

</section>
<!-- END CONTENT -->
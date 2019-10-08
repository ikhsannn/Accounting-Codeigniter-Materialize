<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">
        <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
                <?php if ($this->session->flashdata()) { ?>
                    <div class="col s12 m12 l6">
                        <div id="card-alert" class="card green lighten-5">
                            <div class="card-content green-text">
                                <p>Jurnal berhasil <?= $this->session->flashdata('flashdata'); ?></p>
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
                                        <h5>Daftar Jurnal Umum</h5>
                                    </div>
                                    <div class="col m6">
                                        <a href="<?= base_url('jurnal/tambah') ?>" class="waves-effect waves-light blue btn right"><i class="mdi-content-add"></i> Tambah Jurnal Umum</a>
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
                                            <th>Tanggal</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Keterangan</th>
                                            <th>Kode Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php date_default_timezone_set('Asia/Bangkok'); ?>
                                        <?php if ($jurnal !== NULL) : ?>
                                            <?php foreach ($jurnal as $value) : $date = date_create($value['tanggal']);?>
                                                <tr>
                                                    <td><?= date_format($date, 'd-m-Y'); ?></td>
                                                    <td><?= $value['nomor_transaksi'] ?></td>
                                                    <td><?= $value['keterangan'] ?></td>
                                                    <td><?= $value['kode_akun'] ? $value['kode_akun'] : '-' ?></td>
                                                    <td><?= $value['nama_akun'] ? $value['nama_akun'] : '-' ?></td>
                                                    <td>Rp. <?= $value['debit'] ?></td>
                                                    <td>Rp. <?= $value['kredit'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('jurnal/edit/') ?><?= $value['nomor_transaksi'] ?>" class="waves-effect waves-light btn green">Edit</a>
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
<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
                <h4 class="header">Kirim Uang</h4>
                <?php if (validation_errors()) { ?>
                    <div class="col s12 m12 l6">
                        <div id="card-alert" class="card red lighten-5">
                            <div class="card-content red-text">
                                <p><?= validation_errors(); ?></p>
                            </div>
                            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                <?php } ?>

                <div class="col s12 m12 l6">
                    <div class="card-panel">
                        <div class="row" style="padding: 1rem">
                            <?= form_open(''); ?>
                            <?php date_default_timezone_set("Asia/Bangkok"); ?>
                            <div class="row">
                                <div class="input-field col s6">
                                    <?= form_input($supplier) ?>
                                    <?= form_label('Supplier', 'supplier') ?>
                                </div>
                                <div class="input-field col s6">
                                    <?= form_dropdown('akun', $akun, '500.00.00', ['id' => 'akun']) ?>
                                    <?= form_label('Akun', 'akun') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <?= form_input($tgl_pembayaran) ?>
                                    <?= form_label('Tanggal Pembayaran', 'tgl_pembayaran') ?>
                                </div>
                                <div class="input-field col s6">
                                    <?= form_input($tgl_jatuh_tempo) ?>
                                    <?= form_label('Tanggal Jatuh Tempo (opsional)', 'tgl_jatuh_tempo') ?>
                                </div>
                            </div>

                            <div class="row navbar-color white-text" style="padding:1rem">
                                <div class="col s3 center">
                                    <span>Nomor Transaksi</span>
                                </div>
                                <div class="col s3 center">
                                    <span>Supplier</span>
                                </div>
                                <div class="col s3 center">
                                    <span>Tanggal Transaksi</span>
                                </div>
                                <div class="col s3 center">
                                    <span>Total</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col s3">
                                    <input type="text" value="<?= $pembelian[0]['nomor'] ?>" readonly>
                                </div>
                                <div class="col s3">
                                    <input type="text" value="<?= $pembelian[0]['nama_supplier'] ?>" readonly>

                                </div>
                                <div class="col s3">
                                    <input type="text" value="<?= $pembelian[0]['tgl_transaksi'] ?>" readonly>

                                </div>
                                <div class="col s3">
                                    <input type="text" name="total" id="nomor" value="<?= $pembelian[0]['TOTAL'] ?>" readonly>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit">Tambah
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>
<!-- END CONTENT -->
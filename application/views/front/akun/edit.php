<section id="content">
    <div class="container">
        <div class="section">
            <div class="card">
                <div class="card-content">
                    <h5 class="title">Edit Akun</h5>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2">Form Akun</h4>
                    <div class="row">
                        <div class="row" style="padding:1rem">
                            <?= form_open('', ['class' => 'col s12']); ?>

                            <div class="row">
                                <div class="input-field col m6">
                                    <?= form_input($kode_akun) ?>
                                    <?= form_label('Kode Akun', 'kode_akun') ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m6">
                                    <?= form_dropdown('tipe_akun', $tipe_akun, '', ['id' => 'tipe_akun']) ?>
                                    <?= form_label('Tipe Akun', 'tipe_akun') ?>
                                </div>

                                <div class="input-field col m6">
                                    <?= form_dropdown('induk_akun', $induk_akun, '', ['id' => 'induk_akun']) ?>
                                    <?= form_label('Induk Akun (Opsional)', 'induk_akun') ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m6">
                                    <?= form_input($nama_akun) ?>
                                    <?= form_label('Nama Akun', 'nama_akun') ?>
                                </div>

                                <div class="input-field col m6">
                                    <?= form_input($saldo_awal) ?>
                                    <?= form_label('Saldo Awal', 'saldo_awal') ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m8">
                                    <?= form_textarea($deskripsi) ?>
                                    <?= form_label('Deskripsi', 'deskripsi') ?>
                                </div>
                            </div>

                            <br>

                            <a class="waves-effect waves-light  btn" href="<?= base_url('akun'); ?>">Batal</a>
                            <button type="submit" class="waves-effect waves-light blue btn">Edit Akun</button>

                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
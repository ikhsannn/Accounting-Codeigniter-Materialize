<section id="content">
    <div class="container">
        <div class="section">
            <div class="card">
                <div class="card-content">
                    <h5 class="title">Tambah Jurnal</h5>
                </div>
            </div>
        </div>

        <?php if (validation_errors()) { ?>
            <div class="col s12 m12 l6">
                <div id="card-alert" class="card red lighten-5">
                    <div class="card-content red-text">
                        <?= validation_errors(); ?>
                    </div>
                    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('flashdata')) { ?>
            <div class="col s12 m12 l6">
                <div id="card-alert" class="card red lighten-5">
                    <div class="card-content red-text">
                        debit dan kredit <?= $this->session->flashdata('flashdata'); ?>
                    </div>
                    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <?= form_open('', ['id' => 'repeater-form']); ?>
                    <div id="repeater">
                        <div class="repeater-heading">
                            <button type="button" class="repeater-add-btn waves-effect waves-light blue btn">Tambah Data Jurnal</button>
                        </div><br>
                        <div class="items" data-group="jurnal">
                            <div class="item-content">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field col s2">
                                            <input type="date" data-name="tanggal[]" data-skip-name="true">
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field col s2">
                                            <input id="no_transaksi" type="text" data-skip-name="true" data-name="no_transaksi[]">
                                            <label for="no_transaksi">Nomor Transaksi</label>
                                        </div>
                                        <div class="input-field col s2">
                                            <input type="text" data-skip-name="true" data-name="keterangan[]">
                                            <label>Keterangan</label>
                                        </div>

                                        <div class="input-field col s2">
                                            <select class="browser-default" data-skip-name="true" data-name="kode_akun[]">
                                                <option value="" selected disabled>Pilih Akun</option>
                                                <?php foreach ($akun as $value) : ?>
                                                    <option value="<?= $value['kode_akun'] ?>"><?= $value['nama_akun'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s2">
                                            <input data-skip-name="true" type="number" data-name="debit[]">
                                            <label for="">debit</label>
                                        </div>
                                        <div class="input-field col s2">
                                            <input data-skip-name="true" type="number" data-name="kredit[]">
                                            <label for="">kredit</label>
                                        </div>
                                        <div class="input-field col s2" style="margin-top: 2rem">
                                            <a href="#" id="hapus" onclick="$(this).parents('.items').remove()">
                                                <i class="mdi-content-remove-circle-outline"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <br>

                    <a href="<?= base_url('jurnal'); ?>" class="waves-effect waves-light  btn">Batal</a>
                    <button type="submit" class="waves-effect waves-light blue btn">Simpan</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
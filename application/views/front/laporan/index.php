<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">

        <!--card widgets end-->
        <div class="section">
            <div class="row">
                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Neraca</span>
                            <p>Laporan ini Menampilkan apa yang anda miliki (aset), apa yang anda hutang (liabilitas), dan apa yang anda sudah investasikan pada perusahaan anda (ekuitas)</p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/neraca'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>

                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Buku Besar</span>
                            <p>Laporan ini menampilkan semua transaksi yang telah dilakukan untuk suatu periode. Laporan ini bermanfaat jika Anda memerlukan daftar kronologis untuk semua transaksi yang telah dilakukan oleh perusahaan Anda.
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/buku_besar'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Jurnal</span>
                            <p>Laporan ini menampilkan Daftar semua jurnal per transaksi yang terjadi dalam periode waktu. Hal ini berguna untuk melacak di mana transaksi Anda masuk ke masing-masing rekening
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/jurnal'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>

                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Trial Balance</span>
                            <p>Laporan ini menampilkan saldo dari setiap akun, termasuk saldo awal, pergerakan, dan saldo akhir dari periode yang ditentukan.</p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/trial_balance'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Arus Kas</span>
                            <p>Laporan ini mengukur kas yang telah dihasilkan atau digunakan oleh suatu perusahaan dan menunjukkan detail pergerakannya dalam suatu periode.</p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/arus_kas'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>

                <div class="col s6">
                    <div class="card  card-color">
                        <div class="card-content white-text">
                            <span class="card-title">Laporan Laba-Rugi</span>
                            <p>Laporan ini menampilkan setiap tipe transaksi dan jumlah total untuk pendapatan dan pengeluaran anda.</p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url('laporan/laba_rugi'); ?>" class="lime-text text-accent-1">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--card widgets end-->

    </div>
    <!--end container-->
</section>
<!-- END CONTENT -->

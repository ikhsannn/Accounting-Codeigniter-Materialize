<?php
$awal_debit = 0;
$awal_kredit = 0;
$pergerakan_debit = 0;
$pergerakan_kredit = 0;
$akhir_debit = 0;
$akhir_kredit = 0;
?>

<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">

        <!--card widgets end-->
        <div class="section">
            <div class="row">
                <div class="col s12 m12 22">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Trial Balance</span>
                        </div>
                        <div class="card-content row">
                            <form action="" method="get">
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Dari :</label>
                                    <input required id="tanggal" type="date" name="pretgl">
                                </div>
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Hingga :</label>
                                    <input required id="tanggal" type="date" name="posttgl">
                                </div>
                                <div class="input-field col s2">
                                    <button type="submit" class="waves-effect waves-light btn">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <table class="responsive-table display dataTable" role="grid" aria-describedby="data-table-simple_info" cellspacing="0">
                                <thead>
                                    <tr class="style=" padding: 1rem" class="light-blue"">
                                        <th rowspan=" 2" class="center">Daftar Akun</th>
                                        <th colspan="2" class="center">Saldo Awal</th>
                                        <th colspan="2" class="center">Pergerakan</th>
                                        <th colspan="2" class="center">Saldo Akhir</th>
                                    </tr>
                                    <tr>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <th colspan="7">
                                            AKTIVA
                                        </th>
                                    </tr>

                                    <?php if ($trial_balance['aktiva']) : ?>
                                        <?php foreach ($trial_balance['aktiva'] as $value) : ?>
                                            <tr>
                                                <td>(<?= $value['kode_akun'] ?>) <?= $value['nama_akun'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] ?></td>
                                                <td>Rp. <?= $value['debit'] ?></td>
                                                <td>Rp. <?= $value['kredit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] + $value['debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] + $value['kredit'] ?></td>

                                            </tr>
                                        <?php $awal_debit += $value['saldo_awal_debit'];
                                                $awal_kredit += $value['saldo_awal_kredit'];
                                                $pergerakan_debit += $value['debit'];
                                                $pergerakan_kredit += $value['kredit'];
                                                $akhir_debit += $value['saldo_awal_debit'] + $value['debit'];
                                                $akhir_kredit += $value['saldo_awal_kredit'] + $value['kredit'];
                                            endforeach; ?>
                                    <?php endif; ?>

                                    <tr class="odd">
                                        <th colspan="7">
                                            KEWAJIBAN
                                        </th>
                                    </tr>
                                    <?php if ($trial_balance['kewajiban']) : ?>
                                        <?php foreach ($trial_balance['kewajiban'] as $value) : ?>
                                            <tr>
                                                <td>(<?= $value['kode_akun'] ?>) <?= $value['nama_akun'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] ?></td>
                                                <td>Rp. <?= $value['debit'] ?></td>
                                                <td>Rp. <?= $value['kredit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] + $value['debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] + $value['kredit'] ?></td>
                                            </tr>
                                        <?php $awal_debit += $value['saldo_awal_debit'];
                                                $awal_kredit += $value['saldo_awal_kredit'];
                                                $pergerakan_debit += $value['debit'];
                                                $pergerakan_kredit += $value['kredit'];
                                                $akhir_debit += $value['saldo_awal_debit'] + $value['debit'];
                                                $akhir_kredit += $value['saldo_awal_kredit'] + $value['kredit'];
                                            endforeach; ?>
                                    <?php endif; ?>

                                    <tr class="odd">
                                        <th colspan="7">
                                            EKUITAS
                                        </th>
                                    </tr>
                                    <?php if ($trial_balance['ekuitas']) : ?>
                                        <?php foreach ($trial_balance['ekuitas'] as $value) : ?>
                                            <tr>
                                                <td>(<?= $value['kode_akun'] ?>) <?= $value['nama_akun'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] ?></td>
                                                <td>Rp. <?= $value['debit'] ?></td>
                                                <td>Rp. <?= $value['kredit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] + $value['debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] + $value['kredit'] ?></td>
                                            </tr>
                                        <?php $awal_debit += $value['saldo_awal_debit'];
                                                $awal_kredit += $value['saldo_awal_kredit'];
                                                $pergerakan_debit += $value['debit'];
                                                $pergerakan_kredit += $value['kredit'];
                                                $akhir_debit += $value['saldo_awal_debit'] + $value['debit'];
                                                $akhir_kredit += $value['saldo_awal_kredit'] + $value['kredit'];
                                            endforeach; ?>
                                    <?php endif; ?>

                                    <tr class="odd">
                                        <th colspan="7">
                                            PENERIMAAN
                                        </th>
                                    </tr>
                                    <?php if ($trial_balance['penerimaan']) : ?>
                                        <?php foreach ($trial_balance['penerimaan'] as $value) : ?>
                                            <tr>
                                                <td>(<?= $value['kode_akun'] ?>) <?= $value['nama_akun'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] ?></td>
                                                <td>Rp. <?= $value['debit'] ?></td>
                                                <td>Rp. <?= $value['kredit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] + $value['debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] + $value['kredit'] ?></td>
                                            </tr>
                                        <?php $awal_debit += $value['saldo_awal_debit'];
                                                $awal_kredit += $value['saldo_awal_kredit'];
                                                $pergerakan_debit += $value['debit'];
                                                $pergerakan_kredit += $value['kredit'];
                                                $akhir_debit += $value['saldo_awal_debit'] + $value['debit'];
                                                $akhir_kredit += $value['saldo_awal_kredit'] + $value['kredit'];
                                            endforeach; ?>
                                    <?php endif; ?>

                                    <tr class="odd">
                                        <th colspan="7">
                                            PENGELUARAN
                                        </th>
                                    </tr>
                                    <?php if ($trial_balance['pengeluaran']) : ?>
                                        <?php foreach ($trial_balance['pengeluaran'] as $value) : ?>
                                            <tr>
                                                <td>(<?= $value['kode_akun'] ?>) <?= $value['nama_akun'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] ?></td>
                                                <td>Rp. <?= $value['debit'] ?></td>
                                                <td>Rp. <?= $value['kredit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_debit'] + $value['debit'] ?></td>
                                                <td>Rp. <?= $value['saldo_awal_kredit'] + $value['kredit'] ?></td>
                                            </tr>
                                        <?php $awal_debit += $value['saldo_awal_debit'];
                                                $awal_kredit += $value['saldo_awal_kredit'];
                                                $pergerakan_debit += $value['debit'];
                                                $pergerakan_kredit += $value['kredit'];
                                                $akhir_debit += $value['saldo_awal_debit'] + $value['debit'];
                                                $akhir_kredit += $value['saldo_awal_kredit'] + $value['kredit'];
                                            endforeach; ?>
                                    <?php endif; ?>


                                    <tr class="odd">
                                        <th class="center">Total</th>
                                        <th>Rp. <?= $awal_debit ?></th>
                                        <th>Rp. <?= $awal_kredit ?></th>
                                        <th>Rp. <?= $pergerakan_debit ?></th>
                                        <th>Rp. <?= $pergerakan_kredit ?></th>
                                        <th>Rp. <?= $akhir_debit ?></th>
                                        <th>Rp. <?= $akhir_kredit ?></th>

                                    </tr>

                                </tbody>
                            </table>
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

</div>
<!-- END WRAPPER -->

</div>
<!-- END MAIN -->
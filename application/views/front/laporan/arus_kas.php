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
                            <span class="card-title">Arus kas</span>
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
                        <div class="card-content" style="padding: 1rem">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width:20%">Tanggal</th>
                                                <th>Akun</th>
                                                <th>Keterangan</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $debit = 0;
                                            $kredit = 0;
                                            $saldo = 0;
                                            if ($arus_kas) : foreach ($arus_kas as $value) : ?>
                                                    <tr>
                                                        <th><?= $value['tanggal'] ?></th>
                                                        <td><?= $value['nama_akun'] ?></td>
                                                        <td><?= $value['keterangan'] ?></td>
                                                        <td>Rp. <?= $value['debit'] ?></td>
                                                        <td>Rp. <?= $value['kredit'] ?></td>
                                                        <td>Rp. <?= $value['debit'] - $value['kredit'] ?></td>
                                                    </tr>
                                            <?php $debit += $value['debit'];
                                                    $kredit += $value['kredit'];
                                                    $saldo += $value['debit'] - $value['kredit'];
                                                endforeach;
                                            endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="center" colspan="3">Total</th>
                                                <th>Rp. <?= $debit ?></th>
                                                <th>Rp. <?= $kredit ?></th>
                                                <th>Rp. <?= $saldo ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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
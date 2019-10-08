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
                            <span class="card-title">Buku Besar</span>
                        </div>
                        <div class="card-content row">
                            <form action="" method="get">
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Dari :</label>
                                    <input id="tanggal" type="date" name="pretgl">
                                </div>
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Hingga :</label>
                                    <input id="tanggal" type="date" name="posttgl">
                                </div>
                                <div class="input-field col s2">
                                    <button type="submit" class="waves-effect waves-light btn">Filter</button>
                                </div>
                                <div class="input-field col s2">
                                    <button type="submit" name="ekspor" value="TRUE" class="waves-effect waves-light btn">Ekspor</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <table class="responsive-table display dataTable" role="grid" aria-describedby="data-table-simple_info" cellspacing="0">
                                <thead>
                                    <tr class="style=" padding: 1rem" class="light-blue"">
                                        <th>Nama Akun / Tanggal</th>
                                        <th>Nomor</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($buku_besar) : foreach ($buku_besar as $key => $header) : ?>
                                    <tr class=" odd">
                                        <th colspan="6" disabled><span style="margin-left: 1rem">(<?= $key ?>)&nbsp;<?= $header[0]['nama_akun'] ?> </span></th>
                                    </tr>

                                    <?php $debit = 0;
                                            $kredit = 0;
                                            $saldo = 0;
                                            foreach ($header as $value) : ?>
                                        <tr>
                                            <td><span style="margin-left: 2rem"><?= $value['tanggal'] ?></span></td>
                                            <td><?= $value['nomor_transaksi'] ?></td>
                                            <td><?= $value['keterangan'] ?></td>
                                            <td>Rp. <?= $value['debit'] ?></td>
                                            <td>Rp. <?= $value['kredit'] ?></td>
                                            <td>Rp. <?= $value['debit'] - $value['kredit'] ?></td>
                                        </tr>
                                    <?php $debit += $value['debit'];
                                                $kredit += $value['kredit'];
                                                $saldo += $value['debit'] - $value['kredit'];
                                            endforeach; ?>

                                    <tr style="border-top: 1px solid #d0d0d0 !important">
                                        <th colspan="3" class="center">
                                            (<?= $key ?>)&nbsp;<?= $header[0]['nama_akun'] ?> | Saldo Akhir
                                        </th>
                                        <th>
                                            Rp. <?= $debit ?>
                                        </th>
                                        <th>
                                            Rp. <?= $kredit ?>
                                        </th>
                                        <th>
                                            Rp. <?= $saldo ?>
                                        </th>
                                    </tr>
                            <?php endforeach;
                            endif; ?>



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
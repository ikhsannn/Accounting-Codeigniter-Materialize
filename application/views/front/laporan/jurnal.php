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
                            <span class="card-title">Jurnal</span>
                        </div>
                        <div class="card-content row">
                            <form action="">
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Dari :</label>
                                    <input required id="tanggal" type="date" name="" id="">
                                </div>
                                <div class="col s2 m2 l2">
                                    <label for="tanggal">Hingga :</label>
                                    <input required id="tanggal" type="date" name="" id="">
                                </div>
                                <div class="input-field col s2">
                                    <a class="waves-effect waves-light btn">Filter</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <table class="responsive-table display dataTable" role="grid" aria-describedby="data-table-simple_info" cellspacing="0">
                                <thead>
                                    <tr class="style=" padding: 1rem" class="light-blue"">
                                        <th>Akun</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $total_debit = 0;
                                    $total_kredit = 0;
                                    foreach ($jurnal as $header) : ?>
                                    <tr class=" odd">
                                        <td colspan="3" disabled><span style="margin-left: 1rem"><b> Nomor Transaksi #<?= $header[0]['nomor_transaksi'] ?></b> | <?= $header[0]['tanggal'] ?> </span></td>
                                    </tr>

                                    <?php $debit = 0;
                                        $kredit = 0;
                                        foreach ($header as $value) : ?>
                                        <tr>
                                            <td>
                                                <span>(<?= $value['nomor_transaksi'] ?>) </span><br>
                                                <small><?= $value['keterangan'] ?></small>
                                            </td>
                                            <td>
                                                Rp. <?= $value['debit'] ?>
                                            </td>
                                            <td>
                                                Rp. <?= $value['kredit'] ?>
                                            </td>
                                        </tr>
                                    <?php $debit += $value['debit'];
                                            $kredit += $value['kredit'];
                                        endforeach; ?>

                                    <tr>
                                        <td class="center">Total</td>
                                        <th>Rp. <?= $debit ?></th>
                                        <th>Rp. <?= $kredit ?></th>
                                    </tr>
                                <?php $total_debit += $debit;
                                    $total_kredit += $kredit;
                                endforeach; ?>




                                <tr>
                                    <th class="center">Grand Total</th>
                                    <th>Rp. <?= $total_debit ?></th>
                                    <th>Rp. <?= $total_kredit ?></th>
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
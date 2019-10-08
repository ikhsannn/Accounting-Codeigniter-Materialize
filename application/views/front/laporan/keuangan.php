<!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
                <h4 class="header">Laporan Keuangan</h4>

                <div class="card">
                    <div class="card-content">
                        <div class="container">
                            <div class="col s12 m8 l9">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Rekening</th>
                                            <th>Bank</th>
                                            <th>Saldo Akhir</th>
                                            <th>Atas Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?= $row['no_rekening']; ?></td>
                                                <td><?= $row['nama_bank']; ?></td>
                                                <td>Rp. <?= $row['saldo_akhir']; ?></td>
                                                <td><?= $row['atas_nama']; ?></td>
                                            </tr>
                                        <?php } ?>
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

    </div>
    <!--end container-->
</section>
<!-- END CONTENT -->

</div>
<!-- END WRAPPER -->

</div>
<!-- END MAIN -->
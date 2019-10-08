<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a</title>
    <style>
        .odd {
            
        }
    </style>
</head>

<body>
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

    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/materialize.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Neraca</title>
    <link href="<?= base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet">
</head><body>

    <div class='row'>
        <div class='col s6'>
            <img src=" <?= base_url('assets/images/logo.png') ?>" alt=''>
            <h5>Laporan Neraca</h5>
        </div>
        <div class='col s6'>
            <div class='header'>
                <h2 style='margin-bottom: 5px; margin-right: 5px;'>PERKUMPULAN ADPI</h2>
            </div>
        </div>
    </div>

    <table cellspacing='1' cellpadding='2' style='width: 100%' border="1">
        <thead>
            <tr class='style=' padding: 1rem' class='light-blue''>
            <th style=' width:20%'>Tanggal</th>
                <th>Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($neraca) {
                foreach ($neraca as $value) {  ?>
                    <tr style='background-color: #ffffff'>
                        <th> <?= $value['tanggal'] ?></th>
                        <td> <?= $value['nama_akun'] ?></td>
                        <td>Rp. <?= $value['debit'] ?></td>
                        <td>Rp. <?= $value['kredit'] ?></td>
                        <td>Rp. <?= $value['debit'] - $value['kredit'] ?></td>
                    </tr>
            <?php $debit += $value['debit'];
                    $kredit += $value['kredit'];
                    $saldo += $value['debit'] - $value['kredit'];
                }
            } ?>
        </tbody>
        <tfoot>
            <tr style='background-color: #ffffff'>
                <th class='center' colspan='2'>Total</td>
                <td>Rp. <?= $debit ?></td>
                <td>Rp. <?= $kredit ?></td>
                <td>Rp. <?= $saldo ?></td>
            </tr>
        </tfoot>
    </table>    

</body></html>
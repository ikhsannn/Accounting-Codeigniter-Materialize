<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        thead {
            border-bottom: 1px solid #d0d0d0;
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .header {
            float: right !important;
            margin-right: 0.5rem;
        }

        h4 {
            margin: 15px;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <div class="row">
        <div class="column">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="">
            <h4>Daftar Produk</h4>
        </div>
        <div class="column">
            <div class="header">
                <h2 style="margin-bottom: 5px; margin-right: 5px;">PERKUMPULAN ADPI</h2>

            </div>
        </div>
    </div>
    <!-- HEADER -->
    <div>
        <table width="100%" cellspacing="1" bgcolor="#666666" cellpadding="2">
            <tr bgcolor="#ffffff">
                <th width="5%" align="center">No</th>
                <th width="35%" align="center">Nama Produk</th>
                <th width="45%" align="center">Deskripsi</th>
                <th width="15%" align="center">Harga</th>
            <tr bgcolor="#ffffff">
                <td align="center">1</td>
                <td>Nama Produk ini</td>
                <td>Barang untuk asadasd..</td>
                <td align="right">Rp. 5.000.000</td>
            </tr>
        </table>
    </div>
</body>

</html>
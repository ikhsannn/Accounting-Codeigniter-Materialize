<?php
function statusData($stat)
{
    switch ($stat) {
        case 0:
            echo '<h4 class="right blue-text" style="margin-top: 40px; margin-right: 60px;">Penawaran</h4>';
            break;
        case 1:
            echo '<h4 class="right lime-text" style="margin-top: 40px; margin-right: 60px;">Pemesanan</h4>';
            break;
        case 2:
            echo '<h4 class="right orange-text" style="margin-top: 40px; margin-right: 60px;">Pengiriman</h4>';
            break;
        case 3:
            echo '<h4 class="right red-text" style="margin-top: 40px; margin-right: 60px;">Belum Lunas</h4>';
            break;
        default:
            echo '<h4 class="right teal-text accent-2" style="margin-top: 40px; margin-right: 60px;">Lunas</h4>';
            break;
    }
}
function buttonStatus($stat, $id)
{
    switch ($stat) {
        case 0:
            echo '<a href="' . base_url()  . 'pembelian/ubah_status/' . $id . '?status=' . $stat . '" class="btn grey">Buat Pemesanan</a>';
            break;
        case 1:
            echo '<a href="' . base_url()  . 'pembelian/ubah_status/' . $id . '?status=' . $stat . '" class="btn grey"> Buat Pengiriman </a>';
            break;
        case 2:
            echo '<a href="' . base_url()  . 'pembelian/ubah_status/' . $id . '?status=' . $stat . '" class="btn grey"> Bayar </a>';
            break;
        case 3:
            echo '<a href="' . base_url()  . 'pembelian/kirim_uang/' . $id . '" class="btn orange"> Selesaikan Pembayaran </a>';
            break;
        default:
            echo '<button class="btn blue" disabled> Selesai </button>';
            break;
    }
}
?>
        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">

                <!--card widgets end-->
                <?php foreach ($pembelian as $value) : ?>
                    <div class="section">

                        <div class="row">
                            <div class="col s12 m12 22">

                                <div class="card">
                                    <div class="card-content row">
                                        <div class="col s2 m2 l6">
                                            <h6>Transaksi</h6>
                                            <h4 for="tanggal" class="blue-text waves-light">Invoice Pembelian : <?= $value['nomor'] ?></h4>
                                        </div>
                                        <div class="col s2 m2 l6">
                                            <?= statusData($value['status']) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card blue lighten-5" style="margin-top: -14px;">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s2">
                                                <h6><b>Supplier :</b></h6>
                                            </div>
                                            <div class="col s2">
                                                <h6><?= $value['nama_supplier'] ?></h6>
                                            </div>
                                            <div class="col s1">
                                                <h6><b>Email :</b></h6>
                                            </div>
                                            <div class="col s3">
                                                <h6>Ikhsanabdillah@gmail.com</h6>
                                            </div>
                                            <div class="col s4 right" style="margin-left: auto">
                                                <h6 style="margin-left: 3rem;"><b>Total Tagihan :</b> Rp. <?= number_format($value['TOTAL'], 0, ',', '.') ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" style="margin-top: -14px;">
                                    <div class="card-content row">
                                        <div class="col s2 m2 3">
                                            <h6><b>Alamat Supplier :</b></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6><b><?= $value['perusahaan'] ?></b></h6>
                                            <h6><?= $value['alamat'] ?></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6><b>Tanggal Transaksi :</b></h6>
                                            <h6><b>Tanggal Jatuh Tempo :</b></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6><?= $value['tgl_transaksi'] ?></h6>
                                            <h6><?= $value['jatuh_tempo'] ?></h6>
                                        </div>
                                        <div class="col s2 m2 4">
                                            <h6><b>No Transaksi :</b></h6>
                                        </div>
                                        <div class="col s2 m2 4">
                                            <h6><?= $value['nomor'] ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="card blue lighten-5" style="margin-top: -14px;">
                                    <div class="card-content row">
                                        <table style="margin-top: -20px;">
                                            <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Deskripsi</th>
                                                    <th>Kuantitas</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Pajak</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $subtotal = 0;
                                                    $pajak = 0;
                                                    if ($detail_pembelian !== NULL) {
                                                        foreach ($detail_pembelian as $detail) : ?>
                                                        <tr>
                                                            <td><?= $detail['name'] ?></td>
                                                            <td><?= $detail['deskripsi'] ?></td>
                                                            <td><?= $detail['kuantitas'] ?></td>
                                                            <td>Rp. <?= number_format($detail['hrg_beli_satuan'], 0, ',', '.') ?></td>
                                                            <td><?= $detail['nama_pajak'] ?></td>
                                                            <td>Rp. <?= number_format($detail['hrg_beli_satuan'] * $detail['kuantitas'], 0, ',', '.') ?></td>
                                                        </tr>
                                                        <?php $subtotal += $detail['hrg_beli_satuan'] * $detail['kuantitas'];
                                                            $pajak += ($detail['hrg_beli_satuan'] * $detail['kuantitas']) * $detail['persentase'];
                                                        endforeach;
                                                    } ?>
                                            </tbody>
                                        </table>

                                        <div class="col s2 m2 3">
                                            <h6></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6></h6>
                                            <h6></h6>
                                        </div>
                                        <div class="col s2 m2 3">
                                            <h6></h6>
                                            <h6></h6>
                                        </div>
                                        <div class="col s2 m2 4" style="margin-top: 70px;">
                                            <h6><b>SubTotal :</b></h6>
                                            <h6><b>PPN :</b></h6>
                                            <h6><b>Total Tagihan :</b></h6>
                                        </div>
                                        <div class="col s2 m2 4" style="margin-top: 70px;">
                                            <h6>Rp. <?= number_format($subtotal, 0, ',', '.') ?></h6>
                                            <h6>Rp. <?= number_format($pajak, 0, ',', '.') ?></h6>
                                            <h6>Rp. <?= number_format($subtotal + $pajak, 0, ',', '.') ?></h6>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <?= buttonStatus($value['status'], $value['id_pembelian']) ?>
                                <a href="<?= base_url('pembelian/hapus/' . $value['id_pembelian']) ?>" class="btn red">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--card widgets end-->

            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
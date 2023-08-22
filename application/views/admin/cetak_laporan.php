<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Kas Lapangan Reham Futsal
        <?php echo 'Tanggal ' . $tgl_mulai . ' - ' . $tgl_akhir; ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Panggil file CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <center>
            <h2>Laporan Penerimaan Kas</h2>
            <p>
                <?php echo 'Tanggal ' . $tgl_mulai . ' - ' . $tgl_akhir; ?>
                <br>Status :
                <?php echo $status; ?>
            </p>
        </center>
        <table style="font-size:14px;" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Invoice</th>
                    <th scope="col">ID Booking</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Total</th>
                    <th scope="col">Dibayar</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($status == "Semua") { ?>
                    <?php $no = 1;
                    $total = 0; // variabel untuk menyimpan total jumlah datanya
                    $bukti_bayar = 0;
                    foreach ($bukti as $buk) {
                        $id_bukti = $buk->id_bukti;
                        $dibayar = $buk->bayar;
                        $bukti_bayar += $dibayar;
                        $tot_b = $buk->tot_biaya;
                        $total += $tot_b; // menambahkan nilai $tot_b ke variabel $total
                        $tanggal = date('Y-m-d', strtotime($buk->tgl_bayar)); // mengambil data tanggal dengan format Y-m-d
                        ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $id_bukti; ?>
                            </td>
                            <td>
                                <?php echo $buk->id_sewa; ?>
                            </td>
                            <td>
                                <?php
                                foreach ($sewa as $val) {
                                    $ids = $val->id_sewa;
                                    if ($buk->id_sewa == $ids) {
                                        foreach ($user as $key) {
                                            if ($key->id_pelanggan == $val->id_pelanggan) {
                                                $username = $key->username;
                                                echo $key->username;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo date('d-m-Y', strtotime($buk->tgl_bayar)); ?>
                            </td>
                            <td>
                                <?php echo number_format($tot_b, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <?php echo number_format($buk->bayar, 0, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">
                            <?php $no = $no - 1;
                            echo 'Total ' . $no . ' Transaksi '; ?>
                        </td>
                        <td class="bg-success">
                            <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                        </td>
                        <td class="bg-warning">
                            <?php echo 'Rp. ' . number_format($bukti_bayar, 0, ',', '.'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">Sisa</td>
                        <td class="bg-danger">
                            <?php $sub_total = $total - $bukti_bayar;
                            echo 'Rp. -' . number_format($sub_total, 0, ',', '.'); ?>
                        </td>
                    </tr>


                <?php } else { ?>
                    <?php $no = 1;
                    $total = 0; // variabel untuk menyimpan total jumlah datanya
                    $bukti_bayar = 0;
                    foreach ($bukti as $buk) {
                        foreach ($sewa as $swa) {
                            if ($buk->id_sewa == $swa->id_sewa) {
                                if ($swa->status == $status) {
                                    $id_bukti = $buk->id_bukti;
                                    $dibayar = $buk->bayar;
                                    $bukti_bayar += $dibayar;
                                    $tot_b = $buk->tot_biaya;
                                    $total += $tot_b; // menambahkan nilai $tot_b ke variabel $total
                                    $tanggal = date('Y-m-d', strtotime($buk->tgl_bayar)); // mengambil data tanggal dengan format Y-m-d
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $id_bukti; ?>
                                        </td>
                                        <td>
                                            <?php echo $buk->id_sewa; ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($sewa as $val) {
                                                $ids = $val->id_sewa;
                                                if ($buk->id_sewa == $ids) {
                                                    foreach ($user as $key) {
                                                        if ($key->id_pelanggan == $val->id_pelanggan) {
                                                            $username = $key->username;
                                                            echo $key->username;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo date('d-m-Y', strtotime($buk->tgl_bayar)); ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($tot_b, 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($buk->bayar, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }

                    } ?>
                    <tr>
                        <td colspan="5">
                            <?php $no = $no - 1;
                            echo 'Total ' . $no . ' Transaksi '; ?>
                        </td>
                        <td class="bg-success">
                            <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                        </td>
                        <td class="bg-warning">
                            <?php echo 'Rp. ' . number_format($bukti_bayar, 0, ',', '.'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">Sisa</td>
                        <td class="bg-danger">
                            <?php $sub_total = $total - $bukti_bayar;
                            echo 'Rp. -' . number_format($sub_total, 0, ',', '.'); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Panggil file JavaScript untuk Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>
</body>

</html>
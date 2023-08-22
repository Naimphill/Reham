<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Sewa</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Panggil file CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <center><br>
            <h2>Data Sewa</h2>
            <?php if ($status == 'Semua') {
            } else {
                echo '<p> Status = ' . $status . '</p>';
            } ?>
        </center><br>
        <table style="font-size:14px;" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Booking</th>
                    <th scope="col">Username</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tgl</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Total</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php if ($status == "Semua") { ?>

                    <?php $no = 1;
                    foreach ($sewa as $val) {
                        $ids = $val->id_sewa; ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $val->id_sewa; ?>
                            </td>
                            <td>
                                <?php foreach ($user as $key) {
                                    if ($key->id_pelanggan == $val->id_pelanggan) {
                                        $username = $key->username;
                                        echo $key->username;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php echo 'Lapangan ' . $val->id_lapangan; ?>
                            </td>
                            <td>
                                <?php echo date_create($val->tanggal)->format('d/m/Y'); ?>
                            </td>
                            <?php foreach ($jam as $tjm) {
                                if ($tjm->id_jam == $val->id_jam) {
                                    $nm_jam = $tjm->jam;
                                    $nm_harga = $tjm->harga; ?>
                                    <td>
                                        <?php echo $tjm->jam; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($tjm->harga, 0, ',', '.'); ?>
                                    </td>
                                <?php }
                            } ?>
                            <?php foreach ($bukti as $buk) {
                                if ($buk->id_sewa == $val->id_sewa) {
                                    $idb = $buk->id_bukti;
                                    $dibayar = $buk->bayar;
                                    $tot = $buk->tot_biaya;
                                    $tgl_byr = $buk->tgl_bayar;
                                    $status_byr = $buk->status;
                                    $sisa = $buk->tot_biaya - $dibayar;
                                    $bukti_tf = $buk->bukti; ?>
                                    <td>
                                        <?php
                                        if ($status_byr == 'DP') {
                                            echo '(DP) -' . number_format($sisa, 0, ',', '.');
                                        } else {
                                            echo 'LUNAS';
                                        }
                                        ?>
                                    </td>
                                <?php }
                            } ?>
                            <td>
                                <?php echo $val->status; ?>
                            </td>

                        </tr>

                    <?php } ?>
                <?php } else { ?>

                    <?php $no = 1;
                    foreach ($sewa as $val) {
                        if ($val->status == $status) {
                            $ids = $val->id_sewa; ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $val->id_sewa; ?>
                                </td>
                                <td>
                                    <?php foreach ($user as $key) {
                                        if ($key->id_pelanggan == $val->id_pelanggan) {
                                            $username = $key->username;
                                            echo $key->username;
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <?php echo 'Lapangan ' . $val->id_lapangan; ?>
                                </td>
                                <td>
                                    <?php echo date_create($val->tanggal)->format('d/m/Y'); ?>
                                </td>
                                <?php foreach ($jam as $tjm) {
                                    if ($tjm->id_jam == $val->id_jam) {
                                        $nm_jam = $tjm->jam;
                                        $nm_harga = $tjm->harga; ?>
                                        <td>
                                            <?php echo $tjm->jam; ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($tjm->harga, 0, ',', '.'); ?>
                                        </td>
                                    <?php }
                                } ?>
                                <?php foreach ($bukti as $buk) {
                                    if ($buk->id_sewa == $val->id_sewa) {
                                        $idb = $buk->id_bukti;
                                        $dibayar = $buk->bayar;
                                        $tot = $buk->tot_biaya;
                                        $tgl_byr = $buk->tgl_bayar;
                                        $status_byr = $buk->status;
                                        $sisa = $buk->tot_biaya - $dibayar;
                                        $bukti_tf = $buk->bukti; ?>
                                        <td>
                                            <?php
                                            if ($status_byr == 'DP') {
                                                echo '(DP) -' . number_format($sisa, 0, ',', '.');
                                            } else {
                                                echo 'LUNAS';
                                            }
                                            ?>
                                        </td>
                                    <?php }
                                } ?>
                                <td>
                                    <?php echo $val->status; ?>
                                </td>

                            </tr>

                        <?php }
                    }

                } ?>
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
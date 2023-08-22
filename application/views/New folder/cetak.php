<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Lapangan Reham Futsal</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Panggil file CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <p>Informasi Pembayaran</p>
                <?php foreach ($sewa as $sew) {
                    foreach ($bukti as $buk) {
                        if ($buk->id_sewa == $sew->id_sewa) {
                            $tgl = $buk->tgl_bayar;
                            $id_bukti = $buk->id_bukti;
                        }
                    }
                } ?>
                <div class="row">
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td>
                                    <?php echo $this->session->userdata('nama_lengkap'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td> : </td>
                                <td>
                                    <?php echo $this->session->userdata('no_tlp'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Pembayaran</td>
                                <td> : </td>
                                <td>
                                    <?php echo $tgl; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col"></div>
                    <h5 class="mt-3">No Bukti :
                        <?php echo $id_bukti; ?>
                    </h5>
                    <center>
                        <h2>Bukti Pembayaran</h2>
                    </center>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Booking</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lapangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sewa as $key) { ?>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <?php echo $key->id_sewa; ?>
                            </td>
                            <td>
                                <?php echo $this->session->userdata('nama_lengkap'); ?>
                            </td>
                            <td>
                                <?php echo 'Lapangan ' . $key->id_lapangan; ?>
                            </td>
                            <td>
                                <?php echo $key->tanggal; ?>
                            </td>
                            <?php foreach ($jam as $val) {
                                if ($val->id_jam == $key->id_jam) {
                                    $tot = $val->harga;
                                    $jml = $tot - '50000'; ?>
                                    <td>
                                        <?php echo $val->jam; ?>
                                    </td>
                                    <td>
                                        <?php echo "Rp. " . number_format($tot, 0, ',', '.'); ?>
                                    </td>
                                <?php }
                            } ?>

                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Sub Total</td>
                            <td>
                                <?php echo "Rp. " . number_format($tot, 0, ',', '.'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>DP</td>
                            <td>Rp. 50.000</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="bg-danger">Bayar</td>
                            <td class="bg-danger"><b>
                                    <?php echo "Rp. " . number_format($jml, 0, ',', '.'); ?>
                                </b>
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
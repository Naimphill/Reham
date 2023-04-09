<br><br><br><br><br>
<?php if ($this->session->flashdata('pembayaran')): ?>
    <div class="flash-pembayaran" data-flashdata="<?= $this->session->flashdata('pembayaran'); ?>"></div>
    <?php unset($_SESSION['pembayaran']); ?>
<?php endif; ?>
<div class="container">
    <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <div class="row">
                <p>Informasi Pembayaran</p>
                <?php foreach ($sewa as $sew) {
                    foreach ($bukti as $buk) {
                        if ($buk->id_sewa == $sew->id_sewa) {
                            $tgl = $buk->tgl_bayar;
                            $id_bukti = $buk->id_bukti;
                            $bukti_tf = $buk->bukti;
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
                    <h5 class="mt-3"><b>No Bukti :
                            <?php echo $id_bukti; ?>
                        </b></h5>
                    <center>
                        <h2>Bukti Pembayaran</h2>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">


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
                    <?php foreach ($sewa as $key) {
                        $id_sewa = $key->id_sewa; ?>
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
                            <td class="bg-danger">
                                <?php echo "Rp. " . number_format($jml, 0, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <a class="btn btn-primary float-right" href="<?php echo site_url('Sewa/cetak/' . $id_sewa) ?>"
                target="_blank"><i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
    <!-- <button class="btn btn-primary float-right"><i class="fa fa-print"></i> Cetak</button> -->

    <p><b>*Note : Silahkan Cetak/Simpan Bukti Pembayaran !</b></p>
    <p><b>*Silahkan lakukan pelunasan di Reham Futsal secara langsung !</b></p>
    <br>
    <a class="btn btn-lg btn-primary" href="<?php echo site_url('Sewa/riwayat/') ?>">Kembali</a>
    <br>
    <hr><br><br>
    <h5><b>Lampiran</b></h5>
    <p>Bukti DP</p><br>
    <img style="width: 100%; max-width: 580px; height: 500px; object-fit: contain;"
        src="<?php echo base_url('/upload_bukti/' . $bukti_tf) ?>" alt="">


</div>

<br><br><br><br>
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            title: 'Data',
            text: flashData + 'Behasil ',
            icon: 'success'
        });
    }
</script>
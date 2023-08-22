<br><br><br><br><br>
<div class="container">
    <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <div class="row">
                <center>
                    <h2>Riwayat Booking</h2>
                </center>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if (count($sewa) == 0) { ?>
                <center>
                    <h2>Anda Belum Pernah Menyewa Lapangan</h2>
                </center>
            <?php } else { ?>
                <table id="myTable" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Booking</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sewa as $key) {
                            $id_sewa = $key->id_sewa; ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no++; ?>
                                </th>
                                <td>
                                    <?php echo $key->id_sewa; ?>
                                </td>
                                <td>
                                    <?php echo 'Lapangan ' . $key->id_lapangan; ?>
                                </td>
                                <td>
                                    <?php echo $key->tanggal; ?>
                                </td>
                                <td>
                                    <?php foreach ($data_sewa as $dat) {
                                        if ($id_sewa == $dat->id_sewa) {
                                            foreach ($jam as $val) {
                                                if ($val->id_jam == $dat->id_jam) {
                                                    $tot = $val->harga;
                                                    $jml = $tot - '50000'; ?>
                                                    <?php echo $val->jam . "<br>"; ?>
                                                <?php }
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('Sewa/detail_sewa/' . $key->id_sewa); ?>"
                                        class="btn btn-primary">Detail</a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<br><br><br><br>
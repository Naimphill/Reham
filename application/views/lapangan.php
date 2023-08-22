<br><br><br><br><br>
<div class="container">
    <center>
        <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="section-heading">
                <h6>Selamat Datang</h6>
                <h2>Silahkan Pilih <em>Lapangan</em></h2>
            </div>
        </div>
    </center>
    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php foreach ($lapangan as $lap) {
                            $id = $lap->id_lapangan; ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <div class="left-content wow fadeInLeft" data-wow-duration="1s"
                                                data-wow-delay="1s">
                                                <img class="card-img-top"
                                                    src="<?php echo base_url('/upload_gambar/' . $lap->foto); ?>" alt="">
                                            </div>
                                            <h5 class="card-title">
                                                <?php echo $lap->nm_lapangan; ?>
                                            </h5>
                                            <p class="card-text"></p>

                                        </center>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <hr><br><br><br>
    <center>
        <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="section-heading">
                <h2>Jadwal Sewa Lapangan</h2>
                <!-- <h2>Silahkan Pilih <em>Lapangan</em></h2> -->
            </div>
        </div>
    </center>
    <!-- <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"> -->
    <div class="container">
        <h4 class="mb-4">Silahkan Masukkan tanggal</h4>
        <form class="form">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" class="form-control datepicker" name="tanggal">
                    </div>
                    <div class="col-md-4">
                        <button type="button" id="jadwal" class="btn btn-primary">Cek Jadwal</button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </form><br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($lapangan as $lap) {
                        $id = $lap->id_lapangan; ?>
                        <div class="col-sm-6">
                            <div class="card" id="hidden-table<?php echo '-' . $id; ?>" style="display: none;">
                                <div class="card-header">
                                    <h4 style="text-align:center;">
                                        <?php echo $lap->nm_lapangan; ?>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <?php
                                        $hari = date('Y-m-d');
                                        ?>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">
                                                    Hari Ini <br>
                                                    <?php echo $hari; ?>
                                                </th>
                                                <th scope="col" class="text-center" id="tanggal<?php echo $id; ?>">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($jam as $val) { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($val->jam == '15.00 - 16.00') {
                                                            echo '<button class="btn btn-danger btn-sm rounded-pill" disabled>' . $val->jam . '</button>';
                                                        } else {
                                                            echo '<button class="btn btn-primary btn-sm rounded-pill">' . $val->jam . '</button>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($val->jam == '15.00 - 16.00') {
                                                            echo '<button class="btn btn-danger btn-sm rounded-pill" disabled>' . $val->jam . '</button>';
                                                        } else {
                                                            echo '<button class="btn btn-primary btn-sm rounded-pill">' . $val->jam . '</button>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3" class="text-center">*Ket <br><button
                                                        class="btn btn-danger btn-sm rounded-pill" disabled></button> :
                                                    Dibooking | <button class="btn btn-primary btn-sm rounded-pill"></button>
                                                    : Kosong
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        $('#jadwal').click(function () {
            var tanggalA = $('input[name="tanggal"]').val();
            var tanggalB = $('input[name="tanggal"]').val();
            $('#tanggalA').text(tanggalA);
            $('#tanggalB').text(tanggalB);
            $('#hidden-table-A').show();
            $('#hidden-table-B').show();
        });
    });
</script>
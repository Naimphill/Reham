<br><br><br><br><br>

<div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="section-heading">
        <div class="row">
            <div class="col-md-4">
                <center>
                    <button class="btn btn-secondary" onclick="goBack()"> <i
                            class="fa fa-arrow-left"></i>Kembali</button>
                </center>
            </div>
            <div class="col">
                <h2>Jadwal Sewa Lapangan
                    <?php echo $lapangan->nm_lapangan; ?>
                </h2>
            </div>
        </div>
        <!-- <h2>Silahkan Pilih <em>Lapangan</em></h2> -->
    </div>
</div>

<!-- <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"> -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php $id = $lapangan->id_lapangan; ?>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="text-align:center;" class="mt-3 mb-3">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $hari_ini = date('d-m-Y');
                                echo 'Hari Ini <br>' . $hari_ini;
                                ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table"> -->
                            <table class="table" id="hidden-hari" style="display: none;">
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $hari = date('Y-m-d');
                                    $waktu_sekarang = date('H:i');

                                    foreach ($jam as $val) {
                                        //inisialisasi variabel found
                                        $found = false;
                                        foreach ($sewa as $key) {
                                            $tgal = $key->tanggal;
                                            if ($tgal == $hari && $val->id_jam == $key->id_jam) {
                                                // Jika data jam ditemukan di dalam data sewa, maka set variabel $found menjadi true
                                                $found = true;
                                                break; // keluar dari loop $sewa karena sudah ditemukan
                                            }
                                        }

                                        // tampilkan button
                                        if ($found) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-sm rounded-pill" disabled>
                                                        <?php echo $val->jam; ?>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <form method="POST" action="<?php echo site_url('Sewa/v_sewa') ?>">
                                                        <input type="hidden" name="lapangan"
                                                            value="<?php echo $lapangan->id_lapangan; ?>">
                                                        <input type="hidden" name="jam" value="<?php echo $val->id_jam; ?>">
                                                        <input type="hidden" name="tgl" value="<?php echo $hari; ?>">
                                                        <?php if ($val->time < $waktu_sekarang) { ?>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm rounded-pill tombolkirim" disabled>
                                                                <?php echo $val->jam; ?>
                                                            </button>
                                                        <?php } else { ?>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm rounded-pill tombolkirim">
                                                                <?php echo $val->jam; ?>
                                                            </button>
                                                        <?php } ?>
                                                    </form>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <button type="button" id="hari" class="btn btn-primary">Lihat Jadwal</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="card">
                        <div class="card-header">
                            <form class="form" method="POST"
                                action="<?php echo site_url('Sewa/jadwalcari/' . $lapangan->id_lapangan) ?>">
                                <div class="row">
                                    <input type="hidden" name="id_lapangan"
                                        value="<?php echo $lapangan->id_lapangan; ?>">
                                    <div class="col-md-9">
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $tgl_m = date('Y-m-d');
                                        $tgl_min = date('Y-m-d', strtotime('+1 day', strtotime($tgl_m)));
                                        if (isset($tgl)) { ?>
                                            <input type="date" class="form-control datepicker" name="tanggal_input"
                                                value="<?php echo $tgl; ?>" min="<?php echo $tgl_min; ?>">
                                        <?php } else { ?>
                                            <input type="date" class="form-control datepicker" name="tanggal_input"
                                                min="<?php echo $tgl_min; ?>" required>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Cek Jadwal</button>
                                    </div>
                                    <div class="col"></div>
                                </div><br>
                                <div class="row">
                                    <center>
                                        <h4>
                                            <?php
                                            if (isset($tgl)) {
                                                echo date('d-m-Y', strtotime($tgl));
                                            }
                                            ?>
                                        </h4>
                                    </center>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <?php
                            if (isset($tgl)) { ?>
                                <table class="table">
                                    <tbody>
                                        <?php
                                        foreach ($jam as $val) {
                                            //inisialisasi variabel found
                                            $found = false;
                                            foreach ($sewa as $key) {
                                                $tagl = $key->tanggal;
                                                if ($tagl == $tgl && $val->id_jam == $key->id_jam) {
                                                    // Jika data jam ditemukan di dalam data sewa, maka set variabel $found menjadi true
                                                    $found = true;
                                                    break; // keluar dari loop $sewa karena sudah ditemukan
                                                }
                                            }

                                            // tampilkan button
                                            $tgl_now = date('Y-m-d');
                                            $disabled = ($tgl < $tgl_now); // Cek apakah tanggal sudah lewat dari hari ini
                                            if ($found) {
                                                ?>
                                                <tr>
                                                    <td class=" text-center">
                                                        <button class="btn btn-danger btn-sm rounded-pill" disabled>
                                                            <?php echo $val->jam; ?>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <form method="POST" action="<?php echo site_url('Sewa/v_sewa') ?>">
                                                            <input type="hidden" name="lapangan"
                                                                value="<?php echo $lapangan->id_lapangan; ?>">
                                                            <input type="hidden" name="jam" value="<?php echo $val->id_jam; ?>">
                                                            <input type="hidden" name="tgl" value="<?php echo $tgl; ?>">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm rounded-pill tombolkirim" <?php echo $disabled ? 'disabled' : ''; ?>>
                                                                <?php echo $val->jam; ?>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
</div>
<br><br><br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</script>
<script>
    $(document).ready(function () {
        $('#tutup-jadwal').click(function () {
            $('#hidden-table').hide();
        });
        $('#hari').click(function () {
            if ($('#hidden-hari').is(':visible')) {
                $('#hidden-hari').hide();
                $(this).text('Lihat Jadwal');
            } else {
                $('#hidden-hari').show();
                $(this).text('Sembunyikan');
            }
        });
        // $('#jadwal').click(function () {
        //     var tanggal = $('#tanggal').val();
        //     $('#tanggal').text(tanggal);
        //     if ($('#hidden-table').is(':visible')) {
        //         $('#hidden-table').hide();
        //         $(this).text('Cek Jadwal');
        //     } else {
        //         $('#hidden-table').show();
        //     }
        // });
    });
</script>
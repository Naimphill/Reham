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
<?php if ($this->session->flashdata('peringatan')): ?>
    <div class="alert alert-danger container" data-flashdata="<?= $this->session->flashdata('peringatan'); ?>">
        <?= $_SESSION['peringatan']; ?>
    </div>
<?php endif; ?>
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
                                $hari = date('Y-m-d');
                                $time = date('H.i');
                                ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo site_url('Sewa/coba_sewa') ?>" id="hidden-hari"
                                style="display: none;">
                                <center>
                                    <input type="hidden" name="lapangan" value="<?php echo $lapangan->id_lapangan; ?>">
                                    <input type="hidden" name="tgl" value="<?php echo $hari; ?>">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $hari = date('Y-m-d');
                                    $time = date('H.i');
                                    foreach ($jam as $val) {
                                        $part = explode("-", $val->jam);
                                        $found = false;
                                        foreach ($sewa as $key) {
                                            foreach ($data_sewa as $dat) {
                                                if ($key->id_sewa == $dat->id_sewa) {
                                                    $tgal = $key->tanggal;
                                                    if ($tgal == $hari && $val->id_jam == $dat->id_jam) {
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        if (!$found && $part[0] >= $time) {
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="jam[]" value="' . $val->id_jam . '">';
                                            echo '<label class="form-check-label"><button class="btn btn-primary" disabled>' . $val->jam . '</button></label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    <button type="submit" class="btn btn-primary mt-3 tombolkirim">Submit</button>
                                </center>
                            </form>
                        </div>
                        <button type="button" id="hari" class="btn btn-primary">Lihat Jadwal</button>
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
                                        if (isset($tgl)) { ?>
                                            <input type="date" class="form-control datepicker" name="tanggal_input"
                                                value="<?php echo $tgl; ?>">
                                        <?php } else { ?>
                                            <input type="date" class="form-control datepicker" name="tanggal_input"
                                                required>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Cek
                                            Jadwal</button>
                                    </div>
                                    <div class="col"></div>
                                </div><br>
                                <div class="row">
                                    <center>
                                        <h4>
                                            <?php
                                            if (isset($tgl)) {
                                                echo date('d-m-Y', strtotime($tgl));
                                            } else {
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
                                <form class="form" method="POST" action="<?php echo site_url('Sewa/coba_sewa') ?>">
                                    <center>
                                        <?php
                                        foreach ($jam as $val) {

                                            //inisialisasi variabel found
                                            $found = false;
                                            foreach ($sewa as $key) {
                                                foreach ($data_sewa as $dat) {
                                                    if ($key->id_sewa == $dat->id_sewa) {
                                                        $tagl = $key->tanggal;
                                                        if ($tagl == $tgl && $val->id_jam == $dat->id_jam) {
                                                            // Jika data jam ditemukan di dalam data sewa, maka set variabel $found menjadi true
                                                            $found = true;
                                                            break; // keluar dari loop $sewa karena sudah ditemukan
                                                        }
                                                    }
                                                }
                                            }

                                            // tampilkan button
                                            if ($found) {
                                                ?>

                                                <?php
                                            } else {
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" name="jam[]" value="' . $val->id_jam . '">';
                                                echo '<label class="form-check-label"><button class="btn btn-primary" disabled>' . $val->jam . '</button></label>';
                                                echo '</div>';
                                                ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="lapangan" value="<?php echo $lapangan->id_lapangan; ?>">
                                        <input type="hidden" name="tgl" value="<?php echo $tgl; ?>"><br>
                                        <button type="submit" class="btn btn-primary tombolkirim">Submit</button>
                                    </center>
                                </form>

                            <?php } else {
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
</div>



<br><br>

<br><br>
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
<script>
    // Fungsi untuk menghilangkan pesan peringatan setelah lima detik
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 5000); // 5000 milidetik = 5 detik
</script>
<?php if ($this->session->flashdata('flash')): ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="color: red;">Jadwal</h4>
                        <p style="color: #000;" class="mb-4"><b>Data Jadwal</b></p>
                    </div>
                    <div class="col">
                        <form class="form mt-5" method="POST"
                            action="<?php echo site_url('admin/Adminpanel/jadwalcari/') ?>">
                            <div class="row">
                                <input type="hidden" name="id_lapangan" value="<?php //echo $lapangan->id_lapangan; ?>">
                                <div class="col-md-6">
                                    <?php
                                    if (isset($tgl)) { ?>
                                        <input type="date" class="form-control datepicker" name="tanggal_input"
                                            value="<?php echo $tgl; ?>">
                                    <?php } else { ?>
                                        <input type="date" class="form-control datepicker" name="tanggal_input" required>
                                    <?php }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <button style="font-size: 14px;" type="submit" class="btn btn-primary">Cek
                                        Jadwal</button>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <?php foreach ($lapangan as $lap) { ?>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#<?php echo 'collapse_' . $lap->id_lapangan; ?>" aria-expanded="true"
                                aria-controls="collapseOne">
                                <?php echo $lap->nm_lapangan ?>
                            </button>
                        </h2>
                    </div>

                    <div id="<?php echo 'collapse_' . $lap->id_lapangan; ?>" class="collapse show"
                        aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php //$id = $lapangan->id_lapangan; ?>
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 style="text-align:center; font-size: 18px;" class="mt-3 mb-3">
                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $hari_ini = date('d-m-Y');
                                                        echo 'Hari Ini <br>' . $hari_ini;
                                                        ?>
                                                    </h4>
                                                </div>
                                                <div class="card-body">
                                                    <!-- <table class="table"> -->
                                                    <table class="table" id="hidden-hari">
                                                        <tbody>
                                                            <?php
                                                            date_default_timezone_set('Asia/Jakarta');
                                                            $hari = date('Y-m-d');
                                                            foreach ($jam as $val) {
                                                                //inisialisasi variabel found
                                                                $found = false;
                                                                foreach ($sewa as $key) {
                                                                    $tgal = $key->tanggal;
                                                                    if ($tgal == $hari && $val->id_jam == $key->id_jam && $key->id_lapangan == $lap->id_lapangan) {
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
                                                                            <button class="btn btn-danger btn-sm rounded-pill"
                                                                                disabled>
                                                                                <?php echo $val->jam; ?>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-primary btn-sm rounded-pill">
                                                                                <?php echo $val->jam; ?>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- <button type="button" id="hari" class="btn btn-primary">Lihat
                                                    Jadwal</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    <center>
                                                        <h4 class="mt-4 mb-4" style="font-size: 18px;">
                                                            <?php
                                                            if (isset($tgl)) {
                                                                echo date('d-m-Y', strtotime($tgl));
                                                            } else {

                                                            }
                                                            ?>
                                                        </h4>
                                                    </center>
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
                                                                        if ($tagl == $tgl && $val->id_jam == $key->id_jam && $key->id_lapangan == $lap->id_lapangan) {
                                                                            // Jika data jam ditemukan di dalam data sewa, maka set variabel $found menjadi true
                                                                            $found = true;
                                                                            break; // keluar dari loop $sewa karena sudah ditemukan
                                                                        }
                                                                    }
                                                                    // tampilkan button
                                                                    if ($found) {
                                                                        ?>
                                                                        <tr>
                                                                            <td class=" text-center">
                                                                                <button class="btn btn-danger btn-sm rounded-pill"
                                                                                    disabled>
                                                                                    <?php echo $val->jam; ?>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                <button class="btn btn-primary btn-sm rounded-pill">
                                                                                    <?php echo $val->jam; ?>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
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
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mx-auto">
                    <div class="row">
                        <div class="col-md-9">
                            <p style="color: #000;" class="mb-4"><b>Data Jam</b></p>
                        </div>
                        <div class="col"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($jadwal as $lap) {
                        $idp = $lap->id_jam; ?>
                        <tr>
                            <td>
                                <?php echo $idp; ?>
                            </td>
                            <td>
                                <?php echo $lap->jam; ?>

                            </td>
                            <td>
                                <?php echo $lap->harga; ?>
                            </td>
                            <td><a class="btn btn-outline-dark" href="" data-toggle="modal"
                                    data-target="#ModalEdit<?php echo '_' . $idp; ?>"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?php echo '_' . $idp; ?>" tabindex="-1"
                            aria-labelledby="ModalJadwalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Harga
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="POST"
                                            action="<?php echo site_url('admin/Adminpanel/edit_jadwal'); ?>">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">ID</label>
                                                <input type="text" class="form-control" name="id_jam"
                                                    value="<?php echo $lap->id_jam; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Harga</label>
                                                <input type="text" class="form-control" name="harga"
                                                    value="<?php echo $lap->harga; ?>">
                                            </div>


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
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
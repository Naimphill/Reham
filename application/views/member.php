<br><br><br><br><br>
<div class="container">
    <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <div class="row">
                <center>
                    <h2>Menu Member</h2>
                </center>
            </div>
        </div>
    </div>
    <div class="card">
        <?php if (count($sewa) == 0) { ?>
            <div class="card-header">
                <center>
                    <h2 class="card-title">Sewa Bulanan</h2>
                </center>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-5">
                        <form class="form" method="POST" action="<?php echo site_url('Sewa/member_sewa') ?>">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1">Tanggal Mulai</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control datepicker" name="tanggal" required>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1">Pilih Lapangan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <?php foreach ($lapangan as $lap) { ?>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="id_lapangan"
                                                            value="<?php echo $lap->id_lapangan; ?>" required>
                                                        <label class="form-check-label">
                                                            <?php echo $lap->nm_lapangan; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1">Jam Main</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <?php foreach ($jam as $key) {
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" name="jam[]" value="' . $key->id_jam . '">';
                                                echo '<label class="form-check-label">' . $key->jam . '</label>';
                                                echo '</div>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span>*Sesuaikan Tanggal berdasarkan Hari<br>*Boking ini akan berlaku untuk 30 hari
                                kedepan</span>
                            <button type="submit" class="btn btn-block btn-primary tombolkirim">Booking</button>

                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>



        <?php } else {
            $blm = 0;
            foreach ($sewa as $item) {
                if ($item->status == 'Belum Main') {
                    $blm++;
                }
            }
            if ($blm == 0) { ?>
                <div class="card-header">
                    <center>
                        <h2 class="card-title">Sewa Bulanan</h2>
                    </center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 mt-5">
                            <form class="form" method="POST" action="<?php echo site_url('Sewa/member_sewa') ?>">
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlInput1">Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control datepicker" name="tanggal" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlInput1">Pilih Lapangan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <?php foreach ($lapangan as $lap) { ?>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="id_lapangan"
                                                                value="<?php echo $lap->id_lapangan; ?>" required>
                                                            <label class="form-check-label">
                                                                <?php echo $lap->nm_lapangan; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlInput1">Jam Main</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-check">
                                                <?php foreach ($jam as $key) {
                                                    echo '<div class="form-check">';
                                                    echo '<input class="form-check-input" type="checkbox" name="jam[]" value="' . $key->id_jam . '">';
                                                    echo '<label class="form-check-label">' . $key->jam . '</label>';
                                                    echo '</div>';
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span>*Sesuaikan Tanggal berdasarkan Hari<br>*Boking ini akan berlaku untuk 30 hari
                                    kedepan</span>
                                <button type="submit" class="btn btn-block btn-primary tombolkirim">Booking</button>

                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
        <?php } ?>
        <div class="card mt-5 p-2">
            <div class="card-body">
                <div class="card bg-success m-5">
                    <div class="card-body">
                        <center>
                            <h2>Jadwal Selanjutnya :
                                <?php foreach ($sewa as $haha) {
                                    echo $haha->tanggal;
                                    break;
                                } ?>
                                <?php ?>
                            </h2>
                        </center>

                    </div>
                </div>
                <table id="myTable" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Booking</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Status</th>
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
                                                    ?>
                                                    <?php echo $val->jam . "<br>"; ?>
                                                <?php }
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $key->status; ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('Sewa/detail_sewa/' . $key->id_sewa); ?>"
                                        class="btn btn-primary">Detail</a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>

<br><br><br><br>
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
                                            <a href="<?php echo site_url('Sewa/jadwal/' . $id); ?>"
                                                class="btn btn-primary">Lihat
                                                Jadwal</a>
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
    </div>
</div>

<br><br><br><br>
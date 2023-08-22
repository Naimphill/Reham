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
                        <?php foreach ($lapangan as $index => $lap) {
                            $id = $lap->id_lapangan;
                            $carouselId = "myCarousel" . $index; // Buat id carousel unik
                            ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <div id="<?php echo $carouselId; ?>" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100"
                                                            src="<?php echo base_url('/upload_gambar/' . $lap->foto); ?>"
                                                            alt="Slide 1">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="<?php echo base_url('/upload_gambar/' . $lap->foto2); ?>"
                                                            alt="Slide 2">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#<?php echo $carouselId; ?>"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#<?php echo $carouselId; ?>"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <h4><b>
                                                    <?php echo $lap->nm_lapangan; ?>
                                                </b>
                                                <p class="card-text">Bahan Interlock, Lampu, Bola, Gawang</p>
                                            </h4>
                                            <a href="<?php echo site_url('Sewa/jadwal/' . $id); ?>"
                                                class="btn btn-primary">Lihat Jadwal</a>
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
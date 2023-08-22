<?php if ($this->session->flashdata('flash')): ?>
    <div class="flash-login" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="main-banner wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="">
                                <div class="col-lg-12">
                                    <h2>Lapangan Terbaik Dengan Harga Menarik</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-green-button scroll-to-section">
                                        <a href="<?php echo site_url('Sewa') ?>">Sewa Lapangan <i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo base_url('assets/template/assets/images/banner-right-image.png') ?>"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Fasilitas Kami</h6>
                    <h2><em>Fasilitas</em> yang kami <span>Sediakan</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/1.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 1</h4>
                                        </a>
                                        <span>Papan Nama</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/2.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 2</h4>
                                        </a>
                                        <span>Tempat Parkir</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/3.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 3</h4>
                                        </a>
                                        <span>Ruang Admin dan Penjaga</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/4.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 4</h4>
                                        </a>
                                        <span>Kantin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/5.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 5</h4>
                                        </a>
                                        <span>Tempat Tunggu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/6.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 6</h4>
                                        </a>
                                        <span>Bola</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/7.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 7</h4>
                                        </a>
                                        <span>Papan Skor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/8.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 8</h4>
                                        </a>
                                        <span>Bench Pemain Pengganti</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/9_1.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 9-1</h4>
                                        </a>
                                        <span>Toilet 1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/9_2.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 9-2</h4>
                                        </a>
                                        <span>Toilet 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/10_1.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 10-1</h4>
                                        </a>
                                        <span>Mushola 1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/10_2.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 10-2</h4>
                                        </a>
                                        <span>Mushola 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/10_3.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 10-3</h4>
                                        </a>
                                        <span>Mushola 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/11_1.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 11-1</h4>
                                        </a>
                                        <span>Lapangan 1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/11_2.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 11-2</h4>
                                        </a>
                                        <span>Lapangan 1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/12_1.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 12-1</h4>
                                        </a>
                                        <span>Lapangan 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img style="width:100%;height:100%; max-width:450px; max-height:450px;"
                                    src="<?php echo base_url('assets/gambar_fasilitas/12_2.jpg') ?>" alt="">
                                <div class="hover-content">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4>Fasilitas 12-2</h4>
                                        </a>
                                        <span>Lapangan 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
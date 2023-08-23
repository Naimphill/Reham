<?php if ($this->session->flashdata('flash-login')): ?>
        <div class="flash-login" data-flashdata="<?= $this->session->flashdata('flash-login'); ?>"></div>
        <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<?php if ($this->session->flashdata('flash-data')): ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-data'); ?>"></div>
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

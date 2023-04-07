<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <title>Reham Futsal</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/assets/images/logo.png'); ?>" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Panggil file CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Panggil file CSS untuk Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/templatemo-seo-dream.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/animated.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/owl.css') ?>">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.min.css'); ?>">
    <!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?php echo site_url('Dashboard') ?>" class="logo">
                            <h4><img src="<?php echo base_url('assets/assets/images/logo.png') ?>"" alt="">Reham Futsal</h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class=" nav">
                                <li class="scroll-to-section"><a href="<?php echo site_url('Dashboard') ?>">Beranda</a>
                                </li>
                                <li class="scroll-to-section"><a href="<?php echo site_url('Sewa') ?>">Sewa</a>
                                </li>
                                <li class="scroll-to-section"><a href="#kontak">Kontak</a></li>
                                </li>
                                <?php if (!empty($this->session->userdata('id_pelanggan'))) { ?>
                                    <li class="scroll-to-section"><a href="<?php echo site_url('Sewa/riwayat') ?>">Riwayat
                                            Boking</a>
                                    <li class="scroll-to-section btn btn-danger btn-sm"><a class="tombolhapus"
                                            href="<?php echo site_url('login/logout'); ?>">Logout</a></li>
                                <?php } else { ?>
                                    <li class="scroll-to-section btn btn-outline-light btn-sm"><a
                                            href="<?php echo site_url('login'); ?>">Masuk</a></li>
                                <?php } ?>
                                <li class="scroll-to-section"></li>
                                </ul>
                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <?php $this->load->view($content); ?>


    <footer class="bg-danger">
        <div id="kontak" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <br><br>
                        <h2 style="color:#fff;" align="center">Kontak Kami</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.4699044619956!2d110.43904715176934!3d-7.07138943650598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708eba4fc35a69%3A0xce6f219e042f0f71!2sReham%20Futsal%20Arena!5e0!3m2!1sid!2sid!4v1680707674821!5m2!1sid!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card text-dark bg-light mb-3 border border-3 border-light rounded-3">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                        <ul>
                                            <li><b>Lokasi :</b><br><span>Jl. Mulawarman Sel. Dalam I, Kramas,
                                                    Kec. Tembalang, Kota Semarang, Jawa Tengah 50278</span><br></li><br>
                                            <li><b>Telp:</b><br><span>+62 856-4000-5904</span></li><br>
                                            <li><b>Jam Buka:</b><br><span>09.00 - 00.00 <em>Setiap Hari</em></span></li>
                                            <br>
                                            <li><b>WhatsApp</b><br><span>

                                                    <a class="btn btn-lg btn-success"
                                                        href="https://wa.me/6285640005904?text=Halo,%20Saya%20ingin%20bertanya%20tentang%20lapangan !"
                                                        target="_blank"><i class="fa fa-whatsapp"></i></a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <p style="color:#fff ;">Copyright © 2023 Naimphill.
                        <br>Web Designed by <a rel="nofollow" href="https://www.instagram.com/naimphill_19/"
                            title="Instagram">Naimphill</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/owl-carousel.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/animation.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/imagesloaded.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/custom.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Panggil file JavaScript untuk Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Sweet Alert Script -->
    <script src="<?php echo base_url('assets/allert/package/dist/sweetalert2.all.min.js'); ?>"></script>

    <script>
        const flashData = $('.flash-login').data('flashdata');

        if (flashData) {
            Swal.fire({
                title: 'Maaf',
                text: 'Anda ' + flashData,
                icon: 'warning'
            });
        }
        const flashsalah = $('.flash-salah').data('flashdata');

        if (flashsalah) {
            Swal.fire({
                title: 'Maaf',
                text: flashsalah,
                icon: 'warning'
            });
        }

        const flashPembayaran = $('.flash-Pembayaran').data('flashdata');

        if (flashPembayaran) {
            Swal.fire({
                title: 'Data Pemesanan',
                text: 'Behasil ' + pembayaran,
                icon: 'success'
            });
        }

        // Tombol Hapus
        $('.tombolhapus').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Kamu Yakin?',
                text: "Akan Keluar ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'keluar !',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        // Tombol Hapus
        $('.tombolkirim').on('click', function (e) {
            e.preventDefault();
            const form = $(this).closest('form');

            Swal.fire({
                title: 'Kamu Yakin?',
                text: "Akan Mem-boking ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Boking !',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit form jika tombol "OK" ditekan
                }
            })
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
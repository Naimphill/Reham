<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reham Futsal</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/assets/images/logo.png'); ?>" />
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-q2E+U6S9XBXQ3qy3lnYtu+yRRkzDRDtkRdqMw+m05nFl+VvHKTGg9PQq40q3YOsHm+tEJ6lDmiOEvZwKfHde7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/admin/css/bootstrap-icons.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/admin/css/templatemo-barber-shop.css') ?>" rel="stylesheet">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.min.css'); ?>">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    <!--

TemplateMo 585 Barber Shop

https://templatemo.com/tm-585-barber-shop

-->
    <style>
        a.hover-nav:hover {
            color: #000;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse p-0 bg-danger">

                <div
                    class="position-sticky sidebar-sticky d-flex flex-column justify-content-center align-items-center">
                    <a class="navbar-brand" href="<?php echo site_url('admin/Adminpanel') ?>">
                        <img src="<?php echo base_url('assets/assets/images/logo.png') ?>" class="logo-image img-fluid"
                            align="">
                    </a>

                    <ul class="nav flex-column">

                        <li class="nav-item mb-3">
                            <a class="hover-nav" style="color:#fff;"
                                href="<?php echo site_url('admin/Adminpanel'); ?>">AdminPanel</a>
                        </li>

                        <li class="nav-item">
                            <a class="hover-nav mb-3" style="color:#fff;" data-toggle="collapse" href="#ui-basic"
                                aria-expanded="false" aria-controls="ui-basic">
                                <span>Kelola Data <i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item mb-3">
                                        <a class="hover-nav" style="color:#fff;"
                                            href="<?php echo site_url('admin/Adminpanel/pelanggan'); ?>">Data
                                            Pelanggan</a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="hover-nav" style="color:#fff;"
                                            href="<?php echo site_url('admin/Adminpanel/lapangan'); ?>">Data
                                            Lapangan</a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="hover-nav" style="color:#fff;"
                                            href="<?php echo site_url('admin/Adminpanel/jadwal'); ?>">Data
                                            Jadwal</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="hover-nav mb-3" style="color:#fff;" data-toggle="collapse" href="#data-pesanan"
                                aria-expanded="false" aria-controls="ui-basic">
                                <span>Kelola Data Pesanan<i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="data-pesanan">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item mb-3">
                                        <a class="hover-nav" style="color:#fff;"
                                            href="<?php echo site_url('admin/Adminpanel/sewa'); ?>">Data
                                            Sewa</a>
                                    </li>

                                    <li class="nav-item mb-3">
                                        <a class="hover-nav" style="color:#fff;"
                                            href="<?php echo site_url('admin/Adminpanel/laporan_sewa'); ?>">Laporan
                                            Sewa</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- <li class="nav-item mb-3">
                            <a class="hover-nav" style="color:#fff;"
                                href="<?php //echo site_url('admin/Adminpanel/pengguna'); ?>">Data Pengguna</a>
                        </li> -->

                    </ul>
                </div>
            </nav>



            <!-- panggil halaman utama -->
            <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-md-8"></div>
                        <div class="col">
                            <div class="text-center">
                                <img style="width:50px ; height: 50px;"
                                    src="<?php echo base_url('assets/assets/images/logo.png') ?>"
                                    class="rounded float-right" alt="">
                                <?php echo $this->session->userdata('username'); ?>
                                <a class="btn btn-outline-secondary tombolkeluar"
                                    href="<?php echo site_url('admin/login/logout') ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view($content); ?>
            </div>

            <!-- JAVASCRIPT FILES -->
            <script src="<?php echo base_url('assets/admin/js/jquery.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/admin/js/click-scroll.js') ?>"></script>
            <script src="<?php echo base_url('assets/admin/js/custom.js') ?>"></script>
            <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <!-- Datatables -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>
            <!-- Sweet Alert Script -->
            <script src="<?php echo base_url('assets/allert/package/dist/sweetalert2.all.min.js'); ?>"></script>
            <script>
                const flashLogin = $('.flash-data').data('flashdata');

                if (flashLogin) {
                    Swal.fire({
                        title: 'Data',
                        text: flashLogin + 'Behasil ',
                        icon: 'success'
                    });
                }

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

                // Tombol Keluar
                $('.tombolkeluar').on('click', function (e) {
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
                $('.tombolhapus').on('click', function (e) {
                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Kamu Yakin?',
                        text: "Data Akan Dihapus !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus !',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                        }
                    })
                });
                $('.tombolkirim').on('click', function (e) {
                    e.preventDefault();
                    const form = $(this).closest('form');

                    Swal.fire({
                        title: 'Kamu Yakin?',
                        text: "Akan Menghapus ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus !',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // submit form jika tombol "OK" ditekan
                        }
                    })
                });
            </script>
</body>

</html>
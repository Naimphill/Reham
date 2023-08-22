<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/fontawesome.css') ?>">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/allert/package/dist/sweetalert2.min.css'); ?>">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #cc0000 0%, #800000 100%);
            background-color: rgba(255, 255, 255, 0.5);
            color: aliceblue;
        }

        .form-control:focus {
            box-shadow: none;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <?php if ($this->session->flashdata('flash')): ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('salah')): ?>
        <div class="flash-salah" data-flashdata="<?= $this->session->flashdata('salah'); ?>"></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <h3 class="text-center mb-4">Login</h3>
                <form method="POST" action="<?php echo site_url('login/aksi_login') ?>">
                    <div class="form-group mb-3">
                        <label for="username"><b>Username</b></label>
                        <input type="text" class="form-control rounded-3" name="username" id="username"
                            placeholder="Enter your username" required="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password"><b>Password</b></label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter your password" required="">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button" onclick="togglePasswordVisibility()"
                                    id="button-addon2"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4"><b>Login</b></button>
                    <br>
                    <p style="color:#000 ;">Don't have an account? <a style="color: #fff;"
                            href="<?php echo site_url('Login/register') ?>"><b>Sign Up</b></a>
                    </p>
                </form>

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Sweet Alert Script -->
    <script src="<?php echo base_url('assets/allert/package/dist/sweetalert2.all.min.js'); ?>"></script>
    <!-- Custom JS -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordVisibilityIcon = document.querySelector("#password + .input-group-append .input-group-text i");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordVisibilityIcon.classList.remove("fa-eye-slash");
                passwordVisibilityIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordVisibilityIcon.classList.remove("fa-eye");
                passwordVisibilityIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        if (flashData) {
            Swal.fire({
                title: 'Data',
                text: 'Behasil ' + flashData,
                icon: 'success'
            });
        }

    </script>
    <script>
        const flashsalah = $('.flash-salah').data('flashdata');

        if (flashsalah) {
            Swal.fire({
                title: 'Maaf',
                text: flashsalah,
                icon: 'warning'
            });
        }

    </script>

</body>

</html>
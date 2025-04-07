<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <!-- Original URL: https://themesbrand.com/velzon/html/master/auth-signin-cover.html
Date Downloaded: 11/10/2024 1:25:56 pm !-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta charset="utf-8" />
    <title>Sign In | DTG BOHOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/download.png'); ?>" />

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/js/layout.js'); ?>"></script>

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css -->
    <link href="<?= base_url('assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/custom.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .auth-one-bg {
            background-image: url('<?php echo base_url("assets/images/tasius.jpg"); ?>');
            /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>

<body>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">

                                            </div>
                                            <div class="mt-auto">



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">𝐖𝐞𝐥𝐜𝐨𝐦𝐞 𝐁𝐚𝐜𝐤 !</h5>
                                            <p class="text-muted">𝐒𝐢𝐠𝐧 𝐢𝐧 𝐭𝐨 𝐜𝐨𝐧𝐭𝐢𝐧𝐮𝐞 __ .</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="<?= base_url('Auth_Ctrl/login'); ?>" method="POST">
                                                <div class="form-image text-center">
                                                    <img src="<?= base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>" alt="Logo"
                                                        width="400" height="160">
                                                </div>

                                                <?php if ($this->session->flashdata('error')): ?>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Error',
                                                                text: '<?= $this->session->flashdata('error'); ?>',
                                                                confirmButtonColor: '#d33',
                                                                confirmButtonText: 'OK'
                                                            });
                                                        });
                                                    </script>
                                                <?php endif; ?>


                                                <div class="mb-3">
                                                    <label for="username" class="form-label">
                                                        <i class="fas fa-user"></i> 𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞
                                                    </label>
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="Enter your username" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">
                                                        <i class="fas fa-lock"></i> 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password-input" placeholder="Enter your password"
                                                            required>
                                                        <span class="input-group-text" id="toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <script>
                                                    document.getElementById("toggle-password").addEventListener("click", function () {
                                                        var passwordInput = document.getElementById("password-input");
                                                        var icon = this.querySelector("i");
                                                        if (passwordInput.type === "password") {
                                                            passwordInput.type = "text";
                                                            icon.classList.remove("fa-eye");
                                                            icon.classList.add("fa-eye-slash");
                                                        } else {
                                                            passwordInput.type = "password";
                                                            icon.classList.remove("fa-eye-slash");
                                                            icon.classList.add("fa-eye");
                                                        }
                                                    });
                                                </script>




                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="auth-remember-check">
                                                    <label class="form-check-label"
                                                        for="auth-remember-check">𝐑𝐞𝐦𝐞𝐦𝐛𝐞𝐫 𝐦𝐞
                                                    </label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">
                                                        <i class="fas fa-sign-in-alt"></i> 𝐒𝐢𝐠𝐧 𝐈𝐧
                                                    </button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">
                                                𝐃𝐨𝐧'𝐭 𝐡𝐚𝐯𝐞 𝐚𝐧 𝐚𝐜𝐜𝐨𝐮𝐧𝐭 ?
                                                <a href="<?= base_url('Auth_Ctrl/register_view') ?>"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    𝐒𝐢𝐠𝐧𝐮𝐩
                                                </a>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer galaxy-border-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> BOHOL WEB-BASED DIGITAL
                                TOURISM GUIDE <i class="mdi mdi-heart text-danger"></i> by GROUP WAILHI
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/plugins/lord-icon-2.1.0.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>

    <!-- Validation Init -->
    <script src="<?php echo base_url('assets/js/pages/form-validation.init.js'); ?>"></script>

    <!-- Password Create Init (Fix Typo in Filename) -->
    <script src="<?php echo base_url('assets/js/pages/password-create.init.js'); ?>"></script>

</body>

</html>
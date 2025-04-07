<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <!-- Original URL: https://themesbrand.com/velzon/html/master/auth-signup-cover.html
Date Downloaded: 11/10/2024 1:25:56 pm !-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta charset="utf-8" />
    <title>Sign Up | DTG BOHOL </title>
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
            background-image: url('<?php echo base_url("assets/images/baclayon-church-in-bohol.jpg"); ?>');
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
                        <div class="card overflow-hidden m-0 card-bg-fill galaxy-border-none">
                            <div class="row justify-content-center g-0">
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

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">𝐑𝐞𝐠𝐢𝐬𝐭𝐞𝐫 𝐀𝐜𝐜𝐨𝐮𝐧𝐭 </h5>
                                        </div>

                                        <div class="mt-4">
                                            <form class="needs-validation" novalidate=""
                                                action="<?= base_url('Auth_Ctrl/process_register'); ?>" method="post">
                                                <div class="form-image text-center">
                                                    <img src="<?= base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>"
                                                        alt="Logo" width="400" height="160">
                                                </div>

                                                <!-- Flash Messages -->
                                                <?php if ($this->session->flashdata('success')): ?>
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Success',
                                                            text: "<?= $this->session->flashdata('success'); ?>",
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'OK'
                                                        });
                                                    </script>
                                                <?php elseif ($this->session->flashdata('error')): ?>
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: "<?= $this->session->flashdata('error'); ?>",
                                                            confirmButtonColor: '#d33',
                                                            confirmButtonText: 'OK'
                                                        });
                                                    </script>
                                                <?php endif; ?>

                                                <!-- Full Name Field -->
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        <i class="fas fa-user"></i> 𝐅𝐮𝐥𝐥 𝐍𝐚𝐦𝐞 <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Enter first name, last name, middle name"
                                                        required />
                                                    <div class="invalid-feedback">Please enter Name</div>
                                                </div>

                                                <!-- Username Field -->
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">
                                                        <i class="fas fa-user"></i> 𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞 <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Enter username" required />
                                                    <div class="invalid-feedback">Please enter username</div>
                                                </div>

                                                <!-- Password Field (Updated - No Validation) -->
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">
                                                        <i class="fas fa-lock"></i> 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝 <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            id="password" name="password" placeholder="Enter password"
                                                            required />
                                                        <span
                                                            class="position-absolute end-0 top-50 translate-middle-y me-3"
                                                            onclick="togglePassword()" style="cursor: pointer;">
                                                            <i id="toggleIcon" class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">
                                                        <i class="fas fa-user-circle"></i> 𝐑𝐨𝐥𝐞 <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-select" id="role" name="role" required>
                                                        <option value="" disabled selected>Select a role</option>
                                                        <option value="Tourist">Tourist</option>
                                                        <option value="Business Owner"> Business Owner</option>
                                                    </select>
                                                </div>


                                                <!-- Submit Button -->
                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">
                                                        <i class="fas fa-user-plus"></i> 𝐒𝐢𝐠𝐧 𝐔𝐩
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">𝐀𝐥𝐫𝐞𝐚𝐝𝐲 𝐡𝐚𝐯𝐞 𝐚𝐧 𝐚𝐜𝐜𝐨𝐮𝐧𝐭?
                                                <a href="<?= base_url('Auth_Ctrl/login_view') ?>"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    𝐒𝐢𝐠𝐧 𝐢𝐧
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                TOURISM GUIDE <i class="mdi mdi-heart text-danger"></i> by BSCS-4
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
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/plugins/lord-icon-2.1.0.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins.js'); ?>"></script>

    <!-- Validation Init -->
    <script src="<?= base_url('assets/js/pages/form-validation.init.js'); ?>"></script>
    <!-- Password Create Init -->
    <script src="<?= base_url('assets/js/pages/password-create.init.js'); ?>"></script>


    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta charset="utf-8" />
    <title>BOHOL WED-BASED DIGITAL TOURISM GUIDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/download.png'); ?>" />

    <!-- jsvectormap css -->
    <link href="<?= base_url('assets/libs/jsvectormap/css/jsvectormap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Swiper slider css -->
    <link href="<?= base_url('assets/libs/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- App Css -->
    <link href="<?= base_url('assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/custom.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add these script references -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


    <style>
        .swiper {
            width: 100%;
            height: 350px;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>

</head>

<body>
    <?php
    $user_id = $this->session->userdata("dgt_user");
    if (isset($user_id)) {
        $user = $this->Auth_model->get_user_by_user_id($user_id);
    }
    ?>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <!-- <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/barangay-removebg-preview.png'); ?>" alt=""
                                        height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/barangay-removebg-preview.png'); ?>" alt=""
                                        height="17" />
                                </span>

                            </a> -->

                            <!-- <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/barangay-removebg-preview.png'); ?>" alt=""
                                        height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/barangay-removebg-preview.png'); ?>" alt=""
                                        height="17" />
                                </span>

                            </a> -->
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username" />
                                            <button class="btn btn-primary" type="submit">
                                                <i class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-category-alt fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                                <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fw-semibold fs-15">View images.</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="btn btn-sm btn-soft-info">
                                                View All images
                                                <i class="ri-arrow-right-s-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>




                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class="bx bx-fullscreen fs-22"></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class="bx bx-moon fs-22"></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="<?php echo (isset($user->photo) && $user->photo)
                                            ? base_url($user->photo)
                                            : 'https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg'; ?>"
                                        alt="Header Avatar" style="width: 35px; height: 35px;"
                                        onerror="this.src='https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg';" />

                                    <span class="text-start ms-xl-2">
                                        <?php if ($this->session->userdata('name')): ?>
                                            <div class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"
                                                style="margin-right: 5px; color: black;">
                                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                                    𝐇𝐨𝐰𝐝𝐲!
                                                    <?php echo $this->session->userdata('name'); ?>
                                                </span>
                                                <span
                                                    class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= isset($user->role) ? $user->role : 'N/A' ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">hello
                                    <?= isset($user->username) ? $user->username : 'N/A' ?> ツ
                                </h6>
                                <a class="dropdown-item" href="<?php echo base_url('Auth_Ctrl/Settings'); ?>"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Profile </span></a>
                                <a class="dropdown-item" href="<?php echo base_url('Auth_Ctrl/Settings'); ?>"><span
                                        class="badge bg-success-subtle text-success mt-1 float-end">New </span><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Settings </span></a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="confirmLogout();">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmLogout() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will be logged out.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Logout",
                    customClass: {
                        confirmButton: "btn btn-danger btn-md",
                        cancelButton: "btn btn-primary btn-md"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo base_url('Auth_Ctrl/logout'); ?>";
                    }
                });
            }

        </script>
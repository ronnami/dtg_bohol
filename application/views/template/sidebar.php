<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>" alt="Small Logo"
                    height="22" />
            </span>
            <span class="logo-lg">
                <img src="<?php echo base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>" alt="Large Logo"
                    height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>" alt=""
                    height="30" />
            </span>
            <span class="logo-lg">
                <img src="<?php echo base_url('assets/images/bohol_back__1_-removebg-preview.png'); ?>" alt=""
                    height="180px" width="220px" />
            </span>

        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>


    <?php
    $user_id = $this->session->userdata("dgt_user");
    if (isset($user_id)) {
        $user = $this->Auth_model->get_user_by_user_id($user_id);
    }
    ?>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu </span></li>
                <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin' || $user->role == 'Department Of Tourism'): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/dashboard') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/dashboard'); ?>">
                            <i class="fas fa-tachometer-alt"></i> <span>Dashboards</span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($user->role == 'Tourist' || $user->role == 'Business Owner'): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/Images') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/Images'); ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <span data-key="t-apps">Dashboard </span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/dtg_upload') ? 'active' : ''; ?>"
                        href="<?php echo site_url('Admin_Ctrl/dtg_upload'); ?>">
                        <i class="fas fa-info-circle"></i>
                        <span data-key="t-apps">Tourist Spots </span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-sm flex-column">
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/Business') ? 'active' : ''; ?>"
                        href="<?php echo site_url('Admin_Ctrl/Business'); ?>">
                        <i class="fas fa-briefcase"></i>
                        <span data-key="t-apps"> Business </span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-sm flex-column">
                        </ul>
                    </div>
                </li>

                <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin' || $user->role == 'Business Owner' || $user->role == 'Department Of Tourism'): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/add_business') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/add_business'); ?>">
                            <i class="fas fa-briefcase"></i>
                            <span data-key="t-apps">Add Business </span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if ($user->role == 'Department Of Tourism' || $user->role == 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/Admin') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/Admin'); ?>">
                            <i class="fas fa-users"></i> <span>User List</span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin' || $user->role == 'Department Of Tourism'): ?>

                    <?php
                    $current_controller = $this->router->fetch_class();
                    $current_method = $this->router->fetch_method();
                    $is_reports = in_array($current_controller . '/' . $current_method, [
                        'Admin_Ctrl/business_reports',
                        'Admin_Ctrl/Hidden_gem_reports',
                        'Admin_Ctrl/User_list_reports',
                        'Admin_Ctrl/municipality_spots_reports'
                    ]);
                    ?>

                    <li class="nav-item">
                        <a class="nav-link menu-link <?= $is_reports ? '' : 'collapsed' ?>" href="#sidebarLanding"
                            data-bs-toggle="collapse" role="button" aria-expanded="<?= $is_reports ? 'true' : 'false' ?>"
                            aria-controls="sidebarLanding">
                            <i class="fas fa-file-alt"></i>
                            <span data-key="t-landing">Reports</span>
                        </a>
                        <div class="collapse menu-dropdown <?= $is_reports ? 'show' : '' ?>" id="sidebarLanding">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= site_url('Admin_Ctrl/business_reports') ?>"
                                        class="nav-link <?= ($current_controller == 'Admin_Ctrl' && $current_method == 'business_reports') ? 'active' : '' ?>">
                                        Business Unit Reports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('Admin_Ctrl/Hidden_gem_reports') ?>"
                                        class="nav-link <?= ($current_controller == 'Admin_Ctrl' && $current_method == 'Hidden_gem_reports') ? 'active' : '' ?>">
                                        Hidden Gems Reports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('Admin_Ctrl/User_list_reports') ?>"
                                        class="nav-link <?= ($current_controller == 'Admin_Ctrl' && $current_method == 'User_list_reports') ? 'active' : '' ?>">
                                        User List Reports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('Admin_Ctrl/municipality_spots_reports') ?>"
                                        class="nav-link <?= ($current_controller == 'Admin_Ctrl' && $current_method == 'municipality_spots_reports') ? 'active' : '' ?>">
                                        Per Municipality Spots Reports
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/about_us') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/about_us'); ?>">
                            <i class="fas fa-info"></i> <!-- Alternative for team -->
                            <span data-key="t-apps">About Us </span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo (uri_string() === 'Admin_Ctrl/team') ? 'active' : ''; ?>"
                            href="<?php echo site_url('Admin_Ctrl/team'); ?>">
                            <i class="fas fa-user-friends"></i> <!-- Alternative for team -->
                            <span data-key="t-apps">Team </span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav nav-sm flex-column">
                            </ul>
                        </div>
                    </li>

                <?php endif; ?>





                <!-- end Dashboard Menu -->







            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
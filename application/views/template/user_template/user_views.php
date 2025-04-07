<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<style>
    .upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 2px solid #ddd;
        overflow: hidden;
        cursor: pointer;
        background-color: #f8f9fa;
    }

    .image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .icon {
        position: absolute;
        font-size: 24px;
        color: #666;
    }

    #photo {
        display: none;
    }

    .blog-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
    }

    .blog-grid-card {
        display: flex;
        flex-direction: column;
        height: 90%;
    }

    .blog-grid-card .card-body {
        flex-grow: 1;
    }

    .upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 2px solid #ddd;
        overflow: hidden;
        cursor: pointer;
        background-color: #f8f9fa;
    }

    .image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .icon {
        position: absolute;
        font-size: 24px;
        color: #666;
    }

    #photo {
        display: none;
    }

    .img-fluid {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
        background-color: #f8f9fa;
    }

    .text-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .custom-textarea {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
</style>
<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="../../../../cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width: 100px; height: 100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">
                            Are you sure you ____ to remove this Notification ?
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">
                        Yes, Delete It!
                    </button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar" />
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame
                    </span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                            class="ri ri-circle-fill fs-10 text-success align-baseline"></i>
                        <span class="align-middle">Online </span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Profile </span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Messages </span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Taskboard </span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Help </span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Balance : <b>$5971.67 </b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New </span><i
                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Settings </span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Lock screen </span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle" data-key="t-logout">Logout </span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <!-- <li class="menu-title"><span data-key="t-menu">Menu </span></li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebarDashboards"  role="button"
                aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="ri-dashboard-2-line"></i>
                <span data-key="t-dashboards">Dashboards </span>
              </a>
            </li> -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Home </a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <p class="text-success text-uppercase mb-2"><?= htmlspecialchars($spot['title']); ?>
                                    Details</p>
                                <!-- <h4 class="mb-2">The Art of Storytelling __ Design </h4>
                                <p class="text-muted mb-4">How to create impactful __________ through visual elements.
                                </p> -->
                                <!-- <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                    <span class="badge bg-primary-subtle text-primary">CraftedPerspectives </span>
                                    <span class="badge bg-primary-subtle text-primary">DesignInspiration </span>
                                    <span class="badge bg-primary-subtle text-primary">ArtAndDesign </span>
                                </div> -->
                            </div>


                            <a target="_blank">
                                <img src="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>"
                                    alt="Chocolate Hills Map" class="img-thumbnail"
                                    style="width: 100%; height: 500px;" />
                            </a>


                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <h6 class="pb-1">Contributor By: </h6>
                                    <div class="d-flex gap-2 mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>"
                                                alt="" class="avatar-sm rounded-circle" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1"><a href="#">
                                                    <?= !empty($spot['title']) ? htmlspecialchars($spot['title']) : 'No title available'; ?>
                                                </a>
                                            </h5>
                                            <!-- <p class="mb-2">Panglao Tourism Office </p> -->
                                            <p class="text-muted mb-0"><strong>Contact:</strong> <a>
                                                    <?= !empty($spot['contact']) ? htmlspecialchars($spot['contact']) : 'No contact available'; ?>
                                                </a> </p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-9">
                                    <h5 class="fw-semibold">Spot Details </h5>
                                    <p class="text-muted mb-3">
                                        <?= !empty($spot['details']) ? htmlspecialchars($spot['details']) : 'No details available'; ?>

                                    </p>


                                    <ul>
                                        <li class="pb-1"><strong>Municipality: </strong> <span class="text-muted">
                                                <?= !empty($spot['municipality']) ? htmlspecialchars($spot['municipality']) : 'No municipality available'; ?>
                                            </span>
                                        </li>
                                        <li class="pb-1"><strong>Barangay: </strong> <span class="text-muted">
                                                <?= !empty($spot['barangay']) ? htmlspecialchars($spot['barangay']) : 'No barangay available'; ?>
                                            </span>
                                        </li>
                                        <li class="pb-1"><strong>Street: </strong> <span class="text-muted">
                                                <?= !empty($spot['street']) ? htmlspecialchars($spot['street']) : 'No street available'; ?>
                                            </span>
                                        </li>
                                        <li class="pb-1"><strong>Entry Fee: <br></strong>
                                            <span class="text-muted">
                                                <?php
                                                $entryData = $spot['entry'];

                                                $entryData = str_replace(array('[', ']', '"'), '', $entryData);

                                                $entryArray = explode(',', $entryData);

                                                foreach ($entryArray as $entry) {
                                                    echo htmlspecialchars(trim($entry)) . '<br>';
                                                }
                                                ?>
                                            </span>
                                        </li>

                                        <li><strong>Operating Hours: <br></strong> <span
                                                class="text-muted"><?= !empty($spot['opening_hrs']) ? htmlspecialchars($spot['opening_hrs']) : 'No opening hours available'; ?>
                                            </span>
                                        </li>


                                        <li><strong>Category: <br></strong> <span
                                                class="text-muted mb-2"><?= !empty($spot['category']) ? htmlspecialchars($spot['category']) : 'No category available'; ?>

                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="pb-1">
                                            <strong>Links Website: </strong>
                                            <span class="text-muted">
                                                <br><a
                                                    href="<?= !empty($spot['links_web']) ? htmlspecialchars($spot['links_web']) : '#'; ?>">
                                                    <?= !empty($spot['links_web']) ? htmlspecialchars($spot['links_web']) : 'No link available'; ?></a>
                                            </span>
                                        </li>
                                        <li class="pb-1">
                                            <strong>The approximate latitude and longitude coordinates for
                                                <?= !empty($spot['title']) ? htmlspecialchars($spot['title']) : 'No title available'; ?>

                                                on
                                                <?= !empty($spot['municipality']) ? htmlspecialchars($spot['municipality']) : 'No municipality available'; ?>
                                                , Bohol, Philippines
                                                are: </strong>
                                            <span class="text-muted">
                                                <br>Latitude:
                                                <?= !empty($spot['latitude']) ? htmlspecialchars($spot['latitude']) : 'No latitude available'; ?>
                                                <br>Longitude:
                                                <?= !empty($spot['longitude']) ? htmlspecialchars($spot['longitude']) : 'No longitude available'; ?>
                                            </span>
                                        </li>
                                        <li><strong>Others: <br></strong> <span
                                                class="text-muted"><?= !empty($spot['others']) ? htmlspecialchars($spot['others']) : 'No additional information available'; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <strong>Link to the Map: <br></strong>
                                            <a href="<?= !empty($spot['link_map']) ? htmlspecialchars($spot['link_map']) : 'No map link available'; ?>"
                                                target="_blank" class="royal-blue-link">
                                                <?= !empty($spot['link_map']) ? htmlspecialchars($spot['link_map']) : 'No map link available'; ?>

                                            </a>
                                        </li>
                                        <li><strong>Hidden Gem: <br></strong> <span
                                                class="text-muted"><?= !empty($spot['hidden_gem']) ? htmlspecialchars($spot['hidden_gem']) : 'No hidden gem available'; ?>
                                            </span>
                                        </li>
                                    </ul>


                                    <div>
                                        <h5 class="fw-semibold mb-3">All Comments: </h5>
                                        <div data-simplebar style="height: 300px;" class="px-3 mx-n3 mb-2">
                                            <?php if (!empty($comments)): ?>
                                                <?php foreach ($comments as $comment): ?>
                                                    <div class="d-flex mb-4">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= !empty($comment['photo']) ? base_url($comment['photo']) : 'https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg'; ?>"
                                                                alt="User Avatar" class="avatar-xs rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="fs-13">
                                                                <?= htmlspecialchars($comment['name']); ?>
                                                                <small class="text-muted ms-2">
                                                                    <?= date('d M Y - H:i A', strtotime($comment['created_at'])); ?>
                                                                </small>
                                                            </h5>
                                                            <p class="text-muted"><?= htmlspecialchars($comment['comment']); ?>
                                                            </p>
                                                            <p><strong>Rating:</strong>
                                                                <?= str_repeat('⭐', $comment['rating']); ?></p>
                                                            <!-- <a href="javascript:void(0);" class="badge text-muted bg-light">
                                                                <i class="mdi mdi-reply"></i> Reply
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p>No comments yet.</p>
                                            <?php endif; ?>
                                        </div>
                                        <form method="post" action="<?= base_url('Admin_Ctrl/add_comment'); ?>"
                                            class="mt-4">
                                            <input type="hidden" name="spot_id" value="<?= $spot['id']; ?>">

                                            <div class="row g-3">
                                                <!-- <div class="col-12">
                                                    <label for="rating" class="form-label text-body">Rating</label>
                                                    <select name="rating" class="form-select bg-light border-light"
                                                        required>
                                                        <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                                                        <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                                                        <option value="3">⭐⭐⭐ (3 Stars)</option>
                                                        <option value="2">⭐⭐ (2 Stars)</option>
                                                        <option value="1">⭐ (1 Star)</option>
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-12">
                                                    <label for="comment" class="form-label text-body">Leave a
                                                        Comment</label>
                                                    <textarea name="comment" class="form-control bg-light border-light"
                                                        rows="3" placeholder="Enter your comment..."
                                                        required></textarea>
                                                </div> -->



                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-success me-2"
                                                        onclick="openDtgUpload()">
                                                        <i class="fa fa-arrow-left"></i> Back Reviews
                                                    </button>
                                                    <form action="/Auth_Ctrl/login_view" method="get">
                                                        <button type="submit" class="btn btn-secondary">
                                                            <i class="fa fa-comment"></i> Please Sign In First
                                                        </button>
                                                    </form>

                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div>
            </div>






            <!-- end col -->


            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script>
    function openDtgUpload() {
        window.location.href = "<?php echo site_url('Admin_Ctrl/User_views'); ?>";
    }


    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->flashdata("success") ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>
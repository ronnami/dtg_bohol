<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.min.css">

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.min.js"></script>

<div class="main-content">

    <!-- session per users -->
    <?php
    $user_id = $this->session->userdata("dgt_user");
    if (isset($user_id)) {
        $user = $this->Auth_model->get_user_by_user_id($user_id);
    }
    ?>


    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="<?php echo (isset($user->photo) && $user->photo) ? base_url($user->photo) : 'https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg'; ?>"
                        class="profile-wid-img" alt=""
                        onerror="this.src='https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg';" />
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file"
                                    class="profile-foreground-img-file-input" />
                                <!-- <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                </label> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">

                                <form method="POST" action="<?php echo base_url('Auth_Ctrl/upload_photo'); ?>"
                                    enctype="multipart/form-data" id="upload-photo-form">
                                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                        <!-- Display the current profile image or fallback image -->
                                        <img id="profile-image-admin"
                                            src="<?php echo (isset($user->photo) && $user->photo) ? base_url($user->photo) : 'https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg'; ?>"
                                            class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow"
                                            alt="user-profile-image"
                                            onerror="this.src='https://as1.ftcdn.net/v2/jpg/03/64/88/42/1000_F_364884228_JIux2brVPuxvpm7wmgShdUMWkOAQCsXM.jpg';" />


                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <!-- File input for selecting a new photo -->
                                            <input id="profile-img-file-input-admin" type="file" name="photo"
                                                class="profile-img-file-input"
                                                onchange="previewImage(event); submitForm();" />
                                            <label for="profile-img-file-input-admin"
                                                class="profile-photo-edit avatar-xs">
                                                <span
                                                    class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                    <i class="fa fa-camera"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" style="display:none;">Upload</button>
                                </form>
                                <h5 class="fs-16 mb-1"><?= isset($user->name) ? $user->name : 'N/A' ?> </h5>
                                <p class="text-muted mb-0"> <?= isset($user->role) ? $user->role : 'N/A' ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-user"></i> 𝐏𝐞𝐫𝐬𝐨𝐧𝐚𝐥 𝐃𝐞𝐭𝐚𝐢𝐥𝐬
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="fas fa-lock"></i> 𝐂𝐡𝐚𝐧𝐠𝐞 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab">
                                        <i class="fas fa-shield-alt"></i> 𝐏𝐫𝐢𝐯𝐚𝐜𝐲 𝐏𝐨𝐥𝐢𝐜𝐲
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="javascript:void(0);">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">𝐅𝐮𝐥𝐥
                                                        𝐍𝐚𝐦𝐞</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        value="<?= isset($user->name) ? htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                                        readonly />
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">𝐑𝐨𝐥𝐞</label>
                                                    <input type="text" class="form-control" id="lastnameInput"
                                                        value="<?= isset($user->role) ? htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                                        readonly />
                                                </div>
                                            </div>

                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">𝐔𝐬𝐞𝐫
                                                        𝐍𝐚𝐦𝐞</label>
                                                    <input type="text" class="form-control" id="phonenumberInput"
                                                        value="<?= isset($user->username) ? htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="designationInput" class="form-label">𝐒𝐭𝐚𝐭𝐮𝐬
                                                    </label>
                                                    <input type="text" class="form-control" id="designationInput"
                                                        placeholder="Status" value="Active" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="changePassword" role="tabpanel">

                                    <form id="changePasswordForm" method="post"
                                        action="<?= base_url('Auth_Ctrl/change_password') ?>">
                                        <div class="row g-2">
                                            <!-- Current Password Input -->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="currentpasswordInput" class="form-label">𝐎𝐥𝐝
                                                        𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                                    <input type="password" class="form-control"
                                                        id="currentpasswordInput" name="current_password"
                                                        placeholder="Enter old password" required />
                                                </div>
                                            </div>

                                            <!-- New Password Input -->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="newpasswordInput" class="form-label">𝐍𝐞𝐰
                                                        𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                                    <input type="password" class="form-control" id="newpasswordInput"
                                                        name="password" placeholder="Enter new password" required />
                                                </div>
                                            </div>

                                            <!-- Confirm Password Input -->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="confirmpasswordInput" class="form-label">𝐂𝐨𝐧𝐟𝐢𝐫𝐦
                                                        𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                                    <input type="password" class="form-control"
                                                        id="confirmpasswordInput" name="confirm_password"
                                                        placeholder="Confirm new password" required />
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">𝐂𝐡𝐚𝐧𝐠𝐞
                                                        𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <?php if ($this->session->flashdata('success')): ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: "<?= $this->session->flashdata('success'); ?>",
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('error')): ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: "<?= $this->session->flashdata('error'); ?>",
                                            confirmButtonColor: '#d33',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>
                                <?php endif; ?>





                                <!--end tab-pane-->
                                <div class="tab-pane" id="privacy" role="tabpanel">
                                    <div class="mb-4 pb-2">
                                        <h5 class="card-title  mb-3">Vision Statement </h5>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                            <div class="flex-grow-1">
                                                <!-- <h6 class="fs-14 mb-1">Two-factor Authentication </h6> -->
                                                <!-- <p class="text-muted">Our vision is to be a leader in the healthcare
                                                    industry, revolutionizing the way medical services are delivered
                                                    globally. We aim to provide accessible, affordable, and innovative
                                                    healthcare solutions that cater to the needs of individuals from all
                                                    walks of life. By embracing technology and fostering a culture of
                                                    compassion, we aspire to transform healthcare into a personalized
                                                    experience, focusing on preventive care, holistic wellness, and
                                                    patient-centered treatment. </p> -->
                                            </div>
                                            <!-- <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Enable
                                                    Two-facor Authentication </a>
                                            </div> -->
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                            <div class="flex-grow-1">
                                                <h6 class="fs-14 mb-1">Mission Statement </h6>
                                                <!-- <p class="text-muted">At [ALTURAS GROUP OF COMPANIES], our mission is to
                                                    enhance the
                                                    health and well-being of our patients by providing top-tier medical
                                                    care, innovative treatments, and cutting-edge technologies. We are
                                                    dedicated to improving patient outcomes through a collaborative,
                                                    compassionate approach while ensuring that quality healthcare
                                                    services are accessible to everyone. We believe that healthcare
                                                    should be a partnership between providers and patients, empowering
                                                    individuals to take control of their health. </p> -->
                                            </div>
                                            <!-- <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Set up
                                                    secondary method </a>
                                            </div> -->
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                            <div class="flex-grow-1">
                                                <h6 class="fs-14 mb-1">Commitment to Patient-Centered Care </h6>
                                                <!-- <p class="text-muted mb-sm-0">We prioritize the needs of our patients
                                                    above all else. Our healthcare services are designed to be
                                                    patient-centric, with a focus on not only treating illnesses but
                                                    also preventing them. By actively engaging with patients in their
                                                    healthcare journey, we ensure that they feel heard, valued, and
                                                    respected. Our mission is to create a healing environment where
                                                    patients are encouraged to take an active role in their health, from
                                                    preventative measures to treatment and recovery. </p> -->
                                            </div>
                                            <!-- <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Generate
                                                    backup codes </a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title  mb-3">Innovative Healthcare
                                            Solutions
                                        </h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex">
                                                <div class="flex-grow-1">
                                                    <!-- <label for="directMessage" class="form-check-label fs-14">Direct
                                                        messages </label> -->
                                                    <!-- <p class="text-muted">Innovation is at the heart of our
                                                        organization. We continuously strive to adopt new technologies,
                                                        methodologies, and practices to deliver the best possible care.
                                                        Whether it is through the implementation of telemedicine,
                                                        robotic-assisted surgeries, or AI-driven diagnostic tools, we
                                                        are committed to embracing advancements that enhance the
                                                        healthcare experience. Our innovative solutions aim to provide
                                                        better, faster, and more accurate care to those in need. </p> -->
                                                </div>
                                                <!-- <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="directMessage" checked="" />
                                                    </div>
                                                </div> -->



                                        </ul>
                                    </div>

                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->
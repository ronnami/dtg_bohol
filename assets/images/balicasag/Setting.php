<link rel="stylesheet" type="text/css" href="<?= base_url('assets/po_monitoring/CSS/settings.css'); ?>">
<style>
    .profile-user {
        max-width: 100%;
    }

    .profile-photo-edit label {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        cursor: pointer;
    }
</style>
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>𝐒𝐞𝐭𝐭𝐢𝐧𝐠𝐬</h4>
        </div>
        <?php
        $user_id = $this->session->userdata("po_user");
        if (isset($user_id)) {
            $user = $this->Auth_model->get_user_by_user_id($user_id);
        }
        ?>
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-body">
                        <h5>𝐏𝐫𝐨𝐟𝐢𝐥𝐞 𝐒𝐞𝐭𝐭𝐢𝐧𝐠𝐬</h5>

                        <div class="d-flex align-items-center">
                            <div class="text-center me-3">
                                <?php if (
                                    $user->user_type == 'Corporate Manager' ||
                                    $user->user_type == 'Purchasing' ||
                                    $user->user_type == 'Delivery Schedule' ||
                                    $user->user_type == 'CDC MIS Data' ||
                                    $user->user_type == 'Pricing' ||
                                    $user->user_type == 'Purchasing Invoice' ||
                                    $user->user_type == 'AP Monitoring' ||
                                    $user->user_type == 'CEN Accounting' ||
                                    $user->user_type == 'Audit Monitoring' ||
                                    $user->user_type == 'Disbursing'
                                ): ?>

                                    <form method="POST" action="<?php echo base_url('PO_ctrl/upload_photo'); ?>"
                                        enctype="multipart/form-data" id="upload-photo-form" class="text-center">
                                        <div class="profile-user position-relative d-flex flex-column align-items-center">
                                            <img id="profile-image-admin"
                                                src="<?php echo (!empty($user->photo)) ? base_url($user->photo) : base_url('assets/image/userssss.jpg'); ?>"
                                                class="rounded-circle img-thumbnail material-shadow img-fluid"
                                                alt="user-profile-image"
                                                onerror="this.src='<?php echo base_url('assets/image/userssss.jpg'); ?>';"
                                                style="width: 200px; height: 200px; object-fit: cover;" />

                                            <div class="profile-photo-edit position-absolute" style="bottom: 0; right: 0;">
                                                <input id="profile-img-file-input-admin" type="file" name="photo"
                                                    class="d-none" onchange="previewImage(event); submitForm();" />
                                                <label for="profile-img-file-input-admin"
                                                    class="btn btn-sm btn-primary rounded-circle shadow">
                                                    <i class="fa fa-camera"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="d-none"></button>
                                    </form>

                                <?php endif; ?>

                                <?php if ($user->user_category == 'Super-Admin'): ?>
                                    <form method="POST" action="<?php echo base_url('PO_ctrl/upload_photo'); ?>"
                                        enctype="multipart/form-data" id="upload-photo-form" class="text-center">
                                        <div class="profile-user position-relative d-flex flex-column align-items-center">
                                            <img id="profile-image-admin"
                                                src="<?php echo (!empty($user->photo)) ? base_url($user->photo) : base_url('assets/image/userssss.jpg'); ?>"
                                                class="rounded-circle img-thumbnail material-shadow img-fluid"
                                                alt="user-profile-image"
                                                onerror="this.src='<?php echo base_url('assets/image/userssss.jpg'); ?>';"
                                                style="width: 200px; height: 200px; object-fit: cover;" />

                                            <div class="profile-photo-edit position-absolute" style="bottom: 0; right: 0;">
                                                <input id="profile-img-file-input-admin" type="file" name="photo"
                                                    class="d-none" onchange="previewImage(event); submitForm();" />
                                                <label for="profile-img-file-input-admin"
                                                    class="btn btn-sm btn-primary rounded-circle shadow">
                                                    <i class="fa fa-camera"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="d-none"></button>
                                    </form>
                                <?php endif; ?>

                                <?php if (
                                    $user->user_type == 'Delivery Schedule (STORE)' ||
                                    $user->user_category == 'Scheduling,Status' ||
                                    $user->user_category == 'Scheduling' ||
                                    $user->user_category == 'Status'
                                ): ?>

                                    <form method="POST" action="<?php echo base_url('PO_ctrl/upload_photo'); ?>"
                                        enctype="multipart/form-data" id="upload-photo-form" class="text-center">
                                        <div class="profile-user position-relative d-flex flex-column align-items-center">
                                            <img id="profile-image-admin"
                                                src="<?php echo (!empty($user->photo)) ? base_url($user->photo) : base_url('assets/image/userssss.jpg'); ?>"
                                                class="rounded-circle img-thumbnail material-shadow img-fluid"
                                                alt="user-profile-image"
                                                onerror="this.src='<?php echo base_url('assets/image/userssss.jpg'); ?>';"
                                                style="width: 200px; height: 200px; object-fit: cover;" />

                                            <div class="profile-photo-edit position-absolute" style="bottom: 0; right: 0;">
                                                <input id="profile-img-file-input-admin" type="file" name="photo"
                                                    class="d-none" onchange="previewImage(event); submitForm();" />
                                                <label for="profile-img-file-input-admin"
                                                    class="btn btn-sm btn-primary rounded-circle shadow">
                                                    <i class="fa fa-camera"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="d-none"></button>
                                    </form>
                                <?php endif; ?>

                                <script>
                                    function previewImage(event) {
                                        var reader = new FileReader();
                                        reader.onload = function () {
                                            var output = document.getElementById('profile-image-admin');
                                            output.src = reader.result;
                                        }
                                        reader.readAsDataURL(event.target.files[0]);
                                    }

                                    function submitForm() {
                                        document.getElementById('upload-photo-form').submit();
                                    }
                                </script>

                            </div>




                            <!-- Profile Form -->
                            <form action="#" method="POST">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="fullname" class="form-label">𝐅𝐮𝐥𝐥
                                            𝐍𝐚𝐦𝐞</label>
                                        <input type="text" class="form-control" id="fullname" name="full_name"
                                            value="<?= isset($user->full_name) ? htmlspecialchars($user->full_name, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                            required>
                                    </div>

                                </div>
                                <div class="row mb-2">

                                    <div class="col-md-12">
                                        <label for="Position" class="form-label">𝐏𝐨𝐬𝐢𝐭𝐢𝐨𝐧</label>
                                        <input type="text" class="form-control" id="Position" name="Position"
                                            value="<?= isset($user->position) ? htmlspecialchars($user->position, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="Username" class="form-label">𝐔𝐬𝐞𝐫
                                            𝐍𝐚𝐦𝐞</label>
                                        <input type="text" class="form-control" id="Username" name="Username"
                                            value="<?= isset($user->user_name) ? htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                            required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usertype" class="form-label">𝐔𝐬𝐞𝐫 𝐓𝐲𝐩𝐞</label>
                                        <input type="text" class="form-control" id="usertype" name="usertype"
                                            value="<?= isset($user->user_type) ? htmlspecialchars($user->user_type, ENT_QUOTES, 'UTF-8') : 'N/A' ?>"
                                            required>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-end">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



            <!-- Change Password Card -->
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-body">
                        <?php
                        $user_id = $this->session->userdata("po_user");
                        if (isset($user_id)) {
                            $user = $this->Auth_model->get_user_by_user_id($user_id);
                        }
                        ?>
                        <h5>𝐂𝐡𝐚𝐧𝐠𝐞 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</h5><br>
                        <?php if (isset($user)): ?>
                            <form id="changePasswordForm" method="post" action="<?= base_url('PO_ctrl/change_password') ?>">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="password" class="form-label">𝐎𝐥𝐝
                                            𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                        <input type="password" class="form-control" id="currentpasswordInput"
                                            name="current_password" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="newpasswordInput" class="form-label">𝐍𝐞𝐰
                                            𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                        <input type="password" class="form-control" id="newpasswordInput" name="password"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="confirmpasswordInput" class="form-label">𝐂𝐨𝐧𝐟𝐢𝐫𝐦
                                            𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝*</label>
                                        <input type="password" class="form-control" id="confirmpasswordInput"
                                            name="confirm_password" required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">𝐂𝐡𝐚𝐧𝐠𝐞 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</button>
                                </div>

                            </form>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Change password successfully updated!',
            background: '#f0f8ff',
            color: '#4caf50',
            iconColor: '#4caf50',
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#28a745',
            timer: 10000,
            timerProgressBar: true,
            position: 'center',
            customClass: {
                popup: 'swal-popup',
                title: 'swal-title',
                content: 'swal-content',
            },
            showClass: {
                popup: 'animate__animated animate__fadeInUp',
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutDown',
            }
        });
    </script>
<?php endif; ?>



<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata('error') ?>',
            background: '#ffebee',
            color: '#f44336',
            iconColor: '#f44336',
            showConfirmButton: true,
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#f44336',
            position: 'center',
            customClass: {
                popup: 'swal-popup-error',
                title: 'swal-title-error',
                content: 'swal-content-error',
            },
            showClass: {
                popup: 'animate__animated animate__shakeX',
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutDown',
            }
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('swal_success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo $this->session->flashdata('swal_success'); ?>',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('swal_error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '<?php echo $this->session->flashdata('swal_error'); ?>',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>
<style>
    .cards:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Team </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages </a></li>
                                <li class="breadcrumb-item active">Team </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <button class="btn btn-success btn-sm w-100 mt-2" data-bs-toggle="modal"
                                data-bs-target="#addteam">
                                <i class="fas fa-user-plus"></i> Add Your Team
                            </button>
                        </div>

                    </div>
                    <div class="row g-2">






                        <div class="container mt-4">
                            <div class="row g-4">
                                <?php foreach ($team_members as $member): ?>
                                    <div class="col-md-3">
                                        <div class="cards border-0 shadow-lg rounded-3 p-3 text-center">
                                            <img src="<?= base_url($member['photo']); ?>" alt="Profile Image"
                                                class="avatar-lg img-thumbnail rounded-circle mx-auto profile-img"
                                                style="width: 100px; height: 100px;">
                                            <div class="mt-3">
                                                <h5 class="fs-15 profile-name">
                                                    <?= htmlspecialchars($member['full_name']); ?>
                                                </h5>
                                                <p class="text-muted profile-designation">
                                                    <?= htmlspecialchars($member['position']); ?>
                                                </p>
                                                <p class="text-muted profile-designation">
                                                    <?= htmlspecialchars($member['team_name']); ?>
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end gap-2">
                                                <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button class="btn btn-danger btn-sm delete-card"
                                                    data-id="<?= $member['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <br><br><br><br>
                        </div>


                        <!--end row-->
                    </div>
                </div>
            </div><!-- container-fluid -->
        </div><!-- End Page-content -->


        <!-- Add Team Modal -->


        <div class="modal fade" id="addteam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Team Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Admin_Ctrl/add_team'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Team Name</label>
                                <input type="text" name="team_name" class="form-control" required
                                    placeholder="Enter team name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" required
                                    placeholder="Enter full name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <select name="position" class="form-select" required>
                                    <option value="" disabled selected>Select position</option>
                                    <option value="Leader">Leader</option>
                                    <option value="Member">Member</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save Team Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?php echo $this->session->flashdata('success'); ?>',
                    confirmButtonText: 'Okay'
                });
            </script>
        <?php endif; ?>

        <script>
            $(document).on('click', '.delete-card', function () {
                var memberId = $(this).data('id');

                if (!memberId) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid member ID',
                        text: 'Please try again.',
                    });
                    return;
                }

                Swal.fire({
                    title: 'Are you sure to delete from this team?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= site_url('Admin_Ctrl/delete_team_member'); ?>',
                            type: 'POST',
                            data: { id: memberId },
                            dataType: 'json',
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'The member has been deleted.',
                                        'success'
                                    );
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed to delete member',
                                        text: response.message || 'Unknown error',
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'An error occurred',
                                    text: error,
                                });
                            }
                        });
                    }
                });
            });


        </script>
<style>
    .modal-custom {
        max-width: 55%;
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
                        <h4 class="mb-sm-0">User List </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">User List </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-user-plus"></i> User List
                                </h5>
                                <div class="col-auto">

                                    <button type="button" class="btn btn-soft-success" data-bs-toggle="modal"
                                        data-bs-target="#addResidentModal">
                                        <i class="ri-add-circle-line"></i> Add User
                                    </button>
                                 
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="resident_table"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th class="text-center">Photo</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Username </th>
                                        <th class="text-center">Role </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <?php if (!empty($user['photo'])): ?>
                                                    <img src="<?= base_url($user['photo']) ?>" width="30" height="30"
                                                        style="border-radius: 50%; object-fit: cover;">
                                                <?php else: ?>
                                                    No Photo
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= !empty($user['role']) ? $user['role'] : 'User' ?></td>
                                            <td>
                                                <button type="button" class="btn btn-soft-primary btn-sm editUserBtn"
                                                    data-id="<?= $user['id'] ?>" data-bs-toggle="modal"
                                                    data-bs-target="#editUserModal"> <i class="fas fa-edit"></i>Edit
                                                </button>
                                                <button type="button" class="btn btn-soft-danger btn-sm"
                                                    onclick="deleteUser(<?= is_array($user) ? $user['id'] : $user->id; ?>)">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- .card-->
            </div>
            <!-- .col-->
        </div>
        <!-- end row-->
    </div>
    <!-- end .h-100-->
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addResidentModal" tabindex="-1" aria-labelledby="addResidentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResidentModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3 text-center">
                            <div id="imagePreview" class="mt-3 d-flex align-items-center justify-content-center"
                                style="width: 150px; height: 150px; border: 1px solid #000; padding: 5px; border-radius: 5px; background: #f8f9fa; margin: 0 auto;">
                                <img id="previewImg" src="https://via.placeholder.com/140" alt="Image Preview"
                                    style="width: 140px; height: 140px; object-fit: cover;">
                            </div>

                            <label for="userPhoto" class="form-label mt-2"></label>
                            <input type="file" class="form-control" id="userPhoto" name="userPhoto" accept="image/*"
                                style="width: 50%; margin: 0 auto; display: block;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter username" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Select User Type</option>
                                <option value="Admin">Admin</option>
                                <option value="Municipal Tourism Officer">Municipal Tourism Officer</option>
                                <option value="Department Of Tourism">Department Of Tourism</option>
                                <option value="Tourist">Tourist</option>
                                <option value="Business Owner">Business Owner</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" id="editUserId" name="id">

                    <!-- Profile Photo (View-Only) -->
                    <div class="mb-3 text-center">
                        <label class="form-label">Profile Photo</label>
                        <img id="editPhotoPreview" src="" alt="Profile Photo" class="img-thumbnail d-block mx-auto"
                            style="width: 120px; height: 120px; display: none;">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Role</label>
                        <select class="form-select" id="editRole" name="role">
                            <option value="" disabled selected>Select User Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Municipal Tourism Officer">Municipal Tourism Officer</option>
                            <option value="Department Of Tourism">Department Of Tourism</option>
                            <option value="Tourist">Tourist</option>
                            <option value="Business Owner">Business Owner</option>
                        </select>

                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>











<script>
    $(document).ready(function () {
        $('#resident_table').DataTable({
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            lengthMenu: [10, 25, 50, 100],
            ordering: true,
            searching: true,
            processing: true,
            language: {
                search: '',
                searchPlaceholder: 'Search...',
                processing: '<div class="table-loader"></div>'
            },
        });
    });


    $("#addUserForm").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "<?= base_url('Admin_Ctrl/addUser') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                let res = JSON.parse(response);
                if (res.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: res.message,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: res.message,
                        confirmButtonColor: "#d33"
                    });
                }
            }
        });
    });



    // Edit User Button Click
    $(document).on("click", ".editUserBtn", function () {
        let userId = $(this).data("id");

        $.ajax({
            url: "<?= base_url('Admin_Ctrl/get_user_by_id') ?>",
            type: "POST",
            data: { id: userId },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("#editUserId").val(response.data.id);
                    $("#editName").val(response.data.name);
                    $("#editUsername").val(response.data.username);
                    $("#editRole").val(response.data.role);

                    // Show only the existing photo
                    if (response.data.photo) {
                        let photoUrl = "<?= base_url() ?>" + response.data.photo;
                        $("#editPhotoPreview").attr("src", photoUrl).show();
                    } else {
                        $("#editPhotoPreview").hide();
                    }

                    $("#editUserModal").modal("show");
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message
                    });
                }
            }
        });
    });

    // Update User Form Submission
    $("#editUserForm").submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "<?= base_url('Admin_Ctrl/update_user') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    icon: response.status === "success" ? "success" : "error",
                    title: response.status === "success" ? "Success" : "Error",
                    text: response.message
                }).then(() => {
                    if (response.status === "success") {
                        location.reload();
                    }
                });
            }
        });
    });




</script>

<script>
    document.getElementById('userPhoto').addEventListener('change', function (event) {
        var preview = document.getElementById('previewImg');
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<script>
    function deleteUser(userId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('Admin_Ctrl/delete_users'); ?>",
                    type: "POST",
                    data: { id: userId },
                    success: function (response) {
                        Swal.fire("Deleted!", "The user has been deleted.", "success").then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                });
            }
        });
    }
</script>
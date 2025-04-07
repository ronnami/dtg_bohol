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
                        <h4 class="mb-sm-0">Add Business </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">Add Business </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php
            $user_id = $this->session->userdata("dgt_user");
            if (isset($user_id)) {
                $user = $this->Auth_model->get_user_by_user_id($user_id);
            }
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-briefcase"></i> Business List
                                </h5>
                                <div class="col-auto">
                                    <?php if ($user->role == 'Business Owner' || $user->role == 'Admin'): ?>
                                        <button type="button" class="btn btn-soft-success" data-bs-toggle="modal"
                                            data-bs-target="#addBusinessModal">
                                            <i class="ri-add-circle-line"></i> Add Business
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="resident_table"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle mt-3"
                                style="width:100%">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th class="text-center">Business Name</th>
                                        <th class="text-center">Business Type</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Municipality</th>
                                        <th class="text-center">Barangay</th>
                                        <th class="text-center">Street</th>
                                        <th class="text-center">Contact Info</th>
                                        <th class="text-center">Opening Hours</th>
                                        <th class="text-center">Social Media URL</th>
                                        <th class="text-center">Website URL</th>
                                        <th class="text-center">Pricing</th>
                                        <th class="text-center">Mayors Permit</th>
                                        <th class="text-center">Photos</th>
                                        <th class="text-center">Status</th>
                                        <?php if ($user->role == 'Business Owner' || $user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                            <th class="text-center">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($businesses as $business): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $business->business_name; ?></td>
                                            <td class="text-center"><?php echo $business->business_type; ?></td>
                                            <td class="text-center"><?php echo $business->description; ?></td>
                                            <td class="text-center"><?php echo $business->municipality; ?></td>
                                            <td class="text-center"><?php echo $business->barangay; ?></td>
                                            <td class="text-center"><?php echo $business->street; ?></td>
                                            <td class="text-center"><?php echo $business->contact_info; ?></td>
                                            <td class="text-center"><?php echo $business->opening_day; ?> -
                                                <?php echo $business->close_day; ?> :
                                                <?php echo $business->opening_hours; ?> to
                                                <?php echo $business->close_hours; ?>
                                            </td>
                                            <td class="text-center"><?php echo $business->social_media_links; ?></td>
                                            <td class="text-center"><?php echo $business->website_url; ?></td>
                                            <td class="text-center"><?php echo $business->pricing; ?></td>
                                            <!-- Table Content -->
                                            <td class="text-center">
                                                <?php if (!empty($business->mayors_permit)): ?>
                                                    <?php
                                                    $mayors_permits = explode(',', $business->mayors_permit); // Convert to array
                                                    ?>
                                                    <?php foreach ($mayors_permits as $permit): ?>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#mayorsPermitModal"
                                                            data-photo="<?= base_url('assets/images/' . trim($permit)) ?>">
                                                            <img src="<?= base_url('assets/images/' . trim($permit)) ?>" width="50"
                                                                height="50"
                                                                style="border-radius: 50%; object-fit: cover; margin: 3px;">
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    No Photo
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($business->photos)): ?>
                                                    <?php
                                                    $photos = explode(',', $business->photos); // Convert comma-separated photos into an array
                                                    ?>
                                                    <?php foreach ($photos as $photo): ?>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal"
                                                            data-photo="<?= base_url('assets/images/' . trim($photo)) ?>">
                                                            <img src="<?= base_url('assets/images/' . trim($photo)) ?>" width="50"
                                                                height="50"
                                                                style="border-radius: 50%; object-fit: cover; margin: 3px;">
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    No Photo
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="<?php echo empty($business->status) ? 'text-danger' : 'text-success'; ?>">
                                                    <?php if (!empty($business->status)): ?>
                                                        <i class="fa fa-check-circle"></i> <?php echo $business->status; ?>
                                                    <?php else: ?>
                                                        <i class="fa fa-exclamation-circle"></i> Pending
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                            <?php if ($user->role == 'Business Owner' || $user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                                <td class="text-center">
                                                    <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                                        <button class="btn btn-soft-info btn-md approve-btn"
                                                            data-id="<?= $business->id ?>">
                                                            <i class="fas fa-check"></i> Approve
                                                        </button>
                                                    <?php endif; ?>

                                                    <?php if ($user->role == 'Business Owner' || $user->role == 'Admin'): ?>
                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-soft-primary btn-md"
                                                            data-bs-toggle="modal" data-bs-target="#editBusinessModal"
                                                            data-id="<?= $business->id ?>"
                                                            data-business_name="<?= $business->business_name ?>"
                                                            data-business_type="<?= $business->business_type ?>"
                                                            data-description="<?= $business->description ?>"
                                                            data-municipality="<?= $business->municipality ?>"
                                                            data-barangay="<?= $business->barangay ?>"
                                                            data-street="<?= $business->street ?>"
                                                            data-contact_info="<?= $business->contact_info ?>"
                                                            data-opening_day="<?= $business->opening_day ?>"
                                                            data-close_day="<?= $business->close_day ?>"
                                                            data-opening_hours="<?= $business->opening_hours ?>"
                                                            data-close_hours="<?= $business->close_hours ?>"
                                                            data-social_media_links="<?= $business->social_media_links ?>"
                                                            data-website_url="<?= $business->website_url ?>"
                                                            data-pricing="<?= $business->pricing ?>"
                                                            data-photos="<?= $business->photos ?>">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>


                                                    <?php endif; ?>

                                                    <?php if ($user->role == 'Business Owner' || $user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                                        <button class="btn btn-soft-danger btn-md">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
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



<!--======================================================================================================================
    ========================================== ADD MODAL THIS ============================================================
     ====================================================================================================================== -->
<div class="modal fade" id="addBusinessModal" tabindex="-1" aria-labelledby="addBusinessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBusinessModalLabel">Add Business</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Admin_Ctrl/add_your_business'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name"
                                placeholder="Enter Business Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="business_type" class="form-label">Business Type/Category</label>
                            <input type="text" class="form-control" id="business_type" name="business_type"
                                placeholder="Enter Business Type/Category" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="contact_info" class="form-label">Contact Info</label>
                            <input type="text" class="form-control" id="contact_info" name="contact_info"
                                placeholder="Enter Contact Info" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="municipality" class="form-label">Municipality</label>
                            <select class="form-select" id="municipality" name="municipality" required>
                                <option value="" disabled selected>Select Municipality</option>
                                <option value="Alburquerque">Alburquerque</option>
                                <option value="Alicia">Alicia</option>
                                <option value="Anda">Anda</option>
                                <option value="Antequera">Antequera</option>
                                <option value="Baclayon">Baclayon</option>
                                <option value="Balilihan">Balilihan</option>
                                <option value="Batuan">Batuan</option>
                                <option value="Bien_Unido">Bien Unido</option>
                                <option value="Bilar">Bilar</option>
                                <option value="Buenavista">Buenavista</option>
                                <option value="Calape">Calape</option>
                                <option value="Candijay">Candijay</option>
                                <option value="Carmen">Carmen</option>
                                <option value="Catigbian">Catigbian</option>
                                <option value="Clarin">Clarin</option>
                                <option value="Corella">Corella</option>
                                <option value="Cortes">Cortes</option>
                                <option value="Dagohoy">Dagohoy</option>
                                <option value="Danao">Danao</option>
                                <option value="Dauis">Dauis</option>
                                <option value="Dimiao">Dimiao</option>
                                <option value="Duero">Duero</option>
                                <option value="Garcia_Hernandez">Garcia Hernandez</option>
                                <option value="Getafe">Getafe</option>
                                <option value="Guindulman">Guindulman</option>
                                <option value="Inabanga">Inabanga</option>
                                <option value="Jagna">Jagna</option>
                                <option value="Lila">Lila</option>
                                <option value="Loay">Loay</option>
                                <option value="Loboc">Loboc</option>
                                <option value="Loon">Loon</option>
                                <option value="Mabini">Mabini</option>
                                <option value="Maribojoc">Maribojoc</option>
                                <option value="Panglao">Panglao</option>
                                <option value="Pilar">Pilar</option>
                                <option value="President_Carlos_P_Garcia">President Carlos P. Garcia</option>
                                <option value="Sagbayan">Sagbayan</option>
                                <option value="San_Isidro">San Isidro</option>
                                <option value="San_Miguel">San Miguel</option>
                                <option value="Sevilla">Sevilla</option>
                                <option value="Sierra_Bullones">Sierra Bullones</option>
                                <option value="Sikatuna">Sikatuna</option>
                                <option value="Talibon">Talibon</option>
                                <option value="Trinidad">Trinidad</option>
                                <option value="Tubigon">Tubigon</option>
                                <option value="Ubay">Ubay</option>
                                <option value="Valencia">Valencia</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <select class="form-select" id="barangay" name="barangay" required>
                                <option value="">Select Barangay</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="street" class="form-label">Purok</label>
                            <select class="form-select" id="street" name="street" required>
                                <option value="Purok 1">Purok 1</option>
                                <option value="Purok 2">Purok 2</option>
                                <option value="Purok 3">Purok 3</option>
                                <option value="Purok 4">Purok 4</option>
                                <option value="Purok 5">Purok 5</option>
                                <option value="Purok 6">Purok 6</option>
                                <option value="Purok 7">Purok 7</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="opening_day" class="form-label">Opening Day</label>
                            <select class="form-select" id="opening_day" name="opening_day" required>
                                <option value="" disabled selected>Select Opening Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="close_day" class="form-label">Close Day</label>
                            <select class="form-select" id="close_day" name="close_day" required>
                                <option value="" disabled selected>Select Close Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <label for="opening_hours" class="form-label">Opening Hours</label>
                            <input type="time" class="form-control" id="opening_hours" name="opening_hours"
                                placeholder="Enter Social Media Links" required>
                        </div>
                        <div class="col-md-2">
                            <label for="close_hours" class="form-label">Close Hours</label>
                            <input type="time" class="form-control" id="close_hours" name="close_hours"
                                placeholder="Enter Social Media Links" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="social_media_links" class="form-label">Social Media Links</label>
                            <input type="url" class="form-control" id="social_media_links" name="social_media_links"
                                placeholder="Enter Social Media Links" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="website_url" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="website_url" name="website_url"
                                placeholder="Enter Website URL" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pricing" class="form-label">Pricing</label>
                            <input type="text" class="form-control" id="pricing" name="pricing"
                                placeholder="Enter Pricing" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="mayors_permit" class="form-label">Mayors Permit</label>
                            <input type="file" class="form-control" id="mayors_permit" name="mayors_permit" required
                                onchange="previewImages('mayors_permit', 'mayors_permit_preview')">
                            <div id="mayors_permit_preview" style="display:none; margin-top: 10px;"></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="photos" class="form-label">Photos</label>
                            <input type="file" class="form-control" id="photos" name="photos[]" required multiple
                                onchange="previewImages('photos', 'photos_preview')">
                            <div id="photos_preview" style="display:none; margin-top: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="4" name="description"
                            placeholder="Enter Description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Business</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ========================================================================================================
     =================================== UPDATE MODAL THIS ==================================================
     =========================================================================================================-->

<div class="modal fade" id="editBusinessModal" tabindex="-1" aria-labelledby="editBusinessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBusinessModalLabel">Update Business</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin_ctrl/update_business') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $business->id ?>">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="businessName" class="form-label">Business Name</label>
                            <input type="text" class="form-control" id="businessName" name="business_name"
                                value="<?= $business->business_name ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="businessType" class="form-label">Business Type</label>
                            <input type="text" class="form-control" id="businessType" name="business_type"
                                value="<?= $business->business_type ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="contactInfo" class="form-label">Contact Information</label>
                            <input type="text" class="form-control" id="contactInfo" name="contact_info"
                                value="<?= $business->contact_info ?>" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="Municipalitys" class="form-label">Municipality</label>
                            <select type="text" class="form-select" id="Municipalitys" name="municipality" required>
                                <option value="" disabled selected>Select Municipality</option>
                                <option value="Alburquerque" <?= ($business->municipality == 'Alburquerque') ? 'selected' : '' ?>>Alburquerque</option>
                                <option value="Alicia" <?= ($business->municipality == 'Alicia') ? 'selected' : '' ?>>
                                    Alicia</option>
                                <option value="Anda" <?= ($business->municipality == 'Anda') ? 'selected' : '' ?>>Anda
                                </option>
                                <option value="Antequera" <?= ($business->municipality == 'Antequera') ? 'selected' : '' ?>>Antequera</option>
                                <option value="Baclayon" <?= ($business->municipality == 'Baclayon') ? 'selected' : '' ?>>
                                    Baclayon</option>
                                <option value="Balilihan" <?= ($business->municipality == 'Balilihan') ? 'selected' : '' ?>>Balilihan</option>
                                <option value="Batuan" <?= ($business->municipality == 'Batuan') ? 'selected' : '' ?>>
                                    Batuan</option>
                                <option value="Bien_Unido" <?= ($business->municipality == 'Bien_Unido') ? 'selected' : '' ?>>Bien Unido</option>
                                <option value="Bilar" <?= ($business->municipality == 'Bilar') ? 'selected' : '' ?>>Bilar
                                </option>
                                <option value="Buenavista" <?= ($business->municipality == 'Buenavista') ? 'selected' : '' ?>>Buenavista</option>
                                <option value="Calape" <?= ($business->municipality == 'Calape') ? 'selected' : '' ?>>
                                    Calape</option>
                                <option value="Candijay" <?= ($business->municipality == 'Candijay') ? 'selected' : '' ?>>
                                    Candijay</option>
                                <option value="Carmen" <?= ($business->municipality == 'Carmen') ? 'selected' : '' ?>>
                                    Carmen</option>
                                <option value="Catigbian" <?= ($business->municipality == 'Catigbian') ? 'selected' : '' ?>>Catigbian</option>
                                <option value="Clarin" <?= ($business->municipality == 'Clarin') ? 'selected' : '' ?>>
                                    Clarin</option>
                                <option value="Corella" <?= ($business->municipality == 'Corella') ? 'selected' : '' ?>>
                                    Corella</option>
                                <option value="Cortes" <?= ($business->municipality == 'Cortes') ? 'selected' : '' ?>>
                                    Cortes</option>
                                <option value="Dagohoy" <?= ($business->municipality == 'Dagohoy') ? 'selected' : '' ?>>
                                    Dagohoy</option>
                                <option value="Danao" <?= ($business->municipality == 'Danao') ? 'selected' : '' ?>>Danao
                                </option>
                                <option value="Dauis" <?= ($business->municipality == 'Dauis') ? 'selected' : '' ?>>Dauis
                                </option>
                                <option value="Dimiao" <?= ($business->municipality == 'Dimiao') ? 'selected' : '' ?>>
                                    Dimiao</option>
                                <option value="Duero" <?= ($business->municipality == 'Duero') ? 'selected' : '' ?>>Duero
                                </option>
                                <option value="Garcia_Hernandez" <?= ($business->municipality == 'Garcia_Hernandez') ? 'selected' : '' ?>>Garcia Hernandez</option>
                                <option value="Getafe" <?= ($business->municipality == 'Getafe') ? 'selected' : '' ?>>
                                    Getafe</option>
                                <option value="Guindulman" <?= ($business->municipality == 'Guindulman') ? 'selected' : '' ?>>Guindulman</option>
                                <option value="Inabanga" <?= ($business->municipality == 'Inabanga') ? 'selected' : '' ?>>
                                    Inabanga</option>
                                <option value="Jagna" <?= ($business->municipality == 'Jagna') ? 'selected' : '' ?>>Jagna
                                </option>
                                <option value="Lila" <?= ($business->municipality == 'Lila') ? 'selected' : '' ?>>Lila
                                </option>
                                <option value="Loay" <?= ($business->municipality == 'Loay') ? 'selected' : '' ?>>Loay
                                </option>
                                <option value="Loboc" <?= ($business->municipality == 'Loboc') ? 'selected' : '' ?>>Loboc
                                </option>
                                <option value="Loon" <?= ($business->municipality == 'Loon') ? 'selected' : '' ?>>Loon
                                </option>
                                <option value="Mabini" <?= ($business->municipality == 'Mabini') ? 'selected' : '' ?>>
                                    Mabini</option>
                                <option value="Maribojoc" <?= ($business->municipality == 'Maribojoc') ? 'selected' : '' ?>>Maribojoc</option>
                                <option value="Panglao" <?= ($business->municipality == 'Panglao') ? 'selected' : '' ?>>
                                    Panglao</option>
                                <option value="Pilar" <?= ($business->municipality == 'Pilar') ? 'selected' : '' ?>>Pilar
                                </option>
                                <option value="President_Carlos_P_Garcia"
                                    <?= ($business->municipality == 'President_Carlos_P_Garcia') ? 'selected' : '' ?>>
                                    President Carlos P. Garcia</option>
                                <option value="Sagbayan" <?= ($business->municipality == 'Sagbayan') ? 'selected' : '' ?>>
                                    Sagbayan</option>
                                <option value="San_Isidro" <?= ($business->municipality == 'San_Isidro') ? 'selected' : '' ?>>San Isidro</option>
                                <option value="San_Miguel" <?= ($business->municipality == 'San_Miguel') ? 'selected' : '' ?>>San Miguel</option>
                                <option value="Sevilla" <?= ($business->municipality == 'Sevilla') ? 'selected' : '' ?>>
                                    Sevilla</option>
                                <option value="Sierra_Bullones" <?= ($business->municipality == 'Sierra_Bullones') ? 'selected' : '' ?>>Sierra Bullones</option>
                                <option value="Sikatuna" <?= ($business->municipality == 'Sikatuna') ? 'selected' : '' ?>>
                                    Sikatuna</option>
                                <option value="Talibon" <?= ($business->municipality == 'Talibon') ? 'selected' : '' ?>>
                                    Talibon</option>
                                <option value="Trinidad" <?= ($business->municipality == 'Trinidad') ? 'selected' : '' ?>>
                                    Trinidad</option>
                                <option value="Tubigon" <?= ($business->municipality == 'Tubigon') ? 'selected' : '' ?>>
                                    Tubigon</option>
                                <option value="Ubay" <?= ($business->municipality == 'Ubay') ? 'selected' : '' ?>>Ubay
                                </option>
                                <option value="Valencia" <?= ($business->municipality == 'Valencia') ? 'selected' : '' ?>>
                                    Valencia</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="edit_barangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="edit_barangay" name="barangay"
                                value="<?= $business->barangay ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="street" class="form-label">Street</label>
                            <select class="form-select" id="street" name="street" required>
                                <option value="">Select Purok</option>
                                <?php
                                for ($i = 1; $i <= 7; $i++):
                                    $purok = "Purok $i";
                                    $selected = ($business->street == $purok) ? 'selected' : '';
                                    ?>
                                    <option value="<?= $purok ?>" <?= $selected ?>><?= $purok ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="openingDay" class="form-label">Opening Day</label>
                            <select class="form-select" id="openingDay" name="opening_day" required>
                                <option value="" disabled selected>Select Opening Day</option>
                                <option value="Monday" <?= $business->opening_day == 'Monday' ? 'selected' : '' ?>>Monday
                                </option>
                                <option value="Tuesday" <?= $business->opening_day == 'Tuesday' ? 'selected' : '' ?>>
                                    Tuesday</option>
                                <option value="Wednesday" <?= $business->opening_day == 'Wednesday' ? 'selected' : '' ?>>
                                    Wednesday</option>
                                <option value="Thursday" <?= $business->opening_day == 'Thursday' ? 'selected' : '' ?>>
                                    Thursday</option>
                                <option value="Friday" <?= $business->opening_day == 'Friday' ? 'selected' : '' ?>>Friday
                                </option>
                                <option value="Saturday" <?= $business->opening_day == 'Saturday' ? 'selected' : '' ?>>
                                    Saturday</option>
                                <option value="Sunday" <?= $business->opening_day == 'Sunday' ? 'selected' : '' ?>>Sunday
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="closeDay" class="form-label">Closing Day</label>
                            <select class="form-select" id="closeDay" name="close_day" required>
                                <option value="" disabled selected>Select Closing Day</option>
                                <option value="Monday" <?= $business->close_day == 'Monday' ? 'selected' : '' ?>>Monday
                                </option>
                                <option value="Tuesday" <?= $business->close_day == 'Tuesday' ? 'selected' : '' ?>>Tuesday
                                </option>
                                <option value="Wednesday" <?= $business->close_day == 'Wednesday' ? 'selected' : '' ?>>
                                    Wednesday</option>
                                <option value="Thursday" <?= $business->close_day == 'Thursday' ? 'selected' : '' ?>>
                                    Thursday</option>
                                <option value="Friday" <?= $business->close_day == 'Friday' ? 'selected' : '' ?>>Friday
                                </option>
                                <option value="Saturday" <?= $business->close_day == 'Saturday' ? 'selected' : '' ?>>
                                    Saturday</option>
                                <option value="Sunday" <?= $business->close_day == 'Sunday' ? 'selected' : '' ?>>Sunday
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="openingHours" class="form-label">Opening Hours</label>
                            <input type="text" class="form-control" id="openingHours" name="opening_hours"
                                value="<?= $business->opening_hours ?>" required>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="closeHours" class="form-label">Closing Hours</label>
                            <input type="text" class="form-control" id="closeHours" name="close_hours"
                                value="<?= $business->close_hours ?>" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="socialMediaLinks" class="form-label">Social Media Links</label>
                            <input type="text" class="form-control" id="socialMediaLinks" name="social_media_links"
                                value="<?= $business->social_media_links ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="websiteUrl" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="websiteUrl" name="website_url"
                                value="<?= $business->website_url ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="pricing" class="form-label">Pricing</label>
                            <input type="text" class="form-control" id="pricing" name="pricing"
                                value="<?= $business->pricing ?>">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <label for="">Photos</label>
                        <?php if (!empty($business->photos)): ?>
                            <?php
                            $photos = explode(',', $business->photos); // Convert comma-separated photos into an array
                            ?>
                            <?php foreach ($photos as $photo): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal"
                                    data-photo="<?= base_url('assets/images/' . trim($photo)) ?>">
                                    <img src="<?= base_url('assets/images/' . trim($photo)) ?>" width="50" height="50"
                                        style="border-radius: 50%; object-fit: cover; margin: 3px;">
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            No Photo
                        <?php endif; ?>
                    </div> -->

                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required><?= $business->description ?></textarea>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Photo Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Photos View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalPhoto" src="" alt="Photo"
                    style="max-width: 100%; max-height: 400px; width: auto; height: auto; border-radius: 5px;">
            </div>
        </div>
    </div>
</div>

<!-- Mayor's Permit Modal -->
<div class="modal fade" id="mayorsPermitModal" tabindex="-1" aria-labelledby="mayorsPermitModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mayorsPermitModalLabel">Mayor's Permit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="mayorsPermitImage" src="" alt="Mayor's Permit"
                    style="max-width: 100%; max-height: 400px; width: auto; height: auto; border-radius: 5px;">
            </div>
        </div>
    </div>
</div>





<script>
    $('#editBusinessModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var businessId = button.data('id');
        var businessName = button.data('business_name');
        var businessType = button.data('business_type');
        var description = button.data('description');
        var municipality = button.data('municipality');
        var barangay = button.data('barangay');
        var street = button.data('street');
        var contactInfo = button.data('contact_info');
        var openingDay = button.data('opening_day');
        var closeDay = button.data('close_day');
        var openingHours = button.data('opening_hours');
        var closeHours = button.data('close_hours');
        var socialMediaLinks = button.data('social_media_links');
        var websiteUrl = button.data('website_url');
        var pricing = button.data('pricing');
        var photos = button.data('photos');

        // Extract data attributes
        var modal = $(this);
        modal.find('#businessId').val(button.data('id'));
        modal.find('#businessName').val(button.data('business_name'));
        modal.find('#businessType').val(button.data('business_type'));
        modal.find('#description').val(button.data('description'));
        modal.find('#edit_municipality').val(button.data('municipality'));
        modal.find('#edit_barangay').val(button.data('barangay'));
        modal.find('#street').val(button.data('street'));
        modal.find('#contactInfo').val(button.data('contact_info'));
        modal.find('#openingDay').val(button.data('opening_day'));
        modal.find('#closeDay').val(button.data('close_day'));
        modal.find('#openingHours').val(button.data('opening_hours'));
        modal.find('#closeHours').val(button.data('close_hours'));
        modal.find('#socialMediaLinks').val(button.data('social_media_links'));
        modal.find('#websiteUrl').val(button.data('website_url'));
        modal.find('#pricing').val(button.data('pricing'));
        modal.find('#photos').val(button.data('photos'));
    });
</script>


<script>
    $(document).ready(function () {
        $('#resident_table').DataTable({
            responsive: true,
            scrollX: true
        });
    });

    const barangay = {
        Alburquerque: [
            "Bahi", "Basacdacu", "Cantiguib", "Dangay", "East Poblacion",
            "Ponong", "San Agustin", "Santa Filomena", "Tagbuane", "Toril",
            "West Poblacion"
        ],
        Alicia: [
            "Almaria", "Bacong", "Badiang", "Buenasuerte", "Candabong",
            "Casica", "Katipunan", "Linawan", "Lundag", "Poblacion",
            "Santa Cruz", "Suba", "Talisay", "Tanod", "Tawid", "Virgen"
        ],
        Anda: [
            "Almaria", "Bacong", "Badiang", "Buenasuerte", "Candabong",
            "Casica", "Katipunan", "Linawan", "Lundag", "Poblacion",
            "Santa Cruz", "Suba", "Talisay", "Tanod", "Tawid", "Virgen"
        ],
        Baclayon: [
            "Cambanac", "Dasitam", "Buenaventura", "Guiwanon", "Landican",
            "Laya", "Libertad", "Montana", "Pamilacan", "Payahan",
            "Poblacion", "San Isidro", "San Roque", "San Vicente",
            "Santa Cruz", "Taguihon", "Tanday"
        ],
        Balilihan: [
            "Baucan Norte", "Baucan Sur", "Boctol", "Boyog Norte", "Boyog Proper",
            "Boyog Sur", "Cabad", "Candasig", "Cantalid", "Cantomimbo",
            "Cogon", "Datag Norte", "Datag Sur", "Del Carmen Este", "Del Carmen Norte",
            "Del Carmen Sur", "Del Carmen Weste", "Del Rosario", "Dorol", "Haguilanan Grande",
            "Hanopol Este", "Hanopol Norte", "Hanopol Weste", "Magsija", "Maslog",
            "Sagasa", "Sal-ing", "San Isidro", "San Roque", "Santo Niño", "Tagustusan"
        ],
        Batuan: [
            "Aloja", "Behind the Clouds (San Jose)", "Cabacnitan", "Cambacay", "Cantigdas",
            "Garcia", "Janlud", "Poblacion Norte", "Poblacion Sur", "Poblacion Vieja (Lungsodaan)",
            "Quezon", "Quirino", "Rizal", "Rosariohan", "Santa Cruz"
        ],
        Bilar: [
            "Bonifacio", "Bugang Norte", "Bugang Sur", "Cabacnitan (Magsaysay)", "Cambigsi",
            "Campagao", "Cansumbol", "Dagohoy", "Owac", "Poblacion",
            "Quezon", "Riverside", "Rizal", "Roxas", "Subayon",
            "Villa Aurora", "Villa Suerte", "Yanaya", "Zamora"
        ],
        Catigbian: [
            "Alegria", "Ambuan", "Baang", "Bagtic", "Bonbong",
            "Cambailan", "Candumayao", "Causwagan Norte", "Hagbuaya", "Haguilanan",
            "Kang‑iras", "Libertad Sur", "Liboron", "Mahayag Norte", "Mahayag Sur",
            "Maitum", "Mantasida", "Poblacion", "Poblacion Weste", "Rizal",
            "Sinakayanan", "Triple Union"
        ],
        Carmen: [
            "Alegria", "Bicao", "Buenavista", "Buenos Aires", "Calatrava",
            "El Progreso", "El Salvador", "Guadalupe", "Katipunan", "La Libertad",
            "La Paz", "La Salvacion", "La Victoria", "Matin‑ao", "Montehermoso",
            "Montesuerte", "Montesunting", "Montevideo", "Nueva Fuerza",
            "Nueva Vida Este", "Nueva Vida Norte", "Nueva Vida Sur", "Poblacion Norte",
            "Poblacion Sur", "Tambo‑an", "Vallehermoso", "Villaflor", "Villafuerte", "Villacayo"
        ],
        Candijay: [
            "Abihilan", "Anoling", "Boyo‑an", "Cadapdapan", "Cambane",
            "Can‑olin", "Canawa", "Cogtong", "La Union", "Luan",
            "Lungsoda‑an", "Mahangin", "Pagahat", "Panadtaran", "Panas",
            "Poblacion", "San Isidro", "Tambongan", "Tawid", "Tubod (Tres Rosas)",
            "Tugas"
        ],
        Danao: [
            "Cabatuan", "Cantubod", "Carbon", "Concepcion", "Dagohoy",
            "Hibale", "Magtangtang", "Nahud", "Poblacion", "Remedios",
            "San Carlos", "San Miguel", "Santa Fe", "Santo Niño", "Tabok",
            "Taming", "Villa Anunciado"
        ],
        Duero: [
            "Alejawan", "Angilan", "Anibongan", "Bangwalog", "Cansuhay",
            "Danao", "Duay", "Guinsularan", "Imelda", "Itum",
            "Langkis", "Lobogon", "Madua Norte", "Madua Sur", "Mambool",
            "Mawi", "Payao", "San Antonio", "San Isidro", "San Pedro",
            "Taytay"
        ],
        Garcia_Hernandez: [
            "Abijilan", "Antipolo", "Basiao", "Cagwang", "Calma",
            "Cambuyo", "Canayaon East", "Canayaon West", "Candanas", "Candulao",
            "Catmon", "Cayam", "Cupa", "Datag", "Estaca", "Libertad",
            "Lungsodaan East", "Lungsodaan West", "Malinao", "Manaba", "Pasong",
            "Poblacion East", "Poblacion West", "Sacaon", "Sampong", "Tabuan",
            "Togbongon", "Ulbujan East", "Ulbujan West", "Victoria"
        ],
        Guindulman: [
            "Basdio", "Bato", "Bayong", "Biabas", "Bulawan",
            "Cabantian", "Canhaway", "Cansiwang", "Catungawan Sur", "Catungawan Norte",
            "Guio-ang", "Guinacot", "Mayuga", "Sawang", "Tabajan",
            "Tabunoc", "Lombog", "Trinidad", "Casbu"
        ],
        Inabanga: [
            "Anonang", "Bahan", "Badiang", "Baguhan", "Banahao",
            "Baogo", "Bugang", "Cagawasan", "Cagayan", "Cambitoon",
            "Canlinte", "Cawayan", "Cogon", "Cuaming", "Dagnawan",
            "Dagohoy", "Dait Sur", "Datag", "Fatima", "Hambongan",
            "Ilaud (Poblacion)", "Ilaya", "Ilihan", "Lapacan Norte", "Lapacan Sur",
            "Lawis", "Liloan Norte", "Liloan Sur", "Lomboy", "Lonoy Cainsican",
            "Lonoy Roma", "Lutao", "Luyo", "Mabuhay", "Maria Rosario",
            "Nabuad", "Napo", "Ondol", "Poblacion", "Riverside",
            "Saa", "San Isidro", "San Jose", "Santo Niño", "Santo Rosario",
            "Sua", "Tambook", "Tungod", "U-og", "Ubujan"
        ],
        Jagna: [
            "Alejawan", "Balili", "Boctol", "Buyog", "Bunga Ilaya",
            "Bunga Mar", "Cabunga-an", "Calabacita", "Cambugason", "Can-ipol",
            "Canjulao", "Cantagay", "Cantuyoc", "Can-uba", "Can-upao",
            "Faraon", "Ipil", "Kinagbaan", "Laca", "Larapan",
            "Lonoy", "Looc", "Malbog", "Mayana", "Naatang",
            "Nausok", "Odiong", "Pagina", "Pangdan", "Poblacion (Pondol)",
            "Tejero", "Tubod Mar", "Tubod Monte"
        ],
        Lila: [
            "Banban", "Bonkokan Ilaya", "Bonkokan Ubos", "Calvario", "Candulang",
            "Catugasan", "Cayupo", "Cogon", "Jambawan", "La Fortuna",
            "Lomanoy", "Macalingan", "Malinao East", "Malinao West", "Nagsulay",
            "Poblacion", "Taug", "Tiguis"
        ],
        Loay: [
            "Agape", "Alegria Norte", "Alegria Sur", "Bonbon", "Botoc Occidental",
            "Botoc Oriental", "Calvario", "Concepcion", "Hinawanan",
            "Las Salinas Norte", "Las Salinas Sur", "Palo", "Poblacion Ibabao",
            "Poblacion Ubos", "Sagnap", "Tambangan", "Tangcasan Norte",
            "Tangcasan Sur", "Tayong Occidental", "Tayong Oriental", "Tocdog Dacu",
            "Tocdog Ilaya", "Villalimpia", "Yanangan"
        ],
        Loon: [
            "Agsoso", "Badbad Occidental", "Badbad Oriental", "Bagacay Katipunan",
            "Bagacay Kawayan", "Bagacay Saong", "Bahi", "Basac", "Basdacu", "Basdio",
            "Biasong", "Bongco", "Bugho", "Cabacongan", "Cabadug", "Cabug", "Calayugan Norte",
            "Calayugan Sur", "Canmaag", "Cambaquiz", "Campatud", "Candaigan", "Canhangdon Occidental",
            "Canhangdon Oriental", "Canigaan", "Canmanoc", "Cansuagwit", "Cansubayon",
            "Catagbacan Handig", "Catagbacan Norte", "Catagbacan Sur", "Cantam-is Bago",
            "Cantaongon", "Cantumocad", "Cantam-is Baslay", "Cogon Norte (Pob.)",
            "Cogon Sur", "Cuasi", "Genomoan", "Lintuan", "Looc", "Mocpoc Norte",
            "Mocpoc Sur", "Nagtuang", "Napo (Pob.)", "Nueva Vida", "Panangquilon",
            "Pantudlan", "Pig-ot", "Moto Norte (Pob.)", "Moto Sur (Pob.)", "Pondol",
            "Quinobcoban", "Sondol", "Song-on", "Talisay", "Tan-awan", "Tangnan",
            "Taytay", "Ticugan", "Tiwi", "Tontonan", "Tubodacu", "Tubodio", "Tubuan",
            "Ubayon", "Ubojan"
        ],
        Mabini: [
            "Abaca", "Abad Santos", "Aguipo", "Baybayon", "Bulawan", "Cabidian",
            "Cawayanan", "Concepcion (Banlas)", "Del Mar", "Lungsoda‑an", "Marcelo",
            "Minol", "Paraiso", "Poblacion I", "Poblacion II", "San Isidro", "San Jose",
            "San Rafael", "San Roque (Cabulao)", "Tambo", "Tangkigan", "Valaga"
        ],
        Panglao: [
            "Bil‑isan", "Bolod", "Danao", "Doljo", "Libaong", "Looc",
            "Lourdes", "Poblacion", "Tangnan", "Tawala"
        ],
        Pilar: [
            "Aurora", "Bagacay", "Bagumbayan", "Bayong", "Buenasuerte", "Cagawasan",
            "Cansungay", "Catagdaan", "Del Pilar", "Estaca", "Ilaud", "Inaghuban",
            "La Suerte", "Lumbay", "Lundag", "Pamacsalan", "Poblacion", "Rizal",
            "San Carlos", "San Isidro", "San Vicente"
        ],
        Sagbayan: [
            "Calangahan", "Canmano", "Canmaya Centro", "Canmaya Diot", "Dagnawan",
            "Kabasacan", "Kagawasan", "Katipunan", "Langtad", "Libertad Norte",
            "Libertad Sur", "Mantalongon", "Poblacion", "Sagbayan Sur", "San Agustin",
            "San Antonio", "San Isidro", "San Ramon", "San Roque", "San Vicente Norte",
            "San Vicente Sur", "Santa Catalina", "Santa Cruz", "Ubojan"
        ],
        San_Isidro: [
            "Abehilan", "Baryong Daan", "Baunos", "Cabanugan", "Caimbang",
            "Cambansag", "Candungao", "Cansague Norte", "Cansague Sur",
            "Causwagan Sur", "Masonoy", "Poblacion"
        ],
        San_Miguel: [
            "Bayongan", "Bugang", "Cabangahan", "Caluasan", "Camanaga",
            "Cambangay Norte", "Capayas", "Corazon", "Garcia", "Hagbuyo",
            "Kagawasan", "Mahayag", "Poblacion", "San Isidro", "San Jose",
            "San Vicente", "Santo Niño", "Tomoc"
        ],
        Ubay: [
            "Achila", "Bay-ang", "Benliw", "Biabas", "Bongbong",
            "Bood", "Buenavista", "Bulilis", "Cagting", "Calanggaman",
            "California", "Camali-an", "Camambugan", "Casate", "Cuya",
            "Fatima", "Gabi", "Governor Boyles", "Guintabo-an", "Hambabauran",
            "Humayhumay", "Ilihan", "Imelda", "Juagdan", "Katarungan",
            "Lomangog", "Los Angeles", "Pag-asa", "Pangpang", "Poblacion",
            "San Francisco", "San Isidro", "San Pascual", "San Vicente", "Sentinela",
            "Sinandigan", "Tapal", "Tapon", "Tintinan", "Tipolo", "Tubog",
            "Tuboran", "Union", "Villa Teresita"
        ],
        Tagbilaran: [
            "Booy", "Cabawan", "Cogon", "Dao", "Dampas",
            "Poblacion", "Sagnap", "Tangcasan Norte", "Yanangan", "Agape",
            "Botoc Occidental", "Botoc Oriental", "Calvario", "Poblacion Ibabao",
            "Bil-san", "Canmaya Diot", "Pangi-an"
        ],
        Trinidad: [
            "Banlasan", "Bongbong", "Catoogan", "Guinobatan", "Hinlayagan Ilaud",
            "Hinlayagan Ilaya", "Kauswagan", "Kinan-oan", "La Union", "La Victoria",
            "Mabuhay Cabigohan", "Mahagbu", "Manuel A. Roxas", "Poblacion",
            "San Isidro", "San Vicente", "Santo Tomas", "Soom",
            "Tagum Norte", "Tagum Sur", "Cambagi", "Camboang", "Cangiring"
        ],
        Tubigon: [
            "Bagongbanwa", "Banlasan", "Batasan (Batasan Island)", "Bilangbilangan",
            "Bosongon", "Buenos Aires", "Bunacan", "Cabulihan", "Cahayag", "Cawayanan",
            "Centro (Poblacion)", "Genonocan", "Guiwanon", "Ilihan Norte", "Ilihan Sur",
            "Libertad", "Macaas", "Matabao", "Mocaboc Island", "Panadtaran", "Panaytayon",
            "Pandan", "Pangapasan (Pangapasan Island)", "Pinayagan Norte", "Pinayagan Sur",
            "Pooc Occidental (Poblacion)", "Pooc Oriental (Poblacion)", "Potohan", "Talenceras",
            "Tan‑awan", "Tinangnan", "Ubay Island", "Ubojan", "Villanueva"
        ]


    };

    document.getElementById('municipality').addEventListener('change', function () {
        const municipality = this.value;
        const barangaySelect = document.getElementById('barangay');

        barangaySelect.innerHTML = '<option value="" disabled selected>Select Barangay</option>';

        if (barangay[municipality]) {
            barangay[municipality].forEach(function (barangay) {
                const option = document.createElement('option');
                option.value = barangay;
                option.textContent = barangay;
                barangaySelect.appendChild(option);
            });
        }
    });

    function previewImages(inputId, previewId) {
        var files = document.getElementById(inputId).files;
        var previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = "";
        previewContainer.style.display = 'block';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '200px';
                img.style.height = '200px';
                img.style.objectFit = 'cover';
                img.style.marginTop = '10px';
                previewContainer.appendChild(img);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    }

    $(document).ready(function () {
        $('[data-toggle="modal"]').on('click', function () {
            var photoSrc = $(this).data('photo');
            $('#modalPhoto').attr('src', photoSrc);
        });
    });

    $(document).ready(function () {
        $('#mayorsPermitModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var photoSrc = button.data('photo');
            $('#mayorsPermitImage').attr('src', photoSrc);
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(item => {
            item.addEventListener("click", function () {
                let photoSrc = this.getAttribute("data-photo");
                if (this.getAttribute("data-bs-target") === "#photoModal") {
                    document.getElementById("modalPhoto").src = photoSrc;
                } else if (this.getAttribute("data-bs-target") === "#mayorsPermitModal") {
                    document.getElementById("mayorsPermitImage").src = photoSrc;
                }
            });
        });
    });

    $(document).ready(function () {
        $(".approve-btn").click(function () {
            var businessId = $(this).data("id");

            Swal.fire({
                title: "Are you sure?",
                text: "Once approved, this action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Approve!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('Admin_Ctrl/approve_business') ?>",
                        type: "POST",
                        data: { id: businessId },
                        success: function (response) {
                            let currentTime = new Date().toLocaleString();
                            Swal.fire({
                                title: "Approved!",
                                text: "The business has been approved on " + currentTime,
                                icon: "success"
                            });

                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        },
                        error: function () {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
        });
    });

</script>
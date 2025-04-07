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
<div class="main-content">

    <?php
    $user_id = $this->session->userdata("dgt_user");
    if (isset($user_id)) {
        $user = $this->Auth_model->get_user_by_user_id($user_id);
    }
    ?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Spots Details </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table </a></li>
                                <li class="breadcrumb-item active">Spots Details </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                            <button id="addDetails" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#addDetailsModal">
                                <i class="fas fa-plus"></i> Add New Spot
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm">

                </div>
            </div>

            <div class="row">
                <?php foreach ($spots as $spot): ?>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card overflow-hidden blog-grid-card">
                            <div class="position-relative overflow-hidden">
                                <img src="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>"
                                    alt="Spot Image" class="blog-img object-fit-cover" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="#" class="text-success"><?= htmlspecialchars($spot['title'] ?? 'N/A'); ?></a>
                                </h5>
                                <p class="text-muted mb-2">
                                    <?php
                                    $text = htmlspecialchars($spot['details']);
                                    $shortText = substr($text, 0, 100);
                                    ?>
                                    <span class="short-text"><?= $shortText; ?>...</span>
                                    <span class="full-text d-none"><?= $text; ?></span>
                                    <?php if (strlen($text) > 100): ?>
                                        <a href="#" class="see-more" onclick="toggleText(this); return false;">See More</a>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-end gap-2">
                                <a href="<?= base_url('Admin_Ctrl/View_details/' . ($spot['id'] ?? 'N/A')); ?>"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <?php if ($user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                    <!-- Update Spot Button -->
                                    <a href="javascript:void(0);" class="btn btn-warning btn-sm update-spot" data-toggle="modal"
                                        data-target="#updateSpotModal" data-id="<?= $spot['id']; ?>"
                                        data-title="<?= htmlspecialchars($spot['title']); ?>"
                                        data-category="<?= htmlspecialchars($spot['category']); ?>"
                                        data-details="<?= htmlspecialchars($spot['details']); ?>"
                                        data-photo="<?= base_url($spot['photo']); ?>"
                                        data-municipality="<?= htmlspecialchars($spot['municipality']); ?>"
                                        data-barangay="<?= htmlspecialchars($spot['barangay']); ?>"
                                        data-street="<?= htmlspecialchars($spot['street']); ?>"
                                        data-contact="<?= htmlspecialchars($spot['contact']); ?>"
                                        data-entry="<?= htmlspecialchars($spot['entry']); ?>"
                                        data-opening_hrs="<?= htmlspecialchars($spot['opening_hrs']); ?>"
                                        data-others="<?= htmlspecialchars($spot['others']); ?>"
                                        data-links_web="<?= htmlspecialchars($spot['links_web']); ?>"
                                        data-latitude="<?= htmlspecialchars($spot['latitude']); ?>"
                                        data-longitude="<?= htmlspecialchars($spot['longitude']); ?>"
                                        data-link_map="<?= htmlspecialchars($spot['link_map']); ?>"
                                        data-hidden_gem="<?= htmlspecialchars($spot['hidden_gem']); ?>">
                                        <i class="fas fa-edit"></i> Update
                                    </a>

                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                        onclick="deleteRecord(<?= $spot['id'] ?? 'N/A'; ?>)">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- ============================================================================================================  
         ===================================== ADD MODAL HERE =======================================================
         ============================================================================================================  -->
    <div class="modal fade" id="addDetailsModal" tabindex="-1" aria-labelledby="addDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDetailsModalLabel">Add Spot Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDetailsForm">
                        <div class="modal-body">
                            <!-- Image Upload -->
                            <div class="text-center mb-3">
                                <div class="upload-container" onclick="document.getElementById('photo').click()">
                                    <img id="preview" class="image-preview" alt="Image Preview">
                                    <i class="fas fa-camera icon"></i>
                                </div>
                                <input type="file" id="photo" accept="image/*" required class="d-none">
                            </div>

                            <input type="hidden" id="spot_id" name="id">

                            <div class="row g-3">
                                <div class="col-md-4">

                                    <!-- <label for="title" class="form-label">Name Of Spot</label>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Enter Tourist Spot Name" required> -->

                                    <label for="title" class="form-label">Name Of Spot</label>
                                    <select class="form-select" id="title" required onchange="checkNameOfSpots()">
                                        <option value="" disabled selected>Select Name Of Spot</option>
                                        <option value="Chocolate Hills">Chocolate Hills</option>
                                        <option value="Tarsier Sanctuary">Tarsier Sanctuary</option>
                                        <option value="Loboc River Cruise">Loboc River Cruise</option>
                                        <option value="Panglao Beach">Panglao Beach</option>
                                        <option value="Baclayon Church">Baclayon Church</option>
                                        <option value="Danao Adventure Park">Danao Adventure Park</option>
                                        <option value="Anda Beach">Anda Beach</option>
                                        <option value="Balicasag Island">Balicasag Island</option>
                                        <option value="Hinagdanan Cave">Hinagdanan Cave</option>
                                        <option value="Bohol Bee Farm">Bohol Bee Farm</option>
                                        <option value="Blood Compact Shrine">Blood Compact Shrine</option>
                                        <option value="Philippine Tarsier and Wildlife Sanctuary">Philippine Tarsier and
                                            Wildlife Sanctuary</option>
                                        <option value="Bilar Man-Made Forest">Bilar Man-Made Forest</option>
                                        <option value="Pamilacan Island">Pamilacan Island</option>
                                        <option value="Loboc Ecotourism Adventure Park">Loboc Ecotourism Adventure Park
                                        </option>
                                        <option value="Panglao Island">Panglao Island</option>
                                        <option value="Dumaluan Beach">Dumaluan Beach</option>
                                        <option value="Hinagdanan Cave">Hinagdanan Cave</option>
                                        <option value="Man-made Forest">Man-made Forest</option>
                                        <option value="Anda de Boracay">Anda de Boracay</option>
                                        <option value="Tigbawan Beach">Tigbawan Beach</option>
                                        <option value="Carmen's Chocolate Hills Adventure Park">Carmen's Chocolate Hills
                                            Adventure Park</option>
                                        <option value="Bohol Island">Bohol Island</option>
                                        <option value="Panglao Marine Sanctuary">Panglao Marine Sanctuary</option>
                                        <option value="Baclayon Museum">Baclayon Museum</option>
                                        <option value="Bohol Cultural Village">Bohol Cultural Village</option>
                                        <option value="Talingting Beach">Talingting Beach</option>
                                        <option value="Other_name">Other</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" name="custom_name" id="custom_name"
                                        placeholder="Enter your name of spots" style="display: none;">
                                </div>

                                <div class="col-md-4">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" required onchange="checkCategory()">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="Beach">Beach</option>
                                        <option value="Mountain">Mountain</option>
                                        <option value="Park">Park</option>
                                        <option value="Conical Varst Hills">Conical Varst Hills</option>
                                        <option value="Waterfall">Waterfall</option>
                                        <option value="Cave">Cave</option>
                                        <option value="Island">Island</option>
                                        <option value="River">River</option>
                                        <option value="Lake">Lake</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Historical Site">Historical Site</option>
                                        <option value="Cultural Site">Cultural Site</option>
                                        <option value="Wildlife Reserve">Wildlife Reserve</option>
                                        <option value="Farm">Farm</option>
                                        <option value="Botanical Garden">Botanical Garden</option>
                                        <option value="Hot Spring">Hot Spring</option>
                                        <option value="Resort">Resort</option>
                                        <option value="Camping Site">Camping Site</option>
                                        <option value="Nature">Nature</option>
                                        <option value="Other_category">Other</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" name="custom_category"
                                        id="custom_category" placeholder="Enter your category" style="display: none;">
                                </div>

                                <div class="col-md-4">
                                    <label for="contact" class="form-label">Contact Info</label>
                                    <input type="text" class="form-control" id="contact"
                                        placeholder="Enter contact info" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="municipality" class="form-label">Municipality</label>
                                    <select class="form-select" id="municipality" required>
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
                                        <option value="Garcia_Hernandez">Garcia-Hernandez</option>
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
                                        <option value="Pres_Carlos_P_Garcia">Pres. Carlos P. Garcia</option>
                                        <option value="Sagbayan">Sagbayan</option>
                                        <option value="San_Isidro">San Isidro</option>
                                        <option value="San_Miguel">San Miguel</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Sierra_Bullones">Sierra Bullones</option>
                                        <option value="Tagbilaran">Tagbilaran</option>
                                        <option value="Talibon">Talibon</option>
                                        <option value="Trinidad">Trinidad</option>
                                        <option value="Tubigon">Tubigon</option>
                                        <option value="Ubay">Ubay</option>
                                        <option value="Valencia">Valencia</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <select class="form-select" id="barangay" required>
                                        <option value="" disabled selected>Select Barangay</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="street" class="form-label">Street</label>
                                    <select class="form-select" id="street" required onchange="checkStreet()">
                                        <option value="" disabled selected>Select Street</option>
                                        <option value="Purok 1">Purok 1</option>
                                        <option value="Purok 2">Purok 2</option>
                                        <option value="Purok 3">Purok 3</option>
                                        <option value="Purok 4">Purok 4</option>
                                        <option value="Purok 5">Purok 5</option>
                                        <option value="Purok 6">Purok 6</option>
                                        <option value="Purok 7">Purok 7</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" name="custom_street" id="custom_street"
                                        placeholder="Enter your street" style="display: none;">
                                </div>


                                <div class="col-md-4">
                                    <label for="entry" class="form-label">Entry Fee</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="entry[]"
                                            value="Adults - ₱100" id="adultEntry">
                                        <label class="form-check-label" for="adultEntry">Adults - ₱60 - ₱100</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="entry[]"
                                            value="Children - ₱50" id="childEntry">
                                        <label class="form-check-label" for="childEntry">Children - ₱30 - ₱50</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="entry[]" value="Free (Senior Citizens, PWDs,
                                            Children below 7 years old)" id="freeEntry">
                                        <label class="form-check-label" for="freeEntry">Free (Senior Citizens,
                                            PWDs,
                                            Children below 7 years old)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="customEntryCheck"
                                            onclick="toggleCustomEntry()">
                                        <label class="form-check-label" for="customEntryCheck">Other</label>
                                    </div>
                                    <input type="text" id="customEntry" class="form-control mt-2"
                                        placeholder="Enter Entry Fee" style="display:none;">
                                </div>

                                <div class="col-md-4">
                                    <label for="opening_hrs" class="form-label">Opening Hours</label>
                                    <input type="time" class="form-control" id="opening_hrs" value="20:00">
                                </div>

                                <script>
                                    // Function to convert 24-hour format to 12-hour format with AM/PM
                                    function formatTimeTo12Hour() {
                                        let inputTime = document.getElementById('opening_hrs').value;
                                        let [hours, minutes] = inputTime.split(':');
                                        hours = parseInt(hours);

                                        let period = hours >= 12 ? 'PM' : 'AM';
                                        hours = hours % 12 || 12; // Convert 0 to 12 for 12 AM
                                        let formattedTime = `${hours}:${minutes} ${period}`;

                                        console.log(formattedTime); // For demonstration
                                        // You can display this formatted time in another input or element as needed
                                    }

                                    // Call the function on page load or whenever you need
                                    formatTimeTo12Hour();
                                </script>


                                <div class="col-md-4">
                                    <label for="links_web" class="form-label">Links (Website, Facebook,
                                        Instagram)</label>
                                    <input type="text" class="form-control" id="links_web" placeholder="Enter Links"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" step="0.000001"
                                        placeholder="Enter latitude" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" step="0.000001"
                                        placeholder="Enter longitude" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="link_map" class="form-label">Link for Map</label>
                                    <input type="text" class="form-control" id="link_map"
                                        placeholder="Enter of Link Map" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="hidden_gem" class="form-label">Is it a Hidden Gem?</label>
                                    <select id="hidden_gem" name="hidden_gem" class="form-select">
                                        <option value="" disabled selected>Select a Hidden Gem</option>
                                        <option value="Yes, it's a hidden gem">Yes, it's a hidden gem</option>
                                        <option value="No, it's not a hidden gem.">No, it's not a hidden gem.</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="details" class="form-label"> Details</label>
                            <textarea class="form-control" id="details" rows="3" placeholder="Enter spot details"
                                required></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="others" class="form-label">Other Information</label>
                            <textarea class="form-control" id="others" rows="2"
                                placeholder="Additional details"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================================================================================  
         ===================================== UPDATE MODAL HERE ====================================================
         ============================================================================================================  -->
    <div class="modal fade" id="updateSpotModal" tabindex="-1" role="dialog" aria-labelledby="updateSpotModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSpotModalLabel">Update Spot Details</h5>
                </div>
                <form action="<?= base_url('Admin_Ctrl/update_spot'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="spot_id">
                        <input type="hidden" name="existing_photo" id="existing_photo">

                        <div class="form-group text-center"
                            style="position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                            <img id="current_photo" src="" alt="Current Photo" class="img-thumbnail rounded-circle mt-2"
                                style="max-width: 200px; height: 200px; object-fit: cover; display: none;">
                            <div style="position: absolute; bottom: 10px; width: 100%; text-align: center;">
                                <!-- <label for="spot_photo" class="d-block text-white mb-1"></label>
                                <input type="file" class="form-control-file" id="spot_photo" name="photo"> -->
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- <label for="spot_title" class="form-label">Name Of Spot</label>
                                    <input type="text" class="form-control" id="spot_title"
                                        placeholder="Enter Tourist Spot Name" required> -->
                                    <label for="spot_title">Name of Spot</label>
                                    <!-- <select class="form-select" id="spot_title" name="title" required>
                                        <option value="" disabled selected>Select Name Of Spot</option>
                                        <option value="Chocolate Hills">Chocolate Hills</option>
                                        <option value="Tarsier Sanctuary">Tarsier Sanctuary</option>
                                        <option value="Loboc River Cruise">Loboc River Cruise</option>
                                        <option value="Panglao Beach">Panglao Beach</option>
                                        <option value="Baclayon Church">Baclayon Church</option>
                                        <option value="Danao Adventure Park">Danao Adventure Park</option>
                                        <option value="Anda Beach">Anda Beach</option>
                                        <option value="Balicasag Island">Balicasag Island</option>
                                        <option value="Hinagdanan Cave">Hinagdanan Cave</option>
                                        <option value="Bohol Bee Farm">Bohol Bee Farm</option>
                                        <option value="Blood Compact Shrine">Blood Compact Shrine</option>
                                        <option value="Philippine Tarsier and Wildlife Sanctuary">Philippine Tarsier and
                                            Wildlife Sanctuary</option>
                                        <option value="Bilar Man-Made Forest">Bilar Man-Made Forest</option>
                                        <option value="Pamilacan Island">Pamilacan Island</option>
                                        <option value="Loboc Ecotourism Adventure Park">Loboc Ecotourism Adventure Park
                                        </option>
                                        <option value="Panglao Island">Panglao Island</option>
                                        <option value="Dumaluan Beach">Dumaluan Beach</option>
                                        <option value="Hinagdanan Cave">Hinagdanan Cave</option>
                                        <option value="Man-made Forest">Man-made Forest</option>
                                        <option value="Anda de Boracay">Anda de Boracay</option>
                                        <option value="Tigbawan Beach">Tigbawan Beach</option>
                                        <option value="Carmen's Chocolate Hills Adventure Park">Carmen's Chocolate Hills
                                            Adventure Park</option>
                                        <option value="Bohol Island">Bohol Island</option>
                                        <option value="Panglao Marine Sanctuary">Panglao Marine Sanctuary</option>
                                        <option value="Baclayon Museum">Baclayon Museum</option>
                                        <option value="Bohol Cultural Village">Bohol Cultural Village</option>
                                        <option value="Talingting Beach">Talingting Beach</option>
                                        <option value="Other_name">Other</option> 
                                    </select>  -->
                                    <input type="text" class="form-control" id="spot_title" name="title"
                                        placeholder="Enter Tourist Spot Name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spot_category">Category</label>
                                    <select class="form-select" id="spot_category" name="category" required>
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="Beach">Beach</option>
                                        <option value="Mountain">Mountain</option>
                                        <option value="Park">Park</option>
                                        <option value="Conical Varst Hills">Conical Varst Hills</option>
                                        <option value="Waterfall">Waterfall</option>
                                        <option value="Cave">Cave</option>
                                        <option value="Island">Island</option>
                                        <option value="River">River</option>
                                        <option value="Lake">Lake</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Historical Site">Historical Site</option>
                                        <option value="Cultural Site">Cultural Site</option>
                                        <option value="Wildlife Reserve">Wildlife Reserve</option>
                                        <option value="Farm">Farm</option>
                                        <option value="Botanical Garden">Botanical Garden</option>
                                        <option value="Hot Spring">Hot Spring</option>
                                        <option value="Resort">Resort</option>
                                        <option value="Camping Site">Camping Site</option>
                                        <option value="Nature">Nature</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact Info</label>
                                    <input type="text" class="form-control" id="contact" name="contact">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="edit_municipality">Municipality</label>
                                    <select class="form-select" id="edit_municipality" name="municipality" required>
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
                                        <option value="Garcia_Hernandez">Garcia-Hernandez</option>
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
                                        <option value="Pres_Carlos_P_Garcia">Pres. Carlos P. Garcia</option>
                                        <option value="Sagbayan">Sagbayan</option>
                                        <option value="San_Isidro">San Isidro</option>
                                        <option value="San_Miguel">San Miguel</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Sierra_Bullones">Sierra Bullones</option>
                                        <option value="Tagbilaran">Tagbilaran</option>
                                        <option value="Talibon">Talibon</option>
                                        <option value="Trinidad">Trinidad</option>
                                        <option value="Tubigon">Tubigon</option>
                                        <option value="Ubay">Ubay</option>
                                        <option value="Valencia">Valencia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="edit_barangay">Barangay</label>
                                    <input type="text" class="form-control" id="edit_barangay" name="barangay">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="street">Street</label>
                                    <select class="form-select" id="street" name="street" required>
                                        <option value="" disabled selected>Select Street</option>
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entry">Entry Fee</label>
                                    <input type="text" class="form-control" id="entry" name="entry">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="opening_hrs">Opening Hours</label>
                                    <input type="text" class="form-control" id="opening_hrs" name="opening_hrs">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="links_web">Website Links</label>
                                    <input type="text" class="form-control" id="links_web" name="links_web">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link_map">Google Maps Link</label>
                                    <input type="text" class="form-control" id="link_map" name="link_map">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hidden_gem">Hidden Gem</label>
                                    <select class="form-select" id="hidden_gem" name="hidden_gem" required>
                                        <option value="" disabled selected>Select a Hidden Gem</option>
                                        <option value="Yes, it's a hidden gem">Yes, it's a hidden gem</option>
                                        <option value="No, it's not a hidden gem.">No, it's not a hidden gem.</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group ml-3 mr-3">
                                    <label for="spot_details">Details</label>
                                    <textarea class="form-control" id="spot_details" name="details" rows="4"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ml-3 mr-3">
                                    <label for="others">Other Information</label>
                                    <textarea class="form-control" id="others" name="others" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ============================================================================================================  
         ===================================== START SCRIPT FUNCTION THIS ===========================================
         ============================================================================================================  -->

    <script>
        //============================= START ADD MODAL FUNCTION ============================//
        document.getElementById("addDetailsForm").addEventListener("submit", function (event) {
            event.preventDefault();
            let formData = new FormData();
            formData.append("photo", document.getElementById("photo").files[0]);
            formData.append("title", document.getElementById("title").value);
            formData.append("details", document.getElementById("details").value);
            formData.append("municipality", document.getElementById("municipality").value);
            formData.append("barangay", document.getElementById("barangay").value);
            formData.append("street", document.getElementById("street").value);
            formData.append("custom_street", document.getElementById("custom_street").value);
            formData.append("contact", document.getElementById("contact").value);
            formData.append("category", document.getElementById("category").value);
            formData.append("custom_category", document.getElementById("custom_category").value);
            formData.append("custom_name", document.getElementById("custom_name").value);
            formData.append("opening_hrs", document.getElementById("opening_hrs").value);
            formData.append("others", document.getElementById("others").value);
            formData.append("links_web", document.getElementById("links_web").value);
            formData.append("latitude", document.getElementById("latitude").value);
            formData.append("longitude", document.getElementById("longitude").value);
            formData.append("link_map", document.getElementById("link_map").value);
            formData.append("hidden_gem", document.getElementById("hidden_gem").value);

            let entryFees = [];
            document.querySelectorAll('input[name="entry[]"]:checked').forEach((checkbox) => {
                entryFees.push(checkbox.value);
            });

            let customEntry = document.getElementById("customEntry").value;
            if (customEntry.trim() !== "") {
                entryFees.push(customEntry);
            }

            formData.append("entry", JSON.stringify(entryFees));

            fetch("<?= base_url('Admin_Ctrl/add_spot_details'); ?>", {
                method: "POST",
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: data.message,
                            confirmButtonClass: "btn btn-md btn-primary"
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message,
                            confirmButtonClass: "btn btn-md btn-danger"
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        confirmButtonClass: "btn btn-md btn-danger"
                    });
                    console.error("Error:", error);
                });
        });
        //============================= END ADD MODAL FUNCTION ============================//


        //============================ START UPDATE MODAL FUNCTION ========================//
        $(document).ready(function () {
            $('#updateSpotModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var spotId = button.data('id');
                var spotTitle = button.data('title');
                var spotCategory = button.data('category');
                var spotDetails = button.data('details');
                var spotPhoto = button.data('photo');
                var municipality = button.data('municipality');
                var barangay = button.data('barangay');
                var street = button.data('street');
                var contact = button.data('contact');
                var entry = button.data('entry');
                var openingHrs = button.data('opening_hrs');
                var others = button.data('others');
                var linksWeb = button.data('links_web');
                var latitude = button.data('latitude');
                var longitude = button.data('longitude');
                var linkMap = button.data('link_map');
                var hiddenGem = button.data('hidden_gem');

                var modal = $(this);
                modal.find('#spot_id').val(spotId);
                modal.find('#spot_title').val(spotTitle);
                modal.find('#spot_category').val(spotCategory);
                modal.find('#spot_details').val(spotDetails);
                modal.find('#existing_photo').val(spotPhoto);
                modal.find('#edit_municipality').val(municipality);
                modal.find('#edit_barangay').val(barangay);
                modal.find('#street').val(street);
                modal.find('#contact').val(contact);
                modal.find('#entry').val(entry);
                modal.find('#opening_hrs').val(openingHrs);
                modal.find('#others').val(others);
                modal.find('#links_web').val(linksWeb);
                modal.find('#latitude').val(latitude);
                modal.find('#longitude').val(longitude);
                modal.find('#link_map').val(linkMap);
                modal.find('#hidden_gem').val(hiddenGem);

                if (spotPhoto) {
                    modal.find('#current_photo').attr('src', spotPhoto).show();
                } else {
                    modal.find('#current_photo').hide();
                }
            });


            $('#spot_photo').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#current_photo').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
        //============================ END UPDATE MODAL FUNCTION ========================//




    </script>

    <script>
        // Define barangays for each municipality add
        const barangay = {
            Alicia: ["Cabatang", "Cagongcagong", "Cambaol", "Cayacay",
                "Del Monte", "Katipunan", "La Hacienda", "Mahayag", "Napo", "Pagahat",
                "Poblacion", "Progreso", "Putlongcam", "Sudlon", "Untaga"
            ],
            Alburquerque: [
                "Bahi", "Basacdacu", "Cantiguib", "Dangay", "East Poblacion",
                "Ponong", "San Agustin", "Santa Filomena", "Tagbuane", "Toril",
                "West Poblacion"
            ],
            Anda: [
                "Almaria", "Bacong", "Badiang", "Buenasuerte", "Candabong",
                "Casica", "Katipunan", "Linawan", "Lundag", "Poblacion",
                "Santa Cruz", "Suba", "Talisay", "Tanod", "Tawid", "Virgen"
            ],
            Antequera: ["Angilan", "Bantolinao", "Bicahan", "Bitaugan", "Bungahan",
                "Canlaas", "Can-omay", "Cansibuan", "Celing", "Danao", "Danicop",
                "Mag-aso", "Poblacion", "Quinapon-an", "Santo Rosario", "Tabuan",
                "Tagubaas", "Tupas", "Ubojan", "Viga", "Villa Aurora"
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
            Bien_Unido: ["Bilangbilangan Dako", "Bilangbilangan Diot", "Hingotanan East",
                "Hingotanan West", "Liberty", "Malingin", "Mandawa", "Maomawan",
                "Nueva Esperanza", "Nueva Estrella", "Pinamgo", "Poblacion",
                "Puerto San Pedro", "Sagasa", "Tuboran"
            ],
            Bilar: [
                "Bonifacio", "Bugang Norte", "Bugang Sur", "Cabacnitan (Magsaysay)", "Cambigsi",
                "Campagao", "Cansumbol", "Dagohoy", "Owac", "Poblacion",
                "Quezon", "Riverside", "Rizal", "Roxas", "Subayon",
                "Villa Aurora", "Villa Suerte", "Yanaya", "Zamora"
            ],
            Buenavista: ["Anonang", "Asinan", "Bago", "Baluarte", "Bantuan", "Bato", "Bonotbonot",
                "Bugaong", "Cambuhat", "Cambus-oc", "Cangawa", "Cantomugcad", "Cantores",
                "Cantuba", "Catigbian", "Cawag", "Cruz", "Dait", "Eastern Cabul-an", "Hunan",
                "Lapacan Norte", "Lapacan Sur", "Lubang", "Lusong", "Magkaya", "Merryland",
                "Nueva Granada", "Nueva Montana", "Overland", "Panghagban", "Poblacion", "Puting Bato",
                "Rufo Hill", "Sweetland", "Western Cabul-an"
            ],
            Calape: ["Abucayan Norte", "Abucayan Sur", "Banlasan", "Bentig", "Binogawan", "Bonbon",
                "Cabayugan", "Cabudburan", "Calunasan", "Camias", "Canguha", "Catmonan", "Desamparados",
                "Kahayag", "Kinabag-an", "Labuon", "Lawis", "Liboron", "Lomboy", "Lo-oc", "Lucob",
                "Madangog", "Magtongtong", "Mandaug", "Mantatao", "Sampoangon", "San Isidro", "Santa Cruz",
                "Sojoton", "Talisay", "Tinibgan", "Tultugan", "Ulbujan"
            ],
            Catigbian: [
                "Alegria", "Ambuan", "Baang", "Bagtic", "Bonbong",
                "Cambailan", "Candumayao", "Causwagan Norte", "Hagbuaya", "Haguilanan",
                "Kang‑iras", "Libertad Sur", "Liboron", "Mahayag Norte", "Mahayag Sur",
                "Maitum", "Mantasida", "Poblacion", "Poblacion Weste", "Rizal",
                "Sinakayanan", "Triple Union"
            ],
            Clarin: ["Bacani", "Bogtongbod", "Bonbon", "Bontud", "Buacao", "Buangan", "Cabog",
                "Caboy", "Caluwasan", "Candajec", "Cantoyoc", "Comaang", "Danahao", "Katipunan",
                "Lajog", "Mataub", "Nahawan", "Poblacion Centro", "Poblacion Norte", "Poblacion Sur",
                "Tangaran", "Tontunan", "Tubod", "Villaflor"
            ],
            Corella: ["Anislag", "Canangca-an", "Canapnapan", "Cancatac", "Pandol",
                "Poblacion", "Sambog", "Tanday"
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
            Cortes: ["De la Paz", "Fatima", "Loreto", "Lourdes", "Malayo Norte", "Malayo Sur",
                "Monserrat", "New Lourdes", "Patrocinio", "Poblacion", "Rosario", "Salvador",
                "San Roque", "Upper de la Paz"
            ],
            Dagohoy: ["Babag", "Cagawasan", "Cagawitan", "Caluasan", "Candelaria",
                "Can-oling", "Estaca", "La Esperanza", "Mahayag", "Malitbog", "Poblacion",
                "San Miguel", "San Vicente", "Santa Cruz", "Villa Aurora"
            ],
            Danao: [
                "Cabatuan", "Cantubod", "Carbon", "Concepcion", "Dagohoy",
                "Hibale", "Magtangtang", "Nahud", "Poblacion", "Remedios",
                "San Carlos", "San Miguel", "Santa Fe", "Santo Niño", "Tabok",
                "Taming", "Villa Anunciado"
            ],
            Dauis: [
                "Biking", "Bingag", "Catarman", "Dao", "Mariveles", "Mayacabac",
                "Poblacion", "San Isidro", "Songculan", "Tabalong", "Tinago", "Totolan"
            ],
            Dimiao: ["Abihid", "Alemania", "Baguhan", "Bakilid", "Balbalan",
                "Banban", "Bauhugan", "Bilisan", "Cabagakian", "Cabanbanan", "Cadap-agan",
                "Cambacol", "Cambayaon", "Canhayupon", "Canlambong", "Casingan", "Catugasan",
                "Datag", "Guindaguitan", "Guingoyuran", "Ile", "Lapsaon", "Limokon Ilaod",
                "Limokon Ilaya", "Luyo", "Malijao", "Oac", "Pagsa", "Pangihawan", "Puangyuta",
                "Sawang", "Tangohay", "Taongon Cabatuan", "Taongon Can-andam", "Tawid Bitaog"
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
            Getafe: [
                "Alumar", "Banacon", "Buyog", "Cabasakan", "Campao Occidental",
                "Campao Oriental", "Cangmundo", "Carlos P. Garcia", "Corte Baud",
                "Handumon", "Jagoliao", "Jandayan Norte", "Jandayan Sur", "Mahanay",
                "Nasingin", "Pandanon", "Poblacion", "Saguise", "Salog", "San Jose",
                "Santo Niño", "Taytay", "Tugas", "Tulang"
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
            Loboc: [
                "Agape", "Alegria", "Bagumbayan", "Bahian", "Bonbon Lower",
                "Bonbon Upper", "Buenavista", "Bugho", "Cabadiangan", "Calunasan Norte",
                "Calunasan Sur", "Camayaan", "Cambance", "Candabong", "Candasag",
                "Canlasid", "Gon-ob", "Gotozon", "Jimilian", "Oy",
                "Poblacion Ondol", "Poblacion Sawang", "Quinoguitan", "Taytay",
                "Tigbao", "Ugpong", "Valladolid"
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
            Maribojoc: [
                "Agahay", "Aliguay", "Anislag", "Bayacabac", "Bood",
                "Busao", "Cabawan", "Candavid", "Dipatlong", "Guiwanon",
                "Jandig", "Lagtangon", "Lincod", "Pagnitoan", "Poblacion",
                "Punsod", "Punta Cruz", "San Isidro", "San Roque", "San Vicente",
                "Tinibgan", "Toril"
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
            Pres_Carlos_P_Garcia: [
                "Aguining", "Basiao", "Baud", "Bayog", "Bogo",
                "Bonbonon", "Butan", "Campamanog", "Canmangao", "Gaus",
                "Kabangkalan", "Lapinig", "Lipata", "Poblacion", "Popoo",
                "Saguise", "San Jose", "San Vicente", "Santo Rosario",
                "Tilmobo", "Tugas", "Tugnao", "Villa Milagrosa"
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
            Sierra_Bullones: [
                "Abachanan", "Anibongan", "Bugsoc", "Cahayag", "Canlangit", "Canta-ub",
                "Casilay", "Danicop", "Dusita", "La Union", "Lataban", "Magsaysay",
                "Nan-od", "Matin-ao", "Poblacion", "Salvador", "San Agustin", "San Isidro",
                "San Jose", "San Juan", "Santa Cruz", "Villa Garcia"
            ],
            Sevilla: [
                "Bayawahan", "Cabancalan", "Calinga-an", "Calinginan Norte", "Calinginan Sur",
                "Cambagui", "Ewon", "Guinob-an", "Lagtangan", "Licolico", "Lobgob", "Magsaysay",
                "Poblacion"
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
            Talibon: [
                "Bagacay", "Balintawak", "Burgos", "Busalian", "Calituban", "Cataban",
                "Guindacpan", "Magsaysay", "Mahanay", "Nocnocan", "Poblacion", "Rizal",
                "Sag", "San Agustin", "San Carlos", "San Francisco", "San Isidro", "San Jose",
                "San Pedro", "San Roque", "Santo Niño", "Sikatuna", "Suba", "Tanghaligue", "Zamora"
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
            ],
            Valencia: [
                "Adlawan", "Anas", "Anonang", "Anoyon", "Balingasao", "Banderahan",
                "Botong", "Buyog", "Canduao Occidental", "Canduao Oriental", "Canlusong",
                "Canmanico", "Cansibao", "Catug-a", "Cutcutan", "Danao", "Genoveva",
                "Ginopolan", "La Victoria", "Lantang", "Limocon", "Loctob", "Magsaysay",
                "Marawis", "Maubo", "Nailo", "Omjon", "Pangi-an", "Poblacion Occidental",
                "Poblacion Oriental", "Simang", "Taug", "Tausion", "Taytay", "Ticum"
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

        // =========================ALL CUSTOM FUNCTION ============================================//
        function checkEntry() {
            var entryDropdown = document.getElementById("entry");
            var customEntryInput = document.getElementById("custom_entry");

            customEntryInput.style.display = entryDropdown.value === "Custom" ? "block" : "none";
            customEntryInput.required = entryDropdown.value === "Custom";

            if (!customEntryInput.required) {
                customEntryInput.value = "";
            }
        }


        function toggleCustomEntry() {
            var customInput = document.getElementById('customEntry');
            if (document.getElementById('customEntryCheck').checked) {
                customInput.style.display = 'inline-block';
                customInput.focus();
            } else {
                customInput.style.display = 'none';
                customInput.value = '';
            }
        }

        function checkStreet() {
            var entryDropdown = document.getElementById("street");
            var customEntryInput = document.getElementById("custom_street");

            customEntryInput.style.display = entryDropdown.value === "Others" ? "block" : "none";
            customEntryInput.required = entryDropdown.value === "Others";

            if (!customEntryInput.required) {
                customEntryInput.value = "";
            }
        }

        function checkCategory() {
            var entryDropdown = document.getElementById("category");
            var customEntryInput = document.getElementById("custom_category");

            customEntryInput.style.display = entryDropdown.value === "Other_category" ? "block" : "none";
            customEntryInput.required = entryDropdown.value === "Other_category";

            if (!customEntryInput.required) {
                customEntryInput.value = "";
            }
        }

        function checkNameOfSpots() {
            var entryDropdown = document.getElementById("title");
            var customEntryInput = document.getElementById("custom_name");

            customEntryInput.style.display = entryDropdown.value === "Other_name" ? "block" : "none";
            customEntryInput.required = entryDropdown.value === "Other_name";

            if (!customEntryInput.required) {
                customEntryInput.value = "";
            }
        }

        function toggleCustomEntry() {
            var customInput = document.getElementById('customEntry');
            if (document.getElementById('customEntryCheck').checked) {
                customInput.style.display = 'inline-block';
                customInput.focus();
            } else {
                customInput.style.display = 'none';
                customInput.value = '';
            }
        }

        function toggleText(link) {
            let shortText = link.previousElementSibling.previousElementSibling;
            let fullText = link.previousElementSibling;

            if (shortText.classList.contains('d-none')) {
                shortText.classList.remove('d-none');
                fullText.classList.add('d-none');
                link.textContent = 'See More';
            } else {
                shortText.classList.add('d-none');
                fullText.classList.remove('d-none');
                link.textContent = 'See Less';
            }
        }


        function updateHiddenGemValue() {
            const checkbox = document.getElementById('hiddenGemCheck');
            const hiddenValue = document.getElementById('hiddenGemValue');


            if (checkbox.checked) {
                hiddenValue.value = "Yes";
            } else {
                hiddenValue.value = "No";
            }
        }

        document.getElementById('photo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.getElementById('preview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    document.querySelector('.icon').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        // ========================= END ALL CUSTOM FUNCTION ============================================//
    </script>


    <?php if ($this->session->flashdata('success_message')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo $this->session->flashdata('success_message'); ?>',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <script>
        function deleteRecord(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Admin_Ctrl/Delete_details/'); ?>' + id;
                }
            });
        }
    </script>
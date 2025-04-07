<div class="main-content">
    <?php
    $user_id = $this->session->userdata("dgt_user");
    if (isset($user_id)) {
        $user = $this->Auth_model->get_user_by_user_id($user_id);
    }
    ?>
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            display: flex;
            flex-direction: column;
        }

        .card {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex-grow: 1;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Business Spots </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table </a></li>
                                <li class="breadcrumb-item active"> Business </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <?php if ($user->role == 'Business Owner' || $user->role == 'Admin'): ?>
                        <!-- <button class="btn btn-success w-100 mt-2" data-bs-toggle="modal"
                            data-bs-target="#addBusinessModal">
                            <i class="fas fa-plus"></i> Add Your Business
                        </button> -->
                    <?php endif; ?>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end gap-2">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control" placeholder="Search..." />
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>



            <?php if (!empty($businesses)): ?>
                <div class="row">
                    <?php foreach ($businesses as $business): ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo $business->business_name; ?></h4>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewHinagdananModal"
                                            data-bs-businessname="<?php echo $business->business_name; ?>"
                                            data-bs-business_type="<?php echo $business->business_type; ?>"
                                            data-bs-barangay="<?php echo $business->barangay; ?>"
                                            data-bs-municipality="<?php echo $business->municipality; ?>"
                                            data-bs-street="<?php echo $business->street; ?>"
                                            data-bs-contactinfo="<?php echo $business->contact_info; ?>"
                                            data-bs-openingday="<?php echo $business->opening_day; ?>"
                                            data-bs-closeday="<?php echo $business->close_day; ?>"
                                            data-bs-openinghours="<?php echo $business->opening_hours; ?>"
                                            data-bs-closehours="<?php echo $business->close_hours; ?>"
                                            data-bs-socialmedialinks="<?php echo $business->social_media_links; ?>"
                                            data-bs-websiteurl="<?php echo $business->website_url; ?>"
                                            data-bs-pricing="<?php echo $business->pricing; ?>"
                                            data-bs-mayorspermit="<?php echo $business->mayors_permit; ?>"
                                            data-bs-photos="<?php echo $business->photos; ?>"
                                            data-bs-description="<?php echo $business->description; ?>">
                                            <i class="fas fa-eye"></i> View details
                                        </button>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <p class="text-muted">Located in
                                        <?php echo $business->barangay; ?>, <?php echo $business->municipality; ?>, Bohol
                                    </p>

                                    <!-- Swiper -->
                                    <div class="swiper pagination-fraction-swiper rounded">
                                        <div class="swiper-wrapper">
                                            <?php if (!empty($business->photos)): ?>
                                                <?php
                                                $photos = explode(',', $business->photos); // Convert comma-separated photos into an array
                                                ?>
                                                <?php foreach ($photos as $photo): ?>
                                                    <div class="swiper-slide">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal"
                                                            data-photo="<?= base_url('assets/images/' . trim($photo)) ?>">
                                                            <img src="<?= base_url('assets/images/' . trim($photo)) ?>" width="50"
                                                                height="50" alt="Image">
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="swiper-slide">
                                                    <p class="text-center">No Photo Available</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Swiper Navigation -->
                                        <div class="swiper-button-next material-shadow"></div>
                                        <div class="swiper-button-prev material-shadow"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>

                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    <?php endforeach; ?>
                </div><!-- end row -->
            <?php else: ?>
                <p>No active businesses found.</p>
            <?php endif; ?>
            <!-- CSS -->
            <style>
                .business-form {
                    display: flex;
                    flex-wrap: wrap;
                }

                .form-row {
                    width: 30%;
                    /* Adjust the width to ensure 3 items fit in a row */
                    padding: 10px;
                    box-sizing: border-box;
                }

                .form-row p {
                    margin: 0;
                }

                /* Optional: Add some spacing between the rows */
                .form-row+.form-row {
                    margin-top: 10px;
                }
            </style>

            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="viewHinagdananModal" tabindex="-1" aria-labelledby="viewHinagdananModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewHinagdananModalLabel">Business Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Business Info Section -->
                            <div class="mb-4">
                                <h4 id="business-name" class="fw-bold"></h4>
                                <p id="business-location" class="text-muted"></p>
                            </div>

                            <!-- Business Additional Information -->
                            <div class="mb-4">
                                <h5 class="h6 text-primary">Business Details</h5>
                                <div class="business-form">
                                    <div class="form-row">
                                        <p><strong>Type:</strong></p>
                                        <p id="business-type">Example Type</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Street:</strong></p>
                                        <p id="business-street">123 Business St.</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Contact:</strong></p>
                                        <p id="business-contact">(123) 456-7890</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Opening Hours:</strong></p>
                                        <p id="business-opening">9:00 AM - 6:00 PM</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Closing Hours:</strong></p>
                                        <p id="business-close">8:00 PM</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Social Media:</strong></p>
                                        <p id="business-social">@example_social</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Website:</strong></p>
                                        <p id="business-website">www.example.com</p>
                                    </div>
                                    <div class="form-row">
                                        <p><strong>Pricing:</strong></p>
                                        <p id="business-pricing">$50 - $100</p>
                                    </div>
                                </div>

                                <!-- <p id="business-mayors-permit"><strong>Mayor's Permit:</strong> </p> -->
                            </div>

                            <!-- Business Photos Section (Three Side by Side) -->
                            <!-- <div class="mb-4">
                                <h5 class="h6 text-primary">Photos</h5>
                                <div id="business-photos" class="row g-2">
                                    <div class="col-md-4">
                                        <div class="photo-frame"
                                            style="border: 2px solid #ddd; padding: 10px; border-radius: 8px; overflow: hidden;">
                                            <img src="photo1.jpg" alt="Business Photo 1" class="img-fluid rounded"
                                                style="width: 100%; height: 100px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="photo-frame"
                                            style="border: 2px solid #ddd; padding: 10px; border-radius: 8px; overflow: hidden;">
                                            <img src="photo2.jpg" alt="Business Photo 2" class="img-fluid rounded"
                                                style="width: 100%; height: 100px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="photo-frame"
                                            style="border: 2px solid #ddd; padding: 10px; border-radius: 8px; overflow: hidden;">
                                            <img src="photo3.jpg" alt="Business Photo 3" class="img-fluid rounded"
                                                style="width: 100%; height: 100px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="mb-4">
                                <h5 class="h6 text-primary">Description</h5>
                                <p id="business-description"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var viewDetailsButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#viewHinagdananModal"]');

                    viewDetailsButtons.forEach(function (button) {
                        button.addEventListener('click', function () {
                            // Fetch data attributes from the clicked button
                            var businessName = button.getAttribute('data-bs-businessname');
                            var businessType = button.getAttribute('data-bs-business_type');
                            var barangay = button.getAttribute('data-bs-barangay');
                            var municipality = button.getAttribute('data-bs-municipality');
                            var street = button.getAttribute('data-bs-street');
                            var contactInfo = button.getAttribute('data-bs-contactinfo');
                            var openingDay = button.getAttribute('data-bs-openingday');
                            var closeDay = button.getAttribute('data-bs-closeday');
                            var openingHours = button.getAttribute('data-bs-openinghours');
                            var closeHours = button.getAttribute('data-bs-closehours');
                            var socialMediaLinks = button.getAttribute('data-bs-socialmedialinks');
                            var websiteUrl = button.getAttribute('data-bs-websiteurl');
                            var pricing = button.getAttribute('data-bs-pricing');
                            var mayorsPermit = button.getAttribute('data-bs-mayorspermit');
                            var photos = button.getAttribute('data-bs-photos');
                            var description = button.getAttribute('data-bs-description');

                            // Set modal content
                            document.getElementById('business-name').innerText = businessName;
                            document.getElementById('business-location').innerText = barangay + ', ' + municipality + ', Bohol';
                            document.getElementById('business-description').innerText = description;

                            // Set additional business details
                            document.getElementById('business-type').innerText = "Business Type: " + businessType;
                            document.getElementById('business-street').innerText = "Street: " + street;
                            document.getElementById('business-contact').innerText = "Contact Info: " + contactInfo;
                            document.getElementById('business-opening').innerText = "Opening Day: " + openingDay + ", Hours: " + openingHours;
                            document.getElementById('business-close').innerText = "Close Day: " + closeDay + ", Hours: " + closeHours;
                            document.getElementById('business-social').innerText = "Social Media Links: " + socialMediaLinks;
                            document.getElementById('business-website').innerText = "Website: " + websiteUrl;
                            document.getElementById('business-pricing').innerText = "Pricing: " + pricing;
                            // document.getElementById('business-mayors-permit').innerText = "Mayor's Permit: " + mayorsPermit;

                            // Handle photos if they exist
                            var photosDiv = document.getElementById('business-photos');
                            if (photos) {
                                var photoArray = photos.split(',');
                                photosDiv.innerHTML = ''; // Clear any existing photos
                                photoArray.forEach(function (photo) {
                                    var img = document.createElement('img');
                                    img.src = '<?= base_url('assets/images/') ?>' + photo.trim();
                                    img.classList.add('img-fluid');
                                    img.classList.add('mb-2');
                                    photosDiv.appendChild(img);
                                });
                            } else {
                                photosDiv.innerHTML = '<p>No photos available</p>';
                            }
                        });
                    });
                });

            </script>




            <!-- <?php if (!empty($businesses)): ?>
                <div class="row">
                    <?php foreach ($businesses as $business): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg border-0 overflow-hidden">
                                <td class="text-center">
                                    <?php if (!empty($business->photos)): ?>
                                        <?php
                                        $photos = explode(',', $business->photos);
                                        ?>
                                        <div id="imageCarousel" class="position-relative overflow-hidden"
                                            style="width: 100%; max-width: 500px;">
                                            <div id="carouselImages" class="d-flex" style="transition: transform 1s ease;">
                                                <?php foreach ($photos as $index => $permit): ?>
                                                    <div class="carousel-image" style="min-width: 100%; height: 300px;">
                                                        <img src="<?= base_url('assets/images/' . trim($permit)); ?>"
                                                            alt="Business Image" class="card-img-top object-fit-cover"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                        <?php if ($index === 0): ?>
                                                            <div class="badge bg-primary position-absolute top-0 start-0 m-2">Featured</div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <script>
                                            let currentIndex = 0;
                                            const imagesContainer = document.getElementById('carouselImages');
                                            const totalImages = <?= count($photos); ?>;
                        
                                            setInterval(function () {
                                                currentIndex = (currentIndex + 1) % totalImages;
                                                imagesContainer.style.transform = 'translateX(' + (-100 * currentIndex) + '%)';
                                            }, 2000); 
                                        </script>
                                    <?php else: ?>
                                        No Photo
                                    <?php endif; ?>
                                </td> -->

                    <!-- <div class="card-body text-center">
                                    <h5 class="card-title">
                                        <a href="#" class="text-primary text-decoration-none fw-bold">
                                            <?php echo $business->business_name; ?>
                                        </a>
                                    </h5>
                                    <p class="text-muted"><?php echo $business->description; ?></p>
                                    <p class="text-success"><strong><?php echo $business->business_type; ?></strong></p>
                                    <p><i class="ri-money-dollar-circle-fill"></i> <strong>Entry Fee:</strong>
                                        <?php
                                        $entry_fee = json_decode($business->entry_fee, true);
                                        if (is_array($entry_fee)) {
                                            echo implode(", ", $entry_fee);
                                        } else {
                                            echo htmlspecialchars($business->entry_fee);
                                        }
                                        ?>
                                    </p>
                                    <p><i class="ri-map-pin-line"></i> <strong>Location:</strong>
                                        <?php echo $business->street; ?>,
                                        <?php echo $business->barangay; ?>,
                                        <?php echo $business->municipality; ?>, Bohol
                                    </p>
                                    <p><i class="ri-phone-fill"></i> <strong>Contact:</strong>
                                        <?php echo $business->contact_info; ?>
                                    </p>
                                    <label for="">Opening Hours</label>
                                    <p class="text-muted"><?php echo $business->opening_day; ?> -
                                        <?php echo $business->close_day; ?>: <?php echo $business->opening_hours; ?> to
                                        <?php echo $business->close_hours; ?>
                                    </p>
                                    <?php if (!empty($business->social_media_links)): ?>
                                        <a href="<?php echo $business->social_media_links; ?>" target="_blank"
                                            class="btn btn-outline-primary btn-sm">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($business->website_url)): ?>
                                        <a href="<?php echo $business->website_url; ?>" target="_blank"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="ri-global-fill"></i>
                                        </a>
                                    <?php endif; ?>
                                    <label for="">Pricing</label>
                                    <p class="text-muted"><?php echo $business->pricing; ?>
                                    </p>
                                    <p class="text-muted"><?php echo $business->mayors_permit; ?>
                                    </p>




                                    
                                    <div class="d-flex justify-content-center gap-2">
                                        <?php if (!empty($business->website)): ?>
                                            <a href="<?php echo $business->website; ?>" target="_blank"
                                                class="btn btn-outline-info btn-sm">
                                                <i class="ri-global-fill"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($business->facebook_link)): ?>
                                            <a href="<?php echo $business->facebook_link; ?>" target="_blank"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($business->instagram_link)): ?>
                                            <a href="<?php echo $business->municipality; ?>" target="_blank"
                                                class="btn btn-outline-danger btn-sm">
                                                <i class="ri-instagram-line"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end gap-2">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No active businesses found.</p>
            <?php endif; ?> -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <!-- =================================================================================================================
     ========================================== ADD BUSINESS MODAL====================================================
     ================================================================================================================= -->

    <div class="modal fade" id="addBusinessModal" tabindex="-1" aria-labelledby="addBusinessLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBusinessLabel">Add Your Business</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('Admin_Ctrl/insert'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="business_name" class="form-label">Business Name</label>
                                    <input type="text" class="form-control" id="business_name" name="business_name"
                                        required placeholder="Enter business name">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Services">Services</option>
                                        <option value="Food & Beverage">Food & Beverage</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Hospitality">Hospitality</option>
                                        <option value="Travel & Tours">Travel & Tours</option>
                                        <option value="Accommodation">Accommodation</option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Entertainment & Leisure">Entertainment & Leisure
                                        </option>
                                        <option value="Handicrafts & Souvenirs">Handicrafts & Souvenirs
                                        </option>
                                        <option value="Adventure & Outdoor Activities">Adventure & Outdoor
                                            Activities
                                        </option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="municipality" class="form-label">Municipality</label>
                                    <select class="form-select" id="municipality" name="municipality" required>
                                        <option value="" disabled selected>Select Municipality</option>
                                        <option value="Alburquerque">Alburquerque</option>
                                        <option value="Anda">Anda</option>
                                        <option value="Baclayon">Baclayon</option>
                                        <option value="Balilihan">Balilihan</option>
                                        <option value="Batuan">Batuan</option>
                                        <option value="Bilar">Bilar</option>
                                        <option value="Catigbian">Catigbian</option>
                                        <option value="Carmen">Carmen</option>
                                        <option value="Candijay">Candijay</option>
                                        <option value="Danao">Danao</option>
                                        <option value="Duero">Duero</option>
                                        <option value="Garcia_Hernandez">Garcia-Hernandez</option>
                                        <option value="Guindulman">Guindulman</option>
                                        <option value="Inabanga">Inabanga</option>
                                        <option value="Jagna">Jagna</option>
                                        <option value="Lila">Lila</option>
                                        <option value="Loay">Loay</option>
                                        <option value="Loon">Loon</option>
                                        <option value="Mabini">Mabini</option>
                                        <option value="Panglao">Panglao</option>
                                        <option value="Pilar">Pilar</option>
                                        <option value="Sagbayan">Sagbayan</option>
                                        <option value="San_Isidro">San Isidro</option>
                                        <option value="San_Miguel">San Miguel</option>
                                        <option value="Ubay">Ubay</option>
                                        <option value="Tagbilaran">Tagbilaran</option>
                                        <option value="Trinidad">Trinidad</option>
                                        <option value="Tubigon">Tubigon</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="barangay-container" style="display: none;">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <select class="form-select" id="barangay" name="barangay" required>
                                        <option value="">Select Barangay</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="street-container" style="display: none;">
                                    <label for="street" class="form-label">Street</label>
                                    <select class="form-select" id="street" name="street">
                                        <option value="">Select Street</option>
                                        <option value="Purok-1">Purok-1</option>
                                        <option value="Purok-2">Purok-2</option>
                                        <option value="Purok-3">Purok-3</option>
                                        <option value="Purok-4">Purok-4</option>
                                        <option value="Purok-5">Purok-5</option>
                                        <option value="Purok-6">Purok-6</option>
                                        <option value="Purok-7">Purok-7</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="website" class="form-label">Website (Optional)</label>
                                    <input type="url" class="form-control" id="website" name="website" required
                                        placeholder="Enter Website">
                                </div>
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">links (facebook)</label>
                                    <input type="url" class="form-control" id="facebook_link" name="facebook_link"
                                        placeholder="Enter your facebook ">
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">links (instagram)</label>
                                    <input type="url" class="form-control" id="instagram_link" name="instagram_link"
                                        placeholder="Enter your instagram ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="business_desc" class="form-label">Business
                                        Description</label>
                                    <textarea class="form-control" id="business_desc" name="business_desc" rows="3"
                                        required placeholder="Enter business description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="contact_no" name="contact_no" required
                                        placeholder="Enter contact number">
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Upload Business Image</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="opening_hours" class="form-label">Opening Hours</label>
                                    <input type="time" class="form-control" id="opening_hours" name="opening_hours"
                                        placeholder="Enter opening hours">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Entry Fee</label>
                                    <div id="entry_fee_options">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="entry_fee[]"
                                                value="Adult - 100" id="adult_fee">
                                            <label class="form-check-label" for="adult_fee">Adult -
                                                100</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="entry_fee[]"
                                                value="Children - 50" id="children_fee">
                                            <label class="form-check-label" for="children_fee">Children -
                                                50</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="entry_fee[]"
                                                value="Free (Senior Citizens, PWDs, Children below 7 years old)"
                                                id="free_fee">
                                            <label class="form-check-label" for="free_fee">Free (Senior
                                                Citizens, PWDs,
                                                Children below 7 years old)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="custom_fee_checkbox"
                                                onchange="toggleCustomFee()">
                                            <label class="form-check-label" for="custom_fee_checkbox">Others</label>
                                        </div>
                                        <div id="custom_fee_container" class="mt-2 d-none">
                                            <button type="button" class="btn btn-sm btn-primary mb-2"
                                                onclick="addCustomFee()">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Your Business</button>
                    </form>
                </div>
            </div>
        </div>
    </div>












    <script>
        $(document).ready(function () {
            $('#opening_hours').timepicker({
                timeFormat: 'hh:mm p',
                interval: 30,  // 30-minute steps
                minTime: '12:00am',
                maxTime: '11:59pm',
                defaultTime: '',
                startTime: '12:00am',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });




        function toggleCustomFee() {
            var container = document.getElementById('custom_fee_container');
            var checkbox = document.getElementById('custom_fee_checkbox');

            if (checkbox.checked) {
                container.classList.remove('d-none');
                addCustomFee(); // Add at least one input field
            } else {
                container.classList.add('d-none');
                container.innerHTML = '<button type="button" class="btn btn-sm btn-primary mb-2" onclick="addCustomFee()">Add More</button>';
            }
        }

        function addCustomFee() {
            var container = document.getElementById('custom_fee_container');
            var inputDiv = document.createElement('div');
            inputDiv.classList.add('input-group', 'mb-2');

            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'entry_fee[]';
            input.classList.add('form-control');
            input.placeholder = 'Enter entry fee';

            var removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.classList.add('btn', 'btn-danger');
            removeBtn.innerHTML = 'X';
            removeBtn.onclick = function () {
                container.removeChild(inputDiv);
            };

            inputDiv.appendChild(input);
            inputDiv.appendChild(removeBtn);
            container.appendChild(inputDiv);
        }

        const barangayData = {
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
            let barangayContainer = document.getElementById('barangay-container');
            let barangaySelect = document.getElementById('barangay');
            let selectedMunicipality = this.value;

            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
            document.getElementById('street-container').style.display = 'none';

            if (selectedMunicipality) {
                barangayContainer.style.display = 'block';

                if (barangayData[selectedMunicipality]) {
                    barangayData[selectedMunicipality].forEach(barangay => {
                        let option = document.createElement('option');
                        option.value = barangay;
                        option.textContent = barangay;
                        barangaySelect.appendChild(option);
                    });
                }
            } else {
                barangayContainer.style.display = 'none';
            }
        });

        document.getElementById('barangay').addEventListener('change', function () {
            let streetContainer = document.getElementById('street-container');
            if (this.value) {
                streetContainer.style.display = 'block';
            } else {
                streetContainer.style.display = 'none';
            }
        });
    </script>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo $this->session->flashdata('success'); ?>',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?php echo $this->session->flashdata('error'); ?>',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
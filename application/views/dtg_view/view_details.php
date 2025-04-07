<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tourist Spots</h4>

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


                            <a target="_blank" class="row mr-5"
                                style="display: flex; align-items: flex-start; gap: 25px;">
                                <img src="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>"
                                    alt="Chocolate Hills Map" class="img-thumbnail"
                                    style="width: 60%; height: 350px;" />

                                <div id="map" style="width: 350px; height: 350px;"></div>
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
                                                <div class="col-12">
                                                    <label for="rating" class="form-label text-body">Rating</label>
                                                    <select name="rating" class="form-select bg-light border-light"
                                                        required>
                                                        <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                                                        <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                                                        <option value="3">⭐⭐⭐ (3 Stars)</option>
                                                        <option value="2">⭐⭐ (2 Stars)</option>
                                                        <option value="1">⭐ (1 Star)</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="comment" class="form-label text-body">Leave a
                                                        Comment</label>
                                                    <textarea name="comment" class="form-control bg-light border-light"
                                                        rows="3" placeholder="Enter your comment..."
                                                        required></textarea>
                                                </div>



                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-success me-2"
                                                        onclick="openDtgUpload()">
                                                        <i class="fa fa-arrow-left"></i> Back
                                                    </button>
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i class="fa fa-comment"></i> Post Comment
                                                    </button>
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

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <script>
        function openDtgUpload() {
            window.location.href = "<?php echo site_url('Admin_Ctrl/dtg_upload'); ?>";
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

    <script>
        var map = L.map('map').setView([9.8399, 124.1977], 9.5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'

        }).addTo(map);

        L.marker([9.8297, 124.1397]).addTo(map)
            .bindPopup('Chocolate Hills, Bohol')
            .openPopup();
    </script>
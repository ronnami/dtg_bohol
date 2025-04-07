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
            <?php
            $user_id = $this->session->userdata("dgt_user");
            if (isset($user_id)) {
                $user = $this->Auth_model->get_user_by_user_id($user_id);
            }
            ?>

            <!-- <div class="row">
                <div class="col-xxl-5">
                    <div class="d-flex flex-column h-100">
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="card">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0"><?php echo $spot['title']; ?></h4>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        onclick="window.location.href='Admin_Ctrl/View_details';">
                                        <i class="fas fa-eye"></i> View details
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Located in <?php echo $spot['municipality']; ?>, Bohol </p>

                       
                                <div class="swiper pagination-fraction-swiper rounded">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <?php if (!empty($spot['photo'])): ?>
                                                <img src="<?= base_url($spot['photo']) ?>" alt="" class="img-fluid" />
                                            <?php else: ?>
                                                No Photo
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next material-shadow"></div>
                                    <div class="swiper-button-prev material-shadow"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> -->
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
                                <a href="<?= base_url('Admin_Ctrl/User_details_view/' . ($spot['id'] ?? 'N/A')); ?>"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>







            <!-- end col -->


            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->


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
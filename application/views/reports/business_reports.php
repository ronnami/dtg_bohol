<style>
    .modal-custom {
        max-width: 55%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<!-- jsPDF Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<!-- jsPDF autoTable Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0"> Business Unit Reports </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">Business Unit Reports</li>
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
                                    <i class="fas fa-briefcase"></i> Business Unit Reports
                                </h5>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info me-2" id="generatePdfBtn">
                                        <i class="ri-file-pdf-line"></i> PDF Report
                                    </button>
                                    <button type="button" class="btn btn-primary me-2" id="generateExcelBtn">
                                        <i class="ri-file-excel-2-line"></i> Excel Report
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="printTable()">
                                        <i class="fas fa-print"></i> Print Report
                                    </button>
                                    <!-- <form id="filterForm">
                                        <label for="business_name">Business Name:</label>
                                        <input type="text" id="business_name" name="business_name">

                                        <label for="municipality">Municipality:</label>
                                        <input type="text" id="municipality" name="municipality">

                                        <label for="barangay">Barangay:</label>
                                        <input type="text" id="barangay" name="barangay">

                                        <label for="status">Status:</label>
                                        <select id="status" name="status">
                                            <option value="">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>

                                        <button type="submit">Apply Filters</button>
                                    </form> -->
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
                                        <!-- <?php if ($user->role == 'Business Owner' || $user->role == 'Municipal Tourism Officer' || $user->role == 'Admin'): ?>
                                            <th class="text-center">Action</th>
                                        <?php endif; ?> -->
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


<script>
    function printTable() {
        const filters = {
            business_name: $('#business_name').val(),
            municipality: $('#municipality').val(),
            barangay: $('#barangay').val(),
            status: $('#status').val()
        };

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_businesses_print'); ?>",
            type: "POST",
            data: filters,
            dataType: "json",
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No records match the selected filters.");
                    return;
                }

                let printWindow = window.open('', '_blank');
                if (!printWindow) {
                    alert("Popup blocked! Please allow popups for this website.");
                    return;
                }

                const headerContent = `
                <html>
                <head>
                    <title>Business Unit Reports</title>
                    <style>
                        body { 
                            font-family: 'Arial', sans-serif; 
                            font-size: 14px; 
                            margin: 20px; 
                        }
                        h2 {
                            text-align: center;
                            margin-bottom: 20px;
                            font-size: 24px;
                        }
                        table { 
                            width: 100%; 
                            border-collapse: collapse; 
                            margin: 20px 0;
                        }
                        th, td { 
                            padding: 10px; 
                            border: 1px solid #ddd; 
                            text-align: left;
                        }
                        th { 
                            background-color: #f2f2f2;
                            color: #333; 
                            font-weight: bold;
                        }
                        td { 
                            font-size: 12px; 
                            color: #555; 
                        }
                        tr:nth-child(even) { 
                            background-color: #f9f9f9; 
                        }
                        tr:hover {
                            background-color: #f1f1f1;
                        }
                        .container { 
                            max-width: 1200px; 
                            margin: 0 auto;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 30px;
                            font-size: 12px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>Business Unit Reports</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Business Type</th>
                                    <th>Description</th>
                                    <th>Municipality</th>
                                    <th>Barangay</th>
                                    <th>Street</th>
                                    <th>Contact Info</th>
                                    <th>Opening Day</th>
                                    <th>Close Day</th>
                                    <th>Opening Hours</th>
                                    <th>Close Hours</th>
                                    <th>Social Media Links</th>
                                    <th>Website URL</th>
                                    <th>Pricing</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>`;

                let tableContent = response.data.map(row => `
                    <tr>
                        <td>${row.business_name}</td>
                        <td>${row.business_type}</td>
                        <td>${row.description || 'N/A'}</td>
                        <td>${row.municipality}</td>
                        <td>${row.barangay}</td>
                        <td>${row.street}</td>
                        <td>${row.contact_info}</td>
                        <td>${row.opening_day}</td>
                        <td>${row.close_day}</td>
                        <td>${row.opening_hours}</td>
                        <td>${row.close_hours}</td>
                        <td>${row.social_media_links || 'N/A'}</td>
                        <td>${row.website_url || 'N/A'}</td>
                        <td>${row.pricing}</td>
                        <td>${row.status}</td>
                    </tr>`).join('');

                const footerContent = `
                            </tbody>
                        </table>
                        <div class="footer">
                            <p>Generated on: ${new Date().toLocaleString()}</p>
                        </div>
                    </div>
                </body>
                </html>`;

                printWindow.document.write(headerContent + tableContent + footerContent);
                printWindow.document.close();
                printWindow.print();
            },
            error: function (xhr, status, error) {
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }

    $('#filterForm').submit(function (e) {
        e.preventDefault();
        printTable();
    });

</script>

<script>
    function ExcelTable() {
        const filters = {
            business_name: $('#business_name').val(),
            municipality: $('#municipality').val(),
            barangay: $('#barangay').val(),
            status: $('#status').val()
        };

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_businesses_print'); ?>",
            type: "POST",
            data: filters,
            dataType: "json",
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No records match the selected filters.");
                    return;
                }

                let tableData = [
                    [
                        "Business Name", "Business Type", "Description", "Municipality",
                        "Barangay", "Street", "Contact Info", "Opening Day",
                        "Close Day", "Opening Hours", "Close Hours",
                        "Social Media Links", "Website URL", "Pricing", "Status"
                    ]
                ];

                response.data.forEach(row => {
                    tableData.push([
                        row.business_name,
                        row.business_type,
                        row.description || 'N/A',
                        row.municipality,
                        row.barangay,
                        row.street,
                        row.contact_info,
                        row.opening_day,
                        row.close_day,
                        row.opening_hours,
                        row.close_hours,
                        row.social_media_links || 'N/A',
                        row.website_url || 'N/A',
                        row.pricing,
                        row.status
                    ]);
                });

                const wb = XLSX.utils.book_new();
                const ws = XLSX.utils.aoa_to_sheet(tableData);

                ws['!cols'] = [
                    { wpx: 100 }, // Business Name
                    { wpx: 100 }, // Business Type
                    { wpx: 300 }, // Description
                    { wpx: 80 }, // Municipality
                    { wpx: 80 }, // Barangay
                    { wpx: 80 }, // Street
                    { wpx: 100 }, // Contact Info
                    { wpx: 90 }, // Opening Day
                    { wpx: 90 }, // Close Day
                    { wpx: 90 }, // Opening Hours
                    { wpx: 90 }, // Close Hours
                    { wpx: 150 }, // Social Media Links
                    { wpx: 150 }, // Website URL
                    { wpx: 120 }, // Pricing
                    { wpx: 60 }   // Status
                ];

                const range = ws['!ref'];
                const rows = XLSX.utils.decode_range(range);

                for (let row = rows.s.r; row <= rows.e.r; row++) {
                    for (let col = rows.s.c; col <= rows.e.c; col++) {
                        const cell = ws[XLSX.utils.encode_cell({ r: row, c: col })];
                        if (!cell) continue;
                        cell.s = { alignment: { horizontal: 'center', vertical: 'center' } };
                    }
                }

                XLSX.utils.book_append_sheet(wb, ws, "Business List");

                XLSX.writeFile(wb, "Business_Unit_Report.xlsx");
            },
            error: function (xhr, status, error) {
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }

    $('#generateExcelBtn').click(function () {
        ExcelTable();
    });
</script>

<script>
    function generatePdf() {
        const filters = {
            business_name: $('#business_name').val(),
            municipality: $('#municipality').val(),
            barangay: $('#barangay').val(),
            status: $('#status').val()
        };

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_businesses_print'); ?>",  // Adjust URL as per your controller method
            type: "POST",
            data: filters,
            dataType: "json",
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No records match the selected filters.");
                    return;
                }

                const { jsPDF } = window.jspdf;
                // Create the PDF with custom dimensions for landscape (A4 size is 297x210 mm, modify width to 330 mm for example)
                const doc = new jsPDF('landscape', 'mm', [330, 210]); // Custom width of 330mm, keeping the height as A4 landscape

                // Get current date in a readable format
                const currentDate = new Date().toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                // Add Title and Date to PDF
                doc.setFontSize(18);
                doc.text("Business Unit Report", 20, 20);
                doc.setFontSize(12);
                doc.text(`Date Generated: ${currentDate}`, 20, 30);

                // Table headers
                const headers = [
                    "Business Name", "Business Type", "Description", "Municipality", "Barangay",
                    "Street", "Contact Info", "Opening Day", "Close Day", "Opening Hours",
                    "Close Hours", "Social Media Links", "Website URL", "Pricing", "Status"
                ];

                // Prepare table data from AJAX response
                const rows = response.data.map(row => [
                    row.business_name,
                    row.business_type,
                    row.description || 'N/A',
                    row.municipality,
                    row.barangay,
                    row.street,
                    row.contact_info,
                    row.opening_day,
                    row.close_day,
                    row.opening_hours,
                    row.close_hours,
                    row.social_media_links || 'N/A',
                    row.website_url || 'N/A',
                    row.pricing,
                    row.status
                ]);

                // Create the table in PDF
                doc.autoTable({
                    head: [headers],
                    body: rows,
                    startY: 40, // Adjust starting Y position from the top of the page to avoid overlap with date
                    theme: 'grid', // Grid theme for table
                    headStyles: { fillColor: [0, 0, 0] }, // Black background for header
                    bodyStyles: { fontSize: 10 }, // Font size for table content
                });

                // Save the generated PDF as a file
                doc.save("Business_Unit_Report.pdf");
            },
            error: function (xhr, status, error) {
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }

    // Bind click event to the Generate PDF button
    $('#generatePdfBtn').click(function () {
        generatePdf();
    });
</script>




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
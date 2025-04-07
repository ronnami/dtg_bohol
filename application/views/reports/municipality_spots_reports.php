<style>
    .modal-custom {
        max-width: 55%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Municipality Spots Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">Municipality Spots Report</li>
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
                                <h5 class="card-title mb-0 d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-map-marker-alt me-2"></i> Municipality Spots Report</span>
                                    <div class="form-group mb-0 ms-3">
                                        <select id="filter_Municipality" class="form-select">
                                            <option value="" disabled selected>Filter Municipality </option>
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
                                </h5>


                                <div class="col-auto">
                                    <button type="button" class="btn btn-info me-2" onclick="exportSpotsReportsToPDF()">
                                        <i class="ri-file-pdf-line"></i> PDF Report
                                    </button>
                                    <button type="button" class="btn btn-primary me-2"
                                        onclick="exportSpotsReportsToExcel()">
                                        <i class="ri-file-excel-2-line"></i> Excel Report
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="printSpotsReports()">
                                        <i class="fas fa-print"></i> Print Report
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
                                        <!-- <th class="text-center">Photo</th> -->
                                        <th class="text-center">Title</th>
                                        <!-- <th class="text-center">Details</th> -->
                                        <th class="text-center">Municipality</th>
                                        <th class="text-center">Barangay</th>
                                        <th class="text-center">Street</th>
                                        <th class="text-center">Contact</th>
                                        <th class="text-center">Category</th>
                                        <!-- <th class="text-center">Entry</th> -->
                                        <th class="text-center">Opening Hours</th>
                                        <!-- <th class="text-center">Others</th> -->
                                        <!-- <th class="text-center">Website</th> -->
                                        <th class="text-center">Latitude</th>
                                        <th class="text-center">Longitude</th>
                                        <!-- <th class="text-center">Map Link</th> -->
                                        <th class="text-center">Hidden Gem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($residents as $resident): ?>
                                        <tr>
                                            <!-- <td class="text-center"><img
                                                    src="<?= base_url('uploads/' . $resident->photo) ?>" alt="Photo"
                                                    width="50" height="50"></td> -->
                                            <td class="text-center"><?= $resident->title ?></td>
                                            <!-- <td class="text-center"><?= $resident->details ?></td> -->
                                            <td class="text-center"><?= $resident->municipality ?></td>
                                            <td class="text-center"><?= $resident->barangay ?></td>
                                            <td class="text-center"><?= $resident->street ?></td>
                                            <td class="text-center"><?= $resident->contact ?></td>
                                            <td class="text-center"><?= $resident->category ?></td>
                                            <!-- <td class="text-center"><?= $resident->entry ?></td> -->
                                            <td class="text-center"><?= $resident->opening_hrs ?></td>
                                            <!-- <td class="text-center"><?= $resident->others ?></td> -->
                                            <!-- <td class="text-center"><a href="<?= $resident->links_web ?>"
                                                    target="_blank"><?= $resident->links_web ?></a></td> -->
                                            <td class="text-center"><?= $resident->latitude ?></td>
                                            <td class="text-center"><?= $resident->longitude ?></td>
                                            <!-- <td class="text-center"><a
                                                    href="https://maps.google.com/?q=<?= $resident->latitude ?>,<?= $resident->longitude ?>"
                                                    target="_blank">Map Link</a></td> -->
                                            <td class="text-center"><?= $resident->hidden_gem ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var table = $('#resident_table').DataTable({
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

        $('#filter_Municipality').on('change', function () {
            const selectedMunicipality = $(this).val();

            $.ajax({
                url: "<?php echo base_url('Admin_Ctrl/get_spots_report'); ?>",
                type: "POST",
                data: { municipality: selectedMunicipality },
                dataType: "json",
                success: function (response) {
                    // Clear the table
                    table.clear();

                    if (!response.data || response.data.length === 0) {
                        table.draw();
                        return;
                    }

                    response.data.forEach(function (row) {
                        table.row.add([
                            row.title || 'N/A',
                            row.municipality || 'N/A',
                            row.barangay || 'N/A',
                            row.street || 'N/A',
                            row.category || 'N/A',
                            row.contact || 'N/A',
                            row.opening_hrs || 'N/A',
                            row.latitude || 'N/A',
                            row.longitude || 'N/A',
                            row.hidden_gem || 'N/A'
                        ]);
                    });

                    table.draw();
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", status, error);
                    alert("Error fetching data. Please try again.");
                }
            });
        });
    });





    function printSpotsReports() {
        const selectedMunicipality = $("#filter_Municipality").val();

        const municipalityFilter = selectedMunicipality ? selectedMunicipality : null;

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_spots_report'); ?>",
            type: "POST",
            data: { municipality: municipalityFilter },
            dataType: "json",
            success: function (response) {
                if (!response.data || response.data.length === 0) {
                    alert("No spots to print.");
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
                <style>
                    body { font-family: 'Arial', sans-serif; font-size: 14px; margin: 20px; }
                    h2 { text-align: center; margin-bottom: 20px; font-size: 24px; }
                    table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                    th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
                    th { background-color: #f2f2f2; color: #333; font-weight: bold; }
                    td { font-size: 12px; color: #555; }
                    tr:nth-child(even) { background-color: #f9f9f9; }
                    tr:hover { background-color: #f1f1f1; }
                    .footer { text-align: center; margin-top: 30px; font-size: 12px; }
                </style>
            </head>
            <body>
                <div class="container">
                <p style="font-size: 24px;"><strong>Municipality Spots Report</strong></p>
                <p>Generated on: ${new Date().toLocaleString()}</p>
                <table>
                    <thead>
                        <tr>
                            <th>Name of Spots</th>
                            <th>Municipality</th>
                            <th>Barangay</th>
                            <th>Street</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Opening Hours</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Hidden Gems</th>
                        </tr>
                    </thead>
                    <tbody>`;

                let tableContent = response.data.map(row => `
            <tr>
                <td>${row.title || 'N/A'}</td>
                <td>${row.municipality || 'N/A'}</td>
                <td>${row.barangay || 'N/A'}</td>
                <td>${row.street || 'N/A'}</td>
                <td>${row.category || 'N/A'}</td>
                <td>${row.contact || 'N/A'}</td>
                <td>${row.opening_hrs || 'N/A'}</td>
                <td>${row.latitude || 'N/A'}</td>
                <td>${row.longitude || 'N/A'}</td>
                <td>${row.hidden_gem || 'N/A'}</td>
            </tr>`).join('');

                const footerContent = `
                </tbody>
            </table>
            <div class="footer">
                <!-- Optional footer content -->
            </div>
            </div>
        </body>
        </html>`;

                printWindow.document.write(headerContent + tableContent + footerContent);
                printWindow.document.close();
                printWindow.print();
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }



    function exportSpotsReportsToExcel() {
        const selectedMunicipality = $("#filter_Municipality").val();
        const municipalityFilter = selectedMunicipality ? selectedMunicipality : null;

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_spots_report'); ?>",
            type: "POST",
            data: { municipality: municipalityFilter },
            dataType: "json",
            success: function (response) {
                if (!response.data || response.data.length === 0) {
                    alert("No spots to export.");
                    return;
                }

                // Prepare Excel data
                const headers = [
                    "Name of Spots", "Municipality", "Barangay", "Street", "Category",
                    "Contact", "Opening Hours", "Latitude", "Longitude", "Hidden Gems"
                ];

                const rows = response.data.map(row => [
                    row.title || 'N/A',
                    row.municipality || 'N/A',
                    row.barangay || 'N/A',
                    row.street || 'N/A',
                    row.category || 'N/A',
                    row.contact || 'N/A',
                    row.opening_hrs || 'N/A',
                    row.latitude || 'N/A',
                    row.longitude || 'N/A',
                    row.hidden_gem || 'N/A'
                ]);

                // Create worksheet and workbook
                const ws = XLSX.utils.aoa_to_sheet([headers, ...rows]);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Spots Report");

                // Adjust column widths (add spacing between columns)
                ws["!cols"] = [
                    { wpx: 100 },  // Title
                    { wpx: 80 },  // Municipality
                    { wpx: 80 },  // Barangay
                    { wpx: 80 },  // Street
                    { wpx: 150 },  // Category
                    { wpx: 80 },  // Contact
                    { wpx: 80 },  // Opening Hours
                    { wpx: 80 },  // Latitude
                    { wpx: 80 },  // Longitude
                    { wpx: 140 },  // Hidden Gems
                ];

                // Export the Excel file
                XLSX.writeFile(wb, "Municipality_Spots_Report.xlsx");
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }



    async function exportSpotsReportsToPDF() {
        const selectedMunicipality = $("#filter_Municipality").val();
        const municipalityFilter = selectedMunicipality ? selectedMunicipality : null;

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_spots_report'); ?>",
            type: "POST",
            data: { municipality: municipalityFilter },
            dataType: "json",
            success: function (response) {
                if (!response.data || response.data.length === 0) {
                    alert("No spots to export.");
                    return;
                }

                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Header Title and Date Generated
                const now = new Date();
                const dateGenerated = now.toLocaleString(); // You can customize the format if needed
                doc.setFontSize(14);
                doc.text("Municipality Spots Report", 14, 15);
                doc.setFontSize(10);
                doc.text(`Data Generated: ${dateGenerated}`, 14, 22);

                // Table Headers
                const headers = [
                    "Name of Spots", "Municipality", "Barangay", "Street", "Category",
                    "Contact", "Opening Hours", "Latitude", "Longitude", "Hidden Gems"
                ];

                // Table Body
                const rows = response.data.map(row => [
                    row.title || 'N/A',
                    row.municipality || 'N/A',
                    row.barangay || 'N/A',
                    row.street || 'N/A',
                    row.category || 'N/A',
                    row.contact || 'N/A',
                    row.opening_hrs || 'N/A',
                    row.latitude || 'N/A',
                    row.longitude || 'N/A',
                    row.hidden_gem || 'N/A'
                ]);

                // Generate Table
                doc.autoTable({
                    startY: 28,
                    head: [headers],
                    body: rows,
                    styles: { fontSize: 8 },
                    headStyles: { fillColor: [100, 100, 255] },
                    margin: { top: 10 }
                });

                // Save PDF
                doc.save("Municipality_Spots_Report.pdf");
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }


</script>
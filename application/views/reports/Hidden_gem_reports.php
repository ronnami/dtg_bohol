<style>
    .modal-custom {
        max-width: 55%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
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
                        <h4 class="mb-sm-0"> Hidden Gems List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">Hidden Gems List</li>
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
                                    <i class="fas fa-star"></i> Hidden Gems List
                                </h5>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info me-2" id="generatePdfBtn">
                                        <i class="ri-file-pdf-line"></i> PDF Report
                                    </button>
                                    <button type="button" class="btn btn-primary me-2" id="generateExcelBtn">
                                        <i class="ri-file-excel-2-line"></i> Excel Report
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="printSpotsDetails()">
                                        <i class="fas fa-print"></i> Print Report
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="hidden_gems_table"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle mt-3"
                                style="width:100%">
                                <thead class="table-light text-center">
                                    <tr>
                                        <!-- <th class="text-center">Photo</th> -->
                                        <th class="text-center">Name Of Spot</th>
                                        <!-- <th class="text-center">Details</th> -->
                                        <th class="text-center">Municipality</th>
                                        <th class="text-center">Barangay</th>
                                        <th class="text-center">Street</th>
                                        <th class="text-center">Contact Info</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Entry</th>
                                        <th class="text-center">Opening Hours</th>
                                        <th class="text-center">Others</th>
                                        <!-- <th class="text-center">Website Link</th> -->
                                        <th class="text-center">Latitude</th>
                                        <th class="text-center">Longitude</th>
                                        <!-- <th class="text-center">Map Link</th> -->
                                        <th class="text-center">Hidden Gem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($spots as $spot): ?>
                                        <tr>
                                            <!-- <td class="text-center"><img src="<?= base_url('uploads/' . $spot->photo) ?>"
                                                    alt="Photo" width="100"></td> -->
                                            <td class="text-center"><?= $spot->title ?></td>
                                            <!-- <td class="text-center"><?= $spot->details ?></td> -->
                                            <td class="text-center"><?= $spot->municipality ?></td>
                                            <td class="text-center"><?= $spot->barangay ?></td>
                                            <td class="text-center"><?= $spot->street ?></td>
                                            <td class="text-center"><?= $spot->contact ?></td>
                                            <td class="text-center"><?= $spot->category ?></td>
                                            <td class="text-center"><?= $spot->entry ?></td>
                                            <td class="text-center"><?= $spot->opening_hrs ?></td>
                                            <td class="text-center"><?= $spot->others ?></td>
                                            <!-- <td class="text-center"><?= $spot->links_web ?></td> -->
                                            <td class="text-center"><?= $spot->latitude ?></td>
                                            <td class="text-center"><?= $spot->longitude ?></td>
                                            <!-- <td class="text-center"><a href="<?= $spot->link_map ?>" target="_blank">View
                                                    Map</a></td> -->
                                            <td class="text-center"><?= $spot->hidden_gem ?></td>
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
        $('#hidden_gems_table').DataTable({
            responsive: true,
            scrollX: true
        });
    });

    function printSpotsDetails() {
        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_hidden_gem_print'); ?>",
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No hidden gems to print.");
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
                        <p style="font-size: 24px;"><strong>Hidden Gems List Report</strong></p>
                            <p>Generated on: ${new Date().toLocaleString()}</p>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name of Spot</th>
                                        <th>Municipality</th>
                                        <th>Barangay</th>
                                        <th>Street</th>
                                        <th>Contact</th>
                                        <th>Category</th>
                                        <th>Entry</th>
                                        <th>Opening Hours</th>
                                        <th>Other Details</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Hidden Gem</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                let tableContent = response.data.map(row => `
                    <tr>
                        <td>${row.title || 'N/A'}</td>
                        <td>${row.municipality || 'N/A'}</td>
                        <td>${row.barangay || 'N/A'}</td>
                        <td>${row.street || 'N/A'}</td>
                        <td>${row.contact || 'N/A'}</td>
                        <td>${row.category || 'N/A'}</td>
                        <td>${row.entry || 'N/A'}</td>
                        <td>${row.opening_hrs || 'N/A'}</td>
                        <td>${row.others || 'N/A'}</td>
                        <td>${row.latitude || 'N/A'}</td>
                        <td>${row.longitude || 'N/A'}</td>
                        <td>${row.hidden_gem || 'N/A'}</td>
                    </tr>`).join('');

                const footerContent = `
                    </tbody>
                </table>
                <div class="footer">
                   
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




    $(document).ready(function () {
        $('#generateExcelBtn').on('click', function () {
            exportToExcel();
        });

        function exportToExcel() {
            $.ajax({
                url: "<?php echo base_url('Admin_Ctrl/get_hidden_gem_print'); ?>",
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    $('#loadingMessage').show();
                },
                success: function (response) {
                    $('#loadingMessage').hide();

                    if (!response.data || response.data.length === 0) {
                        alert("No hidden gems to export.");
                        return;
                    }

                    let data = response.data.map(row => [
                        row.title || 'N/A', "",
                        row.municipality || 'N/A', "",
                        row.barangay || 'N/A', "",
                        row.street || 'N/A', "",
                        row.contact || 'N/A', "",
                        row.category || 'N/A', "",
                        row.entry || 'N/A', "",
                        row.opening_hrs || 'N/A', "",
                        row.others || 'N/A', "",
                        row.latitude || 'N/A', "",
                        row.longitude || 'N/A', "",
                        row.hidden_gem || 'N/A'
                    ]);

                    const header = [
                        "Name of Spot", "", "Municipality", "", "Barangay", "", "Street", "", "Contact", "",
                        "Category", "", "Entry", "", "Opening Hours", "", "Other Details", "", "Latitude", "",
                        "Longitude", "", "Hidden Gem"
                    ];

                    const ws = XLSX.utils.aoa_to_sheet([header, ...data]);

                    const wscols = [
                        { wpx: 100 }, { wpx: 15 }, { wpx: 80 }, { wpx: 15 }, { wpx: 80 }, { wpx: 15 },
                        { wpx: 100 }, { wpx: 15 }, { wpx: 100 }, { wpx: 15 }, { wpx: 100 }, { wpx: 15 },
                        { wpx: 180 }, { wpx: 15 }, { wpx: 100 }, { wpx: 15 }, { wpx: 250 }, { wpx: 15 },
                        { wpx: 80 }, { wpx: 15 }, { wpx: 80 }, { wpx: 15 }, { wpx: 120 }
                    ];

                    ws['!cols'] = wscols;

                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, "Spots Details");

                    XLSX.writeFile(wb, "Hidden_Gems_List_Report.xlsx");
                },
                error: function (xhr, status, error) {
                    $('#loadingMessage').hide();
                    console.error("AJAX error:", status, error);
                    alert("Error fetching data. Please try again.");
                }
            });
        }
    });


    $(document).ready(function () {
        $('#generatePdfBtn').on('click', function () {
            exportToPDF();
        });

        function exportToPDF() {
            $.ajax({
                url: "<?php echo base_url('Admin_Ctrl/get_hidden_gem_print'); ?>",
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    $('#loadingMessage').show();
                },
                success: function (response) {
                    $('#loadingMessage').hide();

                    if (!response.data || response.data.length === 0) {
                        alert("No hidden gems to export.");
                        return;
                    }

                    // Create a wider landscape PDF (custom format)
                    const doc = new jspdf.jsPDF({
                        orientation: 'landscape',
                        unit: 'mm',
                        format: [400, 210] // width: 400mm, height: 210mm
                    });

                    const title = "Hidden Gems List Report";
                    const currentDate = new Date().toLocaleString(); // e.g., "4/7/2025, 10:30:45 AM"
                    const headers = [
                        ["Name of Spot", "Municipality", "Barangay", "Street", "Contact", "Category", "Entry", "Opening Hours", "Other Details", "Latitude", "Longitude", "Hidden Gem"]
                    ];

                    const rows = response.data.map(row => [
                        row.title || 'N/A',
                        row.municipality || 'N/A',
                        row.barangay || 'N/A',
                        row.street || 'N/A',
                        row.contact || 'N/A',
                        row.category || 'N/A',
                        row.entry || 'N/A',
                        row.opening_hrs || 'N/A',
                        row.others || 'N/A',
                        row.latitude || 'N/A',
                        row.longitude || 'N/A',
                        row.hidden_gem || 'N/A'
                    ]);

                    // Add title
                    doc.setFontSize(18);
                    doc.text(title, 14, 15);

                    // Add Date Generated below title
                    doc.setFontSize(10);
                    doc.text(`Date Generated: ${currentDate}`, 14, 22);

                    // Generate the table
                    doc.autoTable({
                        startY: 27, // space after title and date
                        head: headers,
                        body: rows,
                        theme: 'striped',
                        styles: {
                            fontSize: 8,
                            overflow: 'linebreak',
                            cellWidth: 'wrap',
                            halign: 'center',  // center align content
                            valign: 'middle'
                        },
                        headStyles: {
                            halign: 'center',
                            valign: 'middle'
                        },
                        bodyStyles: {
                            halign: 'center',
                            valign: 'middle'
                        },
                        tableWidth: 'auto',
                        margin: { left: 10, right: 10 }
                    });

                    doc.save("Hidden_Gems_List_Report.pdf");
                },
                error: function (xhr, status, error) {
                    $('#loadingMessage').hide();
                    console.error("AJAX error:", status, error);
                    alert("Error fetching data. Please try again.");
                }
            });
        }
    });




</script>
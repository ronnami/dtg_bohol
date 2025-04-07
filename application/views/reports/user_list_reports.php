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
                        <h4 class="mb-sm-0">User List Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables </a></li>
                                <li class="breadcrumb-item active">User List Report </li>
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
                                    <span><i class="fas fa-user-plus me-2"></i> User List Report</span>
                                    <div class="form-group mb-0 ms-3">
                                        <select id="filter_role" class="form-select">
                                            <option value="" disabled selected>Select Role to Filter</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Municipal Tourism Officer">Municipal Tourism Officer</option>
                                            <option value="Department Of Tourism">Department Of Tourism</option>
                                            <option value="Tourist">Tourist</option>
                                            <option value="Business Owner">Business Owner</option>
                                        </select>
                                    </div>

                                </h5>


                                <div class="col-auto">
                                    <button type="button" class="btn btn-info me-2" onclick="exportUserReportsToPDF()">
                                        <i class="ri-file-pdf-line"></i> PDF Report
                                    </button>
                                    <button type="button" class="btn btn-primary me-2"
                                        onclick="exportUserReportsToExcel()">
                                        <i class="ri-file-excel-2-line"></i> Excel Report
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="printUserReports()">
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
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Username </th>
                                        <th class="text-center">Role </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= !empty($user['role']) ? $user['role'] : 'User' ?></td>
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

        $('#filter_role').on('change', function () {
            var role = $(this).val();
            if (role) {
                table.column(2).search(role).draw();
            } else {
                table.column(2).search('').draw();
            }
        });
    });




    function printUserReports() {
        var selectedRole = $('#filter_role').val();

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_user_report'); ?>",
            type: "POST",
            dataType: "json",
            data: { role: selectedRole },
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No users to print.");
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
                    <p style="font-size: 24px;"><strong>User Report</strong></p>
                    <p>Generated on: ${new Date().toLocaleString()}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>`;

                let tableContent = response.data.map(row => `
                <tr>
                    <td>${row.name || 'N/A'}</td>
                    <td>${row.username || 'N/A'}</td>
                    <td>${row.role || 'N/A'}</td>
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
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }

    function exportUserReportsToExcel() {
        var selectedRole = $('#filter_role').val();

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_user_report'); ?>",
            type: "POST",
            dataType: "json",
            data: { role: selectedRole },
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No users to export.");
                    return;
                }

                let excelData = [];
                excelData.push(["Name", "Username", "Role"]);

                response.data.forEach(row => {
                    excelData.push([
                        row.name || 'N/A',
                        row.username || 'N/A',
                        row.role || 'N/A'
                    ]);
                });

                var ws = XLSX.utils.aoa_to_sheet(excelData);

                ws['!cols'] = [
                    { wpx: 150 },
                    { wpx: 100 },
                    { wpx: 200 },
                ];

                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "User Report");

                XLSX.writeFile(wb, "User_Report.xlsx");
            },
            error: function (xhr, status, error) {
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }

    function exportUserReportsToPDF() {
        var selectedRole = $('#filter_role').val();

        $.ajax({
            url: "<?php echo base_url('Admin_Ctrl/get_user_report'); ?>",
            type: "POST",
            dataType: "json",
            data: { role: selectedRole },
            beforeSend: function () {
                $('#loadingMessage').show();
            },
            success: function (response) {
                $('#loadingMessage').hide();

                if (!response.data || response.data.length === 0) {
                    alert("No users to export.");
                    return;
                }

                // Create PDF document
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Set up the table headers
                const headers = ["Name", "Username", "Role"];
                const data = response.data.map(row => [
                    row.name || 'N/A',
                    row.username || 'N/A',
                    row.role || 'N/A'
                ]);

                // Add table to PDF (starting from y position 10)
                doc.autoTable({
                    head: [headers],
                    body: data,
                    startY: 10,
                    theme: 'grid', // optional: to add grid lines to the table
                });

                // Download the PDF
                doc.save('User_Report.pdf');
            },
            error: function (xhr, status, error) {
                $('#loadingMessage').hide();
                console.error("AJAX error:", status, error);
                alert("Error fetching data. Please try again.");
            }
        });
    }


</script>
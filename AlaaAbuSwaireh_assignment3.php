<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Database</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

        <style>
            
            body {
                margin: auto;
                overflow-y: hidden;
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                font-size:12px;
                overflow: auto;
                background: linear-gradient(315deg, rgba(71, 4, 67, 1) 3%, rgba(58, 6, 96, 1) 38%, rgba(51, 67, 161, 1) 68%, rgba(88, 4, 65, 1) 98%);
                animation: gradient 15s ease infinite;
                background-size: 400% 400%;
                background-attachment: fixed;
                overflow: hidden;
            }

            .demo{ font-family: 'Montserrat', sans-serif !important; color:white;}
            
            .panel{
                background:transparent;
                padding: 0;
                border-radius: 10px;
                border: none;
                height:100%;
                box-shadow: 0 0 0 5px rgba(0,0,0,0.05),0 0 0 10px rgba(0,0,0,0.05);
            }
            .panel .panel-heading{
                padding: 20px 15px;
                border-radius: 10px 10px 0 0;
                margin: 0;
            }
            .panel .panel-heading .title{
                color: #fff;
                font-size: 28px;
                font-weight: 500;
                text-transform: capitalize;
                line-height: 40px;
                margin: 0;
            }
            .panel .panel-heading .btn{
                color: rgba(255,255,255,0.5);
                background: transparent;
                font-size: 16px;
                text-transform: capitalize;
                border: 2px solid #fff;
                border-radius: 50px;
                transition: all 0.3s ease 0s;
            }
            .panel .panel-heading .btn:hover{
                color: #fff;
                text-shadow: 3px 3px rgba(255,255,255,0.2);
            }
            .panel .panel-heading .form-control{
                color: #fff;
                background-color: transparent;
                width: 35%;
                height: 40px;
                border: 2px solid #fff;
                border-radius: 20px;
                display: inline-block;
                transition: all 0.3s ease 0s;
            }
            .panel .panel-heading .form-control:focus{
                background-color: rgba(255,255,255,0.2);
                box-shadow: none;
                outline: none;
            }
            .panel .panel-heading .form-control::placeholder{
                color: rgba(255,255,255,0.5);
                font-size: 15px;
                font-weight: 500;
            }

            .panel .panel-body{ padding: 0; }

            .table>:not(caption)>*>*{
                background: none !important;
            }
            .panel-body{
                height:90%;
            }
            .panel .panel-body .table thead tr th{
                color: #fff;
                background-color: rgba(255, 255, 255, 0.2) !important;
                text-transform: uppercase;
                padding: 12px;
                border: none;
            }
            .panel .panel-body .table tbody tr td{
                color: #fff;
                padding: 10px 12px;
                vertical-align: middle;
                border: none;
            }
            .panel .panel-body .table tbody tr:nth-child(even){ background-color: rgba(255,255,255,0.05); }
            .panel .panel-body .table tbody .action-list{
                padding: 0;
                margin: 0;
                list-style: none;
            }
            .panel .panel-body .table tbody .action-list li{
                display: inline-block;
                margin: 0 5px;
            }
            .panel .panel-body .table tbody .action-list li a{
                color: #fff;
                font-size: 15px;
                position: relative;
                z-index: 1;
                transition: all 0.3s ease 0s;
            }
            .panel .panel-body .table tbody .action-list li a:hover{ text-shadow: 3px 3px 0 rgba(255,255,255,0.3); }
            .panel .panel-body .table tbody .action-list li a:before,
            .panel .panel-body .table tbody .action-list li a:after{
                content: attr(data-tip);
                color: #fff;
                background-color: #111;
                font-size: 12px;
                padding: 5px 7px;
                border-radius: 4px;
                text-transform: capitalize;
                display: none;
                transform: translateX(-50%);
                position: absolute;
                left: 50%;
                top: -32px;
                transition: all 0.3s ease 0s;
            }
            .panel .panel-body .table tbody .action-list li a:after{
                content: '';
                height: 15px;
                width: 15px;
                padding: 0;
                border-radius: 0;
                transform: translateX(-50%) rotate(45deg);
                top: -18px;
                z-index: -1;
            }
            .panel .panel-body .table tbody .action-list li a:hover:before,
            .panel .panel-body .table tbody .action-list li a:hover:after{
                display: block;
            }
            .panel .panel-footer{
                color: #fff;
                /* background-color: transparent; */
                padding: 15px;
                border: none;
            }
            .panel .panel-footer .col{ line-height: 35px; }
            /*  */
            @media only screen and (max-width:767px){
                .panel .panel-heading .title{
                    text-align: center;
                    margin: 0 0 10px;
                }
                .panel .panel-heading .btn_group{ text-align: center; }
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 0%;
                }
                50% {
                    background-position: 100% 100%;
                }
                100% {
                    background-position: 0% 0%;
                }
            }

            .wave {
                background: rgb(255 255 255 / 25%);
                border-radius: 1000% 1000% 0 0;
                position: fixed;
                width: 200%;
                height: 8em;
                animation: wave 10s -3s linear infinite;
                transform: translate3d(0, 0, 0);
                opacity: 0.8;
                bottom: 0;
                left: 0;
                z-index: -1;
            }

            .wave:nth-of-type(2) {
                bottom: -1.25em;
                animation: wave 18s linear reverse infinite;
                opacity: 0.8;
            }

            .wave:nth-of-type(3) {
                bottom: -2.5em;
                animation: wave 20s -1s reverse infinite;
                opacity: 0.9;
            }

            @keyframes wave {
                2% {
                    transform: translateX(1);
                }

                25% {
                    transform: translateX(-25%);
                }

                50% {
                    transform: translateX(-50%);
                }

                75% {
                    transform: translateX(-25%);
                }

                100% {
                    transform: translateX(1);
                }
            }
            .pagination > li{
                border:1px solid #6610f2;
                
            }
            .pagination >li a{
                color:#6610f2 !important;
            }
            .active>.page-link, .page-link.active{
                background-color: #6610f2 !important;
            }
             .active>.page-link, .page-link.active a{
                color: #fff !important;
            }
            .btn-purple{
                background-color: #6610f2 !important;
                color:white;
            }
            .paginate_button{
                border-color: #6610f2;
            }
        </style>
    </head>
    <body class="demo p-5 container">
        <div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>

        <h5 class="mb-4 text-center">Welcome to Student Database</h5>

        <div class="row container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="panel p-5 pt-0">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-6 col-xs-6">
                                    <h6>Student Information</h6>
                                </div>
                                <div class="col-sm-6 col-xs-6 text-right">
                                    <div class="btn_group float-end">
                                        <button class="btn btn-default reload-btn" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                        <button class="btn btn-default" title="PDF" id="downloadPdfBtn"><i class="fa fa-file-pdf"></i></button>
                                        <button class="btn btn-default" title="Excel" id="downloadExcelBtn"><i class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Student Email</th>
                                        <th>GPA</th>
                                        <th class="float-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $students = 
                                        [
                                            ["stdNo" => "1001", "stdName" => "Ali", "stdEmail" => "ali@example.com", "stdGPA" => 3.5],
                                            ["stdNo" => "1002", "stdName" => "Sara", "stdEmail" => "sara@example.com", "stdGPA" => 3.8],
                                            ["stdNo" => "1003", "stdName" => "Omar", "stdEmail" => "omar@example.com", "stdGPA" => 2.9],
                                            ["stdNo" => "1004", "stdName" => "Zayd", "stdEmail" => "zayd@example.com", "stdGPA" => 1.9],
                                            ["stdNo" => "1005", "stdName" => "Khalid", "stdEmail" => "khalid@example.com", "stdGPA" => 1.9],
                                            ["stdNo" => "1006", "stdName" => "Mariam", "stdEmail" => "mariam@example.com", "stdGPA" => 1.9],
                                            ["stdNo" => "1007", "stdName" => "Tariq", "stdEmail" => "tariq@example.com", "stdGPA" => 1.9],
                                            ["stdNo" => "1008", "stdName" => "Salma", "stdEmail" => "salma@example.com", "stdGPA" => 1.9],
                                            ["stdNo" => "1009", "stdName" => "Lina", "stdEmail" => "lina@example.com", "stdGPA" => 3.2],
                                            ["stdNo" => "1010", "stdName" => "Nader", "stdEmail" => "nader@example.com", "stdGPA" => 2.5],
                                            ["stdNo" => "1011", "stdName" => "Farah", "stdEmail" => "farah@example.com", "stdGPA" => 3.9],
                                            ["stdNo" => "1012", "stdName" => "Yousef", "stdEmail" => "yousef@example.com", "stdGPA" => 2.7],
                                            ["stdNo" => "1013", "stdName" => "Noor", "stdEmail" => "noor@example.com", "stdGPA" => 3.6],
                                            ["stdNo" => "1014", "stdName" => "Amani", "stdEmail" => "amani@example.com", "stdGPA" => 3.0],
                                            ["stdNo" => "1015", "stdName" => "Rami", "stdEmail" => "rami@example.com", "stdGPA" => 2.1],
                                            ["stdNo" => "1016", "stdName" => "Dana", "stdEmail" => "dana@example.com", "stdGPA" => 3.4],
                                            ["stdNo" => "1017", "stdName" => "Hassan", "stdEmail" => "hassan@example.com", "stdGPA" => 2.8],
                                            ["stdNo" => "1018", "stdName" => "Reem", "stdEmail" => "reem@example.com", "stdGPA" => 3.7]
                                        ];
                                        for ($i = 0 ; $i < count($students) ; $i++) {
                                            echo '<tr>';
                                            echo '<td>' . ($i + 1) . '</td>';
                                            echo '<td>' . $students[$i]["stdNo"] . '</td>';
                                            echo '<td>' . $students[$i]["stdName"] . '</td>';
                                            echo '<td>' . $students[$i]["stdEmail"] . '</td>';
                                            echo '<td>' . $students[$i]["stdGPA"] . '</td>';
                                            echo '
                                            <td>
                                                <ul class="action-list">
                                                    <li><a href="#" class="edit-btn" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="#" class="delete-btn" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                                </ul>
                                            </td>
                                            ';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                <input type="hidden" id="editRowIndex">
                <div class="mb-3">
                    <label for="editName" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="editName" required>
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Student Email</label>
                    <input type="email" class="form-control" id="editEmail" required>
                </div>
                <div class="mb-3">
                    <label for="editGPA" class="form-label">GPA</label>
                    <input type="number" step="0.1" class="form-control" id="editGPA" required>
                </div>
                <button type="submit" class="btn btn-purple align-right">Save Changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script>
        $(document).ready(function () {
            const table = $('#studentTable').DataTable({
                paging: true,
                pageLength: 8,
                lengthMenu: [8, 10, 20],
            });

            const originalData = table.rows().data().toArray(); // Save original

            // Reload Button
            $('.reload-btn').on('click', function () {
                table.clear(); // Clear current data
                table.rows.add(originalData); // Add back original data
                table.draw(); // Redraw the table
            });

            // Edit Button Click
            $('#studentTable').on('click', '.edit-btn', function () {
                const row = $(this).closest('tr');
                const rowIndex = table.row(row).index();
                const data = table.row(row).data();

                $('#editRowIndex').val(rowIndex);
                $('#editName').val(data[2]);
                $('#editEmail').val(data[3]);
                $('#editGPA').val(data[4]);

                $('#editModal').modal('show');
            });

            
            $('#editForm').on('submit', function (e) {
                e.preventDefault();
                const index = $('#editRowIndex').val();
                const name = $('#editName').val();
                const email = $('#editEmail').val();
                const gpa = $('#editGPA').val();

                const data = table.row(index).data();
                data[2] = name;
                data[3] = email;
                data[4] = gpa;
                table.row(index).data(data).draw();

                $('#editModal').modal('hide');
            });
            $('#studentTable').on('click', '.delete-btn', function () {
                if (confirm('Are you sure you want to delete this student?')) {
                    const row = $(this).closest('tr');
                    table.row(row).remove().draw();
                }
            });
        
            $('#downloadExcelBtn').on('click', function () {
                const wb = XLSX.utils.book_new();
                const ws_data = [['#', 'Student ID', 'Name', 'Email', 'GPA']];

                // Get all rows from DataTables (not just visible)
                table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    const data = this.data(); // full row data
                    const row = [
                        rowIdx + 1,
                        data[1], // Student ID
                        data[2], // Name
                        data[3], // Email
                        data[4]  // GPA
                    ];
                    ws_data.push(row);
                });

                const ws = XLSX.utils.aoa_to_sheet(ws_data);
                XLSX.utils.book_append_sheet(wb, ws, 'Students');
                XLSX.writeFile(wb, 'students.xlsx');
            });

            
            $('#downloadPdfBtn').on('click', function () {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                const headers = [['#', 'Student ID', 'Name', 'Email', 'GPA']];
                const data = [];

                table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    const row = this.data();
                    data.push([
                        rowIdx + 1,
                        row[1],
                        row[2],
                        row[3],
                        row[4]
                    ]);
                });

                doc.text("Student Table", 14, 10);
                doc.autoTable({
                    startY: 15,
                    head: headers,
                    body: data
                });

                doc.save('students.pdf');
            });
        });
    </script>
</body>
</html>

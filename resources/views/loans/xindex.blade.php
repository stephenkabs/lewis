<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Loans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Update Loan Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="updateStatusForm" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateStatusButtons = document.querySelectorAll('.update-status-btn');
            const updateStatusForm = document.getElementById('updateStatusForm');
            const statusDropdown = document.getElementById('status');

            updateStatusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const actionUrl = this.getAttribute('data-action');
                    const currentStatus = this.getAttribute('data-current-status');

                    // Debug
                    console.log('Action URL:', actionUrl);
                    console.log('Current Status:', currentStatus);

                    // Set the form's action URL
                    updateStatusForm.setAttribute('action', actionUrl);

                    // Set the current status in the dropdown
                    statusDropdown.value = currentStatus;
                });
            });
        });
    </script> --}}

    <div class="modal fade" id="updateLoanStatusModal" tabindex="-1" aria-labelledby="updateLoanStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateLoanStatusForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" id="statusInput">

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLoanStatusLabel">Update Loan Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="loanStatus" class="form-label">Loan Status</label>
                            <select id="loanStatus" name="status" class="form-select" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="closed">Closed</option> <!-- Added Paid Status -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    const updateButtons = document.querySelectorAll('.update-loan-status-btn');
    const updateForm = document.getElementById('updateLoanStatusForm');
    const statusSelect = document.getElementById('loanStatus');

    updateButtons.forEach(button => {
        button.addEventListener('click', () => {
            const loanId = button.getAttribute('data-id');
            const currentStatus = button.getAttribute('data-status');

            // Set the form action dynamically
            updateForm.action = `/loans/${loanId}/update-status`;

            // Set the current status in the select dropdown
            statusSelect.value = currentStatus;
        });
    });
});

    </script>




    <!-- Modal -->
    <div class="modal fade" id="showLoanModal" tabindex="-1" aria-labelledby="showLoanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showLoanModalLabel">Loan Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Loan details will be dynamically populated here -->
                    <div id="loanDetailsContent">
                        <p>Loading...</p>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteMinistryModal" tabindex="-1" aria-labelledby="deleteMinistryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMinistryModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Loan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteMinistryForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('toast.success_toast')
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        @include('includes.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- Copy and Paste this section for more items -->
                        <div class="col-lg-4 col-md-6 mb-4">

                            <div class="d-flex align-items-center p-3"
                                style="background-color: white; border: 1px solid #ccc; border-radius: 10px;">
                                <div class="icon-container me-3"
                                    style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                    <i class="fas fa-dollar-sign" style="font-size: 24px; color: #555;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{ formatCurrency($loans->sum('total_repayable')) }}</h6>
                                    <p class="mb-0 text-muted">The Total amount Expected from (
                                        <b>{{ $loans->count() }}</b> ) Clients..
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- Repeatable Icon Section -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="/system_documents/loan-agreement-template.docx" style="text-decoration: none;"
                                download>
                                <div class="d-flex align-items-center p-3"
                                    style="background-color: white; border: 1px solid #ccc; border-radius: 10px; cursor: pointer;">
                                    <div class="icon-container me-3"
                                        style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                        <i class="ion ion-md-code-download" style="font-size: 24px; color: #555;"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Generate Loan Agreement </h6>
                                        <p class="mb-0 text-muted">Loan Agreement Form in Word</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Repeatable Icon Section -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="/windows/loan_calculator" style="text-decoration: none;">
                                <div class="d-flex align-items-center p-3"
                                    style="background-color: white; border: 1px solid #ccc; border-radius: 10px; cursor: pointer;">
                                    <div class="icon-container me-3"
                                        style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                        <i class="ion ion-md-calculator" style="font-size: 24px; color: #555;"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Loan Calculator</h6>
                                        <p class="mb-0 text-muted">Start Planning Your Loan</p>
                                    </div>


                                </div>
                            </a>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <h4 class="card-title"><a class="btn btn-sm btn-info waves-effect waves-light"
                                            href="/windows/business_manager"><i
                                                class="dripicons-arrow-thin-left"></i></a> <a
                                            class="btn btn-info btn-sm waves-effect waves-light"
                                            href="/loans/create"><i class="dripicons-plus"></i></a></h4>
                                    {{-- <p class="card-title-desc"><b>{{$profileData->last_name}}</b>, this is the total Amount you have spent on all your projects</b></p> --}}


                                    <div class="table-rep-plugin">
                                        <div data-pattern="priority-columns">
                                            <table id="loan-table" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Loan Name</th>
                                                        <th data-priority="3">Amount</th>
                                                        <th data-priority="4">Interest Rate</th>
                                                        <th data-priority="6">Contact Details</th>
                                                        <th data-priority="8">Attachment</th>
                                                        <th data-priority="9">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($loans->isEmpty())
                                                        <tr>
                                                            <td colspan="8" class="text-center">
                                                                <div class="text-center" style="margin-top: 20px;">
                                                                    <h5>No Loans Uploaded</h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach ($loans as $item)
                                                            <tr>
                                                                <td><b>{{ $item->name }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">
                                                                        Loan Status:
                                                                        @if ($item->status == 'closed')
                                                                            <span class="badge bg-success"
                                                                                style="font-size: 9px;">{{ ucfirst($item->status) }}</span>
                                                                        @else
                                                                            <span class="badge bg-primary"
                                                                                style="font-size: 9px;">{{ ucfirst($item->status) }}</span>
                                                                        @endif
                                                                    </span>

                                                                </td>
                                                                <td><b>{{ formatCurrency($item->amount) }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">Total
                                                                        Repayable:
                                                                        {{ formatCurrency($item->total_repayable) }}</span>
                                                                </td>
                                                                <td><b>{{ $item->interest_rate }}%</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">Term:
                                                                        {{ $item->term }} months</span>
                                                                </td>
                                                                <td><b>{{ $item->address }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">Phone
                                                                        Number:
                                                                        {{ $item->number }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($item->file)
                                                                        <b><a href="/documents_loans/{{ $item->file }}"
                                                                                download>{{ basename($item->file) }}</a></b><br>
                                                                        <span
                                                                            style="font-size: 11px; color:rgb(112, 112, 112);">Attachment</span>
                                                                    @else
                                                                        <span
                                                                            style="font-size: 11px; color:rgb(112, 112, 112);">No
                                                                            Attachment</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-info waves-effect waves-light show-loan-details"
                                                                        data-id="{{ $item->id }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showLoanModal">
                                                                        <i class="dripicons-preview"></i>
                                                                    </a>
                                                                    <!-- Trigger Button -->
                                                                    {{-- <a class="btn btn-info waves-effect waves-light update-status-btn"
                                                                        data-id="1" data-action="/loans/1"
                                                                        data-current-status="pending"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#updateStatusModal">
                                                                        Update Status
                                                                    </a> --}}

                                                                    {{-- <button type="button"
                                                                        class="btn btn-primary update-status-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#updateStatusModal"
                                                                        data-action="/update-loan-status/1"
                                                                        data-current-status="approved">
                                                                        Update Status
                                                                    </button> --}}

                                                                    <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light update-loan-status-btn"
                                                                        data-id="{{ $item->id }}"
                                                                        data-status="{{ $item->status }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#updateLoanStatusModal">
                                                                      Update Status
                                                                    </button>




                                                                    <a class="btn btn-info waves-effect waves-light"
                                                                        href="{{ route('loans.edit', $item->id) }}">
                                                                        <i class="dripicons-document-edit"></i>
                                                                    </a>
                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect waves-light"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteMinistryModal"
                                                                        data-route="{{ route('loans.destroy', $item->id) }}">
                                                                        <i class="dripicons-trash"></i> Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div id="pagination-controls" class="pagination"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const rows = document.querySelectorAll("#loan-table tbody tr");
                                            const rowsPerPage = 5; // Number of rows per page
                                            const paginationControls = document.getElementById("pagination-controls");

                                            const renderPage = (page) => {
                                                rows.forEach((row, index) => {
                                                    row.style.display = (index >= (page - 1) * rowsPerPage && index < page *
                                                        rowsPerPage) ? "" : "none";
                                                });
                                            };

                                            const setupPagination = () => {
                                                const totalPages = Math.ceil(rows.length / rowsPerPage);

                                                paginationControls.innerHTML = ""; // Clear existing controls
                                                for (let i = 1; i <= totalPages; i++) {
                                                    const button = document.createElement("button");
                                                    button.textContent = i;
                                                    button.classList.add("page-button");
                                                    button.addEventListener("click", () => {
                                                        document.querySelectorAll(".page-button").forEach(btn => btn.classList.remove(
                                                            "active"));
                                                        button.classList.add("active");
                                                        renderPage(i);
                                                    });
                                                    paginationControls.appendChild(button);
                                                }

                                                if (paginationControls.firstChild) {
                                                    paginationControls.firstChild.classList.add("active");
                                                    renderPage(1); // Show the first page by default
                                                }
                                            };

                                            if (rows.length > rowsPerPage) {
                                                setupPagination();
                                            } else {
                                                rows.forEach(row => row.style.display = ""); // Show all rows if less than or equal to rowsPerPage
                                            }
                                        });
                                    </script>

                                    <style>
                                        .pagination {
                                            margin-top: 20px;
                                            text-align: center;
                                        }

                                        .page-button {
                                            display: inline-block;
                                            padding: 5px 10px;
                                            margin: 2px;
                                            border: 1px solid #ccc;
                                            background-color: #f9f9f9;
                                            cursor: pointer;
                                            border-radius: 4px;
                                        }

                                        .page-button.active {
                                            background-color: #0d99b9;
                                            color: #fff;
                                            border-color: #0e8195;
                                        }
                                    </style>




                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('includes.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>

    <!-- Responsive Table js -->
    <script src="/assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

    <!-- Init js -->
    <script src="/assets/js/pages/table-responsive.init.js"></script>
    <!-- Include Bootstrap CSS -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="/assets/js/app.js"></script>

    <script>
        // Event listener for delete button click
        $('#deleteMinistryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var route = button.data('route'); // Extract route from data-* attribute
            var modal = $(this);

            // Update the form action with the correct route
            modal.find('#deleteMinistryForm').attr('action', route);
        });
    </script>
    @include('toast.error_success_js')

    <script>
        $(document).on('click', '.show-loan-details', function() {
            const loanId = $(this).data('id');
            const modalContent = $('#loanDetailsContent');
            modalContent.html('<p>Loading...</p>');

            // Fetch loan details via AJAX
            $.ajax({
                url: `/loans/${loanId}`,
                method: 'GET',
                success: function(response) {
                    // Assuming `response` contains the loan details in HTML format
                    modalContent.html(`
                <p><strong>Name:</strong> ${response.name}</p>
                <p><strong>Amount:</strong> ${response.amount}</p>
                <p><strong>Interest Rate:</strong> ${response.interest_rate}%</p>
                <p><strong>Term:</strong> ${response.term} months</p>
                <p><strong>Start Date:</strong> ${response.start_date}</p>
                <p><strong>Due Date:</strong> ${response.due_date}</p>
                <p><strong>Status:</strong> ${response.status}</p>
                <p><strong>Attachment:</strong> ${
                    response.file
                        ? `<a href="/documents_loans/${response.file}" download>Download</a>`
                        : 'No Attachment'
                }</p>
            `);
                },
                error: function() {
                    modalContent.html('<p>Error loading loan details.</p>');
                },
            });
        });
    </script>

    <script>
        // Event listener for delete button click
        $('#deleteMinistryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var route = button.data('route'); // Extract route from data-* attribute
            var modal = $(this);

            // Update the form action with the correct route
            modal.find('#deleteMinistryForm').attr('action', route);
        });
    </script>




</body>

</html>

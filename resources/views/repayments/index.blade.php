<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Clients</title>
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


        <div class="modal fade" id="updateLoanStatusModal" tabindex="-1" aria-labelledby="updateLoanStatusLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="updateLoanStatusForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" id="statusInput">

                        <div class="modal-header">
                            <h5 class="modal-title" id="updateLoanStatusLabel">Update Loan Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
        <div class="modal fade" id="showLoanModal" tabindex="-1" aria-labelledby="showLoanModalLabel"
            aria-hidden="true">
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
                        <div class="modal fade" id="deleteMinistryModal" tabindex="-1"
                        aria-labelledby="deleteMinistryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteMinistryModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this Payment?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteMinistryForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-purple">Delete</button>
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
                <div class="row">
                    {{-- <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 class="text-purple mt-2" style="font-size: 16px">15,852</h3> Invested Amount
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 class="text-purple mt-2" style="font-size: 16px">9,514</h3> Profit Made
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 class="text-purple mt-2" style="font-size: 16px">{{ formatCurrency($totalPaidToday) }}</h3>
                                Amount Paid Today

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 class="text-purple mt-2" style="font-size: 16px">{{ $usersPaidToday }}</h3>
                                Clients Paid Today
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><a class="btn btn-sm btn-purple waves-effect waves-light"
                                        href="/windows/business_manager"><i class="dripicons-arrow-thin-left"></i></a>
                                    <a class="btn btn-purple btn-sm waves-effect waves-light" href="/repayments/create">Add
                                        New Payment</a></h4>


                                <div class="table-rep-plugin">
                                    <div data-pattern="priority-columns">
                                        <table id="loan-table" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th data-priority="1">Amount Paid</th>
                                                    <th data-priority="3">Payment Date</th>
                                                    <th data-priority="5">Balance</th>
                                                    <th data-priority="9">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($repayments->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            <div class="text-center" style="margin-top: 20px;">
                                                                <h5>No Repayments Found</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($repayments as $repayment)
                                                        @php
                                                            $loan = $repayment->loan;
                                                            $totalPaid = $loan?->repayments?->sum('amount_paid') ?? 0;
                                                            $balance = $loan?->amount - $totalPaid;
                                                        @endphp
                                                        <tr>
                                                            <td><b>{{ formatCurrency($repayment->amount_paid) }}</b><br>

                                                                <b><span
                                                                style="font-size: 11px; color:rgb(37, 36, 36);">Client Name:
                                                                {{ $repayment->loan->client->client_name }}
                                                                </span></b>
                                                            </td>
                                                            <td><b>{{ \Carbon\Carbon::parse($repayment->payment_date)->format('M d, Y') }}</b><br>

                                                                <span style="font-size: 11px; color:rgb(112, 112, 112);">
                                                                    Next Payment Date:
                                                                    {{ \Carbon\Carbon::parse($repayment->payment_date)->addMonth()->format('M d, Y') }}
                                                                </span>


                                                            </td>
                                                            <td>
                                                                <span style="font-size: 14px; color:rgb(0, 0, 0); font-weight: 600;">
                                                                    {{ formatCurrency($balance) }}
                                                                </span><br>
                                                                <span
                                                                style="font-size: 11px; color:rgb(112, 112, 112);">Total Loan Amount:
                                                                {{ formatCurrency($repayment->loan->amount) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-purple"
                                                                    href="{{ route('repayments.edit', $repayment->slug) }}">
                                                                    <i class="dripicons-document-edit"></i> Edit
                                                                </a>


                                                                <a class="btn btn-purple waves-effect waves-light"
                                                                id="sa-warning"
                                                                href="{{ route('repayment.exportToPDF', $repayment->slug) }}">
                                                                <i class="dripicons-download"></i> Receipt
                                                            </a>
                                                                <button type="button" class="btn btn-purple waves-effect waves-light" data-bs-toggle="modal"
                                                                data-bs-target="#deleteMinistryModal" data-route="{{ route('repayments.destroy', $repayment->slug) }}">
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
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
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
        document.addEventListener('DOMContentLoaded', function() {
            const taskModal = document.getElementById('taskModal');
            taskModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal

                // Fetch task details from data attributes
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                const priority = button.getAttribute('data-priority');
                const startDate = button.getAttribute('data-start_date');
                const endDate = button.getAttribute('data-end_date');
                const status = button.getAttribute('data-status');
                const employee = button.getAttribute('data-employee');
                const category = button.getAttribute('data-category');

                // Populate modal fields
                taskModal.querySelector('#modalTaskTitle').textContent = title;
                taskModal.querySelector('#modalTaskDescription').textContent = description;
                taskModal.querySelector('#modalTaskPriority').textContent = priority;
                taskModal.querySelector('#modalTaskStartDate').textContent = startDate;
                taskModal.querySelector('#modalTaskEndDate').textContent = endDate;
                taskModal.querySelector('#modalTaskStatus').textContent = status;
                taskModal.querySelector('#modalTaskEmployee').textContent = employee;
                taskModal.querySelector('#modalTaskCategory').textContent = category;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editTaskModal = document.getElementById('editTaskModal');
            editTaskModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal

                // Fetch task details from data attributes
                const slug = button.getAttribute('data-slug');
                const title = button.getAttribute('data-title');
                const clientId = button.getAttribute('data-client_id');
                const priority = button.getAttribute('data-priority');
                const employeeId = button.getAttribute('data-employee_id');
                const categoryId = button.getAttribute('data-category_id');
                const status = button.getAttribute('data-status');
                const startDate = button.getAttribute('data-start_date');
                const endDate = button.getAttribute('data-end_date');
                const description = button.getAttribute('data-description');

                // Populate the form with task data
                document.getElementById('editTaskTitle').value = title;
                document.getElementById('editClient').value = clientId;
                document.getElementById('editPriority').value = priority;
                document.getElementById('editEmployee').value = employeeId;
                document.getElementById('editCategory').value = categoryId;
                document.getElementById('editStatus').value = status;
                document.getElementById('editStartDate').value = startDate;
                document.getElementById('editEndDate').value = endDate;
                document.getElementById('editDescription').value = description;

                // Set the form action dynamically to include the slug
                const form = document.getElementById('editTaskForm');
                form.action = `/tasks/${slug}`;
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
        //         // Hide button text and show spinner
        //         btnText.style.display = "none";
        //     spinner.style.display = "inline-block";

        //     // Submit the form after a short delay (optional)
        //     setTimeout(() => {
        //         document.querySelector("form").submit();
        //     }, 1000); // Adjust the delay as needed
        // });
    </script>


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

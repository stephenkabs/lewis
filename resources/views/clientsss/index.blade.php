<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container-fluid {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        border-radius: 12px;
        flex-wrap: wrap;
    }

    .image-container {
        flex: 2;
        min-width: 300px;
    }

    .image-container img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        object-fit: cover;
    }

    .cardss-container {
        flex: 1;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        min-width: 300px;
    }

    .cardz {
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        font-weight: bold;
        font-size: 20px;
    }

    .blue {
        background-color: #6c6c6c;
        color: #fff;
    }

    .yellow {
        background-color: #bf0a0a;
        color: #ffffff;
    }

    .cardz span {
        display: block;
        font-size: 10px;
        font-weight: normal;
        margin-top: 8px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container-fluid {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .image-container {
            width: 80%;
        }

        .cards-container {
            width: 100%;
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .image-container {
            width: 100%;
        }

        .cards-container {
            width: 100%;
            grid-template-columns: 1fr;
        }
    }
</style>

<body data-topbar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        @include('includes.sidebar')


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
                        Are you sure you want to delete this Client?
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

        <!-- Status Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" id="statusForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Update Client Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="status">Select Status:</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="">-- Choose Status --</option>
                                <option value="approved">Approve</option>
                                <option value="blacklisted">Blacklist</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @include('toast.success_toast')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><a class="btn btn-sm btn-danger waves-effect waves-light"
                                        href="/windows/business_manager"><i class="dripicons-arrow-thin-left"></i></a>
                                    <a class="btn btn-danger btn-sm waves-effect waves-light" href="/client/create">Add
                                        Client</a>

                                        <a class="btn btn-danger btn-sm waves-effect waves-light" href="/loans/create">Create
                                            New Loan</a>



                                </h4>

                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <div class="table-responsive">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Client Name</th>
                                                        <th>Client Address</th>
                                                        <th>Client Employee No</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-body">
                                                    @if ($clients->isEmpty())
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <div class="text-center" style="margin-top: 20px;">
                                                                    <h5>No Client Uploaded</h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach ($clients as $item)
                                                            <tr>
                                                                <td>
                                                                    <b>{{ $item->client_name }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">
                                                                        {{ $item->email }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <b>{{ $item->client_address }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">
                                                                        {{ $item->phone }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <b>{{ $item->employee_no }}</b><br>
                                                                    <span
                                                                        style="font-size: 11px; color:rgb(112, 112, 112);">
                                                                        TPIN: {{ $item->client_tpin }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('client.edit', $item->slug) }}"
                                                                        class="btn btn-danger waves-effect waves-light">
                                                                        <i class="dripicons-document-edit"></i>
                                                                    </a>
                                                                    {{-- <button
                                                                    type="button"
                                                                    class="btn btn-warning waves-effect waves-light open-status-modal"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#statusModal"
                                                                    data-slug="{{ $item->slug }}">
                                                                    Status
                                                                </button> --}}

                                                                    @php
                                                                        $status = strtolower($item->status); // Assuming $item->status holds "approved" or "blacklisted"
                                                                        $statusClass = match ($status) {
                                                                            'approved' => 'btn-success',
                                                                            'blacklisted' => 'btn-dark',
                                                                            default => 'btn-warning',
                                                                        };
                                                                    @endphp

                                                                    <button type="button"
                                                                        class="btn {{ $statusClass }} waves-effect waves-light open-status-modal"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#statusModal"
                                                                        data-slug="{{ $item->slug }}">
                                                                        {{ ucfirst($status) ?: 'Status' }}
                                                                    </button>



                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect waves-light"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteMinistryModal"
                                                                        data-route="{{ route('client.destroy', $item->slug) }}">
                                                                        <i class="dripicons-trash"></i> Delete
                                                                    </button>





                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Pagination Controls -->
                                        <div id="pagination-controls" class="d-flex justify-content-left mt-3">
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                const rowsPerPage = 5; // Number of rows per page
                                                const tableBody = document.getElementById("table-body");
                                                const paginationControls = document.getElementById("pagination-controls");
                                                const rows = tableBody.querySelectorAll("tr");
                                                const totalPages = Math.ceil(rows.length / rowsPerPage);

                                                let currentPage = 1;

                                                function renderTable() {
                                                    // Hide all rows
                                                    rows.forEach((row, index) => {
                                                        row.style.display = "none";
                                                    });

                                                    // Show only the rows for the current page
                                                    const start = (currentPage - 1) * rowsPerPage;
                                                    const end = start + rowsPerPage;
                                                    rows.forEach((row, index) => {
                                                        if (index >= start && index < end) {
                                                            row.style.display = "table-row";
                                                        }
                                                    });
                                                }

                                                function renderPagination() {
                                                    paginationControls.innerHTML = "";

                                                    // Previous Button
                                                    const prevButton = document.createElement("button");
                                                    prevButton.classList.add("btn", "btn-outline-secondary", "me-2");
                                                    prevButton.textContent = "Previous";
                                                    prevButton.disabled = currentPage === 1;
                                                    prevButton.addEventListener("click", () => {
                                                        if (currentPage > 1) {
                                                            currentPage--;
                                                            renderTable();
                                                            renderPagination();
                                                        }
                                                    });
                                                    paginationControls.appendChild(prevButton);

                                                    // Page Buttons
                                                    for (let i = 1; i <= totalPages; i++) {
                                                        const pageButton = document.createElement("button");
                                                        pageButton.classList.add("btn", "btn-outline-danger", "mx-1");
                                                        pageButton.textContent = i;
                                                        if (i === currentPage) {
                                                            pageButton.classList.add("active");
                                                        }
                                                        pageButton.addEventListener("click", () => {
                                                            currentPage = i;
                                                            renderTable();
                                                            renderPagination();
                                                        });
                                                        paginationControls.appendChild(pageButton);
                                                    }

                                                    // Next Button
                                                    const nextButton = document.createElement("button");
                                                    nextButton.classList.add("btn", "btn-outline-secondary", "ms-2");
                                                    nextButton.textContent = "Next";
                                                    nextButton.disabled = currentPage === totalPages;
                                                    nextButton.addEventListener("click", () => {
                                                        if (currentPage < totalPages) {
                                                            currentPage++;
                                                            renderTable();
                                                            renderPagination();
                                                        }
                                                    });
                                                    paginationControls.appendChild(nextButton);
                                                }

                                                // Initialize
                                                renderTable();
                                                renderPagination();
                                            });
                                        </script>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris.js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>

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
        document.addEventListener('DOMContentLoaded', function() {
            const statusButtons = document.querySelectorAll('.open-status-modal');
            const form = document.getElementById('statusForm');

            statusButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const slug = button.getAttribute('data-slug');
                    form.setAttribute('action', `/client/status/${slug}`);
                });
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
    <!-- Bootstrap 5 JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


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
                                    Are you sure you want to delete this Client?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
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

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><a class="btn btn-danger waves-effect waves-light"
                                        href="/client"><i class="dripicons-arrow-thin-left"></i></a></h4><br>


                                        <form action="{{ route('client.update', $client->slug) }}" method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            @method('PUT') <!-- Use PUT method for updating -->
                                            <div class="mb-3">
                                                <label for="client-name" class="form-label">Name</label>
                                                <input
                                                    type="text"
                                                    name="client_name"
                                                    id="client-name"
                                                    class="form-control"
                                                    placeholder="Enter Client Name"
                                                    value="{{ old('client_name', $client->client_name) }}"
                                                    >
                                            </div>

                                            <div class="mb-3">
                                                <label for="client-nrc" class="form-label">NRC</label>
                                                <input
                                                    type="text"
                                                    name="nrc"
                                                    id="client-nrc"
                                                    class="form-control"
                                                    placeholder="Enter NRC"
                                                    value="{{ old('nrc', $client->nrc) }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-email" class="form-label">Email</label>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    id="client-email"
                                                    class="form-control"
                                                    placeholder="Enter Client Email"
                                                    value="{{ old('email', $client->email) }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-phone" class="form-label">Phone</label>
                                                <input
                                                    type="text"
                                                    name="phone"
                                                    id="client-phone"
                                                    class="form-control"
                                                    placeholder="Enter Client Phone"
                                                    value="{{ old('phone', $client->phone) }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-tpin" class="form-label">TPIN No</label>
                                                <input
                                                    type="text"
                                                    name="client_tpin"
                                                    id="client-tpin"
                                                    class="form-control"
                                                    placeholder="Enter TPIN"
                                                    value="{{ old('client_tpin', $client->client_tpin) }}"
                                                    >
                                            </div>

                                            <div class="mb-3">
                                                <label for="employee-no" class="form-label">Employee No</label>
                                                <input
                                                    type="text"
                                                    name="employee_no"
                                                    id="employee-no"
                                                    class="form-control"
                                                    placeholder="Enter Employee No"
                                                    value="{{ old('employee_no', $client->employee_no) }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-address" class="form-label">Address</label>
                                                <textarea
                                                    name="client_address"
                                                    id="client-address"
                                                    class="form-control"
                                                    rows="3"
                                                    >{{ old('client_address', $client->client_address) }}</textarea>
                                            </div>
                                            <input
                                            type="hidden"
                                            name="status"
                                            value="{{ old('status', $client->status) }}"
                                            >

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Update Client</button>
                                                <button type="reset" class="btn btn-secondary ms-2">Clear</button>
                                            </div>

                                        </form>



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
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>

    <!--Morris Chart-->
    <script src="/assets/libs/morris.js/morris.min.js"></script>
    <script src="/assets/libs/raphael/raphael.min.js"></script>

    <script src="/assets/js/pages/dashboard.init.js"></script>

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
document.addEventListener('DOMContentLoaded', function () {
    const taskModal = document.getElementById('taskModal');
    taskModal.addEventListener('show.bs.modal', function (event) {
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
document.addEventListener('DOMContentLoaded', function () {
    const editTaskModal = document.getElementById('editTaskModal');
    editTaskModal.addEventListener('show.bs.modal', function (event) {
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

</body>

</html>

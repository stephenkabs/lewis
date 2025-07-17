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


    @include('toast.success_toast')
    @include('includes.validation')
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        @include('includes.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title"><a class="btn btn-purple waves-effect waves-light"
                                            href="/client"><i class="dripicons-arrow-thin-left"></i></a></h4><br>



                                        <form action="{{ route('client.store') }}" method="POST" class="needs-validation" novalidate>
                                            @csrf <!-- Include CSRF token for form submission security -->
                                            <div class="mb-3">
                                                <label for="client-name" class="form-label">Name</label>
                                                <input
                                                    type="text"
                                                    name="client_name"

                                                    class="form-control"
                                                    placeholder="Enter Client Name"
                                                    value="{{ old('client_name') }}"
                                                    >
                                            </div>

                                            <div class="mb-3">
                                                <label for="client-name" class="form-label">NRC</label>
                                                <input
                                                    type="text"
                                                    name="nrc"
                                                    id="nrc"
                                                    class="form-control"
                                                    placeholder="Enter NRC"
                                                    value="{{ old('nrc') }}"
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
                                                    value="{{ old('email') }}"
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
                                                    value="{{ old('phone') }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-tpin" class="form-label">TPIN No</label>
                                                <input
                                                    type="text"
                                                    name="client_tpin"
                                                    id="client_tpin"
                                                    class="form-control"
                                                    placeholder="Enter TPIN"
                                                    value="{{ old('client_tpin') }}"
                                                    >
                                            </div>

                                            <div class="mb-3">
                                                <label for="client-tpin" class="form-label">Employee No</label>
                                                <input
                                                    type="text"
                                                    name="employee_no"
                                                    id="employee_no"
                                                    class="form-control"
                                                    placeholder="Enter Employee No"
                                                    value="{{ old('employee_no') }}"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="client-address" class="form-label">Address</label>
                                                <textarea
                                                    name="client_address"
                                                    id="client-address"
                                                    class="form-control"
                                                    rows="3"
                                                    Value="No Address"

                                                    >No Address</textarea>
                                            </div>
                                            <input
                                            type="hidden"
                                            name="status"

                                            value="Unapproved"
                                            >

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-purple">Create Client</button>
                                                <button type="reset" class="btn btn-secondary ms-2">Clear</button>
                                            </div>

                                        </form>



                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <!-- end col -->
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

    <script src="/assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="/assets/js/pages/form-validation.init.js"></script>

    <script src="/assets/js/app.js"></script>
    @include('toast.error_success_js')

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = ['nrc', 'client_tpin', 'employee_no'];

            fields.forEach(function (fieldId) {
                const input = document.getElementById(fieldId);

                input.addEventListener('blur', function () {
                    const value = input.value.trim();
                    if (value === '') return;

                    fetch("{{ route('client.checkUnique') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            field: input.name,
                            value: value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        let warningId = fieldId + '_warning';
                        let existingWarning = document.getElementById(warningId);

                        if (data.exists) {
                            if (!existingWarning) {
                                const warning = document.createElement('div');
                                warning.id = warningId;
                                warning.className = 'text-danger mt-1';
                                warning.innerText = `${fieldId.replace('_', ' ').toUpperCase()} is already taken.`;
                                input.parentElement.appendChild(warning);
                            }
                        } else {
                            if (existingWarning) {
                                existingWarning.remove();
                            }
                        }
                    });
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

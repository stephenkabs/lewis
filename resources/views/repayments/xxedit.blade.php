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
@include('includes.validation')
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        @include('includes.sidebar')

        <div class="main-content">
            <div class="page-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><a class="btn btn-purple waves-effect waves-light"
                                        href="/loans"><i class="dripicons-arrow-thin-left"></i></a></h4><br>


<form class="row needs-validation" action="{{ route('repayments.update', $repayment->id) }}" novalidate method="POST">
    @csrf
    @method('PUT')

    <!-- Left Column -->
    <div class="col-md-12">
        <div class="mb-6">
            <label class="form-label">Loan</label>
            <select id="loanSelect" name="loan_id" class="form-select" required>
                <option value="" disabled>Select a Loan</option>
                @foreach ($loans as $loan)
                    <option value="{{ $loan->id }}"
                        data-amount="{{ $loan->amount }}"
                        data-term="{{ $loan->term }}"
                        {{ $repayment->loan_id == $loan->id ? 'selected' : '' }}>
                        {{ $loan->client->client_name }} - {{ $loan->amount }}
                    </option>
                @endforeach
            </select>
        </div><br>

        <div class="mb-3">
            <label class="form-label">Our Addresses on Receipt</label>
            <select name="detail_id" class="form-select" required>
                <option value="" disabled>Select an Address</option>
                @foreach ($detail as $item)
                    <option value="{{ $item->id }}" {{ $repayment->detail_id == $item->id ? 'selected' : '' }}>
                        {{ $item->address }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Amount Paid</label>
            <div>
                <input name="amount_paid" type="number" step="0.01" class="form-control" placeholder="Enter Amount Paid"
                       value="{{ old('amount_paid', $repayment->amount_paid) }}" required />
            </div>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Payment Date</label>
            <div>
                <input name="payment_date" type="date" class="form-control"
                       value="{{ old('payment_date', \Carbon\Carbon::parse($repayment->payment_date)->format('Y-m-d')) }}" required />
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
            <a href="{{ route('repayments.index') }}" class="btn btn-purple waves-effect ms-2">Cancel</a>
        </div>
    </div>
</form>

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

    <script src="/assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="/assets/js/pages/form-validation.init.js"></script>

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
    @php
    use Carbon\Carbon;
    $startDate = Carbon::now()->toDateString(); // Format: YYYY-MM-DD
@endphp

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
    const serverStartDate = "{{ $startDate }}"; // Laravel Carbon

    document.addEventListener("DOMContentLoaded", function () {
        const loanSelect = document.getElementById("loanSelect");
        const paymentPlanTableContainer = document.getElementById("paymentPlanTableContainer");

        loanSelect.addEventListener("change", function () {
            const selectedOption = loanSelect.options[loanSelect.selectedIndex];
            const amount = parseFloat(selectedOption.getAttribute("data-amount"));
            const term = parseInt(selectedOption.getAttribute("data-term"));

            if (!isNaN(amount) && !isNaN(term) && term > 0) {
                const monthlyPayment = amount / term;
                const today = new Date(serverStartDate);

                let tableHTML = `
                    <h5 class="mb-3">Payment Plan</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Due Date</th>
                                <th>Amount (K)</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                for (let i = 0; i < term; i++) {
                    let dueDate = new Date(today);
                    dueDate.setMonth(today.getMonth() + i); // Add i months to base date
                    const formattedDate = dueDate.toISOString().split("T")[0];

                    tableHTML += `
                        <tr>
                            <td>Month ${i + 1}</td>
                            <td>${formattedDate}</td>
                            <td>${monthlyPayment.toFixed(2)}</td>
                        </tr>
                    `;
                }

                tableHTML += `
                        </tbody>
                    </table>
                `;

                paymentPlanTableContainer.innerHTML = tableHTML;
            } else {
                paymentPlanTableContainer.innerHTML = "<p class='text-muted'>Please select a valid loan to generate a plan.</p>";
            }
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

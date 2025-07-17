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
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title"><a class="btn btn-purple waves-effect waves-light"
                                            href="/loans"><i class="dripicons-arrow-thin-left"></i></a></h4><br>


                                    <form class="row needs-validation" action="{{ route('loans.update', $loan->id) }}"
                                        novalidate method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Clients</label>
                                                <select name="client_id" class="form-select" required>
                                                    <option value="" disabled>Select a Client</option>
                                                    @foreach ($clients as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $loan->client_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->client_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Loan Amount</label>
                                                <div>
                                                    <input name="amount" type="number" step="0.01"
                                                        class="form-control" value="{{ old('amount', $loan->amount) }}"
                                                        placeholder="Enter Loan Amount" required />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Interest Rate (%)</label>
                                                <div>
                                                    <input name="interest_rate" type="number" step="0.01"
                                                        class="form-control"
                                                        value="{{ old('interest_rate', $loan->interest_rate) }}"
                                                        placeholder="Enter Interest Rate" required />
                                                </div>
                                            </div>

                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Loan Term (Months)</label>
                                                <div>
                                                    <input name="term" type="number" class="form-control"
                                                        value="{{ old('term', $loan->term) }}"
                                                        placeholder="Enter Loan Term" required />
                                                </div>
                                            </div>

                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Start Date</label>
                                                <div>
                                                    <input name="start_date" type="date" class="form-control"
                                                        value="{{ old('start_date', \Carbon\Carbon::parse($loan->start_date)->format('Y-m-d')) }}"
                                                        required />
                                                </div>
                                            </div>

                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Due Date</label>
                                                <div>
                                                    <input name="due_date" type="date" class="form-control"
                                                        value="{{ old('due_date', \Carbon\Carbon::parse($loan->due_date)->format('Y-m-d')) }}"
                                                        required />
                                                </div>
                                            </div>

                                            {{-- If you want to enable document upload --}}
                                            {{--
        <div class="mb-3 position-relative">
            <label class="form-label">Upload Document (Optional)</label>
            <div>
                <input name="file" type="file" class="form-control" accept=".pdf,.jpg,.png" />
            </div>
        </div>
        --}}

                                            <div class="mb-3 position-relative">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="pending"
                                                        {{ $loan->status == 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="approved"
                                                        {{ $loan->status == 'approved' ? 'selected' : '' }}>Approved
                                                    </option>
                                                    <option value="disbursed"
                                                        {{ $loan->status == 'disbursed' ? 'selected' : '' }}>Disbursed
                                                    </option>
                                                    <option value="rejected"
                                                        {{ $loan->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light">Update</button>
                                                <a href="{{ route('loans.index') }}"
                                                    class="btn btn-secondary waves-effect ms-2">Cancel</a>
                                            </div>
                                        </div>
                                    </form>




                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <h3>Loan Calculator</h3> --}}

                                    <!-- Loan Form Inputs -->
                                    <form id="loan-form">
                                        <div class="form-group">
                                            <label for="loan-amount">Loan Amount ($)</label>
                                            <input type="number" id="loan-amount" class="form-control"
                                                placeholder="Enter loan amount" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="interest-rate">Interest Rate (%)</label>
                                            <input type="number" id="interest-rate" class="form-control"
                                                placeholder="Enter interest rate" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="loan-term">Term (Months)</label>
                                            <input type="number" id="loan-term" class="form-control"
                                                placeholder="Enter loan term in months" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="late-payment-days">Late Payment Days</label>
                                            <input type="number" id="late-payment-days" class="form-control"
                                                placeholder="Enter late payment days" required>
                                        </div>

                                        <!-- New input for manual late payment fee -->
                                        <div class="form-group">
                                            <label for="manual-late-fee">Manual Late Payment Fee ($)</label>
                                            <input type="number" id="manual-late-fee" class="form-control"
                                                placeholder="Enter additional late fee" value="0">
                                        </div>

                                        <button type="submit" class="btn btn-purple btn-sm mt-3">Calculate
                                            Loan</button>
                                    </form>

                                    <hr>

                                    <h4 style="font-size: 19px">Loan Summary</h4>
                                    <div>
                                        <p><strong>Interest: </strong><span id="calculated-interest">0</span></p>
                                        <p><strong>Total Loan Repayable: </strong><span id="total-repayable">0</span>
                                        </p>
                                        <p><strong>Late Payment Fee: </strong><span id="late-payment-fee">0</span></p>
                                        <p><strong>Total Amount Due (including late fee): </strong><span
                                                id="total-due">0</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // JavaScript Logic for Loan Calculator
                            document.getElementById('loan-form').addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent form submission to allow calculations

                                // Get input values
                                const loanAmount = parseFloat(document.getElementById('loan-amount').value);
                                const interestRate = parseFloat(document.getElementById('interest-rate').value);
                                const loanTerm = parseInt(document.getElementById('loan-term').value);
                                const latePaymentDays = parseInt(document.getElementById('late-payment-days').value);
                                const manualLateFee = parseFloat(document.getElementById('manual-late-fee').value);

                                // Validate input fields
                                if (isNaN(loanAmount) || isNaN(interestRate) || isNaN(loanTerm) || isNaN(latePaymentDays) || isNaN(
                                        manualLateFee)) {
                                    alert('Please enter valid values in all fields.');
                                    return;
                                }

                                // Calculate Interest and Repayable Amount
                                const interest = (loanAmount * interestRate) /
                                100; // Simple interest based on the loan amount and interest rate
                                const totalRepayable = loanAmount + interest; // Total repayable amount including interest

                                // Calculate Late Payment Fee (Assuming a daily fee of 0.1% of the loan amount)
                                const lateFeeRate = 0.001; // 0.1% daily charge
                                const latePaymentFee = (loanAmount * lateFeeRate * latePaymentDays) +
                                manualLateFee; // Adding manual late fee

                                // Calculate Total Amount Due (including late fee)
                                const totalDue = totalRepayable + latePaymentFee;

                                // Update the UI with calculated values
                                document.getElementById('calculated-interest').textContent = interest.toFixed(2);
                                document.getElementById('total-repayable').textContent = totalRepayable.toFixed(2);
                                document.getElementById('late-payment-fee').textContent = latePaymentFee.toFixed(2);
                                document.getElementById('total-due').textContent = totalDue.toFixed(2);
                            });
                        </script>


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

</body>

</html>

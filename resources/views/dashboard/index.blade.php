<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | MCM</title>
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
.custom-row {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    border-radius: 12px;
    flex-wrap: wrap;
}

.custom-image-container {
    flex: 2;
    min-width: 300px;
}

.custom-image-container img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    object-fit: cover;
}

.custom-cards-container {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    min-width: 300px;
}

.custom-card {
    padding: 20px;
    text-align: center;
    border-radius: 8px;
    font-weight: bold;
    font-size: 20px;
}

.custom-blue {
    background-color: #251243;
    color: #ffffff;
}

.custom-yellow {
    background-color: #757575;
    color: #ffffff;
}

.custom-card span {
    display: block;
    font-size: 10px;
    font-weight: normal;
    margin-top: 8px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-row {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .custom-image-container {
        width: 80%;
    }

    .custom-cards-container {
        width: 100%;
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .custom-image-container {
        width: 100%;
    }

    .custom-cards-container {
        width: 100%;
        grid-template-columns: 1fr;
    }
}

</style>

<body data-sidebar="dark">

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

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="header-bg">
                <div class="container-fluid">
                    <br>
<div class="custom-row">
    <div class="custom-image-container">
        <img src="image.webp" alt="User Image">
    </div>
    <div class="custom-cards-container">
        <div class="custom-card custom-blue">
            <span id="current-time" style="font-size: 15px; font-weight: 900;"><b>--:--:--</b></span>
            <span id="current-date">--/--/----</span>
        </div>

        <div class="custom-card custom-yellow">
            {{ $approvedClients }}
            <span>Approved Clients</span>
        </div>

        <div class="custom-card custom-blue">
             {{ $unapprovedClients }}
            <span>Unapproved Clients</span>
        </div>

        <div class="custom-card custom-yellow">
             {{ $blacklistedClients }}
            <span>Blacklisted Clients</span>
        </div>
    </div>
</div>

<script>
    function updateDateTime() {
        const now = new Date();

        const time = now.toLocaleTimeString(); // HH:MM:SS
        const date = now.toLocaleDateString(); // DD/MM/YYYY or MM/DD/YYYY based on locale

        document.getElementById("current-time").textContent = time;
        document.getElementById("current-date").textContent = date;
    }

    // Update every second
    setInterval(updateDateTime, 1000);
    updateDateTime(); // Initial call
</script>

                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 style="font-size: 13px"  class="text-purple mt-2">{{ formatCurrency($totalLoanToday) }}</h3>Loan Processed Today
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 style="font-size: 13px"  class="text-purple mt-2">{{ $usersPaidToday }}</h3> Clients Paid Today
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 style="font-size: 13px"  class="text-purple mt-2">{{ formatCurrency($totalPaidToday) }}</h3> Amount Paid Today
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <h3 style="font-size: 13px" class="text-purple mt-2">{{ formatCurrency($allLoan) }}</h3> All Processed Loans
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                             <div class="row">


<!-- Ensure Chart.js is included -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <h5>Monthly Approved Loan Amounts</h5>
            <canvas id="loanChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    const loanLabels = {!! json_encode($monthlyLoans->pluck('month')->toArray()) !!};
    const loanData = {!! json_encode($monthlyLoans->pluck('total')->toArray()) !!};
    const repaymentMap = {!! json_encode($monthlyRepayments->pluck('total', 'month')->toArray()) !!};

    // Match repayment data to the same month order as loanLabels
    const repaymentData = loanLabels.map(month => repaymentMap[month] ?? 0);

    const ctx = document.getElementById('loanChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: loanLabels,
            datasets: [
                {
                    label: 'Approved Loan Amount',
                    data: loanData,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                },
                {
                    label: 'Amount Paid',
                    data: repaymentData,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgb(255, 159, 64)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'ZMW'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
</script>



                             </div>

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

<!--Morris Chart-->
<script src="/assets/libs/morris.js/morris.min.js"></script>
<script src="/assets/libs/raphael/raphael.min.js"></script>

<script src="/assets/js/pages/dashboard.init.js"></script>

<script src="/assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</body>

</html>

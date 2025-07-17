<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- ION Slider -->
    <link href="/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css" />

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                                <h4 class="card-title"><a class="btn btn-info waves-effect waves-light" href="/setting"><i class="dripicons-arrow-thin-left"></i></a></h4><br>



                                                <form class="row needs-validation" action="{{ route('setting.store') }}" novalidate method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- First Column -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Website Name</label>
                                                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Enter Name" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Website Title</label>
                                                            <input type="text" name="title" class="form-control" id="validationCustom01" placeholder="Enter Web Title" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01"> Email</label>
                                                            <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="Enter Email" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Business Address</label>
                                                            <input type="email" name="address" class="form-control" id="validationCustom01" placeholder="Enter Address" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Phone Number</label>
                                                            <input type="number" name="phone" class="form-control" id="validationCustom01" placeholder="Phone Number" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Copyright</label>
                                                            <input type="text" name="copyright" class="form-control" id="validationCustom01" placeholder="Enter Copyright" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Version</label>
                                                            <input type="text" name="version" class="form-control" id="validationCustom01" placeholder="Enter Version" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>
                                                    </div>

                                                    <!-- Second Column -->
                                                    <div class="col-md-6">
                                                        <!-- Hidden Footer Color -->
                                                        <input type="hidden" name="footer_color" value="black" />

                                                        <!-- Hidden Web Colors -->
                                                        <input type="hidden" name="web_color" value="02" />

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Status</label>
                                                            <select type="text" name="status" class="form-select" id="validationCustom01" placeholder="Enter Project name" required>
                                                                <option>Published</option>
                                                                <option>Unpublished</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">About Website</label>
                                                            <div>
                                                                <textarea name="about" class="form-control" rows="5" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Logo_Dark</label>
                                                            <div>
                                                                <input name="image" data-parsley-type="number" type="file" class="form-control" placeholder="Enter Date" required />
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Logo_White</label>
                                                            <div>
                                                                <input name="file" data-parsley-type="number" type="file" class="form-control" placeholder="Enter Date" required />
                                                            </div>
                                                        </div>

                                                        <div class="mb-0">
                                                            <div>
                                                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                                <button type="reset" class="btn btn-secondary waves-effect ms-1">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <br><br>
{{--
                                                <b><i><p class="card-title-desc">NB: For Color Changing and Customization Check the tutorial <a href="">Here.</a></p></i></b> --}}
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                <!-- end row -->

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
<script src="/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>

<!-- Ion Range Slider-->
<script src="/assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Range slider init js-->
<script src="/assets/js/pages/range-sliders.init.js"></script>

<script src="/assets/js/app.js"></script>

</body>

</html>

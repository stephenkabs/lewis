<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Documentation Create</title>
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
<!-- Loader -->


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

                                <h4 class="card-title"><a class="btn btn-sm btn-info waves-effect waves-light" href="/doc"><i class="dripicons-arrow-thin-left"></i></a> <a class="btn btn-sm btn-info waves-effect waves-light" href="/word">Recent Documents</a></h4>

                                {{-- <form method="post"> --}}

                                <form  action="{{ route('doc.store') }}" method="POST" enctype="multipart/form-data">
                                    <button class="btn btn-sm btn-info waves-effect waves-light" type="submit">Save Document</button><br><br>
                                    @csrf
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Title</label>
                                        <div>
                                            <input name="title" data-parsley-type="number" type="text" class="form-control"
                                                placeholder="Enter title" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Short Description </label>
                                        <div>
                                            <input name="type" data-parsley-type="number" type="text" class="form-control"
                                                placeholder="Enter Type" required />
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3 position-relative">
                                        <label class="form-label">Icon</label>
                                        <div>
                                            <input name="image" data-parsley-type="number" type="file" class="form-control"
                                                placeholder="Enter Type"  />
                                        </div> --}}
                                    </div>
                                    <textarea id="elm1" name="description"></textarea><br>



                                </form>

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

<!--tinymce js-->
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>

<script src="/assets/js/app.js"></script>

</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Core | Create</title>
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

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        @include('includes.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
<form class="needs-validation" action="{{ route('cores.store') }}" novalidate method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <!-- Left Column: Summernote only -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <label class="form-label">Detailed Description</label>
                    <textarea id="elm1" name="description"></textarea>
                </div>
            </div>
        </div>

        <!-- Right Column: Other Inputs -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="btn btn-info waves-effect waves-light" href="/service">
                            <i class="dripicons-arrow-thin-left"></i>
                        </a>
                    </h4><br>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter Title" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Core Value</label>
                        <textarea name="core_value" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Select Status</option>
                            <option>Unpublish</option>
                            <option>Publish</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Short Information</label>
                        <textarea name="words" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image (Optional)</label>
                        <input name="image" id="image-input" type="file" class="form-control" accept="image/*" />
                        <div class="mt-2">
                            <img id="image-preview" src="#" alt="Image Preview"
                                style="display: none; max-width: 100%; border-radius: 5px;" />
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <button type="reset" class="btn btn-secondary waves-effect ms-1">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


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

    <!--tinymce js-->
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>

    <script>
        document.getElementById('image-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                };

                reader.readAsDataURL(file); // Convert the image to base64 URL
            } else {
                preview.src = '#';
                preview.style.display = 'none'; // Hide the preview image
            }
        });
    </script>

</body>

</html>

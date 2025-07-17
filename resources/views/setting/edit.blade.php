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


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                                <h4 class="card-title"><a class="btn btn-info waves-effect waves-light" href="/setting"><i class="dripicons-arrow-thin-left"></i></a></h4><br>

<form class="row needs-validation"
      action="{{ route('setting.update', $setting->slug) }}"
      method="POST"
      enctype="multipart/form-data"
      novalidate>
    @csrf
    @method('PUT')

    <!-- First Column -->
    <div class="col-md-6">
        <div class="mb-3 position-relative">
            <label class="form-label">Website Name</label>
            <input type="text" name="name" class="form-control" value="{{ $setting->name }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Website Title</label>
            <input type="text" name="title" class="form-control" value="{{ $setting->title }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Business Address</label>
            <input type="text" name="address" class="form-control" value="{{ $setting->address }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Copyright</label>
            <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}" required />
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Version</label>
            <input type="text" name="version" class="form-control" value="{{ $setting->version }}" required />
        </div>
    </div>

    <!-- Second Column -->
    <div class="col-md-6">

        <input type="hidden" name="footer_color" value="{{ $setting->footer_color ?? 'black' }}" />
        <input type="hidden" name="web_color" value="{{ $setting->web_color ?? '02' }}" />

        <div class="mb-3 position-relative">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Published" {{ $setting->status == 'Published' ? 'selected' : '' }}>Published</option>
                <option value="Unpublished" {{ $setting->status == 'Unpublished' ? 'selected' : '' }}>Unpublished</option>
            </select>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">About Website</label>
            <textarea name="about" class="form-control" rows="5" required>{{ $setting->about }}</textarea>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Logo_Dark</label>
            <input name="image" type="file" class="form-control" />
            @if ($setting->image)
                <small class="text-muted">Current: {{ $setting->image }}</small>
            @endif
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Logo_White</label>
            <input name="file" type="file" class="form-control" />
            @if ($setting->file)
                <small class="text-muted">Current: {{ $setting->file }}</small>
            @endif
        </div>

        <div class="mb-0">
            <button type="submit" class="btn btn-warning waves-effect waves-light">Update</button>
            <a href="{{ route('setting.index') }}" class="btn btn-secondary ms-1">Cancel</a>
        </div>
    </div>
</form>


                                    <script>
                                        function previewImage(event, previewId) {
                                            const file = event.target.files[0];
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                document.getElementById(previewId).src = e.target.result;
                                            }

                                            if (file) {
                                                reader.readAsDataURL(file);
                                            }
                                        }
                                    </script>


                                            </div>
                                        </div>
                                    </div>

                    <!-- end row -->

                    </div>




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

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Demo</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="/assets/css/bootstrap-dark.min.css" data-appStyle="/assets/css/app-dark.min.css" />
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="/assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <h6 class="mt-4">Select Custom Colors</h6>
            <div class="d-flex">

            <ul class="list-unstyled mb-0">
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                    <label class="form-check-label" for="theme-default">Default</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                    <label class="form-check-label" for="theme-orange">Orange</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                    <label class="form-check-label" for="theme-teal">Teal</label>
                </li>
            </ul>

            <ul class="list-unstyled mb-0 ms-4">
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                    <label class="form-check-label" for="theme-purple">Purple</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                    <label class="form-check-label" for="theme-green">Green</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                    <label class="form-check-label" for="theme-red">Red</label>
                </li>
            </ul>

            </div>
            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                <label class="form-check-label" for="theme-default">Default</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                <label class="form-check-label" for="theme-teal">Teal</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                <label class="form-check-label" for="theme-orange">Orange</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                <label class="form-check-label" for="theme-purple">Purple</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                <label class="form-check-label" for="theme-green">Green</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                <label class="form-check-label" for="theme-red">Red</label>
            </div> -->
        </div>

    </div>
    <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

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

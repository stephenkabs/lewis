<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Web Settings</title>
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
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                @forelse ($setting as $item)
                                    <h4 class="card-title">
                                        <a class="btn btn-info waves-effect waves-light" href="/windows/developer_dashboard">
                                            <i class="dripicons-arrow-thin-left"></i>
                                        </a>
                                        <a class="btn btn-info waves-effect waves-light" href="{{ route('setting.edit', $item->slug) }}">
                                            Edit Web General Setting
                                        </a>
                                    </h4><br>

                                    <h4 class="card-title">{{ $item->name }}</h4>
                                    <p class="card-title-desc">
                                        <b>About PC: </b>{{ $item->about }}<br>
                                        <b>Website Title: </b>{{ $item->title }}<br>
                                        <b>Email: </b>{{ $item->email }}<br>
                                        <b>Address: </b>{{ $item->address }}<br>
                                        <b>Phone: </b>{{ $item->phone }}<br>
                                        <b>Author: </b>{{ $item->author }}<br><br>

                                        <h4 class="card-title">
                                            @if($item->status == 'Published')
                                                <a class="btn btn-success btn-sm waves-effect waves-light" href="#">
                                                    Status: {{ $item->status}}
                                                </a>
                                            @else
                                                <a class="btn btn-danger btn-sm waves-effect waves-light" href="#">
                                                    Status: {{ $item->status}}
                                                </a>
                                            @endif

                                            <a class="btn btn-info btn-sm waves-effect waves-light" href="#">
                                                Web Colors: {{ $item->web_color}}
                                            </a>
                                            <a class="btn btn-info btn-sm waves-effect waves-light" href="#">
                                                Copyright: {{ $item->copyright}}
                                            </a>
                                            <a class="btn btn-info btn-sm waves-effect waves-light" href="#">
                                                Version: {{ $item->version}}
                                            </a>
                                        </h4><br>
                                    </p>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">


                        <div class="card">
                            <div style="background-color: rgb(6, 41, 78)" class="card-body">
                                <div id="logo">
                                    <label style="color:aliceblue" class="form-label">Web White Logo</label>
                                    <img class="logo-main shadow-effect" src="settings/logo_white/{{ $item->file }}" alt="" width="150px"><br>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div style="background-color: rgb(254, 254, 255)" class="card-body">
                                <div id="logo">
                                    <label class="form-label">Web Dark Logo</label>
                                    <img class="logo-scroll" src="settings/logo_dark/{{ $item->image }}" alt="" width="150px"><br>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div style="background-color: rgb(203, 218, 247)" class="card-body">
                                <div id="logo">
                                    <label class="form-label">Mobile View Logo</label>
                                    <img class="logo-mobile" src="settings/logo_white/{{ $item->file }}" alt="" width="100px"><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <p>No data uploaded yet.<br> <a href="/setting/create">Setup Here</a></p>
                @endforelse


                    <!-- end col -->
                    <!-- end col -->
                </div>
                <!-- end row -->


            </div>
            {{-- @endforeach --}}
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

<!-- SweetAlert Script -->


</body>

</html>

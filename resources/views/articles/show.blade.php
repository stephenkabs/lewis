<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>News</title>
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
            @php
                use Carbon\Carbon;
            @endphp
            <div class="page-content">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-body">


                                    <h4 class="card-title"><a class="btn btn-info waves-effect waves-light"
                                            href="/articles"><i class="dripicons-arrow-thin-left"></i></a>
                                        <a class="btn btn-info waves-effect waves-light"
                                            href="{{ route('articles.edit', $article->slug) }}"><i
                                                class="dripicons-document-edit"></i></a><br><br>


                                        <h4 class="card-title"> {{ $article->name }}'s article of the Day <br>
                                            <span style="font-size: 13px; color:rgb(158, 158, 158);"> Posted Date:
                                                {{ $article->created_at }} |
                                            </span></h4>

                                        <p> {{ $article->words }}<br><br>

                                            @if ($article->status == 'Publish')
                                                <a class="btn btn-success btn-sm waves-effect waves-light"
                                                    href="#">
                                                    Status: {{ $article->status }}
                                                </a>
                                            @else
                                                <a class="btn btn-danger btn-sm waves-effect waves-light"
                                                    href="#">
                                                    Status: {{ $article->status }}
                                                </a>
                                            @endif

                                        </p>


                                </div>
                            </div>
                        </div>

                        <!-- end row -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <embed src="/article/{{ $article->image }}#toolbar=0"  width="53%"/> --}}
                                    <img src="/article/{{ $article->image }}" alt=""
                                        class="img-fluid radius-image">


                                </div>
                            </div>
                        </div>
                        <!-- end col -->
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
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="/assets/css/bootstrap-dark.min.css"
                        data-appStyle="/assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                {{-- <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="/assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div> --}}

                <h6 class="mt-4">Select Custom Colors</h6>
                <div class="d-flex">

                    <ul class="list-unstyled mb-0">
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-default" value="default"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                            <label class="form-check-label" for="theme-default">Default</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-orange" value="orange"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                            <label class="form-check-label" for="theme-orange">Orange</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-teal" value="teal"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                            <label class="form-check-label" for="theme-teal">Teal</label>
                        </li>
                    </ul>

                    <ul class="list-unstyled mb-0 ms-4">
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-purple" value="purple"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                            <label class="form-check-label" for="theme-purple">Purple</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-green" value="green"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                            <label class="form-check-label" for="theme-green">Green</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-red" value="red"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
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

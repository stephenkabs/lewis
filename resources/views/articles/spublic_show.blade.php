<!doctype html>
<html lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $service->slug }}</title>

    <link rel="shortcut icon" href="/web_nice/img/favicon.png" type="images/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="/web_nice/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web_nice/css/fontawesome.css">
    <link rel="stylesheet" href="/web_nice/css/animate.css">
    <link rel="stylesheet" href="/web_nice/css/swiper.min.css">
    <link rel="stylesheet" href="/web_nice/css/slick.css">
    <link rel="stylesheet" href="/web_nice/css/odometer.css">
    <link rel="stylesheet" href="/web_nice/css/nice-select.css">
    <link rel="stylesheet" href="/web_nice/css/magnific-popup.css">
    <link rel="stylesheet" href="/web_nice/css/cursor.css">
    <link rel="stylesheet" href="/web_nice/css/custom-font.css">
    <link rel="stylesheet" href="/web_nice/css/main.css">
</head>

<body class="it-services">

    <!-- backtotop - start -->
    <div class="xb-backtotop style-2">
        <a href="#" class="scroll">
            <i class="far fa-arrow-up"></i>
        </a>
    </div>
    <!-- backtotop - end -->

    <!-- Preloader - Start -->
    <div id="xb-loadding" class="xb-loader style-2">
        <div class="xb-dual-ring"></div>
    </div>
    <!-- Preloader - End -->

    <div class="body_wrap">

        @include('web_nice.header')

        <!-- main area start  -->
        <main>
            <!-- hero section start  -->
            <section class="hero hero-style-one pos-rel bg_img"
                style="position: relative; background-image: url('/service/{{ $service->image }}'); background-size: cover; background-position: center; ">

                <!-- Black Overlay -->
                <div
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                background-color: rgba(0, 0, 0, 0.6); z-index: 1;">
                </div>

                <!-- Content -->
                <div class="container" style="position: relative; z-index: 2;">
                    <div class="hero_wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="xb-hero">
                                    <p class="xb-item--content wow fadeInUp" data-wow-delay="150ms"
                                        data-wow-duration="600ms" style="font-size: 12px; line-height: 2;">
                                        <span style="font-size: 25px;"><b>{{ $service->name }}</b></span><br>
                                        {{ \Illuminate\Support\Str::words($service->words, 50, '...') }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>

            <!-- service-details-content start  -->
            <div class="sd-ser-content_wrap pb-90">
                <div class="container">
                    <div class="sd-ser-content">
                        <p class="sd-content">
                            {!! $service->description !!}
                        </p>
                        <br>
                    </div><br>
                    <!-- Wrapper with blue background and padding -->
                    <div style="background-color: #05426b; padding: 40px 20px; color: white;">
                        <div class="container">
                            <!-- Section Title -->
                            <h2 class="text-white mb-4" style="font-weight: bold;">Other Services</h2>

                            <!-- Services Grid -->
                            <div class="row mt-none-30">
                                @foreach ($similarService->take(3) as $item)
                                    <div class="col-lg-4 col-md-6 mt-30">
                                        <div class="ap-fea-item pos-rel"
                                            style="background-color: rgb(9, 156, 200); padding: 20px; border-radius: 8px;">
                                            <div class="xb-item--img mb-3">
                                                <img src="/service/{{ $item->image }}" alt=""
                                                    style="width: 100%; border-radius: 5px;">

                                            </div>
                                            <h3 class="xb-item--content">
                                                <a href="{{ route('service.public_show', $item->slug) }}"
                                                    style="color: #ffffff; text-decoration: none; font-size: 20px;">
                                                    {{ $item->name }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>

        </main>
        <!-- main area end  -->
        <br>

        @include('web_nice.footer')

    </div>

    <!-- jquery include -->
    <script src="/web_nice/js/jquery-3.7.1.min.js"></script>
    <script src="/web_nice/js/bootstrap.bundle.min.js"></script>
    <script src="/web_nice/js/swiper.min.js"></script>
    <script src="/web_nice/js/slick.min.js"></script>
    <script src="/web_nice/js/gsap.js"></script>
    <script src="/web_nice/js/wow.min.js"></script>
    <script src="/web_nice/js/appear.js"></script>
    <script src="/web_nice/js/parallaxie.js"></script>
    <script src="/web_nice/js/parallax-scroll.js"></script>
    <script src="/web_nice/js/odometer.min.js"></script>
    <script src="/web_nice/js/imagesloaded.pkgd.min.js"></script>
    <script src="/web_nice/js/isotope.pkgd.min.js"></script>
    <script src="/web_nice/js/cursor-bundle.js"></script>
    <script src="/web_nice/js/easing.min.js"></script>
    <script src="/web_nice/js/scrollspy.js"></script>
    <script src="/web_nice/js/jquery.nice-select.min.js"></script>
    <script src="/web_nice/js/jquery.marquee.min.js"></script>
    <script src="/web_nice/js/jquery.magnific-popup.min.js"></script>
    <script src="/web_nice/js/main.js"></script>

</body>

</html>

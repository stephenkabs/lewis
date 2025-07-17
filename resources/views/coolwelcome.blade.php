<!doctype html>
<html lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AwCloud Official</title>

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
            <section class="hero hero-style-one pos-rel bg_img" data-background="/web_nice/img/bg/hero-bg01.webp">
                <div class="hero-shape">
                    <!--               <div class="shape shape--one bg_img" data-background="/web_nice/img/shape/hero-glassisom.png"></div>
                <div class="shape shape--two"><img src="/web_nice/img/shape/hero-shape01.png" alt=""></div> -->
                    <!-- <div class="shape shape--three"><img src="/web_nice/img/shape/hero-shape04.png" alt=""></div> -->
                </div>
                <div class="container">
                    <div class="hero_wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="xb-hero">
                                    <!-- <h1 class="xb-item--title wow fadeInUp" data-wow-duration="600ms" style="font-size: 34px;">AwCloud Technologies</h1> -->
                                    <p class="xb-item--content wow fadeInUp" data-wow-delay="150ms"
                                        data-wow-duration="600ms" style="font-size: 12px; line-height: 2;">
                                        <span style="font-size: 25px;"><b>AwCloud Technologies</b></span><br>Tailored IT
                                        solutions designed to enhance your business efficiency, security, and
                                        performance. Cloud, Software Development and Graphics is our Business.
                                    </p>

                                    <!--                                 <div class="xb-btn wow mt-60 fadeInUp" data-wow-delay="300ms" data-wow-duration="600ms">
                                    <a href="contact.html" class="thm-btn thm-btn--fill_icon thm-btn--white_icon">
                                        <div class="xb-item--hidden"><span class="xb-item--hidden-text">Get started now</span></div>
                                        <div class="xb-item--holder">
                                            <span class="xb-item--text">Get started now</span>
                                            <div class="xb-item--icon"><i class="far fa-long-arrow-right"></i></div>
                                            <span class="xb-item--text">Get started now</span>
                                        </div>
                                    </a>
                                </div> -->
                                </div>
                            </div>
                            <!--                         <div class="col-md-6">
                            <div class="hero-right_img">
                                <img class="wow skewIn" data-wow-duration="800ms" src="/web_nice/img/hero/hero-img01.png" alt="">
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </section>

                        <!-- industrie section start  -->

            <!-- industrie section end  -->
            <!-- hero section end  -->


        <!-- blog content end -->


                <!-- feature start  -->
                                    <!-- blog content start  -->

                <section class="feature pt-130">
                    <div class="container">
                        <!--             <div class="sec-title--two text-center mb-60">
                        <div class="sub-title"><img src="/web_nice/img/icon/eye-icon.svg" alt=""> Why choose us</div>
                        <h2 class="title">Customer-Centric Approach</h2>
                    </div> -->
                        <div class="row mt-none-30">
                            @foreach ($service as $item)
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="ap-fea-item pos-rel">
                                        <div class="xb-item--img">
                                            <img src="/service/{{ $item->image }}" alt="">
                                        </div>
                                        <h3 class="xb-item--content">
                                            <a href="{{ route('service.public_show', $item->slug) }}"
                                                style="color: inherit; text-decoration: none; font-size: 20px;">
                                                {{ $item->name }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach

                </div>

                        </div>
                    </div>
                </section>
                <!-- feature end  -->
<br>
            </div>
                        <section class="industrie m-lr pt-140 pb-140">
                <div class="industrie-wrap sec-bg pos-rel pt-130 pb-130">
                    <div class="container">
                        <div class="sec-title--two text-center mb-30">
                            <div class="sub-title wow fadeInDown" data-wow-duration="600ms"><img
                                    src="/web_nice/img/icon/building.svg" alt="">Industries we work</div>
                            <h2 class="title wow fadeInDown" data-wow-delay="150ms" data-wow-duration="600ms">Serving
                                diverse industries</h2>
                        </div>
                        <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-2">
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img01.png" alt="">
                                    </div>
                                    <h3 class="xb-title">SaaS</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="150ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img02.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Lawyers</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img03.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Real estate</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="450ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img04.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Insurance</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="600ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img05.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Crypto</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img06.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Private equity</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="150ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img07.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Education</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img08.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Finance</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="450ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img09.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Healthcare</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="indus-item wow fadeInUp" data-wow-delay="600ms" data-wow-duration="600ms">
                                    <div class="xb-img">
                                        <img src="/web_nice/img/industrie/img10.png" alt="">
                                    </div>
                                    <h3 class="xb-title">Automotive</h3>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="xb-btn text-center mt-60">
                            <a href="contact.html" class="thm-btn thm-btn--aso">Book a free consultation</a>
                        </div> --}}
                    </div>
                </div>
            </section>



            <!-- service section start  -->
            <section class="service pb-150 bg_img" data-background="/web_nice/img/bg/da-service_bg.webp">
                <br>
                <div class="container">
                    <div class="contact-top ul_li flex-nowrap">
                        <div class="cont_item ul_li">
                            {{-- <span class="xb-item--star"><i class="fas fa-star-half-alt"></i></span> --}}
                            {{-- <span class="xb-item--rating_num">0.1</span> --}}
                            <span class="xb-item--logo"><img src="/web_nice/img/contact/cont_logo01.webp"
                                    alt="" width="100px"></span>
                        </div>
                        <div class="cont_item ul_li">
                            {{-- <span class="xb-item--star"><i class="fas fa-star"></i></span>
                        <span class="xb-item--rating_num">0.2</span> --}}
                            <span class="xb-item--logo"><img src="/web_nice/img/contact/cont_logo02.webp"
                                    alt="" width="130px"></span>
                        </div>
                        <div class="cont_item ul_li">
                            {{-- <span class="xb-item--star"><i class="fas fa-star"></i></span>
                        <span class="xb-item--rating_num">5.0</span> --}}
                            <span class="xb-item--logo"><img src="/web_nice/img/contact/cont_logo03.webp"
                                    alt="" width="130"></span>
                        </div>

                    </div>

                    <div class="da-service-wrapper">
                        <div class="da-service-item xb-mouseenter">
                            <div class="xb-item--holder">
                                <div class="xb-item--icon"><img src="/web_nice/img/icon/da-fea_icon01.svg"
                                        alt=""></div>
                                <h3 class="xb-item--title">Data source <br> identification</h3>
                                <span class="xb-item--arrow"><i class="fal fa-long-arrow-right"></i></span>
                                <p class="xb-item--content">We identify the new and existing data sources that can help
                                    drive your business forward.</p>
                            </div>
                            <a href="#" class="xb-overlay"></a>
                        </div>
                        <div class="da-service-item xb-mouseenter active">
                            <div class="xb-item--holder">
                                <div class="xb-item--icon"><img src="/web_nice/img/icon/da-fea_icon02.svg"
                                        alt=""></div>
                                <h3 class="xb-item--title">Data ecosystem <br> set up</h3>
                                <span class="xb-item--arrow"><i class="fal fa-long-arrow-right"></i></span>
                                <p class="xb-item--content">We ingest your data into a data warehouse and set up your
                                    analytics to start making sense of it.</p>
                            </div>
                            <a href="#" class="xb-overlay"></a>
                        </div>
                        <div class="da-service-item xb-mouseenter">
                            <div class="xb-item--holder">
                                <div class="xb-item--icon"><img src="/web_nice/img/icon/da-fea_icon03.svg"
                                        alt=""></div>
                                <h3 class="xb-item--title">AI solution <br> design</h3>
                                <span class="xb-item--arrow"><i class="fal fa-long-arrow-right"></i></span>
                                <p class="xb-item--content">We design AI solutions that use your newly found insights
                                    to identify new opportunities for improvement.</p>
                            </div>
                            <a href="#" class="xb-overlay"></a>
                        </div>
                        <div class="da-service-item xb-mouseenter">
                            <div class="xb-item--holder">
                                <div class="xb-item--icon"><img src="/web_nice/img/icon/da-fea_icon04.svg"
                                        alt=""></div>
                                <h3 class="xb-item--title">Business-wide <br> adoption</h3>
                                <span class="xb-item--arrow"><i class="fal fa-long-arrow-right"></i></span>
                                <p class="xb-item--content">We support you in helping your business understand,
                                    embrace, and adopt the change.</p>
                            </div>
                            <a href="#" class="xb-overlay"></a>
                        </div>
                    </div>

                </div>
            </section>

            <!-- brand section start -->
            <section class="brand pt-30 pb-140">
                <div class="container">
                    <div class="o-hidden">
                        <div class="brand-sub_title">
                            <span>Trusted by <b>500+</b> teams to empower <b>2,00,000+</b> people</span>
                        </div>
                        <div class="brand-wrap brand-marquee">

                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo01.png" alt=""></div>
                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo02.png" alt=""></div>
                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo03.png" alt=""></div>
                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo04.png" alt=""></div>
                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo05.png" alt=""></div>
                            <div class="brand-logo"><img src="/web_nice/img/brand/brand-logo06.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </section>







        </main>
        <!-- main area end  -->
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

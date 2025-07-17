<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap grid css -->
    <link rel="stylesheet" href="/lewis/css/plugins/bootstrap-grid.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="/lewis/css/plugins/font-awesome.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="/lewis/css/plugins/swiper.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="/lewis/css/plugins/fancybox.min.css">
    <!-- ashley scss -->
    <link rel="stylesheet" href="/lewis/css/style.css">
    <!-- page name -->
    <title>LS</title>

</head>

<body>

    <!-- wrapper -->
    <div class="mil-wrapper" id="top">

        <!-- cursor -->
        <div class="mil-ball">
            <span class="mil-icon-1">
                <svg viewBox="0 0 128 128">
                    <path
                        d="M106.1,41.9c-1.2-1.2-3.1-1.2-4.2,0c-1.2,1.2-1.2,3.1,0,4.2L116.8,61H11.2l14.9-14.9c1.2-1.2,1.2-3.1,0-4.2	c-1.2-1.2-3.1-1.2-4.2,0l-20,20c-1.2,1.2-1.2,3.1,0,4.2l20,20c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9c1.2-1.2,1.2-3.1,0-4.2	L11.2,67h105.5l-14.9,14.9c-1.2,1.2-1.2,3.1,0,4.2c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9l20-20c1.2-1.2,1.2-3.1,0-4.2L106.1,41.9	z" />
                </svg>
            </span>
            <div class="mil-more-text">More</div>
            <div class="mil-choose-text">Сhoose</div>
        </div>
        <!-- cursor end -->

        <!-- preloader -->
        <div class="mil-preloader">
            <div class="mil-preloader-animation">
                <div class="mil-pos-abs mil-animation-1">
                    <p class="mil-h3 mil-muted mil-thin">Unleashing the</p>
                    <p class="mil-h3 mil-muted">Pioneering</p>
                    <p class="mil-h3 mil-muted mil-thin">Spirit</p>
                </div>
                <div class="mil-pos-abs mil-animation-2">
                    <div class="mil-reveal-frame">
                        <p class="mil-reveal-box"></p>
                        <p class="mil-h3 mil-muted mil-thin">lewishikapwasha.com</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- scrollbar progress -->
        <div class="mil-progress-track">
            <div class="mil-progress"></div>
        </div>
        <!-- scrollbar progress end -->

        <!-- menu -->
        <div class="mil-menu-frame">
            <!-- frame clone -->
            <div class="mil-frame-top">
                <a href="/" class="mil-logo">LS</a>
                <div class="mil-menu-btn">
                    <span></span>
                </div>
            </div>
            <!-- frame clone end -->
            @include('lewis.frame')
        </div>
        <!-- menu -->

        <!-- curtain -->
        <div class="mil-curtain"></div>
        <!-- curtain end -->

        <!-- frame -->
        <div class="mil-frame">
            <div class="mil-frame-top">
                <a href="/" class="mil-logo">LS.</a>
                <div class="mil-menu-btn">
                    <span></span>
                </div>
            </div>
            <div class="mil-frame-bottom">
                <div class="mil-current-page"></div>
                <div class="mil-back-to-top">
                    <a href="#top" class="mil-link mil-dark mil-arrow-place">
                        <span>Back to top</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- frame end -->

        <!-- content -->
        <div class="mil-content">
            <div id="swupMain" class="mil-main-transition">

                <section class="mil-banner-personal">

                    <div class="mil-animation-frame">
                        <div class="mil-animation mil-position-4 mil-dark mil-scale" data-value-1="7" data-value-2="1.4"
                            style="right: 25%"></div>
                    </div>

                    <div class="container">
                        <div class="mil-banner-content mil-up">

                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="mil-personal-text">
                                        <p class="mil-mb-60">Hello! My name is</p>
                                        <h1 class="mil-mb-60">Lewis <br>Shikapwasha</h1>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">

                                                <span class="mil-suptitle mil-suptitle-dark mil-mb-60">
                                                    @foreach ($heroes as $item)
                                                        @if ($item->status == 'Published')
                                                            {{-- "Passionately Creating Design Wonders: <br>Unleashing
                                                            Boundless Creativity" --}}
                                                            {{ $item->about }}
                                                        @endif
                                                    @endforeach

                                                </span>

                                                <a href="#" class="mil-link mil-dark mil-arrow-place">
                                                    <span>More about me</span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mil-portrait-frame">
                                        <img src="/lewis/img/faces/large/1.png" alt="Portrait">
                                    </div>
                                </div>
                            </div>

                            <div class="mil-banner-panel" style="background-color:#555555">
                                <h5 style="color:#ffffff">"With the heart of a shepherd and the wings of an eagle, Lewis
                                    Shikapwasha continues to empower people to soar higher, dream bigger and live"</h5>

                                <div class="mil-right">
                                    <!--                                     <div class="mil-social-frame">
                                        <ul class="mil-social-icons mil-dark">
                                            <li><a href="#." target="_blank" class="social-icon"><i class="far fa-circle"></i></a></li>
                                            <li><a href="#." target="_blank" class="social-icon"><i class="far fa-circle"></i></a></li>
                                            <li><a href="#." target="_blank" class="social-icon"><i class="far fa-circle"></i></a></li>
                                            <li><a href="#." target="_blank" class="social-icon"><i class="far fa-circle"></i></a></li>
                                        </ul>
                                    </div> -->
                                    <a href="#" class="mil-button mil-arrow-place">
                                        <span>More About Me.</span>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>

                </section>
                <!-- banner end -->

                <!-- about -->
                <section id="about" style="background-color: #faf3e7;">
                    <div class="container mil-p-120-30">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-xl-5">
                                @foreach ($core as $item)
                                    <div class="mil-mb-90">

                                        @php
                                            $titleWords = explode(' ', $item->name);
                                            $lastWord = array_pop($titleWords);
                                            $firstPart = implode(' ', $titleWords);
                                        @endphp

                                        <h2 class="mil-up mil-mb-60">
                                            {{ $firstPart }} <span class="mil-thin">{{ $lastWord }}</span>
                                        </h2>




                                        {{-- <h2 class="mil-up mil-mb-60">About <br>Lewis <span class="mil-thin">Shikapwasha</span> --}}
                                        </h2>
                                        <p class="mil-up mil-mb-30">{{ $item->words }}</p>

                                        {{-- <p class="mil-up mil-mb-60">Collaboration is at the heart of what we do. Our team
                                        thrives on the synergy that arises when unique perspectives converge, fostering
                                        an environment of boundless creativity. By harnessing our collective expertise,
                                        we produce extraordinary results that consistently surpass expectations.</p> --}}

                                        <div class="mil-about-quote">
                                            <div class="mil-avatar mil-up">
                                                <img src="/lewis/img/faces/customers/2.jpg" alt="Founder">
                                            </div>
                                            <h6 class="mil-quote mil-up">Contact Me<br> <span
                                                    class="mil-thin">Phone:</span> +61 405 071 440<br> <span
                                                    class="mil-thin">Email: Lewisshikapwasha@gmail.com</span></h6>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-5">

                                <div class="mil-about-photo mil-mb-90">
                                    <div class="mil-lines-place"></div>
                                    <div class="mil-up mil-img-frame" style="padding-bottom: 160%;">
                                        <img src="/core/{{ $item->image }}" alt="img" class="mil-scale"
                                            data-value-1="1" data-value-2="1.2">
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- about end -->

                <!-- services -->
                <section class="mil-dark-bg">
                    <div class="mi-invert-fix">
                        <div class="mil-animation-frame">
                            <div class="mil-animation mil-position-1 mil-scale" data-value-1="2.4" data-value-2="1.4"
                                style="top: 300px; right: -100px"></div>
                            <div class="mil-animation mil-position-2 mil-scale" data-value-1="2" data-value-2="1"
                                style="left: 150px"></div>
                        </div>
                        <div class="container mil-p-120-0">

                            <div class="mil-mb-120">
                                <div class="row">
                                    <div class="col-lg-10">

                                        <span class="mil-suptitle mil-light-soft mil-suptitle-right mil-up">Pastor
                                            Lewis Leadership<br> & strategies.</span>

                                    </div>
                                </div>

                                <div class="mil-complex-text justify-content-center mil-up mil-mb-15">

                                    {{-- <span class="mil-text-image"><img src="/lewis/img/photo/2.jpg"
                                            alt="team"></span> --}}
                                    <h2 class="mil-h1 mil-muted mil-center">Unique <span
                                            class="mil-thin">Leadership</span>
                                    </h2>

                                </div>
                                <div class="mil-complex-text justify-content-center mil-up">

                                    <h2 class="mil-h1 mil-muted mil-center">and <span
                                            class="mil-thin">Strategies.</span></h2>
                                    <a href="/contact-us"
                                        class="mil-services-button mil-button mil-arrow-place"><span>Contact Me
                                        </span></a>

                                </div>
                            </div>

                            <div class="row mil-services-grid m-0">
                                @foreach ($feature as $item)
                                    <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">

                                        <a href="#" class="mil-service-card-sm mil-up">
                                            <h5 class="mil-muted mil-mb-30">{{ $item->name }}</h5>
                                            <p class="mil-light-soft mil-mb-30">{{ $item->words }}</p>
                                            <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                                        </a>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </section>
                <!-- services end -->

                <!-- team -->
                <section>
                    <div class="container mil-p-120-30">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-5 col-xl-4">

                                <div class="mil-mb-90">
                                    <h2 class="mil-up mil-mb-60">Our Book <br>Store</h2>
                                    <p class="mil-up mil-mb-30">Lewis Shipwasha is not only a respected leader in board
                                        governance, finance, and
                                        community development—he’s also a published author whose works inspire purpose,
                                        accountability,
                                        and excellence. His books offer practical wisdom drawn from real-world
                                        experience, delivered with clarity and heart.</p>

                                    <p class="mil-up mil-mb-60">"With the heart of a shepherd and the wings of an
                                        eagle, Lewis Shikapwasha continues to empower people to soar higher, dream
                                        bigger and live"</p>

                                    <div class="mil-up"><a href="/book_store"
                                            class="mil-button mil-arrow-place mil-mb-60"><span>Online Book
                                                Store</span></a>
                                    </div>

                                    <h4 class="mil-up"><span class="mil-thin">We are</span> Unleashing <br><span
                                            class="mil-thin">Exceptional</span> Pioneers.</h4>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="mil-team-list">
                                    <div class="mil-lines-place"></div>

                                    <div class="row mil-mb-60">
                                        @php
                                            $chunks = $service->take(4)->chunk(2);
                                        @endphp

                                        @foreach ($chunks as $column)
                                            <div class="col-sm-6">
                                                @foreach ($column as $item)
                                                    <div class="mil-team-card mil-up mil-mb-30">
                                                        <img src="/service/{{ $item->image }}" alt="Team member">
                                                        <div class="mil-description">
                                                            <div class="mil-secrc-text">
                                                                <h5 class="mil-muted mil-mb-5">
                                                                    <a
                                                                        href="{{ route('service.public_show', $item->slug) }}">{{ $item->name }}</a>
                                                                </h5>
                                                                <p class="mil-link mil-light-soft mil-mb-10">
                                                                    {{ $item->category->name }}</p>
                                                                {{-- <ul class="mil-social-icons mil-center">
                            <li><a href="#." class="social-icon"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#." class="social-icon"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#." class="social-icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#." class="social-icon"><i class="fab fa-github"></i></a></li>
                        </ul> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- team end -->

                <!-- reviews -->
                {{-- <section class="mil-soft-bg">
                    <div class="container mil-p-120-120">

                        <div class="row">
                            <div class="col-lg-10">

                                <span class="mil-suptitle mil-suptitle-right mil-suptitle-dark mil-up">Customer reviews
                                    are a valuable source <br>of information for both businesses and consumers.</span>

                            </div>
                        </div>

                        <h2 class="mil-center mil-up mil-mb-60">Customer <span class="mil-thin">Voices:</span>
                            <br>Hear What <span class="mil-thin">They Say!</span>
                        </h2>

                        <div class="mil-revi-pagination mil-up mil-mb-60"></div>

                        <div class="row mil-relative justify-content-center">
                            <div class="col-lg-8">

                                <div class="mil-slider-nav mil-soft mil-reviews-nav mil-up">
                                    <div class="mil-slider-arrow mil-prev mil-revi-prev mil-arrow-place"></div>
                                    <div class="mil-slider-arrow mil-revi-next mil-arrow-place"></div>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                    class="mil-quote-icon mil-up">
                                    <path
                                        d="M 13.5 10 A 8.5 8.5 0 0 0 13.5 27 A 8.5 8.5 0 0 0 18.291016 25.519531 C 17.422273 29.222843 15.877848 31.803343 14.357422 33.589844 C 12.068414 36.279429 9.9433594 37.107422 9.9433594 37.107422 A 1.50015 1.50015 0 1 0 11.056641 39.892578 C 11.056641 39.892578 13.931586 38.720571 16.642578 35.535156 C 19.35357 32.349741 22 27.072581 22 19 A 1.50015 1.50015 0 0 0 21.984375 18.78125 A 8.5 8.5 0 0 0 13.5 10 z M 34.5 10 A 8.5 8.5 0 0 0 34.5 27 A 8.5 8.5 0 0 0 39.291016 25.519531 C 38.422273 29.222843 36.877848 31.803343 35.357422 33.589844 C 33.068414 36.279429 30.943359 37.107422 30.943359 37.107422 A 1.50015 1.50015 0 1 0 32.056641 39.892578 C 32.056641 39.892578 34.931586 38.720571 37.642578 35.535156 C 40.35357 32.349741 43 27.072581 43 19 A 1.50015 1.50015 0 0 0 42.984375 18.78125 A 8.5 8.5 0 0 0 34.5 10 z"
                                        fill="#000000" />
                                </svg>

                                <div class="swiper-container mil-reviews-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Sarah Newman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">This creative agency stands out with
                                                    their exceptional talent and expertise. Their ability to think
                                                    outside the box and bring unique ideas to life is truly impressive.
                                                    With meticulous attention to detail, they consistently deliver
                                                    visually stunning and impactful work.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Emma Trueman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">I had the pleasure of working with this
                                                    creative agency, and I must say, they truly impressed me. They
                                                    consistently think outside the box, resulting in impressive and
                                                    impactful work. I highly recommend this agency for their consistent
                                                    delivery of exceptional creative solutions.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Sarah Newman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">This creative agency stands out with
                                                    their exceptional talent and expertise. Their ability to think
                                                    outside the box and bring unique ideas to life is truly impressive.
                                                    With meticulous attention to detail, they consistently deliver
                                                    visually stunning and impactful work.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Emma Trueman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">I had the pleasure of working with this
                                                    creative agency, and I must say, they truly impressed me. They
                                                    consistently think outside the box, resulting in impressive and
                                                    impactful work. I highly recommend this agency for their consistent
                                                    delivery of exceptional creative solutions.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Sarah Newman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">This creative agency stands out with
                                                    their exceptional talent and expertise. Their ability to think
                                                    outside the box and bring unique ideas to life is truly impressive.
                                                    With meticulous attention to detail, they consistently deliver
                                                    visually stunning and impactful work.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Emma Trueman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">I had the pleasure of working with this
                                                    creative agency, and I must say, they truly impressed me. They
                                                    consistently think outside the box, resulting in impressive and
                                                    impactful work. I highly recommend this agency for their consistent
                                                    delivery of exceptional creative solutions.</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200"
                                                data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Sarah Newman</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Envato market</p>
                                                <p class="mil-text-xl mil-up">This creative agency stands out with
                                                    their exceptional talent and expertise. Their ability to think
                                                    outside the box and bring unique ideas to life is truly impressive.
                                                    With meticulous attention to detail, they consistently deliver
                                                    visually stunning and impactful work.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </section> --}}
                <!-- reviews end -->

                <!-- partners -->
                {{-- <div class="mil-soft-bg">
                    <div class="container mil-p-0-120">

                        <div class="swiper-container mil-infinite-show mil-up">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 60px;"><img
                                            src="/lewis/img/partners/1.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 100px;"><img
                                            src="/lewis/img/partners/2.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 60px;"><img
                                            src="/lewis/img/partners/1.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 100px;"><img
                                            src="/lewis/img/partners/2.svg" alt="logo"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <!-- partners end -->

                <!-- blog -->
                <section class="mil-soft-bg">
                    <div class="container mil-p-120-60">
                        <div class="row align-items-center mil-mb-30">
                            <div class="col-lg-6 mil-mb-30">
                                <h3 class="mil-up">Ministry & Family Publication:</h3>
                            </div>
                            <div class="col-lg-6 mil-mb-30">
                                <div class="mil-adaptive-right mil-up">
                                    <a href="blog.html" class="mil-link mil-dark mil-arrow-place">
                                        <span>View all</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($article->take(4) as $item)
                                <div class="col-lg-6">

                                    <a href="{{ route('articles.public_show', $item->slug) }}"
                                        class="mil-blog-card mil-mb-60">
                                        <div class="mil-cover-frame mil-up">
                                            <img src="/article/{{ $item->image }}" alt="cover">
                                        </div>
                                        <div class="mil-post-descr">
                                            <div class="mil-labels mil-up mil-mb-30">
                                                <div class="mil-label mil-upper mil-accent">
                                                    {{ $item->category->name }}</div>
                                                <div class="mil-label mil-upper">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}
                                                </div>
                                            </div>
                                            <h4 class="mil-up mil-mb-30">{{ $item->name }}</h4>
                                            <p class="mil-post-text mil-up mil-mb-30">{{ $item->words }}</p>
                                            <div class="mil-link mil-dark mil-arrow-place mil-up">
                                                <span>Read more</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
                <!-- blog end -->

                @include('lewis.footer')

                <!-- hidden elements -->
                <div class="mil-hidden-elements">
                    <div class="mil-dodecahedron">
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
                        <path
                            d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z" />
                    </svg>

                    <svg width="250" viewBox="0 0 300 1404" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mil-lines">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1 892L1 941H299V892C299 809.71 232.29 743 150 743C67.7096 743 1 809.71 1 892ZM0 942H300V892C300 809.157 232.843 742 150 742C67.1573 742 0 809.157 0 892L0 942Z"
                            class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M299 146V97L1 97V146C1 228.29 67.7096 295 150 295C232.29 295 299 228.29 299 146ZM300 96L0 96V146C0 228.843 67.1573 296 150 296C232.843 296 300 228.843 300 146V96Z"
                            class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M299 1H1V1403H299V1ZM0 0V1404H300V0H0Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M150 -4.37115e-08L150 1404L149 1404L149 0L150 -4.37115e-08Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M150 1324C232.29 1324 299 1257.29 299 1175C299 1092.71 232.29 1026 150 1026C67.7096 1026 1 1092.71 1 1175C1 1257.29 67.7096 1324 150 1324ZM150 1325C232.843 1325 300 1257.84 300 1175C300 1092.16 232.843 1025 150 1025C67.1573 1025 0 1092.16 0 1175C0 1257.84 67.1573 1325 150 1325Z"
                            class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M300 1175H0V1174H300V1175Z"
                            class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M150 678C232.29 678 299 611.29 299 529C299 446.71 232.29 380 150 380C67.7096 380 1 446.71 1 529C1 611.29 67.7096 678 150 678ZM150 679C232.843 679 300 611.843 300 529C300 446.157 232.843 379 150 379C67.1573 379 0 446.157 0 529C0 611.843 67.1573 679 150 679Z"
                            class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M299 380H1V678H299V380ZM0 379V679H300V379H0Z"
                            class="mil-move" />
                    </svg>
                </div>
                <!-- hidden elements end -->

            </div>
        </div>
        <!-- content -->
    </div>
    <!-- wrapper end -->

    <!-- jQuery js -->
    <script src="/lewis/js/plugins/jquery.min.js"></script>
    <!-- swup js -->
    <script src="/lewis/js/plugins/swup.min.js"></script>
    <!-- swiper js -->
    <script src="/lewis/js/plugins/swiper.min.js"></script>
    <!-- fancybox js -->
    <script src="/lewis/js/plugins/fancybox.min.js"></script>
    <!-- gsap js -->
    <script src="/lewis/js/plugins/gsap.min.js"></script>
    <!-- scroll smoother -->
    <script src="/lewis/js/plugins/smooth-scroll.js"></script>
    <!-- scroll trigger js -->
    <script src="/lewis/js/plugins/ScrollTrigger.min.js"></script>
    <!-- scroll to js -->
    <script src="/lewis/js/plugins/ScrollTo.min.js"></script>
    <!-- ashley js -->
    <script src="/lewis/js/main.js"></script>

</body>

</html>

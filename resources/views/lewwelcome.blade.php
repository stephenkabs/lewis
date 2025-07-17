<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Solatec - Solar and Renewable Energy Template">
    <link href="/clouds/images/favicon/favicon.png" rel="icon">
    <title>AwCloud Tech</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="/clouds/css/libraries.css">
    <link rel="stylesheet" href="/clouds/css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="preloader">
            <div class="loading"><span></span><span></span><span></span><span></span></div>
        </div><!-- /.preloader -->

        <!-- =========================
        Header
    =========================== -->
        @include('clouds.header')

        <!-- ============================
        Slider
    ============================== -->
        <section class="page-title page-title-layout2 bg-overlay bg-overlay-2 bg-parallax">
            @foreach ($background as $item)
                @if ($item->type == 'hero')
                    <div class="bg-img"><img src="/background_images/{{ $item->image }}" alt="background"></div>
                @endif
            @endforeach
            <div class="container">
                <div class="row">
                    @foreach ($heroes as $item)
                        @if ($item->status == 'Published')
                            <div class="col-sm-12 col-md-12 col-lg-6">

                                {{-- <h1 class="pagetitle__heading mb-0" style="font-size: 50px;"> {{ $item->title }}</h1> --}}
                                <h1 class="pagetitle__heading mb-0"
                                    style="
        font-size: 50px;
        background: linear-gradient(135deg, #FFD700, #FFA500, #FF8C00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    ">
                                    {{ $item->title }}
                                </h1>

                                <p class="heading__desc" style="color:white"> {{ $item->about }}</p>

                                <div class="d-flex align-items-center mt-30">
                                    <a href="{{ $item->button_link }}"
                                        class="btn btn__white">{{ $item->button_name }}</a>
                                </div>
                            </div><!-- /.col-12 -->
                        @endif
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container -->
            <br><br><br><br>
        </section><!-- /.page-title -->

        <!-- ======================
    Features Layout 4
    ========================= -->

        <!-- ========================
      About Layout 2
    =========================== -->
        <section class="about-layout2 pb-70" style="background-color: #fffaef;">
            <div class="container">
                @foreach ($core as $item)
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-7">
                            <div class="about__img">
                                <img src="/core/{{ $item->image }}" alt="about">
                                {{-- <div class="cta__banner">
                                    <h3 class="cta__title color-white">Core Objective </h3>
                                    <p class="cta__desc font-weight-bold color-white mb-0">{{ $item->core_value }}</p>
                                </div><!-- /.cta__banner --> --}}
                            </div><!-- /.about__img -->
                        </div><!-- /.col-lg-7 -->
                        <div class="col-sm-12 col-md-12 col-lg-5">
                            <div class="heading__layout2 mb-40">
                                <h2 class="heading__subtitle">Awesome Cloud Technologies</h2>
                                <h3 class="heading__title"
                                    style="
        background: linear-gradient(135deg, #ff9500, #FFA500, #b16304);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    ">
                                    {{ $item->name }}
                                </h3>

                                <p class="heading__desc">{{ $item->words }}</p>
                            </div><!-- /.heading__layout2 -->
                            {{-- <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-filled"></i>
                <b><span>Explore More</span></b>
              </a> --}}

                            <a href="#" class="btn btn__primary btn__outlined btn__custom">
                                <i class="icon-arrow-right"></i>
                                <span>About Us</span>
                            </a>
                        </div><!-- /.col-lg-5 -->
                    </div><!-- /.row -->
                @endforeach
            </div><!-- /.container -->
        </section><!-- /.About Layout 2 -->

        <!-- ======================
    Features Layout 1
    ========================= -->

        <!-- ===========================
      portfolio layout1
    ============================= -->

        <!-- ===========================
      Banner layout 3
    ============================= -->

        <!-- ===========================
      cta layout 2
    ============================= -->
        {{-- <section class="cta-layout2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-container d-flex flex-wrap">
                            <div class="cta__item d-flex">
                                <div class="cta__icon custom-icon">
                                    <i class="icon-solar-panel"></i>
                                </div><!-- /.cta__icon -->
                                <div class="cta__body">
                                    <h4 class="cta__title">Design & Shipping</h4>
                                    <p class="cta__desc">We collaborate with you to design and deliver a system that
                                        meets your utility
                                        usage and selecting equipments.</p>
                                    <a href="#" class="btn btn__link btn__primary">
                                        <i class="icon-arrow-right"></i>
                                        <span>Schedule A Visit</span>
                                    </a>
                                </div><!-- /.cta__body -->
                            </div><!-- /.cta__item -->
                            <div class="cta__item d-flex">
                                <div class="cta__icon custom-icon">
                                    <i class="icon-energy"></i>
                                </div><!-- /.cta__icon -->
                                <div class="cta__body">
                                    <h4 class="cta__title">Contract & Install</h4>
                                    <p class="cta__desc">Whether you want to install the system on your own or hire
                                        local contractors
                                        directly managing the installation.</p>
                                    <a href="#" class="btn btn__link btn__primary">
                                        <span>Request A Quote</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div><!-- /.cta__body -->
                            </div><!-- /.cta__item -->
                        </div><!-- /.cta -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <p class="text__link text-center mt-40 mb-0">Discover independence through the power of solar,
                            <a href="#">
                                <span>Explore Our Plans</span> <i class="icon-arrow-right"></i>
                            </a>
                        </p>
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.cta layout 2 --> --}}
        <br><br>
        <section class="features-layout4 py-0">
            <div class="container">
                <div class="row row-no-gutter features-wrapper">
                    <!-- Feature item #1 -->
                    @foreach ($feature as $item)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="feature-item">
                                <div class="feature__icon custom-icon">
                                    <i class="{{ $item->icon }}"></i>
                                </div>
                                <h4 class="feature__title">{{ $item->name }}</h4>
                                <p class="feature__desc">{{ $item->words }}
                                </p>
                                <a href="" class="btn__link">
                                    <i class="icon-arrow-right icon-filled"></i>
                                    <span>Explore More</span>
                                </a>
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-lg-3 -->
                    @endforeach
                    <!-- Feature item #2 -->
                    {{-- <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__icon custom-icon">
                <i class="icon-wind-turbine"></i>
              </div>
              <h4 class="feature__title">Wind Turbines Services</h4>
              <p class="feature__desc">The smallest turbines are used for applications such as the battery charging for
                auxiliary power.
              </p>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-filled"></i>
                <span>Explore More</span>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__icon custom-icon">
                <i class="icon-hydro-power"></i>
              </div>
              <h4 class="feature__title">Hydropower Plants Services</h4>
              <p class="feature__desc">Our remote industrial solar systems are designed to reliably power our clients
              </p>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-filled"></i>
                <span>Explore More</span>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #4 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__icon custom-icon">
                <i class="icon-eco-factory"></i>
              </div>
              <h4 class="feature__title">Fossil Resources Services</h4>
              <p class="feature__desc">Our sales engineers on our staff have experience and can design any complete
              </p>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-filled"></i>
                <span>Explore More</span>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 --> --}}
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Features Layout 4 -->
        <br><br>
        <!-- ========================
      Footer
    ========================== -->
        @include('clouds.footer')
        <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
        <div class="search-popup">
            <button class="search-popup__close"><i class="fas fa-times"></i></button>
            <form class="search-popup__form">
                <input type="text" class="search-popup__input" placeholder="Type Words Then Enter">
                <button class="search-popup__btn"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- /. search-popup -->
    </div><!-- /.wrapper -->

    <script src="/clouds/js/jquery-3.5.1.min.js"></script>
    <script src="/clouds/js/plugins.js"></script>
    <script src="/clouds/js/main.js"></script>
</body>

</html>

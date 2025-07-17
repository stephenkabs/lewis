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
                @if ($item->type == 'Service')
                    <div class="bg-img"><img src="/background_images/{{ $item->image }}" alt="background"></div>
                @endif
            @endforeach
            <div class="container">
                <div class="row">
                    @foreach ($heroes as $item)
                        @if ($item->status == 'Service')
                            <div class="col-sm-12 col-md-12 col-lg-6">

                                <h1 class="pagetitle__heading mb-0" style="font-size: 50px;"> {{ $item->title }}</h1>
                                {{-- <h1 class="pagetitle__heading mb-0"
                            style="
                                font-size: 50px;
                                background: linear-gradient(135deg, #68c6f9, #8bb60b);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                display: inline-block;
                                ">
                                Cloud & Software
                        </h1> --}}
                                <p class="heading__desc" style="color:white"> {{ $item->about }}</p>

                                <div class="d-flex align-items-center mt-30">
                                    <a href="/products" class="btn btn__primary mr-30">
                                        <i class="icon-arrow-right"></i> <span>Our Products</span>
                                    </a>
                                    <a href="{{ $item->button_link }}" class="btn btn__white">{{ $item->button_name }}</a>
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


        <!-- ======================
    Features Layout 1
    ========================= -->

        <!-- ===========================
      portfolio layout1
    ============================= -->
        <section class="portfolio-layout1"
            style="background-image: linear-gradient(135deg, #063c60 50%, #588f05 100%);">


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-layout2 mb-40">
                            <h3 class="heading__title" style="color:white">Our Services</h3>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <!-- portfolio item #1 -->
                    @foreach ($service as $item)


                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="portfolio-item">
                                <div class="portfolio__img">
                                    <img src="/service/{{ $item->image }}" alt="portfolio img">
                                </div><!-- /.portfolio-img -->
                                <div class="portfolio__body">
                                    <div class="portfolio__cat">
                                    <a
                                            href="{{ route('service.public_show', $item->slug) }}">{{ $item->category->name }}</a>
                                    </div><!-- /.portfolio-cat -->
                                    <h4 class="portfolio__title"><a
                                            href="{{ route('service.public_show', $item->slug) }}">{{ $item->name }}</a>
                                    </h4>
                                </div><!-- /.portfolio__body -->
                            </div><!-- /.portfolio-item -->
                        </div><!-- /.col-lg-4 -->
                    @endforeach
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.portfolio layout1 -->
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

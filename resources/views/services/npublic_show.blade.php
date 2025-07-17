<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Solatec - Solar and Renewable Energy Template">
    <link href="/clouds/images/favicon/favicon.png" rel="icon">
    <title>{{ $service->name }}</title>
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

        <!-- ========================
       page title
    =========================== -->
        <section class="page-title page-title-layout2 bg-overlay bg-overlay-2 bg-parallax">
            <div class="bg-img"><img src="/service/{{ $service->image }}" alt="background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h1 class="pagetitle__heading mb-0" style="font-size: 40px">{{ $service->name }}</h1>
                        {{-- <p class="pagetitle__desc">{{ $service->words }}</p> --}}
                        <div class="d-flex align-items-center mt-30">
                            <a href="request-quote.html" class="btn btn__primary mr-30">
                                <i class="icon-arrow-right"></i> <span>Contact Us </span>
                            </a>
                        </div>
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="breadcrumb-wrapper bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $service->category->name }}</li>
                                </ol>
                            </nav>
                        </div><!-- /.col-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->
        </section><!-- /.page-title -->

        <!-- ======================
      Text Content Section
    ========================= -->
        <section class="text-content-section pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4" >
                        <aside class="sidebar has-marign-right mb-30">
                            <div class="widget widget-categories" style="background-color: rgb(160, 205, 240)">
                                <h5 class="widget__title">Other Services</h5>
                                <div class="widget-content">
                                    <ul class="list-unstyled">
                                        @foreach ($similarService->take(3) as $item)
                                            <li>
                                                <a href="{{ route('service.public_show', $item->slug) }}" class="active"><i
                                                        class="icon-arrow-right"></i><span>{{ $item->name }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget-categories -->
                            {{-- <div class="widget widget-help bg-overlay bg-overlay-primary">
                                <div class="bg-img"><img src="/clouds/images/banners/7.jpg" alt="banner"></div>
                                <div class="widget__content">
                                    <h5 class="widget__title">Contact Our Team</h5>
                                    <p class="widget__desc mb-30">
                                        For faster responses and dedicated support, get in touch with our team.
                                    </p>

                                    <a href="request-quote.html" class="btn btn__white btn__outlined btn__block mb-30">
                                        Contact Us
                                    </a>
                                    @foreach ($generalSettings as $item)
                                        <div class="contact__number d-none d-xl-flex align-items-center">
                                            <i class="icon-phone"></i>
                                            <a href="#">{{ $item->phone ?? '(260 212) 247344' }}</a>
                                        </div>
                                    @endforeach
                                </div><!-- /.widget-download -->
                            </div><!-- /.widget-help --> --}}
                            <div class="widget widget-download">
                                <h5 class="widget__title">Download</h5>
                                <div class="widget__content">
                                    <a href="/profile.pdf" class="btn btn__primary btn__block mb-20" download>
                                        <span>Company Profile</span>
                                        <img src="/clouds/images/icons/pdf.png" alt="pdf">
                                    </a>
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget-download -->
                        </aside><!-- /.sidebar -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-12 col-md-12 col-lg-8">

                        <div class="video-banner mb-70">
                            <img src="/service/{{ $service->image }}" alt="banner">

                        </div><!-- /.video-banner -->
                        <div class="text__block mb-30">
                            <h5 class="text__block-title">{{ $service->name }}</h5>
                            <p class="text__block-desc">{!! $service->description !!} </p>
                        </div>

                        {{-- <h5 class="fz-25 mt-20">Key Benifits</h5> --}}
                        <div id="accordion" class="mb-60">

                            <div class="accordion-item opened">
                                <div class="accordion-item__header" data-toggle="collapse" data-target="#collapse3">
                                    <a class="accordion-item__title" href="#">{{ $service->name }}</a>
                                </div><!-- /.accordion-item-header -->
                                <div id="collapse3" class="collapse show" data-parent="#accordion">
                                    <div class="accordion-item__body">
                                        <p>{{ $service->words }}</p>
                                    </div><!-- /.accordion-item-body -->
                                </div>
                            </div><!-- /.accordion-item -->
                        </div><!-- /.accordion -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Text Content Section -->

        <!-- ===========================
      contact layout 2
    ============================= -->
        {{-- <section class="contact-layout2 pb-0 bg-overlay bg-overlay-primary-gradient">
      <div class="bg-img"><img src="/clouds/images/banners/2.jpg" alt=""></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="col-inner">
              <div class="heading-layout2 heading-light mb-60">
                <h2 class="heading__subtitle">Save Money, Save The Environment!</h2>
                <h3 class="heading__title">Providing Value To Our ClientsThrough Ongoing Product & Innovation.
                </h3>
                <p class="heading__desc">Our Solar business now provides the preferred channel to market for some of the
                  world’s leading PV manufacturers and our solar professionals work jointly with partners on enhancing
                  product features, lowering lead times and improving cash flow.
                </p>
              </div><!-- /.heading -->
              <div class="row fancybox-light">
                <!-- fancybox item #1 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-biosphere2"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Environmental Sensitivity</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
                <!-- fancybox item #2 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-tube"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Personalised Solutions</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
                <!-- fancybox item #3 -->
                <div class="col-sm-4">
                  <div class="fancybox-item">
                    <div class="fancybox__icon">
                      <i class="icon-electric-charge"></i>
                    </div><!-- /.fancybox-icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title mb-0">Performance Measures</h4>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-sm-4 -->
              </div><!-- /.row -->
            </div>
          </div><!-- /.col-xl-6 -->

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 2 --> --}}

        <!-- ========================
      Footer
    ========================== -->
@include('clouds.footer')
        <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

    </div><!-- /.wrapper -->

    <script src="/clouds/js/jquery-3.5.1.min.js"></script>
    <script src="/clouds/js/plugins.js"></script>
    <script src="/clouds/js/main.js"></script>
</body>

</html>

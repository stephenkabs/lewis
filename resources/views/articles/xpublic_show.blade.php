<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Solatec - Solar and Renewable Energy Template">
  <link href="/mopani/images/favicon/favicon.png" rel="icon">
  <title>Solatec - Solar and Renewable Energy Template</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="/mopani/css/libraries.css">
  <link rel="stylesheet" href="/mopani/css/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
@include('mopani.header')
    <!-- ========================
       page title
    =========================== -->
    <section class="page-title pt-30 pb-30">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <nav>
              <ol class="breadcrumb justify-content-center mb-20">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/news">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>
              </ol>
            </nav>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Single
    ========================= -->
    <section class="blog blog-single pt-0 pb-40">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="post-item mb-0">
              <div class="post__img">
                <a href="#">
                  <img src="/article/{{ $article->image }}" alt="post image">
                </a>
              </div><!-- /.entry-img -->
              <div class="post__body">
                <div class="post__meta d-flex align-items-center">
                  <div class="post__cat">
                    <a href="#">{{ $article->category->type }}</a><a href="#">{{ $article->category->name }}</a>
                  </div><!-- /.post-meta-cat -->
                  <span class="post__date">{{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</span>
                  <span class="post__author">By: <a href="#">Ahmed</a></span>
                </div><!-- /.post-meta -->
                <h1 class="post__title">{{ $article->name }}</h1>
                <div class="post__desc">
                  <p>{!! $article->description !!}</p>
                </div><!-- /.post-desc -->
              </div><!-- /.entry-content -->
            </div><!-- /.post-item -->


          </div><!-- /.col-lg-8 -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar">
              <div class="widget widget-search">
                <h5 class="widget__title">Search</h5>
                <div class="widget__content">
                  <form class="widget__form-search">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                  </form>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-search -->
              <div class="widget widget-posts">
                <h5 class="widget__title">Recent Posts</h5>
                <div class="widget__content">
                  <!-- post item #1 -->
                    @foreach ($similarArticle->take(3) as $item)
                  <div class="widget-post-item d-flex align-items-center">
<div class="widget-post__img" style="width: 100%; height: 80px; overflow: hidden; position: relative;">
    <a href="#" style="display: block; width: 100%; height: 100%;">
        <img src="/article/{{ $item->image }}" alt="thumb"
             style="width: 100%; height: 100%; object-fit: cover; display: block;">
    </a>
</div><!-- /.widget-post-img -->

                    <div class="widget-post__content">
                      <span class="widget-post__date">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}</span>
                      <h4 class="widget-post__title"><a href="{{ route('articles.public_show', $item->slug) }}">{{ $item->name }}</a>
                      </h4>
                    </div><!-- /.widget-post-content -->
                  </div><!-- /.widget-post-item -->
                  @endforeach

                </div><!-- /.widget-content -->
              </div><!-- /.widget-posts -->
              <div class="widget widget-categories">
                <h5 class="widget__title">Categories</h5>
                <div class="widget-content">
                  <ul class="list-unstyled mb-0">
                @foreach ($similarArticle->take(3) as $item)
                    <li><a href="#"><span class="cat-count">{{ $item->category->id }}</span><span>{{ $item->category->name }}</span></a></li>
                    @endforeach
                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-categories -->
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Single -->

    <!-- ========================
      Footer
    ========================== -->
@include('mopani.footer')
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

  </div><!-- /.wrapper -->

  <script src="/mopani/js/jquery-3.5.1.min.js"></script>
  <script src="/mopani/js/plugins.js"></script>
  <script src="/mopani/js/main.js"></script>
</body>

</html>

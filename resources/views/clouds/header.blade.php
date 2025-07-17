    <header class="header header-layout2">

      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container">
          <a class="navbar-brand" href="/">
                                   @foreach ($generalSettings as $item)
            <img src="/settings/logo_dark/{{ $item->image }}" class="logo" alt="logo" width="170px">
                     @endforeach
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
<div class="collapse navbar-collapse" id="mainNavigation">
    <ul class="navbar-nav ml-auto">
        @foreach($menus as $menu)
            <li class="nav__item {{ $menu->children->count() ? 'has-dropdown' : '' }}">
                <a href="{{ $menu->url ?? '#' }}" class="nav__item-link {{ request()->url() == url($menu->url) ? 'active' : '' }}">
                    {{ $menu->title }}
                </a>

                @if($menu->children->count())
                    <button class="dropdown-toggle" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        @foreach($menu->children as $child)
                            <li class="nav__item {{ $child->children->count() ? 'has-dropdown' : '' }}">
                                <a href="{{ $child->url ?? '#' }}" class="nav__item-link">{{ $child->title }}</a>

                                @if($child->children->count())
                                    <ul class="dropdown-menu">
                                        @foreach($child->children as $subchild)
                                            <li class="nav__item">
                                                <a href="{{ $subchild->url ?? '#' }}" class="nav__item-link">{{ $subchild->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <!-- Optional static contact menu -->
        {{-- <li class="nav__item">
            <a href="/contact-us" class="nav__item-link">Contact Us</a>
        </li> --}}
    </ul>
    <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
</div>

          <button type="button" class="action__btn-search ml-20"><i class="fa fa-search"></i></button>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

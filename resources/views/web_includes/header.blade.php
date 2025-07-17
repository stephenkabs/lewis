        <!-- header begin -->
        <header class="transparent scroll-light has-topbar">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="index.html">
                                        <img class="logo-main" src="images/logo.webp" alt="">
                                        <img class="logo-scroll" src="images/logo-black.webp" alt="">
                                        <img class="logo-mobile" src="images/logo.webp" alt="">
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid">
<ul id="mainmenu">
    @foreach($menus as $menu)
        <li>
            <a class="menu-item" href="{{ $menu->url ?? '#' }}">{{ $menu->title }}</a>
            @if($menu->children->count())
                <ul>
                    @foreach($menu->children as $child)
                        <li>
                            <a class="menu-item" href="{{ $child->url ?? '#' }}">{{ $child->title }}</a>
                            @if($child->children->count())
                                <ul>
                                    @foreach($child->children as $subchild)
                                        <li>
                                            <a class="menu-item" href="{{ $subchild->url ?? '#' }}">{{ $subchild->title }}</a>
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
</ul>

                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="contact.html" class="btn-main">Careers Portal</a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <footer class="footer">
            <div class="footer-copyrights"
                style="background-image: linear-gradient(135deg, #130748 50%, #6511c6 100%);">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                            <nav>
                                <ul class="copyright__nav d-flex flex-wrap list-unstyled mb-0">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </nav>
                            @foreach ($displaySettings as $setting)
                                <p class="mb-0">
                                    <span class="color-gray">&copy; 2025 {{ $setting->author }}, All Rights Reserved. By
                                        {{ $setting->name }} </span>

                                </p>
                            @endforeach
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-copyrights-->
        </footer><!-- /.Footer -->

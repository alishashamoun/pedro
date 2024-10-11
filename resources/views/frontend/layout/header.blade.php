<header class="header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container d-block">
            <div class="row align-items-center">
                <div class="col-md-2 col-6">
                    <a class="navbar-brand" href="/"><img width="100px"
                            src="frontend/images/tom-logo-e1724166815700.png"></a>
                </div>

                <div class="col-md-7 mob">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('service') }}">Service</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mob">
                    <ul class="navbar-nav sm-icons">
                        <li><a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li class="phone"><a class="nav-link" href="#"><i class="fa fa-phone"
                                    aria-hidden="true"></i></a></li>
                        <p><span>Call Us</span> <br>901-830-9155</p>
                    </ul>
                </div>
                <div class="col-6 d-md-none">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end bg-secondary secondary-1" id="navbarOffcanvas" tabindex="-1"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a class="navbar-brand" href="/"><img width="100px"
                                    src="frontend/images/tom-logo-e1724166815700.png"></a>
                            <button type="button" class="btn-close btn-close-white text-reset"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('service') }}">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logi{{ route('login') }}">Log In</a>
                                </li>
                                <li class="nav-item"></li>
                                <a class="nav-link" href="{{ route('login') }}">Sign Up</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav sm-icons">
                                <li><a class="nav-link" href="#"><i class="fa fa-search"
                                            aria-hidden="true"></i></a></li>
                                <li class="phone"><a class="nav-link" href="#"><i class="fa fa-phone"
                                            aria-hidden="true"></i></a></li>
                                <p><span>Call Us</span> <br>901-830-9155</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

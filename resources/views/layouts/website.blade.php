<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} - @yield('title', 'Undefibed')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="{{ asset('website') }}/fonts/fontawesome/css/all.min.css">
    <!-- Custome Style File -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
</head>

<body>

    <div class="site-wrap">
        @if (Session::has('success'))
            <div class="success-subscribing">{{ Session::get('success') }}</div>
        @endif
        <nav class="navbar site-navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('website') }}"><span class="text-orange">Mini</span>Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/category', $category->slug) }}">{{ Str::ucfirst($category->name) }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <form action="{{ url('/search') }}" class="d-flex nav-search-form" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>


        @yield('content')


        <!-- NewsLetter -->
        <div class="site-section bg-lightx">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-5">
                        <div class="subscribe-1 ">
                            <h2>Subscribe to our newsletter</h2>
                            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                                error illum a explicabo, ipsam nostrum.</p>
                            <form action="{{ url('/panel/subscribers') }}" method="POST" class="d-flex">
                                @csrf
                                <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                <input type="submit" class="btn btn-primary" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- About Us -->
        <div class="site-footer">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>{{ Str::limit($setting->site_description, 250) }}</p>
                    </div>
                    <div class="col-md-3">
                        <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                        <ul class="list-unstyled float-end ms-5">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Subscribes</a></li>
                        </ul>
                        <ul class="list-unstyled float-end">
                            @foreach ($categories as $category)
                            <li><a href="#">{{ Str::ucfirst($category->name) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 ms-auto">
                        <div>
                            <h3 class="footer-heading mb-4">Connect With Us</h3>
                            <p>
                                <a href="{{ $setting->site_social['facebook'] }}" target="_blank"><span
                                        class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="{{ $setting->site_social['twitter'] }}" target="_blank"><span
                                        class="icon-twitter p-2"></span></a>
                                <a href="{{ $setting->site_social['instagram'] }}" target="_blank"><span
                                        class="icon-instagram p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p>{{ $setting->site_copyright }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('website') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('website') }}/js/bootstrap.bundle.min.js"></script>

</body>

</html>

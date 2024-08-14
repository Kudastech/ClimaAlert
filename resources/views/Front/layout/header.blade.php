<header class="float-start w-100">
    <div class="top-bar">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ url('front/images/logo.png')}}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobile-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="climatechange.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="climatechange.html">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lifestyle.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="news.html">Contact</a>
                        </li>



{{--
                        <li class="nav-item">
                            <a class="nav-link" href="map.html">Map</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="photo.html">Photo</a>
                        </li> --}}


                    </ul>
                    @auth()

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('index') }}">{{ Auth::user()->name }} </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit"> Logout </button>
                        </form>
                    </li>
                @endauth




                </div>

                <div class="right-menu-sec col-lg-1">
                    <ul class="list-unstyled d-flex m-0 align-items-center justify-content-end">


                    @guest


                        <li class="d-none d-md-block ">
                            <a data-bs-toggle="modal" data-bs-target="#loginModal" class="btn login-btn"> Login </a>
                        </li>


                        @endguest


                    </ul>
                </div>
            </div>
        </nav>





    </div>

</header>

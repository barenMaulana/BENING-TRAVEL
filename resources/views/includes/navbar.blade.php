<div class="container placeholder-nav">
    <nav class="row navbar navbar-expand-lg navbar-dark ">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ url('frontend/images/Logo.png') }}" alt="Logo beningTravel">
        </a>
        <button class="navbar-toggler" data-target="#navB" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navB">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link active">
                        HOME
                    </a>
                </li>
                <li class="nav-item mx-md-2">
                <a href="{{ route('package') }}" class="nav-link">
                        PAKET
                    </a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#testimoni" class="nav-link">
                        TESTIMONIAL
                    </a>
                </li>
                @guest
                <!-- MOBILE SCREEN -->
                <form action="" class="form-inline d-sm-block d-md-none">
                    @csrf
                <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href= ' {{ url('login') }}'; ">
                        LOGIN
                    </button>
                </form>
                <!-- DESKTOP SCREEN -->
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block" >
                @csrf
                    <button class="btn btn-login my-2 px-4 btn-navbar-right my-sm-0" type="button" onclick="event.preventDefault(); location.href= ' {{ url('login') }}'; ">
                        LOGIN
                    </button>
                </form>
                @endguest

                {{-- auth --}}
                @auth
                <!-- MOBILE SCREEN -->
                <form action="{{ url('logout') }}" method="POST" class="form-inline d-sm-block d-md-none">
                    @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit" >
                        Logout
                    </button>
                </form>
                <!-- DESKTOP SCREEN -->
                <form action="{{ url('logout') }}" method="POST" class="form-inline my-2 my-lg-0 d-none d-md-block" >
                @csrf
                    <button class="btn btn-login my-2 px-4 btn-navbar-right my-sm-0" type="submit">
                        Logout
                    </button>
                </form>
                @endauth
            </ul>
        </div>
    </nav>
</div>
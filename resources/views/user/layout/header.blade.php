<nav class="navbar navbar-expand-lg navbar-dark bg-primary-green">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ active_class(['/']) }}" aria-current="page" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
                {{-- button login and register --}}
                <button class="btn btn-sm bg-teal"><a class="nav-link" href="{{ route('login') }}">Login</a></button>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                {{-- end button login and register --}}
            </div>
        </div>
    </div>
</nav>

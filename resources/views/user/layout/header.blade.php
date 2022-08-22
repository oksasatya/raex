{{-- if route == '/' --}}
@if (Route::currentRouteName() == 'landing-page')
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent shadow-lg fixed-top ">
    @else
        <nav class="navbar navbar-expand-lg bg-transparent shadow-lg fixed-top ">
@endif
<div class="container-fluid">
    @role('admin')
        <a class="navbar-brand" href="{{ url('/admin') }}">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="">
        </a>
    @else
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="">
        </a>
    @endrole
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            {{-- active class nav-link / or /user --}}
            <a class="nav-link {{ active_class(['/']) }}" aria-current="page" href="{{ url('/') }}">Home</a>
            <a class="nav-link {{ active_class(['products']) }}" href="{{ route('products.index') }}">product</a>
            @if (Auth::check())
                <a href="{{ route('cart.index') }}" class="nav-link {{ active_class(['user/cart']) }}">cart</a>
                <a href="{{ route('order.index') }}"
                    class="nav-link {{ active_class(['user/order']) }}">Transaction</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://via.placeholder.com/30x30') }}"
                            alt="profile">
                    </a>
                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                            <div class="mb-3">
                                <img class="wd-80 ht-80 rounded-circle"
                                    src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
                            </div>
                            <div class="text-center">
                                <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <ul class="list-unstyled p-1">
                            <li class="dropdown-item py-2">
                                <a href="{{ url('/general/profile') }}" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="dropdown-item py-2">
                                <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li class="dropdown-item py-2">
                                <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="repeat"></i>
                                    <span>Switch User</span>
                                </a>
                            </li>
                            {{-- form logout --}}
                            <li class="dropdown-item py-2">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @elseif (Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register')
                <a class="nav-link btn btn-success text-dark btn-sm d-none" href="{{ route('login') }}">Login</a>
                <a class="nav-link d-none" href="{{ route('register') }}">Register</a>
            @else
                <a class="nav-link btn btn-success text-dark btn-sm {{ active_class(['login']) }}"
                    href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>
</div>
</nav>

@push('custom-scripts')
    {{-- scroll nav --}}
    <script src="{{ asset('assets/js/scroll-nav.js') }}"></script>
@endpush

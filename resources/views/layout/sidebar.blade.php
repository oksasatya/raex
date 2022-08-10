<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/admin') }}" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-md" alt="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['admin']) }}">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Admin Menu</li>
            <li class="nav-item {{ active_class(['admin/products/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#product" role="button"
                    aria-expanded="{{ is_active_route(['admin/product/*']) }}" aria-controls="product">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">product</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['admin/products/*']) }}" id="product">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/products/index') }}"
                                class="nav-link {{ active_class(['admin/products/index']) }}">Index</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

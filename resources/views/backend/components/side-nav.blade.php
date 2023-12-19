<div class="app-menu navbar-menu">
    {{-- LOGO --}}
    <div class="navbar-brand-box">
        {{-- Dark Logo --}}
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets') }}/images/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets') }}/images/logo-dark.png" alt="" height="17" />
            </span>
        </a>
        {{-- Light Logo --}}
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets') }}/images/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets') }}/images/logo-light.png" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    {{-- Sidebar --}}
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="t-pages">Pages</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->routeIs('products.*') ? 'active' : ''}}" href="#productPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{request()->routeIs('products.*') ? 'true' : 'false'}}" aria-controls="productPages">
                        <i data-feather="command" class="icon-dual"></i>
                        <span data-key="p-pages">Product</span>
                    </a>
                    <div class="collapse menu-dropdown {{request()->routeIs('products.*') ? 'show' : ''}}" id="productPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link {{request()->routeIs('products.index') ? 'active' : ''}}" data-key="p-pages">
                                    All Product
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.create') }}" class="nav-link {{request()->routeIs('products.create') ? 'active' : ''}}" data-key="p-pages">
                                    Add Product
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->routeIs('sales.index') ? 'active' : ''}}" href="{{ route('sales.index') }}">
                        <i class="ri-shopping-cart-line"></i> <span data-key="t-widgets">Sale Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->routeIs('transactions.index') ? 'active' : ''}}" href="{{ route('transactions.index') }}">
                        <i class="ri-file-list-line"></i> <span data-key="t-widgets">Transactions</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--  -->
    </div>

    <div class="sidebar-background"></div>
</div>

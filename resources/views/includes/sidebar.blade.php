<div id="aside" class="app-aside fade box-shadow-x nav-expand dark " aria-hidden="true">
    <div class="sidenav modal-dialog dk">

        <!-- Sidenav -->
        <div class="navbar lt">
            <!-- Brand -->
            <a href="index.html" class="navbar-brand">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" />
                <span class="hidden-folded d-inline">NVSERVICES POS</span>
            </a>
        </div>

        <!-- Flex nav content -->
        <div class="flex hide-scroll">
            <div class="scroll">
                <div class="nav-border b-primary" data-nav>

                    <ul class="nav bg">

                        <li class="nav-header">
                            <div class="py-3">
                                <a href="#" class="btn btn-sm success theme-accent btn-block">
                                    <span class="hidden-folded d-inline">Welcome, {{ auth()->user()->fullname }}</span>
                                </a>
                            </div>
                            <span class="text-xs hidden-folded">Main</span>
                        </li>

                        <li>
                            <a href="/">
                                <span class="nav-icon"><i class="fa fa-dashboard"></i></span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        @can('isAdmin')
                        <li>
                            <a>
                                <span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                                <span class="nav-icon"><i class="fa fa-users"></i></span>
                                <span class="nav-text">Manage System</span>
                            </a>

                            <ul class="nav-sub">
                                <li><a href="/manage-user"><span class="nav-text">Manage User</span></a></li>
                            </ul>
                        </li>
                        @endcan


                        <li>
                            <a href="{{ route('category') }}">
                                <span class="nav-icon"><i class="fa fa-product-hunt"></i></span>
                                <span class="nav-text">Manage Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">
                                <span class="nav-icon"><i class="fa fa-product-hunt"></i></span>
                                <span class="nav-text">Products</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pos') }}">
                                <span class="nav-icon"><i class="fa fa-shopping-cart"></i></span>
                                <span class="nav-text">Point of Sales</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('sales') }}"> <span class="nav-icon"> <i class="fa fa-money"></i>
                                </span> <span class="nav-text">Sales</span> </a> </li>
                        <li>
                            <a href="{{ route('expenses') }}"> <span class="nav-icon"> <i class="fa fa-money"></i>
                                </span> <span class="nav-text">Expenses</span> </a> </li>

                        <li class="pb-2 hidden-folded"></li>
                    </ul>


                </div>
            </div>
        </div>

        <!-- Sidenav bottom -->
        <div class="no-shrink lt">
            <div class="nav-fold">

                <a class="d-flex p-2-3" data-toggle="dropdown">
                    <i class="fa fa-edit fa-3x"></i>
                </a>

                <div class="dropdown-menu  w pt-0 mt-2 animate fadeIn">
                    <a class="dropdown-item" href="{{ route('changePassword') }}"><span>Change Password</span></a>
                    <a class="dropdown-item" href="#"><span>Settings</span></a>
                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout />

                </div>

                <div class="hidden-folded flex p-2-3 bg">
                    <div class="d-flex p-1 justify-content-end">
                        <livewire:auth.logout />
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

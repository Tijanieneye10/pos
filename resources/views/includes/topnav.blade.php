<div class="content-header white  box-shadow-0" id="content-header">
    <div class="navbar navbar-expand-lg">

        <!-- Button to toggle sidenav on small screen -->
        <a class="d-lg-none mx-2" data-toggle="modal" data-target="#aside">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                <path d="M80 304h352v16H80zM80 248h352v16H80zM80 192h352v16H80z"/>
            </svg>
        </a>

        <!-- Page title -->
        <div class="navbar-text nav-title flex" id="pageTitle">@yield('title')</div>

        <ul class="nav flex-row order-lg-2">

            <!-- User dropdown menu -->
            <li class="dropdown d-flex align-items-center">

                <a href="#" data-toggle="dropdown" class="d-flex align-items-center">
                    <i class="fa fa-arrow-circle-down fa-2x"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right w pt-0 mt-2 animate fadeIn">
                    <a href="{{ route('changePassword') }}" class="dropdown-item">ChangePassword</a>
                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout />

            </li>

            <!-- Navbar toggle button -->
            <li class="d-lg-none d-flex align-items-center">
                <a href="#" class="mx-2" data-toggle="collapse" data-target="#navbarToggler">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                    <path d="M64 144h384v32H64zM64 240h384v32H64zM64 336h384v32H64z"/>
                    </svg>
                </a>
            </li>

        </ul>

        <!-- Navbar collapse -->
        <div class="collapse navbar-collapse no-grow order-lg-1" id="navbarToggler">
            <form class="input-group m-2 my-lg-0">
                <span class="input-group-btn">
                    <button type="button" class="btn no-border no-bg no-shadow"><i class="fa fa-search"></i></button>
                </span>
                <input type="text" class="form-control no-border no-bg no-shadow" placeholder="Search projects...">
            </form>
        </div>

    </div>
</div>

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home.index') }} " target="_blank">
            {{-- <img src="{{ asset('template') }}/assets/img/logo-ct.png" class="navbar-brand-img h-100"
            alt="main_logo"> --}}
            <span class="ms-1 font-weight-bold text-white"> Operasional SPBU 13251510</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white  {{ $currentRoute == 'home.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('home.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <?php if (Auth::user()->roles == 'pengawas') { ?>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengawas
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankreport.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankreport.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tank Today</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankdelivery.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankdelivery.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tank Order Delivery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankreport.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankreport.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Liters</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankdelivery.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankdelivery.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Tank Order Delivery</span>
                </a>
            </li>
            <?php }?>
            <?php if (Auth::user()->roles == 'operator') { ?>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Operator
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'salesreport.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('salesreport.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Sales Today</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'salesreport.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('salesreport.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Sales</span>
                </a>
            </li>
            <?php }?>
            <?php if (Auth::user()->roles == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankreport.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankreport.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Liters</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'salesreport.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('salesreport.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Sales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankdelivery.report' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankdelivery.report') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Tank Order Delivery</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master Data
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tank.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tank.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tank</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tanktype.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tanktype.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tank Type</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'tankgrade.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('tankgrade.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Product Price</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'supplier.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('supplier.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'supply.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('supply.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Supply</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $currentRoute == 'user.index' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('user.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <?php } ?>


            {{-- <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
            </h6>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="#">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li> --}}


        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">

            <a class="btn bg-gradient-primary w-100" href="{{ route('logout') }}" type="button">Log Out</a>
        </div>
    </div>
</aside>

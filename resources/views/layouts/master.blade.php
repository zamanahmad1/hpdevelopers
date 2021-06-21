
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Habib Platinum Developers</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('Dashboard')}}" class="nav-link">Dashboard</a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    {{--<li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>--}}
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('Dashboard')}}" class="brand-link">
            <span class="brand-text font-weight-light mx-5">HP Developers</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @can('Side Menu Employees Link')
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    System Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('permissions.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permissions </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('userroles')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Roles </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('rolepermissions')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles Permissions </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('userpermissions')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Direct Permissions </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-hotel"></i>
                            <p>
                                Company
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('projects.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-laptop-house"></i>
                            <p>
                                Societies
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('societies.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Societies</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('sectors.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sectors</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blocks.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blocks</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('streets.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Streets</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-satellite-dish"></i>
                            <p>
                                Plot Parameters
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plottypes.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Types</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotstatus.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Status</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotcategories.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Categories</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotshapes.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Shapes</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotavailabilities.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Availabilities</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotinhensivefeatures.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Inhensive Features</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotsizes.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Sizes</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-th"></i>
                            <p>
                                Plots
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotinventories.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plots</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotprices.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Prices</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotdimensions.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Dimensions</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('installmentplans.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Installment Plans</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-users"></i>
                            <p>
                                Members Bank
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('memberprofiles.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Member Profiles</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('memberships.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Memberships</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-tags"></i>
                            <p>
                                SAMS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reservationstatus.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reservation Status</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reservations.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reservation</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotprices.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Prices</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plotdimensions.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plot Dimensions</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-user-secret"></i>
                            <p>
                                Dealers Bank
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('dealerships.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dealership</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('dealerrebates.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dealer Rebates</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i style="font-size: 1.5em;" class="nav-icon fas fa-globe"></i>
                            <p>
                                Locations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('countries.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Countries</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('provinces.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Provinces</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('cities.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cities</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

        @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            {{--Anything you want--}}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 <a href="https://hpdevelopers.com.pk" target="_blank">Habib Platinum Developers</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users | Dashboard</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/custom.css') }}">
    @yield('links')

</head>

<body class="hold-user/layout/layoutition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('users.dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

<!-- Language Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
        @if (app()->getLocale() == 'en')
            <img src="{{ asset('assets/imgs/united-states.png') }}" alt="United States Flag"
                width="32" height="auto">
        @elseif (app()->getLocale() == 'es')
            <img src="{{ asset('assets/imgs/flag.png') }}" alt="Spain Flag" width="32"
                height="auto">
        @endif
        <span class="badge bg-success navbar-badge">{{ app()->getLocale() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <span class="dropdown-item dropdown-header">Select Language</span>
        <div class="dropdown-divider"></div>
        <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item my-2 text-wrap ">
            <img src="{{ asset('assets/imgs/united-states.png') }}" alt="United States Flag"
                width="32" height="auto"> English
            @if (app()->getLocale() == 'en')
                <span class="float-right text-muted text-sm"><strong>Selected</strong></span>
            @endif
        </a>
        <a href="{{ route('lang.switch', 'es') }}" class="dropdown-item my-2 text-wrap ">
            <img src="{{ asset('assets/imgs/flag.png') }}" alt="Spain Flag" width="32"
                height="auto"> Spanish
            @if (app()->getLocale() == 'es')
                <span class="float-right text-muted text-sm"><strong>Selected</strong></span>
            @endif
        </a>
    </div>
</li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span
                            class="badge bg-danger navbar-badge">{{ auth()->user()->unreadnotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <span class="dropdown-item dropdown-header">{{ auth()->user()->unreadnotifications->count() }}
                            UnRead Notifications</span>
                        <div class="dropdown-divider"></div>
                        @foreach (auth()->user()->unreadnotifications as $notifications)
                            <a href="{{ route('markasread', $notifications->id) }}"
                                class="dropdown-item my-2 text-wrap ">
                                <i class="fas fa-envelope mr-2"></i> {{ $notifications->data['name'] }}

                                @if (isset($notifications->data['message']))
                                    {{ $notifications->data['message'] }}
                                @endif

                                <span
                                    class="float-right text-muted text-sm">{{ $notifications->created_at->diffForHumans() }}</span>
                            </a>

                            {{-- <hr> --}}
                            {{-- <div class="dropdown-divider "></div> --}}
                        @endforeach
                        <a href="{{ route('allNotification') }}" class="dropdown-item dropdown-footer">See All
                            Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('users.dashboard') }}" class="brand-link">
                <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ __('user/layout/layout.User Dashboard') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('users.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item {{ request()->routeIs('users.dashboard') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('users.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Dashboard
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('users.dashboard') }}"
                                        class="nav-link {{ request()->routeIs('users.dashboard') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- Jobs  -->
                        <li class="nav-item {{ request()->routeIs('joblist.*') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('joblist.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.job_manage') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('joblist.index') }}"
                                        class="nav-link {{ request()->routeIs('joblist.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.Job List') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- invoice  -->
                        <li class="nav-item {{ request()->routeIs('invoices.*') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('invoices.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.invoice_manage') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('invoices.index') }}"
                                        class="nav-link {{ request()->routeIs('invoices.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.invoice_list') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Estimate  -->
                        <li class="nav-item {{ request()->routeIs('estimate.*') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('estimate.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.estimate_manage') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('estimate.index') }}"
                                        class="nav-link {{ request()->routeIs('estimate.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.estimate_list') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Work Order  -->
                        <li class="nav-item {{ request()->routeIs('users.work-orders.index') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('users.work-orders.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.work_order_manage') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.work-orders.index') }}"
                                        class="nav-link {{ request()->routeIs('users.work-orders.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.work_order_list') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Reports  -->
                        <li
                            class="nav-item
             {{ request()->routeIs('users.problem') ? 'menu-open' : '' }}
             {{ request()->routeIs('users.problem.show') ? 'menu-open' : '' }}
             {{ request()->routeIs('users.inspection') ? 'menu-open' : '' }}
             {{ request()->routeIs('users.inspection.show') ? 'menu-open' : '' }}
                 ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle
              {{ request()->routeIs('users.problem') ? 'active' : '' }}
              {{ request()->routeIs('users.problem.show') ? 'active' : '' }}
              {{ request()->routeIs('users.inspection') ? 'active' : '' }}
              {{ request()->routeIs('users.inspection.show') ? 'active' : '' }}
              ">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.reports') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.problem') }}"
                                        class="nav-link {{ request()->routeIs('users.problem') ? 'active' : '' }} {{ request()->routeIs('users.problem.show') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.problem_reports') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.inspection') }}"
                                        class="nav-link {{ request()->routeIs('users.inspection') ? 'active' : '' }}{{ request()->routeIs('users.inspection.show') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.inspection_reports') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle  {{ request()->routeIs('users.profile') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('user/layout/layout.account_setting') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('users.profile') }}"
                                        class="nav-link {{ request()->routeIs('users.profile') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.profile') }}</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('users.change_password') }}"
                                        class="nav-link {{ request()->routeIs('change_password') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('user/layout/layout.change_password') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('estimate_request.index') }}"
                                class="nav-link {{ request()->routeIs('estimate_request.*') ? 'active' : '' }} ">
                                <i class="fas fa-file-invoice nav-icon"></i>
                                <p>{{ __('user/layout/layout.estimate_requests') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supply.index') }}"
                                class="nav-link {{ request()->routeIs('supply.*') ? 'active' : '' }}">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>{{ __('user/layout/layout.supply_requests') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon text-danger"></i>
                                <p>{{ __('user/layout/layout.logout') }}</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-{{ now()->year }} <a href="#">Pedro</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.js') }}"></script>


    <!-- Toastr -->
    <script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <!-- Change password -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript">
    </script>



    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>

    <script>
        $(function() {
            $('#summernote').summernote();
            $('#summernote1').summernote();

            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    {{-- <script type="text/javascript" src="//user/layout/layoutlate.google.com/user/layout/layoutlate_a/element.js?cb=googleUser/layout/layoutlateElementInit">
    </script>


    <script type="text/javascript">
        function googleUser/layout/layoutlateElementInit() {
            new google.user/layout/layoutlate.User/layout/layoutlateElement({
                pageLanguage: 'en'
            }, 'google_user/layout/layoutlate_element');
        }

        function onReady(callback) {
            var intervalID = window.setInterval(checkReady, 1000);

            function checkReady() {
                if (document.getElementsByTagName('body')[0] !== undefined) {
                    window.clearInterval(intervalID);
                    callback.call(this);
                }
            }
        }

        function show(id, value) {
            document.getElementById(id).style.display = value ? 'block' : 'none';
        }

        onReady(function() {
            show('page', true);
            show('loading', false);
        });
    </script> --}}

    @yield('scripts')
</body>

</html>

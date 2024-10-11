<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor | Dashboard</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- jsPDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
        integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('links')
    {{-- <style>
        /* This is a compiled file, to make changes persist, consider editing under the templates directory */
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;

            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;

            position: fixed;
            top: 0;
            left: 0;
            width: 100%;

            -webkit-transform: translate3d(0, -50px, 0);
            -ms-transform: translate3d(0, -50px, 0);
            transform: translate3d(0, -50px, 0);

            -webkit-transition: -webkit-transform .5s ease-out;
            -ms-transition: -webkit-transform .5s ease-out;
            transition: transform .5s ease-out;
        }

        .pace.pace-active {
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .pace .pace-progress {
            display: block;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 10px;
            background: #000000;

            pointer-events: none;
        }
    </style> --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
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
                        <span class="badge badge-success navbar-badge">{{ app()->getLocale() }}</span>
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
                            class="badge badge-danger navbar-badge">{{ auth()->user()->unreadnotifications->count() }}</span>
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
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ __('vendor/layout/layout.vendor_dashboard') }}</span>
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
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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


                        <li class="nav-item {{ request()->routeIs('vendor.dashboard') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{ __('vendor/layout/layout.dashboard') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('vendor.dashboard') }}"
                                        class="nav-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.dashboard') }}</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li
                            class="nav-item
           {{ request()->routeIs('checklists.create') ? 'menu-open' : '' }}
           {{ request()->routeIs('location.index') ? 'menu-open' : '' }}
           {{ request()->routeIs('responce.*') ? 'menu-open' : '' }}
                   ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle
           {{ request()->routeIs('checklists.create') ? 'active' : '' }}
           {{ request()->routeIs('location.index') ? 'active' : '' }}
           {{ request()->routeIs('responce.*') ? 'active' : '' }}
                   ">
                                <i class="nav-icon fas fa-search text-warning"></i>
                                <p>
                                    {{ __('vendor/layout/layout.inspection') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('checklists.create') }}"
                                        class="nav-link {{ request()->routeIs('checklists.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.inspection_list') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('location.index') }}"
                                        class="nav-link {{ request()->routeIs('location.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.location') }}</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('responce.index') }}"
                                        class="nav-link {{ request()->routeIs('responce.*') ? 'active' : '' }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.responce') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_work_orders.index') }}"
                                class="nav-link {{ request()->routeIs('manage_work_orders.index') ? 'active' : '' }} {{ request()->routeIs('manage_work_orders.show') ? 'active' : '' }} ">
                                <i class="fas fa-file-invoice nav-icon text-info"></i>
                                <p>{{ __('vendor/layout/layout.vendor_work_order') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vendor_estimate_requests.index') }}"
                                class="nav-link {{ request()->routeIs('vendor_estimate_requests.*') ? 'active' : '' }} ">
                                <i class="far fa-calendar-alt nav-icon text-warning"></i>
                                <p>{{ __('vendor/layout/layout.estimate_request') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supply.index') }}"
                                class="nav-link {{ request()->routeIs('supply.*') ? 'active' : '' }} ">
                                <i class="fas fa-truck nav-icon text-danger"></i>
                                <p>{{ __('vendor/layout/layout.supply_request') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schedule.index') }}"
                                class="nav-link {{ request()->routeIs('schedule.*') ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt nav-icon "></i>
                                <p>{{ __('vendor/layout/layout.schedule_job') }}</p>
                            </a>
                        </li>
                        <!--Start Accounting Modules -->
                        <li
                            class="nav-item
                            {{ request()->routeIs('invoice.*') ? 'menu-open' : '' }}
                            ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle
                                {{ request()->routeIs('invoice.*') ? 'active' : '' }}
                                ">
                                <i class="nav-icon fas fa-money-bill text-success"></i>
                                <p>
                                    {{ __('vendor/layout/layout.accounting') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('invoice.index') }}"
                                        class="nav-link {{ request()->routeIs('invoice.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.invoice_dashboard') }}</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!--Start Profile Modules -->
                        <li
                            class="nav-item
                            {{ request()->routeIs('pages.index') ? 'menu-open' : '' }}
                            {{ request()->routeIs('company_profile.*') ? 'menu-open' : '' }}
                            {{ request()->routeIs('sections.index') ? 'menu-open' : '' }}
                            ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle
                                {{ request()->routeIs('company_profile.*') ? 'active' : '' }}
                                ">
                                <i class="nav-icon fas fa-user text-primary"></i>
                                <p>
                                    {{ __('vendor/layout/layout.profile') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('company_profile.index') }}"
                                        class="nav-link {{ request()->routeIs('company_profile.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.company_profile') }}</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <!--Start Problem Modules -->
                        <li
                            class="nav-item
                            {{ request()->routeIs('userproblem.index') ? 'menu-open' : '' }}
                            {{ request()->routeIs('userproblem.edit') ? 'menu-open' : '' }}
                            {{ request()->routeIs('userproblem.show') ? 'menu-open' : '' }}

                            ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle
                                {{ request()->routeIs('userproblem.index') ? 'active' : '' }}
                                {{ request()->routeIs('userproblem.edit') ? 'active' : '' }}
                                {{ request()->routeIs('userproblem.show') ? 'active' : '' }}

                                ">
                                <i class="nav-icon fas fa-exclamation-triangle text-warning"></i>
                                <p>
                                    {{ __('vendor/layout/layout.problem_reporting') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('userproblem.index') }}"
                                        class="nav-link {{ request()->routeIs('userproblem.index') || request()->routeIs('userproblem.edit') || request()->routeIs('userproblem.show') ? 'active' : '' }}
                                        ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('vendor/layout/layout.report') }}</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>{{ __('vendor/layout/layout.logout') }}</p>
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

    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
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

    <!-- geo Location -->


    <!-- Toastr -->
    <script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $('.complete-btn').click(function() {
            var workOrderId = $(this).data('workorder-id');
            updateWorkOrderStatus(workOrderId, 1);
        });

        $('.incomplete-btn').click(function() {
            var workOrderId = $(this).data('workorder-id');
            updateWorkOrderStatus(workOrderId, 0);
        });

        function updateWorkOrderStatus(workOrderId, status) {

            $.ajax({
                url: "{{ route('execute_work_order') }}",
                method: 'GET',

                data: {
                    work_order_id: workOrderId,
                    status: status
                },
                success: function(response) {
                    location.reload();
                },
                error: function(error) {
                    // Handle error response, e.g., display error message
                }
            });
        }




        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <!-- Change password -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript">
    </script> --}}



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
    <!-- pace-progress -->
    {{-- <script src="{{asset('admin/plugins/pace-progress/pace.min.js')}}"></script> --}}

    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
            // $('#summernote').summernote();
            // $('#summernote1').summernote();

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.getElementById('download-pdf').addEventListener('click', function() {
                const pdf = new jsPDF();
                const pdfContent = document.getElementById('pdf-content');

                html2canvas(pdfContent).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    const imgWidth = 210; // A4 width in mm
                    const pageHeight = 295; // A4 height in mm
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    const heightLeft = imgHeight;

                    pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
                    pdf.save('download.pdf');
                });
            });
        </script>
    @yield('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin/assets/') }}" data-template="vertical-menu-template-free">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" /> --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>

    {{-- DataTable --}}
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/custom.css') }}">
    {{-- custom js --}}
    <script src="{{ asset('js/style.js') }}"></script>

    @yield('links')






</head>

<body class="">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Main Sidebar Container -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <!-- Brand Logo -->
                {{-- <div class="app-brand demo">
                    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <!-- Insert your SVG or image logo here -->
                            <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="Admin Logo" width="30">
                        </span>
                        <span
                            class="app-brand-text demo menu-text fw-bolder ms-2">{{ __('admin/layout/app.dashboard') }}</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <!-- User Panel -->
                <div class="menu-inner-shadow"></div>

                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('/admin/dist/img/user2-160x160.jpg') }}"
                            class="w-px-40 h-auto rounded-circle" alt="User Image">
                    </div>
                    <div class="info ms-3">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div> --}}

                <!-- Sidebar Search Form -->
                {{-- <div class="search-bar mt-2 mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ __('admin/layout/app.search') }}..."
                            aria-label="{{ __('admin/layout/app.search') }}">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <x-menu-item route="admin.dashboard" icon="bx bx-home-circle" label="admin/layout/app.dashboard"
                        :activeRoutes="['admin.dashboard']" />

                    <!-- My Workroom -->
                    <x-menu-item label="admin/layout/app.my_workroom" icon="bx bx-dock-top" :activeRoutes="[
                        'customer.*',
                        'estimates.*',
                        'work_orders.*',
                        'purchase-orders.*',
                        'inventory.*',
                        'technicians.*',
                    ]"
                        :submenu="[
                            [
                                'route' => 'customer.index',
                                'icon' => 'bx bx-user',
                                'label' => 'admin/layout/app.customer',
                                'activeRoutes' => ['customer.*'],
                            ],
                            [
                                'route' => 'technicians.index',
                                'icon' => 'bx bx-hard-hat',
                                'label' => 'admin/layout/app.manage_technicians',
                                'activeRoutes' => ['technicians.*'],
                            ],
                            [
                                'route' => 'estimates.index',
                                'icon' => 'bx bx-clipboard',
                                'label' => 'admin/layout/app.estimates',
                                'activeRoutes' => ['estimates.*'],
                            ],
                            [
                                'route' => 'work_orders.index',
                                'icon' => 'bx bx-task',
                                'label' => 'admin/layout/app.work_orders',
                                'activeRoutes' => ['work_orders.*'],
                            ],
                            [
                                'route' => 'purchase-orders.index',
                                'icon' => 'bx bx-cart',
                                'label' => 'admin/layout/app.purchase_orders',
                                'activeRoutes' => ['purchase-orders.*'],
                            ],
                            [
                                'route' => 'inventory.index',
                                'icon' => 'bx bx-box',
                                'label' => 'admin/layout/app.inventory',
                                'activeRoutes' => ['inventory.*'],
                            ],
                        ]" />

                    <!-- Jobs -->
                    <x-menu-item label="admin/layout/app.jobs" icon="bx bx-lock-open-alt" :activeRoutes="[
                        'job.*',
                        'today.job.schedule',
                        'today.job.next.48.hours',
                        'job.needing.scheduling',
                        'jobs.in.progress',
                        'jobs.complete',
                        'jobperregion.index',
                        'jobpermanager.index',
                        'readyinvoice.*',
                        'location.index',
                    ]"
                        :submenu="[
                            [
                                'route' => 'job.index',
                                'icon' => 'bx bx-briefcase',
                                'label' => 'admin/layout/app.job_list',
                                'activeRoutes' => ['job.*'],
                            ],
                            [
                                'route' => 'location.index',
                                'icon' => 'bx bx-map',
                                'label' => 'admin/layout/app.assign_checklist',
                                'activeRoutes' => ['location.index'],
                            ],
                            [
                                'route' => 'today.job.schedule',
                                'icon' => 'bx bx-calendar',
                                'label' => 'admin/layout/app.today_schedule',
                                'activeRoutes' => ['today.job.schedule'],
                            ],
                            [
                                'route' => 'today.job.next.48.hours',
                                'icon' => 'bx bx-time',
                                'label' => 'admin/layout/app.within_48_hours',
                                'activeRoutes' => ['today.job.next.48.hours'],
                            ],
                            [
                                'route' => 'job.needing.scheduling',
                                'icon' => 'bx bx-calendar-minus',
                                'label' => 'admin/layout/app.unscheduled',
                                'activeRoutes' => ['job.needing.scheduling'],
                            ],
                            [
                                'route' => 'jobs.in.progress',
                                'icon' => 'bx bx-loader-circle',
                                'label' => 'admin/layout/app.in_progress',
                                'activeRoutes' => ['jobs.in.progress'],
                            ],
                            [
                                'route' => 'jobs.complete',
                                'icon' => 'bx bx-check-circle',
                                'label' => 'admin/layout/app.completed',
                                'activeRoutes' => ['jobs.complete'],
                            ],
                            [
                                'route' => 'readyinvoice.index',
                                'icon' => 'bx bx-file',
                                'label' => 'admin/layout/app.ready_to_be_invoiced',
                                'activeRoutes' => ['readyinvoice.*'],
                            ],
                            [
                                'route' => 'jobpermanager.index',
                                'icon' => 'bx bx-user-pin',
                                'label' => 'admin/layout/app.jobs_per_account_manager',
                                'activeRoutes' => ['jobpermanager.index'],
                            ],
                            [
                                'route' => 'jobperregion.index',
                                'icon' => 'bx bx-map-pin',
                                'label' => 'admin/layout/app.jobs_per_region',
                                'activeRoutes' => ['jobperregion.index'],
                            ],
                        ]" />

                    <!-- Operations -->
                    <x-menu-item label="admin/layout/app.operations" icon="bx bx-cube-alt" :activeRoutes="[
                        'task.index',
                        'problem.*',
                        'finalized',
                        'location',
                        'adminresponse',
                        'checklists.create',
                        'moodreport.index',
                        'managers.index',
                    ]"
                        :submenu="[
                            // Inspections Submenu
                            [
                                'label' => 'admin/layout/app.inspections',
                                'submenu' => [
                                    [
                                        'route' => '#',
                                        'icon' => 'bx bx-user',
                                        'label' => 'admin/layout/app.account_managers',
                                        'activeRoutes' => [],
                                    ],
                                    [
                                        'route' => '#',
                                        'icon' => 'bx bx-map',
                                        'label' => 'admin/layout/app.location',
                                        'activeRoutes' => [],
                                    ],
                                    [
                                        'route' => 'checklists.create',
                                        'icon' => 'bx bx-edit',
                                        'label' => 'admin/layout/app.inspection_sheet',
                                        'activeRoutes' => ['checklists.create'],
                                    ],
                                ],
                            ],
                            // Checklist Submenu
                            [
                                'label' => 'admin/layout/app.checklist',
                                'submenu' => [
                                    [
                                        'route' => 'checklist.index',
                                        'icon' => 'bx bx-list-ul',
                                        'label' => 'admin/layout/app.overall_checklist',
                                        'activeRoutes' => [],
                                    ],
                                    [
                                        'route' => 'finalized',
                                        'icon' => 'bx bx-check-circle',
                                        'label' => 'admin/layout/app.finalized',
                                        'activeRoutes' => ['finalized'],
                                    ],
                                    [
                                        'route' => 'location',
                                        'icon' => 'bx bx-map-pin',
                                        'label' => 'admin/layout/app.location',
                                        'activeRoutes' => ['location', 'adminresponse'],
                                    ],
                                    [
                                        'route' => 'managers.index',
                                        'icon' => 'bx bx-user-pin',
                                        'label' => 'admin/layout/app.account_managers',
                                        'activeRoutes' => ['managers.index'],
                                    ],
                                    [
                                        'route' => '#',
                                        'icon' => 'bx bx-user',
                                        'label' => 'admin/layout/app.field_employees',
                                        'activeRoutes' => [],
                                    ],
                                ],
                            ],
                            // Problem Reporting
                            [
                                'route' => 'problem.index',
                                'icon' => 'bx bx-exclamation-octagon',
                                'label' => 'admin/layout/app.problem_reporting',
                                'activeRoutes' => ['problem.*'],
                            ],
                            // Tasks
                            [
                                'route' => 'task.index',
                                'icon' => 'bx bx-task',
                                'label' => 'admin/layout/app.tasks',
                                'activeRoutes' => ['task.index'],
                            ],
                            // Messages
                            [
                                'route' => '#',
                                'icon' => 'bx bx-message',
                                'label' => 'admin/layout/app.messages',
                                'activeRoutes' => [],
                            ],
                            // Mood Reporting
                            [
                                'route' => 'moodreport.index',
                                'icon' => 'bx bx-smile',
                                'label' => 'admin/layout/app.mood_reporting',
                                'activeRoutes' => ['moodreport.index'],
                            ],
                            // Employee Vendor Performance
                            [
                                'route' => '#',
                                'icon' => 'bx bx-trending-up',
                                'label' => 'admin/layout/app.emp_vendor_performance',
                                'activeRoutes' => [],
                            ],
                        ]" />

                    <!-- Accounting -->
                    <x-menu-item label="admin/layout/app.accounting" icon="bx bx-copy" :activeRoutes="['pages.index', 'invoice.*', 'sections.index']"
                        :submenu="[
                            [
                                'route' => 'invoice.index',
                                'icon' => 'bx bx-receipt',
                                'label' => 'admin/layout/app.invoice_dashboard',
                                'activeRoutes' => ['invoice.*'],
                            ],
                            // Add more Accounting submenu items here if needed
                        ]" />

                    <!-- Users Management -->
                    <x-menu-item label="admin/layout/app.users" icon="bx bx-user" :activeRoutes="['roles.index', 'users.index', 'users.create', 'permission.index', 'permission.create']"
                        :submenu="[
                            // Manage Users
                            [
                                'label' => 'admin/layout/app.manage_users',
                                'submenu' => [
                                    [
                                        'route' => 'users.index',
                                        'icon' => 'bx bx-user-circle',
                                        'label' => 'admin/layout/app.list_users',
                                        'activeRoutes' => ['users.index'],
                                    ],
                                    [
                                        'route' => 'users.create',
                                        'icon' => 'bx bx-user-plus',
                                        'label' => 'admin/layout/app.add_user',
                                        'activeRoutes' => ['users.create'],
                                    ],
                                ],
                            ],
                            // Manage Permissions (Commented Out)
                            // [
                            //     'label' => 'admin/layout/app.manage_permissions',
                            //     'submenu' => [
                            //         [
                            //             'route' => 'permission.index',
                            //             'icon' => 'bx bx-lock',
                            //             'label' => 'admin/layout/app.list_permissions',
                            //             'activeRoutes' => ['permission.index']
                            //         ],
                            //         [
                            //             'route' => 'permission.create',
                            //             'icon' => 'bx bx-lock-open',
                            //             'label' => 'admin/layout/app.add_permission',
                            //             'activeRoutes' => ['permission.create']
                            //         ],
                            //     ]
                            // ],
                            // Additional Users Submenu Items
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user',
                                'label' => 'admin/layout/app.clients',
                                'activeRoutes' => [],
                            ],
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user-check',
                                'label' => 'admin/layout/app.vendors',
                                'activeRoutes' => [],
                            ],
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user-voice',
                                'label' => 'admin/layout/app.field_employees',
                                'activeRoutes' => [],
                            ],
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user-pin',
                                'label' => 'admin/layout/app.account_managers',
                                'activeRoutes' => [],
                            ],
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user-circle',
                                'label' => 'admin/layout/app.office_administrators',
                                'activeRoutes' => [],
                            ],
                            [
                                'route' => '#',
                                'icon' => 'bx bx-user',
                                'label' => 'admin/layout/app.owner',
                                'activeRoutes' => [],
                            ],
                        ]" />

                    <!-- Job Settings -->
                    <x-menu-item label="admin/layout/app.job_settings" icon="bx bx-copy" :activeRoutes="['job-category.*', 'job-sub-category.*', 'job-priority.*', 'job-source.*']"
                        :submenu="[
                            [
                                'route' => 'job-category.index',
                                'icon' => 'bx bx-category',
                                'label' => 'admin/layout/app.job_category',
                                'activeRoutes' => ['job-category.*'],
                            ],
                            [
                                'route' => 'job-sub-category.index',
                                'icon' => 'bx bx-category-alt',
                                'label' => 'admin/layout/app.job_sub_category',
                                'activeRoutes' => ['job-sub-category.*'],
                            ],
                            [
                                'route' => 'job-priority.index',
                                'icon' => 'bx bx-sort-alpha-down',
                                'label' => 'admin/layout/app.job_priority',
                                'activeRoutes' => ['job-priority.*'],
                            ],
                            // [
                            //     'route' => 'job-source.index',
                            //     'icon' => 'bx bx-source',
                            //     'label' => 'admin/layout/app.job_source',
                            //     'activeRoutes' => ['job-source.*']
                            // ],
                        ]" />

                    <!-- Account Settings -->
                    <x-menu-item label="admin/layout/app.account_setting" icon="bx bx-user" :activeRoutes="['profile.index', 'change_password']"
                        :submenu="[
                            [
                                'route' => 'profile.index',
                                'icon' => 'bx bx-id-card',
                                'label' => 'admin/layout/app.profile',
                                'activeRoutes' => ['profile.index'],
                            ],
                            [
                                'route' => 'change_password',
                                'icon' => 'bx bx-lock-alt',
                                'label' => 'admin/layout/app.change_password',
                                'activeRoutes' => ['change_password'],
                            ],
                        ]" />

                    <!-- Attendance -->
                    <x-menu-item label="admin/layout/app.attendance" icon="bx bx-calendar" :activeRoutes="['*.attendance']"
                        :submenu="[
                            [
                                'route' => 'manager.attendance',
                                'icon' => 'bx bx-user-check',
                                'label' => 'admin/layout/app.manager_attendance',
                                'activeRoutes' => ['manager.attendance'],
                            ],
                            [
                                'route' => 'vendors.attendance',
                                'icon' => 'bx bx-user-plus',
                                'label' => 'admin/layout/app.vendors_attendance',
                                'activeRoutes' => ['vendors.attendance'],
                            ],
                        ]" />

                    <!-- Profile Modules -->
                    <x-menu-item label="admin/layout/app.profile" icon="bx bx-support" :activeRoutes="['services.*', 'areas.*']"
                        :submenu="[
                            [
                                'route' => 'services.index',
                                'icon' => 'bx bx-conversation',
                                'label' => 'admin/layout/app.services',
                                'activeRoutes' => ['services.*'],
                            ],
                            [
                                'route' => 'areas.index',
                                'icon' => 'bx bx-map',
                                'label' => 'admin/layout/app.area',
                                'activeRoutes' => ['areas.*'],
                            ],
                        ]" />

                    <!-- Estimate Requests -->
                    <x-menu-item route="estimate_requests.index" icon="bx bx-calendar-event text-warning"
                        label="admin/layout/app.estimate_request" :activeRoutes="['estimate_requests.*']" />

                    <!-- Supply Requests -->
                    <x-menu-item route="supply.index" icon="bx bx-donate-heart text-success"
                        label="admin/layout/app.supply_request" :activeRoutes="['supply.*']" />

                    <!-- Logout -->
                    <li class="menu-item">
                        <a href="{{ route('logout') }}" class="menu-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="menu-icon tf-icons bx bx-log-out text-danger"></i>
                            <div data-i18n="Logout">{{ __('admin/layout/app.logout') }}</div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </aside>


            <div class="layout-page">

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <!-- Left Section: Menu Toggle, Home, Contact -->
                    <div class="navbar-nav-left d-flex align-items-center">
                        <!-- Menu Toggle -->
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Right Section: Search, GitHub, Language, Notifications, Fullscreen, User -->
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">


                            <!-- Language Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (app()->getLocale() == 'en')
                                        <img src="{{ asset('assets/imgs/united-states.png') }}"
                                            alt="United States Flag" width="32" height="auto">
                                    @elseif (app()->getLocale() == 'es')
                                        <img src="{{ asset('assets/imgs/flag.png') }}" alt="Spain Flag"
                                            width="32" height="auto">
                                    @endif
                                    <span
                                        class="badge badge-success navbar-badge">{{ strtoupper(app()->getLocale()) }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <h6 class="dropdown-header">Select Language</h6>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ route('lang.switch', 'en') }}"
                                            class="dropdown-item d-flex align-items-center">
                                            <img src="{{ asset('assets/imgs/united-states.png') }}"
                                                alt="United States Flag" width="24" height="auto"
                                                class="me-2">
                                            English
                                            @if (app()->getLocale() == 'en')
                                                <span
                                                    class="ms-auto text-muted text-sm"><strong>Selected</strong></span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lang.switch', 'es') }}"
                                            class="dropdown-item d-flex align-items-center">
                                            <img src="{{ asset('assets/imgs/flag.png') }}" alt="Spain Flag"
                                                width="24" height="auto" class="me-2">
                                            Spanish
                                            @if (app()->getLocale() == 'es')
                                                <span
                                                    class="ms-auto text-muted text-sm"><strong>Selected</strong></span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Notifications Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="far fa-bell"></i>
                                    <span
                                        class="badge badge-danger navbar-badge">{{ auth()->user()->unreadnotifications->count() }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <span
                                            class="dropdown-header">{{ auth()->user()->unreadnotifications->count() }}
                                            Unread Notifications</span>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @foreach (auth()->user()->unreadnotifications as $notification)
                                        <li>
                                            <a href="{{ route('markasread', $notification->id) }}"
                                                class="dropdown-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-envelope me-2"></i>
                                                    {{ $notification->data['name'] }}
                                                    @if (isset($notification->data['message']))
                                                        <div>
                                                            {{ $notification->data['message'] }}
                                                            @if (strpos($notification->data['message'], 'response') !== false)
                                                                <a href="{{ route('location') }}"
                                                                    class="btn btn-success btn-sm mt-1">View
                                                                    Response</a>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                                <small
                                                    class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('allNotification') }}"
                                            class="dropdown-item dropdown-footer">See
                                            All Notifications</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Fullscreen Toggle -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="fullscreen">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </li>

                            <!-- User Dropdown -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                    <small
                                                        class="text-muted">{{ auth()->user()->getRoleNames()[0] ?? 'User' }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="bx bx-credit-card me-2"></i>
                                            <span class="align-middle">Billing</span>
                                            @if (auth()->user()->unreadBillingNotifications())
                                                <span class="badge bg-danger rounded-pill ms-auto">4</span>
                                            @endif
                                        </a>
                                    </li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                @yield('content')
            </div>
        </div>

        <!-- /.content-wrapper -->
        {{-- <footer class="content-footer footer bg-footer-theme">
            <strong>Copyright &copy; 2023-{{ now()->year }} <a href="#">Pedro</a>.</strong>
            All rights reserved.
        </footer> --}}
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Toastr -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        // toastr.info("{{ auth()->user()->id }}");

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
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
    <script type="text/javascript">
        $('.validatedForm').validate({
            rules: {
                password: {
                    minlength: 8
                },
                password_confirmation: {
                    minlength: 8,
                    equalTo: "#password"
                }
            }
        });
    </script>



    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>



    <script>
        $(function() {
            $('#summernote').summernote();
            $('#summernote1').summernote();

            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "rowReorder": true,
                "buttons": ["csv", "excel", "pdf", "print"]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        // toastr.success('dasd');
        // channel.bind('status.liked', function(data) {
        //     if (data) {
        //         const eventData = JSON.stringify(data);
        //         const message = eventData.message;
        //         alert(JSON.stringify(data));
        //         toastr.success(JSON.stringify(data.message));
        //         console.log(eventData);
        //     } else {
        //         console.log('some');
        //     }
        // });
    </script>
    <script>
        $(document).ready(function() {
            $('#showDescription').change(function() {
                if ($(this).is(':checked')) {
                    $('#descriptionContainer').fadeIn('slow');
                } else {
                    $('#descriptionContainer').fadeOut('slow');
                }
            });
            $('#showBill').change(function() {
                if ($(this).is(':checked')) {
                    $('#BillContainer').fadeIn('slow');
                } else {
                    $('#BillContainer').fadeOut('slow');
                }
            });
        });
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    @yield('scripts')

</body>

</html>

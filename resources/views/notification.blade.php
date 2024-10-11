@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : (Auth::user()->hasRole('User') ? 'users.layouts.app' : 'default.app'))))
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

        body {
            font-family: "Roboto", sans-serif;
            background: #EFF1F3;
            min-height: 100vh;
            position: relative;
        }

        .section-50 {
            padding: 50px 0;
        }

        .m-b-50 {
            margin-bottom: 50px;
        }

        .dark-link {
            color: #333;
        }

        .heading-line {
            position: relative;
            padding-bottom: 5px;
        }

        .heading-line:after {
            content: "";
            height: 4px;
            width: 75px;
            background-color: #29B6F6;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .notification-ui_dd-content {
            margin-bottom: 30px;
        }

        .notification-list {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 20px;
            margin-bottom: 7px;
            background: #fff;
            -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .notification-list--unread {
            border-left: 2px solid #29B6F6;
        }

        .notification-list .notification-list_content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .notification-list .notification-list_content .notification-list_img img {
            height: 48px;
            width: 48px;
            border-radius: 50px;
            margin-right: 20px;
        }

        .notification-list .notification-list_content .notification-list_detail p {
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .notification-list .notification-list_feature-img img {
            height: 48px;
            width: 48px;
            border-radius: 5px;
            margin-left: 20px;
        }
    </style>
    <div class="content-wrapper">
        <section class="section-50">
            <div class="container">
                <h3 class="m-b-50 heading-line">{{ auth()->user()->notifications->count() }} Notifications <i
                        class="fa fa-bell text-muted"></i></h3>
                <h5 class="">Un-Read </h5>

                <div class="notification-ui_dd-content">
                    @foreach (auth()->user()->unreadnotifications as $notifications)
                        <div class="notification-list notification-list--unread">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>{{ $notifications->data['name'] }}</b>
                                        @if (isset($notifications->data['message']))
                                            {{ $notifications->data['message'] }}
                                        @endif
                                    </p>
                                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p> --}}
                                    <p class="text-muted"><small>{{ $notifications->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <a href="{{ route('markasread', $notifications->id) }}">

                                    <i class="fas fa-check-circle"></i> Mark As Read
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <h5 class="mt-5">Read </h5>
                    @foreach (auth()->user()->readnotifications as $notifications)
                        <div class="notification-list">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>{{ $notifications->data['name'] }}</b>
                                        @if (isset($notifications->data['message']))
                                            {{ $notifications->data['message'] }}
                                        @endif
                                    </p>
                                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p> --}}
                                    <p class="text-muted"><small>{{ $notifications->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach


                    {{-- <div class="text-center">
                    <a href="#!" class="dark-link">Load more activity</a>
                </div> --}}

                </div>
        </section>
    </div>
@endsection

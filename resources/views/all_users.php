<!DOCTYPE html>
<html lang="en">

<head>
    <title>Number 3 | Admin Dashboard</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ url('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{url('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class=""></i>
                </div>
                <span class="b-title">Number 3</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                    <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">USER Activities</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="#" class="">Active Login</a></li>
                        <li class=""><a href="#" class="">Inactive Users</a></li>
                        <li class=""><a href="all_users.php" class="">All Users</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index.html" class="b-brand">
            <div class="b-bg">
                <i class=""></i>
            </div>
            <span class="b-title">NUMBER 3</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <li class="nav-item dropdown">

            </li>
            <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                        <a href="javascript:" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!--[ daily sales section ] start-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card daily-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Rgistered Users</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-users text-c-green f-30 m-r-10"></i>{{ $page_data['clientsCount']??0 }}</h3>
                                            </div>


                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ daily sales section ] end-->
                            <!--[ Monthly  sales section ] starts-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card Monthly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Recent Logins</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-users text-c-red f-30 m-r-10"></i>{{ $page_data['recentLoginsCount']??0 }}</h3>
                                            </div>

                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 18%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ Monthly  sales section ] end-->
                            <!--[ year  sales section ] starts-->
                            <div class="col-md-12 col-xl-4">
                                <div class="card yearly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Inactive Logins</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-users text-c-green f-30 m-r-10"></i>{{ $page_data['inactiveUsersCount']??0 }}</h3>
                                            </div>

                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 13%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[ year  sales section ] end-->
                            <!--[ Recent Users ] start-->
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Inactive Users</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                @if($page_data['inactiveUsersCount'])
                                                    @foreach($page_data['inactiveUsers'] as $inactiveUsers)
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">{{ $inactiveUsers->last_name.' '.$inactiveUsers->first_name.' '.$inactiveUsers->middle_name }}</h6>
                                                                <p class="m-0">Inactive user</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>{{$inactiveUsers->last_login_date}}</h6>
                                                            </td>
                                                            <td><a href="javascript:" aria-number="{{ $inactiveUsers->phone_number }}" class="label sendSms theme-bg2 text-white f-12">Send message</a><a href="mailto:{{ $inactiveUsers->email }}" class="label theme-bg text-white f-12">Send Email</a><a href="tel:{{ $inactiveUsers->phone_number }}" class="label theme-bg3 text-white f-12">Call Phone</a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="unread">
                                                        <td>
                                                            <p class="m-0">No inactive users available</p>
                                                        </td>
                                                    </tr>
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ Recent Users ] end-->
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Active Users</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                @if($page_data['activeUsersCount'])
                                                    @foreach($page_data['activeUsers'] as $activeUsers)
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">{{ $activeUsers->last_name.' '.$activeUsers->first_name.' '.$activeUsers->middle_name }}</h6>
                                                                <p class="m-0">Active user</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>{{$activeUsers->last_login_date}}</h6>
                                                            </td>
                                                            <td><a href="javascript:" aria-number="{{ $activeUsers->phone_number }}" class="label sendSms theme-bg2 text-white f-12">Send message</a><a href="mailto:{{ $inactiveUsers->email }}" class="label theme-bg text-white f-12">Send Email</a><a href="tel:{{ $inactiveUsers->phone_number }}" class="label theme-bg3 text-white f-12">Call Phone</a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="unread">
                                                        <td>
                                                            <p class="m-0">No Active users available</p>
                                                        </td>
                                                    </tr>
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- [ statistics year chart ] start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-event">
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col">
                                                <h5 class="m-0">OVERVIEW</h5>
                                            </div>

                                        </div>
                                        <h2 class="mt-3 f-w-300">{{ $page_data['clientsCount'] }}<sub class="text-muted f-14">Total Users</sub></h2>

                                        <i class="feather icon-users text-c-purple f-50"></i>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block border-bottom">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-auto">
                                                <i class="feather icon-users f-30 text-c-green"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="f-w-300">{{ $page_data['clientsCount']-$page_data['inactiveUsersCount'] }}</h3>
                                                <span class="d-block text-uppercase">Active Members</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-auto">
                                                <i class="feather icon-users f-30 text-c-blue"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="f-w-300">{{ $page_data['inactiveUsersCount'] }}</h3>
                                                <span class="d-block text-uppercase">Inactive Members</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ statistics year chart ] end -->
                            <!--[social-media section] start-->



                            <!--[social-media section] end-->
                            <!-- [ rating list ] starts-->
                            <!-- [ rating list ] end-->
                            <!-- <div class="col-xl-8 col-md-12 m-b-30">
                              <div class="card-header">
                                  <h5>OVERVIEW</h5>
                              </div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">This Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">All</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Activity</th>
                                                    <th>Time / Date</th>
                                                    <th>Status</th>
                                                    <th class="text-right"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">3:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">Albert Andersen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Jumps over the lazy</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">2:37 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-red">Missed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-3.jpg" alt="activity-user">Silje Larsen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Dog the quick brown</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">10:23 AM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-purple">Delayed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">4:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Activity</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th class="text-right"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">Albert Andersen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Jumps over the lazy</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">2:37 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-red">Missed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">3:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">4:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-3.jpg" alt="activity-user">Silje Larsen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Dog the quick brown</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">10:23 AM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-purple">Delayed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Activity</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th class="text-right"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-3.jpg" alt="activity-user">Silje Larsen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Dog the quick brown</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">10:23 AM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-purple">Delayed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">3:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">Albert Andersen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">Jumps over the lazy</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">2:37 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-red">Missed</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">The quick brown fox</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0">4:28 PM</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 text-c-green">Done</h6>
                                                    </td>
                                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ url('assets/images/browser/safari.png') }}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ url('assets/images/browser/ie.png') }}" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- Required Js -->
<script src="{{ url('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/pcoded.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click','.sendSms', function () {
            sendSms($(this).attr('aria-number'));
        });
        function sendSms(phoneNumber) {
            const message = prompt('Enter the Message you want to send');

            $.get('{{url('notify')}}',{'message':message, 'phone_number':phoneNumber, 'csrf_token':'{{ csrf_token() }}'}, function (res) {
                alert(res);
            });

        }
    })
</script>
</body>
</html>

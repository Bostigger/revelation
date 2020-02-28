<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UMaT KTH-JCR | Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{url('img/umat.jpg')}}"/>
    <link href="{{url('css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('dashboard')}}">UMaT KTH-JCR</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
    ><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!--<div class="sb-sidenav-menu-heading">Core</div>-->
                    <a class="nav-link" href="{{url('dashboard')}}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        KTH Residents
                    </a>
                    <!--<div class="sb-sidenav-menu-heading">Interface</div>-->
                    <a class="nav-link @if($route_name != 'auth.nominations.view') {{'collapsed'}} @endif" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="@if($route_name != 'auth.nominations.view') {{'false'}} @else {{'true'}} @endif" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Nominations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                    <div class="collapse @if($route_name == 'auth.nominations.view') {{'show'}} @endif" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @foreach($categories as $category)
                                <a class="nav-link small" href="{{url('dashboard/nominations')}}/{{$category->id}}/category_id">{{$category->name}}</a>
                            @endforeach
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Voting
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                    <div class="collapse @if($route_name == 'auth.voting.view') {{'show'}} @endif" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @foreach($categories as $category)
                                <a class="nav-link small" href="{{url('dashboard/voting')}}/{{$category->id}}/category_id">{{$category->name}}</a>
                            @endforeach
                        </nav>
                    </div>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ ucfirst(Auth()->user()->name) }}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>{{$page_title}}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                @if($route_name == 'auth.dashboard')
                                <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Name</th>
                                    <th>Access Code</th>
                                    <th>Room No</th>
                                    <th>Course Year</th>
                                    <th>Contact Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($kt_residents as $key=>$kt_resident)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$kt_resident->name}}</td>
                                            <td>{{$kt_resident->code}}</td>
                                            <td>{{$kt_resident->room}}</td>
                                            <td>{{$kt_resident->course_year}}</td>
                                            <td>0{{$kt_resident->contact_no}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                @elseif($route_name == 'auth.nominations.view')
                                    <thead>
                                    <tr>
                                        <th>s/n</th>
                                        <th>Name</th>
                                        <th>Room No</th>
                                        <th>Course Year</th>
                                        <th>Votes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nominees as $key=>$nominee)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$nominee->student_name}}</td>
                                            <td>{{$nominee->room}}</td>
                                            <td>{{$nominee->course_year}}</td>
                                            <td>{{$nominee->total_votes}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                @elseif($route_name == 'auth.voting.view')
                                    <thead>
                                    <tr>
                                        <th>s/n</th>
                                        <th>Name</th>
                                        <th>Votes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nominees as $key=>$nominee)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$nominee->student_name}}</td>
                                            <td>{{$nominee->votes}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; UMaT KT-JCR 2019</div>
                    <div>
                        <a href="http://iamclems.me">Developed by Sam Clement</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{url('js/scripts.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{url('assets/demo/datatables-demo.js')}}"></script>
</body>
</html>

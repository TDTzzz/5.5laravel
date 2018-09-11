<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--LTE-->

    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">

                <span class="logo-lg">学生成绩管理系统</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
            {{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--</a>--}}
            <!-- Navbar Right Menu -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown" style="margin-right: 20px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出登录
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/changePwd/{{Auth::user()->id}}">
                                            修改密码
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- search form (Optional) -->
                {{--<form action="#" method="get" class="sidebar-form">--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
                    {{--</div>--}}
                {{--</form>--}}
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="/gradeImport"><i class="fa fa-link"></i> <span>成绩导入</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>数据查询</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('nopass')}}">不及格学生</a></li>
                            <li><a href="{{route('queryCredit')}}">查询学分</a></li>
                            <li><a href="{{route('queryEach')}}">查询各科成绩</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>统计</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('nopassCount')}}">不及格人数</a></li>
                            <li><a href="{{route('lessonCredit')}}">课程分数</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>数据管理</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('studentManage')}}">学生管理</a></li>
                            <li><a href="{{route('lessonManage')}}">课程管理</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    @include('flash::message')
                </div>
                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>



    </div>
</div>


<!-- jQuery 2.2.3 -->
<script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>
</body>
</html>

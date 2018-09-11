@extends('layouts.app2')

@section('content')

    <div class="container">
        {{--<div class="row" style="padding-bottom: 30px;">--}}
        {{--<h3 style="display: inline-block">查询:</h3>--}}
        {{--<form action="/stat/lessonCredit" method="post" style="display: inline-block">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="text" name="lesson_id" placeholder="请输入学号">--}}
        {{--<input type="text" name="lesson_name" placeholder="请输入姓名">--}}
        {{--<button type="submit" class="btn btn-primary">查询</button>--}}
        {{--</form>--}}
        {{--<a href="/manage/addS" class="btn btn-success">添加</a>--}}
        {{--</div>--}}
        <div class="row">
            <button class="btn btn-success btn-lg" onclick="window.history.go(-1)" style="margin-bottom: 20px;"><-返回</button>
        </div>

        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">修改密码</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form role="form" action="/changePwd" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <input type="hidden" name="{{$user->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">邮箱</label>
                                <input readonly type="text" class="form-control" value="{{$user->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">原密码</label>
                                <input type="text" class="form-control" name="password" placeholder="请输入原密码">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">新密码</label>
                                <input type="text" class="form-control" name="new_password" placeholder="请输入新密码">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">再次输入</label>
                                <input type="text" class="form-control" name="confirm_password" placeholder="请再次输入新密码">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

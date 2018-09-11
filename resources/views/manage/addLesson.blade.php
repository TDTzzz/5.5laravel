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
                    <h3 class="box-title">课程添加</h3>
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
                @if(isset($lesson))
                <form role="form" action="/manage/updateL" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">课号</label>
                            <input readonly type="text" class="form-control" value="{{$lesson->id}}" name="id" placeholder="请输入学号">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">课名</label>
                            <input type="text" class="form-control" value="{{$lesson->lesson_name}}" name="lesson_name" placeholder="请输入学生姓名">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">学分</label>
                            <input type="text" value="{{$lesson->lesson_credit}}" class="form-control" name="lesson_credit" placeholder="请输入学生年龄">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @else
                <form role="form" action="/manage/addL" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">课号</label>
                            <input  type="text" class="form-control"name="id" placeholder="请输入学号">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">课名</label>
                            <input type="text" class="form-control" name="lesson_name" placeholder="请输入课程名称">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">学分</label>
                            <input type="text" class="form-control" name="lesson_credit" placeholder="请输入课程学分">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection

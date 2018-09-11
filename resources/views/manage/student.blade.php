@extends('layouts.app2')

@section('content')

    <div class="container">
        <div class="row" style="padding-bottom: 30px;">
            {{--<h3 style="display: inline-block">查询:</h3>--}}
            {{--<form action="/stat/lessonCredit" method="post" style="display: inline-block">--}}
                {{--{{csrf_field()}}--}}
                {{--<input type="text" name="lesson_id" placeholder="请输入学号">--}}
                {{--<input type="text" name="lesson_name" placeholder="请输入姓名">--}}
                {{--<button type="submit" class="btn btn-primary">查询</button>--}}
            {{--</form>--}}
            <a href="/manage/addS" class="btn btn-success btn-lg">添加</a>
        </div>
        <div class="row">
            <table class="table table-striped" style="text-align: center">
                <tr>
                    <td class="success">学号</td>
                    <td class="info">姓名</td>
                    <td class="danger">性别</td>
                    <td class="danger">年龄</td>
                    <td class="danger">所在系</td>
                    <td class="success">操作</td>
                </tr>
                @foreach($results as $vo)
                    <tr>
                        <td class="success">{{$vo['id']}}</td>
                        <td class="info">{{$vo['student_name']}}</td>
                        <td class="danger">{{$vo['student_sex']}}</td>
                        <td class="danger">{{$vo['student_age']}}</td>
                        <td class="danger">{{$vo['student_dept']}}</td>
                        <td class="success">
                            <a href="/manage/updateS/{{$vo['id']}}" class="btn btn-info">修改</a>
                            <a href="" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

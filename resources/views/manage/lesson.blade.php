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
            <a href="/manage/addL" class="btn btn-success">添加</a>
        </div>
        <div class="row">
            <table class="table table-striped" style="text-align: center">
                <tr>
                    <td class="success">课号</td>
                    <td class="info">课名</td>
                    <td class="info">学分</td>
                    <td class="danger">操作</td>
                </tr>
                @foreach($results as $vo)
                    <tr>
                        <td class="success">{{$vo['id']}}</td>
                        <td class="info">{{$vo['lesson_name']}}</td>
                        <td class="info">{{$vo['lesson_credit']}}</td>
                        <td class="danger">
                            <a href="/manage/updateL/{{$vo['id']}}" class="btn btn-info">修改</a>
                            <a href="/manage/deleteL/{{$vo['id']}}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

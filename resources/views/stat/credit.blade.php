@extends('layouts.app2')

@section('content')

    <div class="container">
        <div class="row" style="padding-bottom: 30px;">
            <h3 style="display: inline-block">查询:</h3>
            <form action="/stat/lessonCredit" method="post" style="display: inline-block">
                {{csrf_field()}}
                <input type="text" name="lesson_id" placeholder="请输入课号号">
                <input type="text" name="lesson_name" placeholder="请输入课程姓名">
                <button type="submit" class="btn btn-primary">查询</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <td class="success">课号</td>
                    <td class="info">课程名</td>
                    <td class="danger">平均分</td>
                    <td class="danger">最高分</td>
                    <td class="danger">最低分</td>
                </tr>
                @foreach($results as $vo)
                    <tr>
                        <td class="success">{{$vo['lesson_id']}}</td>
                        <td class="info">{{$vo['lesson_name']}}</td>
                        <td class="danger">{{$vo['avg']}}</td>
                        <td class="danger">{{$vo['max']}}</td>
                        <td class="danger">{{$vo['min']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

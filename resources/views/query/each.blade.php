@extends('layouts.app2')

@section('content')

    <div class="container">
        <div class="row" style="padding-bottom: 30px;">
            <h3 style="display: inline-block">查询:</h3>
            <form action="/query/queryEach" method="post" style="display: inline-block">
                {{csrf_field()}}
                <input type="text" name="student_id" placeholder="请输入学号">
                <input type="text" name="student_name" placeholder="请输入学生姓名">
                <button type="submit" class="btn btn-primary">查询</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-bordered" style="text-align: center">
                @foreach($results as $result)
                    <tr>
                        <td class="info">姓名</td>
                        @foreach($result as $vo)
                            <td class="success">课程</td>
                            <td class="danger">成绩</td>
                        @endforeach
                    </tr>
                    <tr class="data">
                        <td>{{reset($result)->student_name}}</td>
                        @foreach($result as $vo)
                            <td>{{$vo->lesson_name}}</td>
                            <td>{{$vo->pivot->grade}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <style>
        .data td{
            background: #fff
        }
    </style>
@endsection

@extends('layouts.app2')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">成绩导入</h2>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/gradeImport" method="post" class="form-inline">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group" style="padding-bottom: 20px;">
                            <label for="exampleInputEmail1">学生</label>
                            <br>
                            <input type="text" class="form-control" name="student_name" placeholder="请输入学生姓名">
                            <label for="exampleInputEmail1" style="padding: 0 20px 0 20px">或者</label>
                            <input type="text" class="form-control" name="student_id" placeholder="请输入学号">
                        </div>
                        <br>
                        <div class="form-group" style="padding-bottom: 20px;">
                            <label for="exampleInputPassword1">课程</label>
                            <br>
                            <input type="text" class="form-control" name="lesson_name" placeholder="请输入课程姓名">
                            <label for="exampleInputEmail1" style="padding: 0 20px 0 20px">或者</label>
                            <input type="text" class="form-control" name="lesson_id" placeholder="请输入课号">
                        </div>
                        <br>
                        <div class="form-group" style="padding-bottom: 20px;">
                            <label for="exampleInputFile">成绩</label>
                            <br>
                            <input type="text" class="form-control" name="grade" placeholder="请输入成绩">
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

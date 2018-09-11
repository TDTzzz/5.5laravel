<?php

namespace App\Http\Controllers;

use App\Student;
use App\Lesson;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;
use Auth;

class UserController extends Controller
{
    //成绩导入
    public function show()
    {

        return view('import');
    }

    public function gradeImport(Request $request)
    {
        if (!empty($request->get('student_name'))){
            $student=Student::where('student_name',$request->get('student_name'))->first();
            $student_id=$student['id'];
        }else if (!empty($request->get('student_id'))){
            $student=Student::find($request->get('student_id'));

            $student_id=$student['id'];
        }else{
            flash('学生不能为空')->error();
            return back();
        }
        if (empty($student_id)){
            flash('此学生不存在')->error();
            return back();
        }
        if (!empty($request->get('lesson_name'))){
            $lesson=Lesson::where('lesson_name',$request->get('lesson_name'))->first();
            $lesson_id=$lesson['id'];
        }else if (!empty($request->get('lesson_id'))){
            $lesson=Lesson::find($request->get('lesson_id'));
            $lesson_id=$lesson['id'];
        }else{
            flash(' 课程不能为空');
            return back();
        }
        if (empty($lesson_id)){
            flash('此课程不存在')->error();
            return back();
        }

        if(empty($request->get('grade'))){
            flash('成绩不能为空')->error();
            return back();
        }
        //检验是否已存在
        $data=DB::table('student_lesson')->where(['student_id'=>$student_id,'lesson_id'=>$lesson_id])->get();
        if ($data==[]){
            flash('此学生此课程已有成绩');
            return back();
        }
        DB::table('student_lesson')->insert([
           'student_id'=>$student_id,
           'lesson_id'=>$lesson_id,
           'grade'=>$request->get('grade')
        ]);
        flash('添加成功');
        return back();
    }


    //显示不及格的学生
    public function showNopass()
    {
        $students=Student::all();
        $results=array();
        foreach ($students as $key=> $student) {
            foreach ($student->lessons()->get() as $key2 => $vo) {
                if ($vo->pivot->grade < 60) {
                    $results[$key][$key2] = $vo;
                    $results[$key][$key2]['student_name']=$student['student_name'];
                    $results[$key][$key2]['student_sex']=$this->sex($student['student_sex']);
                    $results[$key][$key2]['student_dept']=$student['student_dept'];
                }
            }
        }

        return view('query.nopass',compact('results'));
    }
    //查询不及格的学生
    public function selectNopass(Request $request)
    {
        if (!empty($request->get('student_id'))){
            $student=Student::find($request->get('student_id'));
            if (empty($student)){
               return redirect()->route('nopass');
            }
            foreach ($student->lessons()->get() as $key2=>$vo){
                if ($vo->pivot->grade < 60) {
                    $vo['student_name']=$student['student_name'];
                    $vo['student_sex']=$this->sex($vo['student_sex']);
                    $vo['student_dept']=$student['student_dept'];
                    $results[][$key2] = $vo;
                }
            }

        }else if(!empty($request->get('student_name'))){
            $student=Student::where('student_name',$request->get('student_name'))->first();
            if (empty($student)){
                return redirect()->route('nopass');
            }
            foreach ($student->lessons()->get() as $key2=>$vo){
                if ($vo->pivot->grade < 60) {
                    $vo['student_name']=$student['student_name'];
                    $vo['student_sex']=$this->sex($vo['student_sex']);
                    $vo['student_dept']=$student['student_dept'];
                    $results[][$key2] = $vo;
                }
            }
        }else{
            return redirect()->route('nopass');
        }
        return view('query.nopass',compact('results'));
    }

    public function showCredit()
    {
        $students=Student::all();
        foreach($students as $key=>$student){
            $total_credit=0;
            foreach ($student->lessons()->get() as $key2=>$vo){
                //大于60分给学分;
                if ($vo->pivot->grade>=60){
                    $total_credit+=$vo['lesson_credit'];
                }
            }
            $student['student_sex']=$this->sex($student['student_sex']);
            $results[$key]=$student;
            $results[$key]['total_credit']=$total_credit;
        }
        return view('query.credit',compact('results'));
    }

    public function selectCredit(Request $request)
    {
        if (!empty($request->get('student_id'))){
            $student=Student::find($request->get('student_id'));
            if (empty($student)){
                return redirect()->route('queryCredit');
            }
            $total_credit=0;
            foreach ($student->lessons()->get() as $key2=>$vo){
                if ($vo->pivot->grade >= 60) {
                    $total_credit+=$vo['lesson_credit'];
                }
            }
            $student['student_sex']=$this->sex($student['student_sex']);
            $student['total_credit']=$total_credit;
            $results[]=$student;
        }else if(!empty($request->get('student_name'))){
            $student=Student::where('student_name',$request->get('student_name'))->first();
            if (empty($student)){
                return redirect()->route('queryCredit');
            }
            $total_credit=0;
            foreach ($student->lessons()->get() as $key2=>$vo){
                if ($vo->pivot->grade >= 60) {
                    $total_credit+=$vo['lesson_credit'];
                }
            }
            $student['student_sex']=$this->sex($student['student_sex']);
            $student['total_credit']=$total_credit;
            $results[]=$student;

        }else{
            return redirect()->route('queryCredit');
        }

        return view('query.credit',compact('results'));
    }

    public function showEach()
    {
        $students=Student::all();
        foreach ($students as $key =>$student){
            foreach ($student->lessons()->get() as $key2=>$vo){
                $results[$key][$key2]=$vo;
                $results[$key][$key2]['student_name']=$student['student_name'];
            }
        }
        return view('query.each',compact('results'));
    }

    public function selectEach(Request $request)
    {
        if (!empty($request->get('student_id'))){
            $student=Student::find($request->get('student_id'));
            if (empty($student)){
                return redirect()->route('queryEach');
            }
            foreach ($student->lessons()->get() as $key2=>$vo){
                $vo['student_name']=$student['student_name'];
                $result[$key2]=$vo;

            }
        }else if(!empty($request->get('student_name'))){
            $student=Student::where('student_name',$request->get('student_name'))->first();
            if (empty($student)){
                return redirect()->route('queryEach');
            }
            foreach ($student->lessons()->get() as $key2=>$vo){
                $vo['student_name']=$student['student_name'];
                $result[$key2]=$vo;
            }
        }else{
            return redirect()->route('queryEach');
        }
        $results[]=$result;
        return view('query.each',compact('results'));
    }
    //修改密码
    public function showPwd($id)
    {
        $user=User::find($id);
        return view('changePwd',compact('user'));
    }

    public function changePwd(Request $request)
    {
        if (Hash::check($request->get('password'),Auth::user()->password)){
            if ($request->get('new_password')==$request->get('confirm_password')){
                Auth::user()->password=bcrypt($request->get('new_password'));
                Auth::user()->save();
                flash('密码修改成功','success');
                return redirect()->route('home');
            }else{
                flash('两次密码输入不一样','danger');
                return back();
            }
        }
        flash('原密码输入错误','danger');
        return back();
    }

    //判断男女
    private function sex($vo)
    {
        if ($vo==0){
            $vo='男';
        }else{
            $vo='女';
        }
        return $vo;
    }
}

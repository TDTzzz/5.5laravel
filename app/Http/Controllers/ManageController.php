<?php

namespace App\Http\Controllers;

use App\Student;
use App\Lesson;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function showStudent()
    {
        $results=Student::all();
        foreach ($results as $key=> $vo){
            if ($vo['student_sex']==0){
                $results[$key]['student_sex']='男';
            }else{
                $results[$key]['student_sex']='女';
            }
        }
        return view('manage.student',compact('results'));
    }

    public function showUpdateS($id)
    {
        $student=Student::find($id);

        return view('manage.addStudent',compact('student'));
    }

    public function showAddS()
    {

        return view('manage.addStudent');
    }

    public function addS(Request $request)
    {
        //验证字段
        $rules=[
            'id'=>'required|unique:students|max:15|integer',
            'student_name'=>'required',
            'student_sex'=>'required',
            'student_age'=>'integer',
            'student_dept'=>'required',
        ];
        $messages=[
            'required'=>'不能为空',
            'integer'=>'必须为整数',
            'unique'=>'此学号已经存在，请更换',
        ];
        $this->validate($request,$rules,$messages);
        $student=new Student;
        $student->create([
            'id'=>request('id'),
            'student_name'=>request('student_name'),
            'student_sex'=>request('student_sex'),
            'student_age'=>request('student_age'),
            'student_dept'=>request('student_dept'),
        ]);

        return redirect()->action('ManageController@showStudent');
    }

    public function deleteS($id)
    {
        $student=Student::find($id);
        $student->delete();
        return back();
    }


    public function updateS(Request $request)
    {

        //验证字段
        $rules=[
            'student_name'=>'required',
            'student_sex'=>'required',
            'student_age'=>'integer',
            'student_dept'=>'required',
        ];
        $messages=[
            'required'=>'不能为空',
            'integer'=>'必须为整数',
            'unique'=>'此学号已经存在，请更换',
        ];
        $this->validate($request,$rules,$messages);
        $student=Student::find($request->get('id'));

        $student->update([
            'student_name'=>request('student_name'),
            'student_sex'=>request('student_sex'),
            'student_age'=>request('student_age'),
            'student_dept'=>request('student_dept'),
        ]);
        return redirect()->action('ManageController@showStudent');
    }
    public function showLesson()
    {
        $results=Lesson::all();
        return view('manage.lesson',compact('results'));
    }

    public function showAddL()
    {
        return view('manage.addLesson');
    }

    public function showUpdateL($id)
    {
        $lesson=Lesson::find($id);
        return view('manage.addLesson',compact('lesson'));
    }

    public function addL(Request $request)
    {
        //验证字段
        $rules=[
            'id'=>'required|unique:lessons|max:15|integer',
            'lesson_name'=>'required',
            'lesson_credit'=>'required|integer',
        ];
        $messages=[
            'required'=>'不能为空',
            'integer'=>'必须为整数',
            'unique'=>'此学号已经存在，请更换',
        ];
        $this->validate($request,$rules,$messages);
        $student=new Lesson;
        $student->create([
            'id'=>request('id'),
            'lesson_name'=>request('lesson_name'),
            'lesson_credit'=>request('lesson_credit'),
        ]);
        return redirect()->action('ManageController@showLesson');
    }

    public function updateL(Request $request)
    {
        //验证字段
        $rules=[
            'lesson_name'=>'required',
            'lesson_credit'=>'required|integer',
        ];
        $messages=[
            'required'=>'不能为空',
            'integer'=>'必须为整数',
            'unique'=>'此学号已经存在，请更换',
        ];
        $this->validate($request,$rules,$messages);
        $student=Lesson::find($request->get('id'));

        $student->update([
            'lesson_name'=>request('lesson_name'),
            'lesson_credit'=>request('lesson_credit'),
        ]);
        return redirect()->action('ManageController@showLesson');
    }

    public function deleteL($id)
    {
        $lesson=Lesson::find($id);
        $lesson->delete();
        return back();
    }
}

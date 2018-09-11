<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function showNopass()
    {
        $lessons=Lesson::all();
        foreach ($lessons as $key=>$lesson){
            $count=0;
            foreach ($lesson->students()->get() as $key2=>$vo){
                if ($vo->pivot->grade<60){
                    $count+=1;
                }
            }
            $results[$key]['count']=$count;
            $results[$key]['lesson_id']=$lesson['id'];
            $results[$key]['lesson_name']=$lesson['lesson_name'];
        }

        return view('stat.nopass',compact('results'));
    }

    public function selectNopass(Request $request)
    {
        if (!empty($request->get('lesson_id'))){
            $lesson=Lesson::find($request->get('lesson_id'));
            if (empty($lesson)){
                return redirect()->route('nopassCount');
            }
            $count=0;
            foreach ($lesson->students()->get() as $key2=>$vo){
                if ($vo->pivot->grade < 60) {
                    $count+=1;
                }
            }
            $result['count']=$count;
            $result['lesson_id']=$lesson['id'];
            $result['lesson_name']=$lesson['lesson_name'];

        }else if(!empty($request->get('lesson_name'))){
            $lesson=Lesson::where('lesson_name',$request->get('lesson_name'))->first();
            if (empty($lesson)){
                return redirect()->route('nopassCount');
            }
            $count=0;
            foreach ($lesson->students()->get() as $key2=>$vo){
                if ($vo->pivot->grade < 60) {
                    $count+=1;
                }
            }
            $result['count']=$count;
            $result['lesson_id']=$lesson['id'];
            $result['lesson_name']=$lesson['lesson_name'];
        }else{
            return redirect()->route('nopassCount');
        }
        $results[]=$result;
        
        return view('stat.nopass',compact('results'));
    }

    public function showCredit()
    {
        $lessons=Lesson::all();
        foreach ($lessons as $key=>$lesson){
            foreach ($lesson->students()->get() as $key2=>$vo){
                $grade[$key2]=$vo['pivot']['grade'];
            }
            $results[$key]['lesson_name']=$lesson['lesson_name'];
            $results[$key]['lesson_id']=$lesson['id'];
            $results[$key]['avg']=collect($grade)->avg();
            $results[$key]['max']=collect($grade)->max();
            $results[$key]['min']=collect($grade)->min();
        }
        return view('stat.credit',compact('results'));
    }

    public function selectCredit(Request $request)
    {
        if (!empty($request->get('lesson_id'))){
            $lesson=Lesson::find($request->get('lesson_id'));
            if (empty($lesson)){
                return redirect()->route('lessonCredit');
            }
            foreach ($lesson->students()->get() as $key2=>$vo){
                $grade[$key2]=$vo['pivot']['grade'];
            }
            $result['lesson_name']=$lesson['lesson_name'];
            $result['lesson_id']=$lesson['id'];
            $result['avg']=collect($grade)->avg();
            $result['max']=collect($grade)->max();
            $result['min']=collect($grade)->min();

        }else if(!empty($request->get('lesson_name'))){
            $lesson=Lesson::where('lesson_name',$request->get('lesson_name'))->first();
            if (empty($lesson)){
                return redirect()->route('lessonCredit');
            }
            foreach ($lesson->students()->get() as $key2=>$vo){
                $grade[$key2]=$vo['pivot']['grade'];
            }
            $result['lesson_name']=$lesson['lesson_name'];
            $result['lesson_id']=$lesson['id'];
            $result['avg']=collect($grade)->avg();
            $result['max']=collect($grade)->max();
            $result['min']=collect($grade)->min();
        }else{
            return redirect()->route('lessonCredit');
        }
        $results[]=$result;
        return view('stat.credit',compact('results'));
    }
}

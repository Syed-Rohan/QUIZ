<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCourse(){
        return view('admin.add_course');
    }
    public function ViewCourse(){
        $courses = DB::table('courses')->where('course_delete',0)->orderBy('id','DESC')->get();
        return view('admin.view_course',compact('courses'));
    }
    public function addCourseInsert(Request $data){
        $data->validate([
            'course_name' => 'required',
            'course_title' => 'required',
            'course_duration' => 'required',
            'course_level' => 'required',
            'course_details' =>'required'
        ]);

        DB::table('courses')->insert([
            'course_name' => $data->course_name,
            'course_title' => $data->course_title,
            'course_duration' => $data->course_duration,
            'course_level' => $data->course_level,
            'course_details' =>  $data->course_details,
            'course_fee' => $data->course_fee
        ]);
        return redirect()->back()->with('success',1);
    }
    public function deleteCourse(Request $data){
        DB::table('courses')->where('id',$data->id)->update(['course_delete'=>1]);
        return redirect()->back();
    }
    public function updateCourse(Request $data){
        DB::table('courses')->where('id',$data->id)->update(['course_status'=>$data->status]);
        return redirect()->back();
    }

    public function AllCourses(){
        $courses = DB::table('courses')->where('course_status','Enable')->where('course_delete',0)->get();
        return view('student.all_courses',compact('courses'));
    }


    public function CourseDetails(Request $data){
        $course = DB::table('courses')->where('course_status','Enable')->where('course_delete',0)->where('id',$data->id)->first();
        return view('student.course_details',compact('course'));
    }
    public function EnrolledCourse(){
        $courses = DB::table('courses')->where('course_status','Enable')->where('course_delete',0)->get();
        return view('student.enrolled_courses',compact('courses'));
    }
}

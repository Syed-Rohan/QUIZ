<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function addBatch(){
        $batches = DB::table('batches')
        ->join('courses','batches.course_id','=','courses.id')
        ->where('batch_delete',0)
        ->select('batches.*','courses.course_name','courses.course_title')
        ->orderBy('id','DESC')->get();
        return view('admin.add_batch',compact('batches'));
    }
    public function addBatchInsert(Request $data){
        $data->validate([
            'batch_name' => 'required',
            'batch_number' => 'required',
            'batch_schedule' => 'required',
            'course_id' => 'required',
            'batch_start' =>'required'
        ]);

        DB::table('batches')->insert([
            'batch_name' => $data->batch_name,
            'batch_number' => $data->batch_number,
            'batch_schedule' => $data->batch_schedule,
            'batch_start' => $data->batch_start,
            'course_id' => $data->course_id
        ]);
        return redirect()->back();
    }
    public function deleteBatch(Request $data){
        DB::table('batches')->where('id',$data->id)->update(['batch_delete'=>1]);
        return redirect()->back();
    }
    public function updateBatch(Request $data){
        DB::table('batches')->where('id',$data->id)->update(['batch_status'=>$data->status]);
        return redirect()->back();
    }
    public function addBatchTeacher(Request $data){
        // $data->validate([
        //     'batch_name' => 'required',
        //     'batch_number' => 'required',
        //     'batch_schedule' => 'required',
        //     'course_id' => 'required'
        // ]);

        DB::table('batches')->where('id',$data->batch_id)->update([
            'batch_teacher' => $data->batch_teacher
        ]);
        return redirect()->back();
    }
    public function MyBatches(){
        $batches = DB::table('batches')
        ->join('courses','batches.course_id','=','courses.id')
        ->where('batch_delete',0)
        ->where('batch_teacher',Auth::user()->id)
        ->select('batches.*','courses.course_name','courses.course_title')
        ->orderBy('id','DESC')->get();
        return view('teacher.my_batches',compact('batches'));
    }
    public function BatchStudents(Request $data){
        $students = DB::table('enrolled_courses')
        ->join('users','enrolled_courses.enroll_user_id','users.id')
        ->where('enroll_batch_id',$data->id)->get();
        return view('teacher.batch_students',compact('students'));
    }
}

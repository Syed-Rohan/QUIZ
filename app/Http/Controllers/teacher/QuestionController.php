<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CreateQuestion(){
        $questions = DB::table('questions')->where('teacher_id',Auth::user()->id)->get();
        return view('teacher.create_question',compact('questions'));
    }
    public function CreateQuestionInsert(Request $data){
        $data->validate([
            'question_subject' => 'required',
            'batch_id' => 'required',
            'mark' => 'required',
            'minus_mark' => 'required',
            'exam_duration' => 'required',
            'exam_date' => 'required',
            'exam_start_time' => 'required',
            'exam_end_time' => 'required',
        ]);

        $insert = array();
        $insert['teacher_id'] = Auth::user()->id;
        $courses = DB::table('batches')->join('courses','batches.course_id','=','courses.id')->select('batches.*','courses.course_title','courses.course_name','courses.course_level')->where('batches.id',$data->batch_id)->first();
        $insert['course_id'] = $courses->course_id;
        $insert['course_title'] = $courses->course_title;
        $insert['course_name'] = $courses->course_name;
        $insert['question_level'] = $courses->course_level;
        $insert['batch_id'] = $data->batch_id;
        $insert['batch_name'] = $courses->batch_name;
        $insert['subject'] = $data->question_subject;
        $insert['question_type'] = $data->question_type;
        $insert['mark'] = $data->mark;
        $insert['minus_mark'] = $data->minus_mark;
        $insert['exam_duration'] = $data->exam_duration;
        $insert['exam_date'] = $data->exam_date;
        $insert['exam_start_time'] = $data->exam_start_time;
        $insert['exam_end_time'] = $data->exam_end_time;
        $success = DB::table('questions')->insert($insert);
        if($success){
            return redirect()->back()->with('success',1);
        }else{
            return redirect()->back();
        }
    }
    public function UpdateStatus(Request $data){
        DB::table('questions')->where('id',$data->id)->update([
            'question_status' => $data->status
        ]);
        return redirect()->back()->with('success_update',1);
    }
    public function DeleteQuestion(Request $data){
        DB::table('questions')->where('id',$data->id)->delete();
        return redirect()->back()->with('success_delete',1);
    }
    public function UpdateQuestion(Request $data){
        $data->validate([
            'question_subject' => 'required',
            'batch_id' => 'required',
            'mark' => 'required',
            'minus_mark' => 'required',
            'exam_duration' => 'required',
            'exam_date' => 'required',
            'exam_start_time' => 'required',
            'exam_end_time' => 'required',
        ]);

        $insert = array();
        $insert['teacher_id'] = Auth::user()->id;
        $courses = DB::table('batches')->join('courses','batches.course_id','=','courses.id')->select('batches.*','courses.course_title','courses.course_name','courses.course_level')->where('batches.id',$data->batch_id)->first();
        $insert['course_id'] = $courses->course_id;
        $insert['course_title'] = $courses->course_title;
        $insert['course_name'] = $courses->course_name;
        $insert['question_level'] = $courses->course_level;
        $insert['batch_id'] = $data->batch_id;
        $insert['batch_name'] = $courses->batch_name;
        $insert['subject'] = $data->question_subject;
        $insert['question_type'] = $data->question_type;
        $insert['mark'] = $data->mark;
        $insert['minus_mark'] = $data->minus_mark;
        $insert['exam_duration'] = $data->exam_duration;
        $insert['exam_date'] = $data->exam_date;
        $insert['exam_start_time'] = $data->exam_start_time;
        $insert['exam_end_time'] = $data->exam_end_time;
        $success = DB::table('questions')->where('id',$data->question_id)->update($insert);
        if($success){
            return redirect()->back()->with('success_update',1);
        }else{
            return redirect()->back();
        }
    }
    public function AddQuestion(Request $data){
        $question=DB::table('questions')->where('id',$data->id)->first();
        return view('teacher.add_question',compact('question'));
    }
    public function AddWrittenQuestion(Request $data){
        $file = $data->file('written_question');
        $filename = time() . '.' . $data->file('written_question')->extension();
        $filePath = 'public/files/uploads/';
        $file->move($filePath, $filename);
        DB::table('written_questions')->insert([
            'question_id' => $data->question_id,
            'written_question' => $filePath.$filename,
            'written_question_mark' => $data->written_question_mark,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success_insert',1);
    }
    public function AddMcqQuestion(Request $data){
        DB::table('mcq_questions')->insert([
            'question_id' => $data->question_id,
            'mcq_question' => $data->mcq_question,
            'option_a' => $data->option_a,
            'option_b' => $data->option_b,
            'option_c' => $data->option_c,
            'option_d' => $data->option_d,
            'mcq_question_mark' => $data->mcq_question_mark,
            'mcq_question_ans' => $data->correct_ans,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}

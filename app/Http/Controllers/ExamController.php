<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function UpcomingExam(){
        $today = date('Y-m-d');
        $questions = DB::table('questions')->where('question_status','!=','Disable')->where('exam_date','>',$today)->get();
        return view('student.upcoming_exam',compact('questions'));
    }
    public function TodaysExam(){
        $today = date('Y-m-d');
        $questions = DB::table('questions')->where('question_status','!=','Disable')->where('exam_date',$today)->get();
        return view('student.todays_exam',compact('questions'));
    }
    public function AllExam(){
        $today = date('Y-m-d');
        $questions = DB::table('questions')->where('question_status','!=','Disable')->where('exam_date','<',$today)->get();
        return view('student.all_exam',compact('questions'));
    }
    public function AttempExam(Request $data){
        $check = DB::table('attemp_exams')
        ->where('attemp_user_id',Auth::user()->id)
        ->where('attemp_course_id',$data->course_id)
        ->where('attemp_batch_id',$data->batch_id)
        ->where('attemp_question_id',$data->question_id)
        ->first();
        if($check){
            DB::table('attemp_exams')->where('attemp_id',$check->attemp_id)->update([
                'attemp_number' => $check->attemp_number+1,
                'updated_at' => Carbon::now()
            ]);
            session()->put('attemp_id',$check->attemp_id);
            return redirect()->route('exam');
        }else{
            DB::table('attemp_exams')->insert([
                'attemp_user_id' => Auth::user()->id,
                'attemp_course_id' => $data->course_id,
                'attemp_batch_id' => $data->batch_id,
                'attemp_question_id' => $data->question_id,
                'attemp_number' => 1,
                'attemp_start' => date('Y-m-d'),
                'attemp_start_time' => date('H:i:s'),
                'attemp_end_time' => date('H:i:s', strtotime("+".$data->duration." minutes")),
                'created_at' => Carbon::now()
            ]);
            $last_id = DB::getPdo()->lastInsertId();
            session()->put('attemp_id',$last_id);
            return redirect()->route('exam');
        }
    }
    public function Exam(){
        if(Session::get('attemp_id')){
            $attemp = DB::table('attemp_exams')->where('attemp_id',Session::get('attemp_id'))->first();
            $check = DB::table('enrolled_courses')->where('enroll_user_id',Auth::user()->id)->where('enroll_course_id',$attemp->attemp_course_id)->where('enroll_batch_id',$attemp->attemp_batch_id)->first();
            if($check){
                $question = DB::table('questions')
                ->where('id',$attemp->attemp_question_id)
                ->first();
                return view('student.exam',compact('attemp','question'));
            }else{
                return redirect('/todays-exam')->with('invalid_request',1);
            }
        }else{
            return redirect('/todays-exam');
        }
    }
    public function WrittenInsert(Request $data){
        $question = DB::table('questions')->where('id',$data->question_id)->first();
            $file = $data->file('written_question');
            if($file){
                $filename = time() . '.' . $data->file('written_question')->extension();
                $filePath = 'public/files/ans/';
                $file->move($filePath, $filename);
                DB::table('written_marks')->insert([
                    'written_marks_user_id' => Auth::user()->id,
                    'written_marks_question_id' => $data->question_id,
                    'written_answer' => $filePath.$filename,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }else{
                DB::table('written_marks')->insert([
                    'written_marks_user_id' => Auth::user()->id,
                    'written_marks_question_id' => $data->question_id,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }
    }
    public function ExamInsert(Request $data){
        $question = DB::table('questions')->where('id',$data->question_id)->first();
        $total_mark = 0;
        $total_minus_mark = 0;

        if($question->question_type!=2){
            for($i=1; $i <= $data->count; $i++) {
                $exam = array();
                $mcq = "mcq".$i;
                $mcq_id = "mcq_id".$i;
                $ans = DB::table('mcq_questions')->where('mcq_question_id',$data->$mcq_id)->first();
                if($data->$mcq){
                    $exam['user_answer'] = $data->$mcq;
                    if($ans->mcq_question_ans==$exam['user_answer']){
                        $exam['correct_answer'] = $ans->mcq_question_ans;
                        $exam['mcq_answer_status'] = 'Correct';
                        $exam['mcq_answer_mark'] = $ans->mcq_question_mark;
                        $exam['mcq_answer_minus_mark'] = 0;
                        $total_mark = $total_mark + $exam['mcq_answer_mark'];
                    }else{
                        $exam['correct_answer'] = $ans->mcq_question_ans;
                        $exam['mcq_answer_status'] = 'Incorrect';
                        $exam['mcq_answer_mark'] = 0;
                        $exam['mcq_answer_minus_mark'] = $question->minus_mark;
                        $total_minus_mark = $total_minus_mark+$exam['mcq_answer_minus_mark'];
                    }
                }else{
                    $exam['correct_answer'] = $ans->mcq_question_ans;
                    $exam['user_answer'] = NULL;
                    $exam['mcq_answer_status'] = 'Incorrect';
                    $exam['mcq_answer_mark'] = 0;
                    $exam['mcq_answer_minus_mark'] = 0;
                }

                $exam['mcq_answer_question_id'] = $data->question_id;
                $exam['mcq_answer_user_id'] = Auth::user()->id;
                $exam['mcq_answer_mcq_id'] = $data->$mcq_id;
                $exam['created_at'] = Carbon::now();
                DB::table('mcq_answers')->insert($exam);
            }
            $subtotal = $total_mark-$total_minus_mark;
            DB::table('mcq_marks')->insert([
                'mcq_marks_user_id' => Auth::user()->id,
                'mcq_marks_question_id' => $data->question_id,
                'mcq_marks_total' => $subtotal,
                'created_at' => Carbon::now(),
            ]);
        }
        // if($question->question_type!=1){

        //     $file = $data->file('written_question');
        //     if($file){
        //         $filename = time() . '.' . $data->file('written_question')->extension();
        //         $filePath = 'public/files/ans/';
        //         $file->move($filePath, $filename);
        //         DB::table('written_marks')->insert([
        //             'written_marks_user_id' => Auth::user()->id,
        //             'written_marks_question_id' => $data->question_id,
        //             'written_answer' => $filePath.$filename,
        //             'created_at' => Carbon::now(),
        //         ]);
        //     }else{
        //         DB::table('written_marks')->insert([
        //             'written_marks_user_id' => Auth::user()->id,
        //             'written_marks_question_id' => $data->question_id,
        //             'created_at' => Carbon::now(),
        //         ]);
        //     }

        // }

        DB::table('attemp_exams')->where('attemp_id',$data->attemp_id)->update([
            'attemp_status' => 'Submitted',
            'updated_at' => Carbon::now(),
        ]);
        session()->forget('attemp_id');
        return redirect()->route('todays_exam')->with('success_exam',1);
    }
    public function ExamCorrection(Request $data){
        $check = DB::table('mcq_marks')->where('mcq_marks_question_id',$data->question_id)->where('mcq_marks_user_id',Auth::user()->id)->first();
        if($check){
            $question = DB::table('questions')
            ->where('id',$data->question_id)
            ->first();
            return view('student.exam_correction',compact('question'));
        }else{
            return redirect()->back();
        }

    }
    public function ExamInsertJson(Request $data){
        $question = DB::table('questions')->where('id',$data->input('question_id'))->first();
        $total_mark = 0;
        $total_minus_mark = 0;

        if($question->question_type!=2){
            for($i=1; $i <= $data->input('count'); $i++) {
                $exam = array();
                $mcq = "mcq".$i;
                $mcq_id = "mcq_id".$i;
                $ans = DB::table('mcq_questions')->where('mcq_question_id',$data->input($mcq_id))->first();
                if($data->input($mcq)){
                    $exam['user_answer'] = $data->input($mcq);
                    if($ans->mcq_question_ans==$exam['user_answer']){
                        $exam['correct_answer'] = $ans->mcq_question_ans;
                        $exam['mcq_answer_status'] = 'Correct';
                        $exam['mcq_answer_mark'] = $ans->mcq_question_mark;
                        $exam['mcq_answer_minus_mark'] = 0;
                        $total_mark = $total_mark + $exam['mcq_answer_mark'];
                    }else{
                        $exam['correct_answer'] = $ans->mcq_question_ans;
                        $exam['mcq_answer_status'] = 'Incorrect';
                        $exam['mcq_answer_mark'] = 0;
                        $exam['mcq_answer_minus_mark'] = $question->minus_mark;
                        $total_minus_mark = $total_minus_mark+$exam['mcq_answer_minus_mark'];
                    }
                }else{
                    $exam['correct_answer'] = $ans->mcq_question_ans;
                    $exam['user_answer'] = NULL;
                    $exam['mcq_answer_status'] = 'Incorrect';
                    $exam['mcq_answer_mark'] = 0;
                    $exam['mcq_answer_minus_mark'] = 0;
                }

                $exam['mcq_answer_question_id'] = $data->input('question_id');
                $exam['mcq_answer_user_id'] = Auth::user()->id;
                $exam['mcq_answer_mcq_id'] = $data->input($mcq_id);
                $exam['created_at'] = Carbon::now();
                DB::table('mcq_answers')->insert($exam);
            }
            $subtotal = $total_mark-$total_minus_mark;
            DB::table('mcq_marks')->insert([
                'mcq_marks_user_id' => Auth::user()->id,
                'mcq_marks_question_id' => $data->input('question_id'),
                'mcq_marks_total' => $subtotal,
                'created_at' => Carbon::now(),
            ]);
        }
        // if($question->question_type!=1){


        //     if($data->file('written_question')){
        //         $file = $data->file('written_question');
        //         $filename = time() . '.' . $data->file('written_question')->extension();
        //         $filePath = 'public/files/ans/';
        //         $file->move($filePath, $filename);
        //         DB::table('written_marks')->insert([
        //             'written_marks_user_id' => Auth::user()->id,
        //             'written_marks_question_id' => $data->input('question_id'),
        //             'written_answer' => $filePath.$filename,
        //             'created_at' => Carbon::now(),
        //         ]);
        //     }else{
        //         DB::table('written_marks')->insert([
        //             'written_marks_user_id' => Auth::user()->id,
        //             'written_marks_question_id' => $data->input('question_id'),
        //             'created_at' => Carbon::now(),
        //         ]);
        //     }

        // }

        DB::table('attemp_exams')->where('attemp_id',$data->input('attemp_id'))->update([
            'attemp_status' => 'Submitted',
            'updated_at' => Carbon::now(),
        ]);
        session()->forget('attemp_id');
        session()->put('success_exam',1);
        return response()->json();
    }

    public function AllStudentMark(Request $data){
        $question = DB::table('questions')->where('id',$data->question_id)->select('id','course_id','batch_id','question_type','mark')->first();
        return view('teacher.all_student_mark',compact('question'));
    }
    public function UpdateWrittenMark(Request $data){
        DB::table('written_marks')->where('written_marks_id',$data->written_marks_id)->update([
            'written_marks_total' => $data->mark,
        ]);
        return redirect()->back();
    }

}

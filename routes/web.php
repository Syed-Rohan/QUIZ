<?php

use App\Http\Controllers\admin\BatchController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\teacher\QuestionController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware('usertype')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


//user registration
Route::post('/registration',[App\Http\Controllers\user\RegisterController::class,'Register'])->name('registration');
Route::get('/add-teacher',[App\Http\Controllers\user\RegisterController::class,'addteacher'])->name('add_teacher');
Route::get('/view-teacher',[App\Http\Controllers\user\RegisterController::class,'viewteacher'])->name('view_teacher');

Route::get('/personal-info',[App\Http\Controllers\user\RegisterController::class,'personalinfo'])->name('personal_info');
Route::post('/personal-info-update',[App\Http\Controllers\user\RegisterController::class,'personalinfoupdate'])->name('personal_info_updfate');
Route::get('/teacher-status/{status}',[App\Http\Controllers\user\RegisterController::class,'teacherstatus'])->name('teacher_status');
Route::get('/accept-teacher/{id}/{status}',[App\Http\Controllers\user\RegisterController::class,'acceptteacher'])->name('accept_teacher');

//courses
Route::controller(CourseController::class)->group(function(){
    Route::get('/add-course','addCourse')->name('add_course');
    Route::get('/view_course','ViewCourse')->name('view_course');
    Route::post('/add-course-insert','addCourseInsert')->name('add_course_insert');
    Route::get('/delete-course/{id}','deleteCourse')->name('delete_course');
    Route::get('/update-course/{id}/{status}','updateCourse')->name('update_course');
    Route::get('/all-courses','AllCourses')->name('all_courses');
    Route::get('/course-details/{id}','CourseDetails')->name('course_details');
    Route::get('/enrolled-course','EnrolledCourse')->name('enrolled_course');


});


//batches
Route::controller(BatchController::class)->group(function(){
    Route::get('/add-batch','addBatch')->name('add_batch');
    Route::post('/add-batch-insert','addBatchInsert')->name('add_batch_insert');
    Route::get('/delete-batch/{id}','deleteBatch')->name('delete_batch');
    Route::get('/update-batch/{id}/{status}','updateBatch')->name('update_batch');
    Route::post('/add-batch-teacher','addBatchTeacher')->name('add_batch_teacher');
    Route::get('/my-batches','MyBatches')->name('my_batches');
    Route::get('/batche-students/{id}','BatchStudents')->name('batch_student');

});

Route::controller(QuestionController::class)->group(function(){
    Route::get('/create_question','CreateQuestion')->name('create_question');
    Route::post('/create_question','CreateQuestionInsert')->name('create_question');
    Route::get('/update-question-status/{status}/{id}','UpdateStatus')->name('update_question_status');
    Route::get('/delete-question/{id}','DeleteQuestion')->name('delete_question');
    Route::post('/update-question','UpdateQuestion')->name('update_question');
    Route::get('/add-question/{id}','AddQuestion')->name('add_question');
    Route::post('/add-written','AddWrittenQuestion')->name('add_written');
    Route::post('/add-mcq','AddMcqQuestion')->name('add_mcq');
});

Route::controller(ExamController::class)->group(function(){
    Route::get('/upcoming-exam','UpcomingExam')->name('upcoming_exam');
    Route::get('/todays-exam','TodaysExam')->name('todays_exam');
    Route::get('/all-exam','AllExam')->name('all_exam');
    Route::get('/attemp-exam/{course_id}/{batch_id}/{question_id}/{duration}','AttempExam')->name('attemp_exam');
    Route::get('/exam','Exam')->name('exam');
    Route::post('/exam-insert','ExamInsert')->name('exam_insert');
    Route::post('/written-insert','WrittenInsert')->name('written_ans');
    Route::get('/exam-correction/{question_id}','ExamCorrection')->name('exam_correction');
    Route::get('/all-student-mark/{question_id}','AllStudentMark')->name('all_student_mark');
    Route::post('/update-written-mark','UpdateWrittenMark')->name('update_written_mark');

    //json
    Route::post('/exam-insert-json','ExamInsertJson')->name('exam_insert_json');
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

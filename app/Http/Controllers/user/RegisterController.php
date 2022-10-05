<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function Register(Request $data){
        $data->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|max:14|unique:users',
            'user_type' => 'required',
            'password' => 'required|min:5'
        ]);
        if($data->user_type=='3'){
            $status = "Requested";
        }else{
            $status = "Enable";
        }
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'user_type' => $data->user_type,
            'user_status' => $status,
            'gender' => $data->gender,
            'password' => Hash::make($data->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success_register','1');
    }
    public function addteacher(){
        $teachers = DB::table('users')->where('user_type',3)->where('user_status','Pending')->get();
        return view('user.add_teacher',compact('teachers'));
    }
    public function personalinfo(){
        return view('user.personal_info');
    }
    public function personalinfoupdate(Request $data){
        if(Auth::user()->user_type=='3'){
            $status = "Pending";
        }else{
            $status = "Enable";
        }
        $image = $data->user_image;
        if($image){
            $file = Image::make($image);
            $size = $file->filesize();
            $image_ext = $image->getClientOriginalExtension();
            $format = array('jpg','jpeg','png');
            if(in_array($image_ext,$format)){
                if($size<20097152){
                    $post_image = time().".".$image_ext;
                    Image::make($image)->resize(300,300)->save('public/post_images/'.$post_image);
                    $user_image='public/post_images/'.$post_image;
                }else{
                    return redirect()->back()->with('err_file_format','1');
                }
            }else{
                return redirect()->back()->with('err_file_size','1');
            }

        }else{
            $user_image =NULL;
        }
        DB::table('users')->where('id',Auth::user()->id)->update([
            'name' => $data->user_name,
            'father_name' => $data->father_name,
            'mother_name' => $data->mother_name,
            'user_address' => $data->user_address,
            'user_image' => $user_image,
            'user_status' => $status,
            'personal_info' => 1,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success_update','1');
    }
    public function teacherstatus(Request $data){
        DB::table('teachers')->where('id',1)->update([
            'teacher_status' => $data->status,
        ]);
        return redirect()->back();
    }
    public function acceptteacher(Request $data){
        DB::table('users')->where('id',$data->id)->update([
            'user_status' => $data->status,
        ]);
        return redirect()->back();
    }
    public function viewteacher(){
        $teachers = DB::table('users')->where('user_type',3)->where('user_status','Enable')->orWhere('user_status','Disable')->get();
        return view('user.view_teacher',compact('teachers'));
    }
}

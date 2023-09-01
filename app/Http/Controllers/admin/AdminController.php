<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index(){
        return view('adminv2.dashboard');

    }
    public function user(){
        $users = DB::table('users')->get();
      // return $users;
        return view('admin.user.index',compact('users'));
    }

//     public function store(Request $request) {

//         $data = $request->validate([
//             'name' => 'required',
//             'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
//         ]);


//         if($request->has('image')){
//             $file_name = time();      //return timespan

//               $picture = $request->image;
//              // $file_name = rand();  // randum generate
//               $file_name = sha1($file_name);  // algorithum different string generate

//                 $ext = $picture->getClientOriginalExtension();
//                 $file_name = $file_name.".".$ext;
//                 $picture -> move(public_path()."/uploads/category/",$file_name);

//                 $image_path = '/uploads/category/'.$file_name;
//                $data['image'] = $image_path;
//             }
//         Category::create($data);

//         // $data = $request ->all();
//         // Category::create($data);
//         return redirect() -> route('cat.index');
//     }
}

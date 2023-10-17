<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        $category = DB::table('categories')->get();
        $sub_categories = DB::table('sub_categories')->get();
        $city=DB::table('cities')->get();
        // $product=DB::table('products')->get();
        $products = Product::join('countries', 'products.country_id', '=', 'countries.id')
        ->join('states', 'products.state_id', '=', 'states.id')
        ->join('cities', 'products.city_id', '=', 'cities.id')
        ->join('streets', 'products.street_id', '=', 'streets.id')
        ->join('users','products.user_id','=','users.id')
        ->join('categories','products.cat_id','=','categories.id')
        ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
        ->leftjoin('types','products.type_id','=','types.id')
        ->select('products.*','types.types as types_name','countries.name as country_name', 'states.name as state_name', 'cities.name as city_name', 'streets.name as street_name','users.name as user_name'
        ,'categories.name as category_name',
        'sub.name as sub_category_name')
        ->get();

        return view('adminv2.dashboard',compact('category','sub_categories','city','products'));
    }

    public function user(){
        $users = DB::table('users')->get();
      // return $users;
        return view('admin.user.index',compact('users'));
    }

    public function admin_panel() {

        if(Gate::allows('is_admin'))
        return view('adminv2.adminpanel');
        else{
            return
            abort(401);
        }



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

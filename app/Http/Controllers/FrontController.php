<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;


class FrontController extends Controller
{
// home page data upload
public function index()
{
  $sub_categories=DB::table('sub_categories')
  ->select('sub_categories.name as name','sub_categories.image as image')
  ->get();
  $sliders=DB::table('sliders')
  ->select('sliders.image as image')
  ->get();
  $products = Product::join('countries', 'products.country_id', '=', 'countries.id')
  ->join('states', 'products.state_id', '=', 'states.id')
  ->join('cities', 'products.city_id', '=', 'cities.id')
  ->join('types','products.type_id','=','types.id')
  ->join('streets', 'products.street_id', '=', 'streets.id')
  ->join('users','products.user_id','=','users.id')
  //where used then data based login in user id
  //->where('products.user_id',Auth::id())
  ->join('categories','products.cat_id','=','categories.id')
  ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
  ->select('products.*','types.types as types_name'
  ,'countries.name as country_name', 'states.name as state_name', 'cities.name as city_name'
  , 'streets.name as street_name'
  ,'categories.name as category_name',
  'sub.name as sub_category_name')->limit(6)
  ->get();
//   multiimages
//   $multi_image=DB::table('product_images')
//   ->join('products','product_images.product_id','=','products.id')
//   ->select('product_images.product_id as  ')
//   ->get();
   $city=DB::table('cities')
   ->leftJoin('products', 'cities.id', '=', 'products.city_id')
   ->select('cities.image as city_image','cities.name as city_name','cities.id as city_id',DB::raw('COUNT(products.id) as product_count'))
   ->groupBy('cities.id', 'cities.name')
   ->limit(6)->get();
   $header=DB::table('headers')->get();
   $contants = DB::table('contants')->get();
   $footers=DB::table('footers')->get();
   $about = DB::table('abouts')->get();
   $categories = DB::table('categories')
   ->select('categories.image as category_image','categories.name as category_name')
   ->get();
 //return $products;
  return view('home.home',compact('sub_categories','sliders','products','header','categories','city','about','contants','footers'));

}



    public function contant()
    {
        $about =DB::table('abouts')->get();
        $footers = DB::table('footers')->get();
        $contants = DB::table('contants')->get();
        return view('home.contant',compact('contants','footers','about'));
    }
    public function about()
    {
        $contants= DB::table('contants')->get();
    $about =DB::table('abouts')->get();
    $footers = DB::table('footers')->get();
        return view('home.about',compact('about','contants','footers'));
    }


    public function filter(Request $request)
    {

        $categories = DB::table('categories')->get();
        $subcategories = DB::table('sub_categories')->get();
        $countries = DB::table('countries')
        ->get();
        $cities = DB::table('cities')->get();
        $states = DB::table('states')->get();
        $streets = DB::table('streets')->get();
        $about = DB::table('abouts')->get();
        $contants = DB::table('contants')->get();
        $footers =DB::table('footers')->get();


        $query = Product::query();

        if ($request->has('categories')) {
            $query->where('category_id', $request->input('category'));

        }

        if ($request->has('sub_categories')) {
            $query->where('sub_categories_id', $request->input('sub_categories'));
        }
        if ($request->has('states')) {
            $query->where('state_id', $request->input('state'));
        }
        if ($request->has('street')) {
            $query->where('street_id', $request->input('street'));
        }

        if ($request->has('city')) {
            $query->where('city_id', $request->input('city'));
        }

        if ($request->has('product_name')) {
            $query->where('name', 'like', '%' . $request->input('product_name') . '%');
        }

        $products = $query->get();

      //return $request;
        return view('home.filter', compact('categories', 'products','subcategories', 'streets','states', 'cities', 'products','about','contants','footers'));
    }


    // public function profile()
    // {
    //     return view('home.profile');
    // }




//task colour

// public function task()
// {
//     $cards = Session::get('cards');

//     // Generate new card colors if they don't exist in session
//     $colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
//     $countingWords = ['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Part I', 'Part II'];
//     $cards = [];

//     for ($i = 0; $i < 12; $i++) {
//         $randomColor = Arr::random($colors);
//         $cards[$countingWords[$i]] = $randomColor;
//     }

// }
}

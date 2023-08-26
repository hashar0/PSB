<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class CitylistingController extends Controller
{
    public function city_listing(Request $request){
        // return $request;
        $listing=DB::table('products')->where('city_id',$request->city_id)->get();

        $products = Product::join('countries', 'products.country_id', '=', 'countries.id')
        ->join('states', 'products.state_id', '=', 'states.id')
        ->join('cities', 'products.city_id', '=', 'cities.id')
        ->join('prices','products.price_id','=','prices.id')
        ->join('types','products.type_id','=','types.id')
        ->join('streets', 'products.street_id', '=', 'streets.id')
        ->join('users','products.user_id','=','users.id')

        //where used then data based login in user id
        //->where('products.user_id',Auth::id())
        ->join('categories','products.cat_id','=','categories.id')
        ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
        ->select('products.*','prices.price as price_name','types.types as types_name'
        ,'countries.name as country_name', 'states.name as state_name', 'cities.name as city_name'
        , 'streets.name as street_name'
        ,'categories.name as category_name',
        'sub.name as sub_category_name')
        ->get();

     return view('home.city_listing',compact('listing','products'));
    }
}

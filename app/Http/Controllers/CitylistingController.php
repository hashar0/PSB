<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class CitylistingController extends Controller
{
    public function city_listing(Request $request){

        $listing=DB::table('products')
        ->join('prices','products.price_id','=','prices.id')
        ->join('countries', 'products.country_id', '=', 'countries.id')
       ->select('products.*','prices.price as price_name'
        ,'countries.name as country_name')
        ->where('city_id',$request->city_id)->get();
        // $products = Product::with('ads')->get();




//        return  $listing;


     return view('home.city_listing',compact('listing'));
    }
}

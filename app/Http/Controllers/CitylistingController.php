<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class CitylistingController extends Controller
{
    public function city_listing(Request $request,$id){

        $listings=DB::table('products')
        ->join('states', 'products.state_id', '=', 'states.id')
        ->join('cities', 'products.city_id', '=', 'cities.id')
       ->join('countries', 'products.country_id', '=', 'countries.id')
        ->select('products.*','states.name as state_name', 'cities.name as city_name'
        ,'countries.name as country_name',)

       ->where('city_id',$id)
       ->get();
       $about=DB::table('abouts')->get();
        $contants=DB::table('contants')->get();
        $footers=DB::table('footers')->get();


      // return $listings;
        return view('home.city_listing',compact('listings','about','contants','footers'));

    }


}

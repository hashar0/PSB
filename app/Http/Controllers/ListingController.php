<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\{Category, Country,Product,ProductImage};
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingController extends Controller
{
   // add listing
    public function add_listing()
    {
       $country=DB::table('countries')->get();
       $state=DB::table('states')->get();
       $city=DB::table('cities')->get();
       $category=DB::table('categories')->get();
       $sub_categories=DB::table('sub_categories')->get();
       $data['country']=Country::get(['name','id']);
       $price=DB::table('prices')->get();
       $types=DB::table('types')->get();

    $products = Product::select('products.*', 'users.name as user_name','countries.name as country_name', 'states.name as state_name', 'cities.name as city_name', 'streets.name as street_name','categories.name as category_name','prices.price as price_name')
    ->leftJoin('countries', 'products.country_id', '=', 'countries.id')
    ->leftJoin('states', 'products.state_id', '=', 'states.id')
    ->leftJoin('cities', 'products.city_id', '=', 'cities.id')
    ->leftJoin('streets', 'products.street_id', '=', 'streets.id')
    ->leftJoin('users', 'products.user_id', '=', 'users.id')
    ->leftJoin('categories','products.cat_id','=','categories.id')
    ->leftJoin('sub_categories','products.subcat_id','=','sub_categories.id')
     ->leftJoin('prices','products.price_id','=','prices.id')
    ->leftJoin('types','products.type_id','=','types.id')
    ->get();
   // return $products;
        return view('home.listing',compact('data','category','country','state','city','category','sub_categories','price','types'));
    }
    // detail listing
    public function detail($id)
    {



       //$products = Product::find($id);
        $product = Product::join('countries', 'products.country_id', '=', 'countries.id')
        // ->join('users','products.user_id','=','user.id')
       // ->where('products.user_id',Auth::id())
       //->where('product_images','image_path')
         ->join('states', 'products.state_id', '=', 'states.id')
        ->join('cities', 'products.city_id', '=', 'cities.id')
         ->join('streets', 'products.street_id', '=', 'streets.id')
         ->join('users','products.user_id','=','users.id')
         ->join('categories','products.cat_id','=','categories.id')
        ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
         ->leftjoin('prices','products.price_id','=','prices.id')
         ->leftjoin('types','products.type_id','=','types.id')
        ->select('products.*','types.types as types_name','prices.price as price_name','countries.name as country_name', 'states.name as state_name', 'cities.name as city_name', 'streets.name as street_name','users.name as user_name','users.profile_image as user_image'
        ,'categories.name as category_name',
        'sub.name as sub_category_name')
        ->where('products.id', $id)
        ->first();

      $related =  Product::join('countries', 'products.country_id', '=', 'countries.id')
      // ->join('users','products.user_id','=','user.id')
     // ->where('products.user_id',Auth::id())
     //->where('product_images','image_path')
       ->join('states', 'products.state_id', '=', 'states.id')
       ->join('cities', 'products.city_id', '=', 'cities.id')
       ->join('streets', 'products.street_id', '=', 'streets.id')
       ->join('users','products.user_id','=','users.id')
       ->join('categories','products.cat_id','=','categories.id')
       ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
       ->leftjoin('prices','products.price_id','=','prices.id')
       ->leftjoin('types','products.type_id','=','types.id')
       ->select('products.*','types.types as types_name','prices.price as price_name','countries.name as country_name', 'states.name as state_name', 'cities.name as city_name', 'streets.name as street_name','users.name as user_name','users.profile_image as user_image'
       ,'categories.name as category_name',
       'sub.name as sub_category_name',)
       ->where('products.subcat_id', $product->subcat_id)
       ->where('products.id','!=',$id)
       ->get();
       // return $related;
         return view('home.detail',compact('product','related'));
    }


    public function store(Request $request)
    {
      //return $request;

        $imagePath = null;
            // single image on product
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/thumbimage/'), $imageName);
            $imagePath = '/uploads/thumbimage/' . $imageName;
        }

        $product = Product::create([
            'name' => $request->name,
            'age' => $request->age,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'country_id'=> $request->country,
            'state_id'=> $request->state,
            'city_id'=> $request->city,
            'street_id'=> $request->street,
            'price_id' => $request->price,
            'type_id'=> $request->type,
            'cat_id'=>$request->category,
            'subcat_id'=>$request->subcategory,
            // user id import in auth
            'user_id' => Auth::id(),
        ]);

         //multi_images
        // return $product->id;
       //  dd($request->all());
        foreach ($request->file('images') as $image) {
        $path = $image->store('/uploads/multi_image/');

        ProductImage::create([
            'product_id' => $product->id,
            'image_path' => $path,
        ]);
    }

    return redirect()->route('profile')->with('message','Product add successfully');
}
// work
public function country(){
    $countries = DB::table('countries')->orderBy('name','ASC')->get();
    $data['countries'] = $countries;
    return view('home.listing',$data);
}

public function fetchStates($country_id = null) {
    $states = DB::table('states')->where('country_id',$country_id)->get();

    return response()->json([
        'status' => 1,
        'states' => $states
    ]);
}

public function fetchCities($state_id = null) {
    $cities = DB::table('cities')->where('state_id',$state_id)->get();

    return response()->json([
        'status' => 1,
        'cities' => $cities
    ]);
}

public function fetchStreets($city_id = null) {
    $streets = DB::table('streets')->where('city_id',$city_id)->get();

    return response()->json([
        'status' => 1,
        'streets' => $streets
    ]);
}


}

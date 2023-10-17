<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request, $id)
    {

        $products = Product::find($id);
        $data=$request->all();

        // $imagePath = null;
            // single image on product
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/thumbimage/'), $imageName);
            $data['image'] = '/uploads/thumbimage/' . $imageName;
        }
       //return $request;
     // dd($request->all());
     //multi_image
       if($request->hasFile('images')){
        ProductImage::where('product_id',$id)->delete();
        foreach ($request->file('images') as $image) {
            $mimageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/multi_image/'), $mimageName);
            $path = '/public/uploads/multi_image/' . $mimageName;
            ProductImage::create([
                'product_id' => $id,
                'image_path' => $path,

            ]);
            }
       }
        $products->update($data);

        return redirect('/profile')->with('success','Product Updated Successfully!');
    }

public function edit($id){

    // $products= Product::find($id);
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
        ->find($id);

    $country=DB::table('countries')->get();
    // $state=DB::table('states')->get();
    // $city=DB::table('cities')->get();
    $category=DB::table('categories')->get();
    // $sub_categories=DB::table('sub_categories')->get();
    $data['country']=Country::get(['name','id']);
    $types=DB::table('types')->get();
    $about=DB::table('abouts')->get();
    $contants=DB::table('contants')->get();
    $footers=DB::table('footers')->get();

//   return $products;
     return view('home.editprofile',compact('contants','footers','products','about','types','category','data'));
 }

    public function delete($id){

        $products=product::findOrFail($id);
        $products->delete();
        return redirect()->route('profile');
    }
}

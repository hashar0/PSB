<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->name = $request->input['name'];
        $products->age = $request->input['age'];
        $products->type = $request->input['type'];
        $products->price = $request->input['price'];
        $products->category = $request->input['category'];
        $products->sub_category = $request->input['sub_categories'];
        $products->country = $request->input['country'];
        $products->state = $request->input['state'];
        $products->province = $request->input['province'];
        $products->city = $request->input['city'];
        $products->description = $request->input['description'];



        $products->update();

        return redirect()->route('profile');
    }




public function edit($id){

    $products= Product::find($id);
    $country=DB::table('countries')->get();
    $state=DB::table('states')->get();
    $city=DB::table('cities')->get();
    $category=DB::table('categories')->get();
    $sub_categories=DB::table('sub_categories')->get();
    $data['country']=Country::get(['name','id']);
    $types=DB::table('types')->get();
    $about=DB::table('abouts')->get();
    $contants=DB::table('contants')->get();
    $footers=DB::table('footers')->get();
   //return $products;
     return view('home.editprofile',compact('contants','footers','products','about','types','category','sub_categories','data'));
 }

    public function delete($id){

        $products=product::findOrFail($id);
        $products->delete();
        return redirect()->route('profile');
    }
}

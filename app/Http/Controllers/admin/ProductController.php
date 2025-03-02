<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\ProductImage;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Request $request )
{

    $products = Product::join('countries', 'products.country_id', '=', 'countries.id')
        ->join('states', 'products.state_id', '=', 'states.id')
        ->join('cities', 'products.city_id', '=', 'cities.id')
        ->join('streets', 'products.street_id', '=', 'streets.id')
        ->join('users','products.user_id','=','users.id')
        ->join('categories as cat','products.cat_id','=','cat.id')
        ->leftjoin('sub_categories as sub','products.subcat_id','=','sub.id')
        ->leftjoin('types','products.type_id','=','types.id')
        ->select('products.*','types.types as types_name','countries.name as country_name', 'states.name as state_name', 'cities.name as city_name', 'streets.name as street_name','users.name as user_name'
        ,'cat.name as category_name','sub.name as sub_categories_name')
        ->get();
    //    return $products;
    // $sub=SubCategory::get();
    //  return $sub;
    return view ('admin..product.index',compact('products'));
}
public function create()
{
    return view ('admin..product.create');
}
 public function store(Request $request )
{
    //save in url
    // $name=strtolower($request->name);
    // $url=str_replace('','-',$name);
    // $url=$url.'-t'.time().'-r'.rand();

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
            'price' =>$request->price,
            'description' => $request->description,
            'image' => $imagePath,

        ]);
       //return $request;
     // dd($request->all());
     //multi_image
       foreach ($request->file('images') as $image) {
        $mimageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/multi_image/'), $mimageName);
            $path = '/public/uploads/multi_image/' . $mimageName;
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,

            ]);
        }
 return redirect()->route('prdct.index')->with('message','Product add successfully');
}
public function edit($id)
{
$product=Product::find($id);
$products= new Product;
return view('admin..product.create',compact('product'));
}
public function update(Request $request,$id)
{$product=Product::find($id);
$data=$request->all();
$product->update($data);
return redirect()->route('prdct.index');
}
public function delete($id){
$product=Product::find($id);
//$data=$request->all();
$product->delete();
return redirect()->route('prdct.index');
}
}

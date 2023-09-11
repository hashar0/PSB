<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WishlistController extends Controller
{
    public function index(){
        $about=DB::table('abouts')->get();
        $contants=DB::table('contants')->get();
        $footers=DB::table('footers')->get();

        $wishlist=Wishlist::where('user_id' , Auth::id())->get();

        return view('home.wishlist',compact('about','contants','footers','wishlist'));
    }

    public function add(Request $request)

    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
             if(Product::find($product_id))
             {
                $wish = new Wishlist();
                $wish->product_id= $product_id;
                $wish->user_id=Auth::id();
                $wish->save();
                return response()->json(['message'=>'Product Added to Wishlist']);
            }
            else{
                return response()->json(['message'=>'Product doesnot exit']);
            }
        }
        else
        {
            return response()->json(['message'=>'login to Continue']);

        }
return $request;
    }
}

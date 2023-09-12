<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WishlistController extends Controller
{
    public function viewWishlist(){

        $about=DB::table('abouts')->get();
        $contants=DB::table('contants')->get();
        $footers=DB::table('footers')->get();


        if (auth()->check()) {

            $wishlist = Wishlist::where('user_id', auth()->id())->with('product')
            ->get();


           // return $wishlist;
            return view('home.wishlist', compact('about','contants','footers','wishlist'));
        }

       return redirect()->route('login')->with('error', 'You must be logged in to view your wishlist.');

    }

    public function addToWishlist(Product $product)
    {

        {
           if (auth()->check()) {
                $wishlist = new Wishlist([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                ]);
                $wishlist->save();

                return redirect()->back()->with('success', 'Product added to wishlist.');
            }

            return redirect()->back()->with('error', 'You must be logged in to add to the wishlist.');
        }
    }
}

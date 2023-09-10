<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Wishlist;


use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Product $product)
{
    auth()->user()->wishlist()->attach($product->id);
    return redirect()->back()->with('success', 'Product added to wishlist.');
}

public function index()
{
    $wishlist = auth()->user()->wishlist;
    return view('wishlist.index', compact('wishlist'));
}
}

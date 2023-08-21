<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(){
        $price=DB::table('prices')->get();
        return view('home.price.index',compact('price'));
    }
    public function create(){
        return view('home.price.create');
    }
    public function store(Request $request){

        $price = Price::create([
         'price'=>$request->price,
        ]);

        $price;
        return redirect()->route('price.index')->with('message','Add Price Successfully');
    }

    public function delete($id){
        $price=Type::find($id);
        $price->delete();
        return redirect()->route('price.index');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Contant;
use Illuminate\Http\Request;

class ContantController extends Controller
{
    public function index(){
        $contants = DB::table('contants')->get();
        return view('home.contant.index',compact('contants'));

    }
    public function create(){

        return view('home.contant.create');

    }

    public function store(Request $request)
{
    $data = Contant::create([
        'location' => '$request->location',
        'city' => '$request->city',
        'district' => '$request->district',
        'email' => '$request->email',
        'phone' => '$request->phone',
    ]);
    $data->save();
    return redirect()->route('contant.index')->with('message','Contact information saved successfully.');

}

public function delete($id){

    $contants=Contant::find($id);

    //$data=$request->all();
    $contants->delete();
    return redirect()->route('contant.index');

}
public function edit($id) {

    $contants = Contant::find($id);

    // $about= new About;
     return view('home.contant.create',compact('contants'));
}




}

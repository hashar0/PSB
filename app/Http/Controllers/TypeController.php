<?php

namespace App\Http\Controllers;

use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TypeController extends Controller
{
    public function index(){
        $types=DB::table('types')->get();
        return view('home.type.index',compact('types'));
    }
    public function create(){
        return view('home.type.create');
    }
    public function store(Request $request){

        $types = Type::create([
            'types' => $request->types,
        ]);
       $types;
        return redirect()->route('type.index')->with('message','Add Type Successfully');

    }

    public function delete($id){
    $types=Type::find($id);
    $types->delete();
    return redirect()->route('type.index');

    }
}

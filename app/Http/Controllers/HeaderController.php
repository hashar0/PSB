<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    public function index() {

    $header=DB::table('headers')->get();

      return view('home.header.index',compact('header'));
    }

    Public function create(){


        return view('home.header.create');
    }

    public function store(Request $request)
    {

        $header = Header::create([
            'heading' => $request->heading,
            'paragraph' => $request->paragraph,
        ]);
        $header;
        // return "$heading";

        return redirect()->route('head.index')->with('message','Product add successfully');
    }

    public function delete($id){
        $header=Header::find($id);
        $header->delete();
        return redirect()->route('head.index');

    }


}

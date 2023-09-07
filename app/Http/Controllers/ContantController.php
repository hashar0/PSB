<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContantController extends Controller
{
    public function create(){
        return view('home.contant.create');
    }

    public function index(){
return view('home.contant.index');
    }
}

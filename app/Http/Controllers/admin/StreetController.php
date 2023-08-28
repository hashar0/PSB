<?php

namespace App\Http\Controllers\admin;
use App\Models\Street;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StreetController extends Controller
{
    public function index(Request $request )
    {
        $streets=DB::table('streets')
        ->join('cities', 'streets.city_id', '=', 'cities.id')
        ->select('cities.name as city_name','streets.name as name')

        ->get();
       // return $streets;
        return view('admin..street.index',compact('streets'));
    }
    public function create()
    {
        $cities=DB::table('cities')->get();
        return view('admin..street.create',compact('cities'));
    }
    public function store(Request $request)
    {

        $data=$request->all();
        Street::create($data);
    return redirect()->route('st.index');

    }

    public function edit($id)
    {
        $streets=Street::find($id);
    $streets=new Street;
    return view('admin..street.create',compact('streets'));
    }
    public function update(Request $request,$id){

    $$streets=Street::find($id);

    $data=$request->all();
    $$streets->update($data);
    return redirect()->route('st.index');

    }

    public function delete(Request $request,$id){

    $$streets=Street::find($id);

    //$data=$request->all();
    $streets->delete();
    return redirect()->route('st.index');

    }
}

<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request )

    {

        $state=DB::table('states')
        ->join('countries', 'states.country_id', '=', 'countries.id')
        ->select('countries.name as country_name','states.name as name')
        ->get();

      // return $state;
        return view('admin..state.index',compact('state'));
    }


    public function create()
    {
        $country=DB::table('countries')->get();
        return view('admin..state.create',compact('country'));
    }
    public function store(Request $request)
    {

        $data=$request->all();
        State::create($data);
    return redirect()->route('sa.index');

    }

    public function edit($id)
    {
    $state=State::find($id);
    $state=new State;
    return view('admin..state.create',compact('state'));
    }
    public function update(Request $request,$id){
    $state=State::find($id);
    $data=$request->all();
    $state->update($data);
    return redirect()->route('sa.index');
    }

    public function delete(Request $request,$id){

    $state=State::find($id);

   // $data=$request->all();
    $state->delete();

    return redirect()->route('sa.index');

    }
    // public function add_state()
    // {
    //     $categories = State::all();

    //     return view('home.add_state', compact('categories'));
    // }
}

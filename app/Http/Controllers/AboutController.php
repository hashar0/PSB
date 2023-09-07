<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('abouts')->get();
        return view('home.about.index',compact('about'));
    }
      public function create()
      {
       return view('home.about.create');
      }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'paragraph' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        if($request->has('image')){
            $file_name = time();      //return timespan

            $picture = $request->image;
            // $file_name = rand();  // randum generate
            $file_name = sha1($file_name);  // algorithum different string generate

                $ext = $picture->getClientOriginalExtension();
                $file_name = $file_name.".".$ext;
                $picture -> move(public_path()."/uploads/about/",$file_name);

                $image_path = '/uploads/about/'.$file_name;
            $data['image'] = $image_path;
            }
        About::create($data);


        //return $request;
       return redirect()->route('about.index')->with('message','About add successfully');
    }


    public function delete($id){

        $about=About::find($id);

        //$data=$request->all();
        $about->delete();
        return redirect()->route('about.index');

    }
    public function edit($id) {

        $about = About::find($id);

        // $about= new About;
         return view('home.about.create',compact('about'));
    }

    public function update(Request $request,$id) {

        $about = About::find($id);

        $data= $request -> all();
        $about -> update($data);
        return redirect() -> route('about.index');
    }
}

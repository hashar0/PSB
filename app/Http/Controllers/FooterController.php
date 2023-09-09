<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Footer;
use Illuminate\Http\Request;


class FooterController extends Controller
{
   public function index()
   {
    $footers=DB::table('footers')->get();
    return view('home.footer.index',compact('footers'));
   }
   public function create()
   {
    return view('home.footer.create');
   }
   public function store(Request $request)
   {
    $data = $request->validate([
      'name' => 'required|string',
      'link' => 'required|string',

  ]);
  if($request->has('icon')){
      $file_name = time();      //return timespan

        $picture = $request->icon;
       // $file_name = rand();  // randum generate
        $file_name = sha1($file_name);  // algorithum different string generate

          $ext = $picture->getClientOriginalExtension();
          $file_name = $file_name.".".$ext;
          $picture -> move(public_path()."/uploads/icon/",$file_name);

          $image_path = '/uploads/icon/'.$file_name;
         $data['icon'] = $image_path;
      }
  Footer::create($data);
  return redirect()->route('footer.index')->with('success','WhatsApp contact created successfully');
  }


  public function delete($id){

    $footers=Footer::find($id);

    //$data=$request->all();
    $footers->delete();
    return redirect()->route('footer.index');

}
public function edit($id) {

    $footers = Footer::find($id);

    // $about= new About;
     return view('home.footer.create',compact('footers'));
}

public function update(Request $request,$id) {

    $footers = Footer::find($id);

    $data= $request -> all();
    $footers-> update($data);
    return redirect() -> route('footer.index');
}
}

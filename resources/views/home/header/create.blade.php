@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($header)? route ('head.update',$header->id) :route ('head.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h5>Heading</h5>
    <div class="m-2">
        <input class="form-control" type="text" name="heading"  value="{{$header->heading}}"  placeholder="Enter the heading">
    </div>
    <h5> Add Paragraph</h5>
    <div class="m-2">
        <textarea class="form-control" name="paragraph"  rows="6" value="{{$header->paragraph}}"  cols="40" width="700px" placeholder="Enter your paragraph here"></textarea>


    </div>







    <button type="submit" class="btn btn-primary mr-2">save</button>






</form>

@endsection

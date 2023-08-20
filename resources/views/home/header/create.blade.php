@extends('adminv2.adminv2master')
@section('content')
<form action="{{route('head.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h4>Paragraph</h4>





    <h5>Heading</h5>

    <div class="m-2">
        <input class="form-control" type="text" name="heading"  value=""  id="" placeholder="Enter the heading">

    </div>
    <h5> Add Paragraph</h5>
    <div class="m-2">
        <textarea class="form-control" name="paragraph" id="paragraph" rows="6" value=""  cols="40" width="700px" placeholder="Enter your paragraph here"></textarea>


    </div>







    <button type="submit" class="btn btn-primary mr-2">save</button>






</form>

@endsection

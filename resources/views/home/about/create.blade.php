@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($about)? route ('about.update',$about->id) :route ('about.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <h5>Add Image</h5>
    <div class="m-2">
        <input class="form-control" name="image" id="image" type="file" value="">
    </div>
    <h5>Heading</h5>
    <div class="m-2">
        <input class="form-control" type="text" name="name" value="" type="text" placeholder="Enter the Name">
    </div>
    <h5>Add Paragraph</h5>
    <div class="m-2">
        <textarea class="form-control" name="paragraph" rows="6" value="" cols="40" width="700px"
            placeholder="Enter your paragraph here"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mr-2">save</button>

</form>

@endsection

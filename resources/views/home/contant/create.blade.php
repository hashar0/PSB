@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($contant)? route ('contant.update',$contant->id) :route ('contant.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf

    <h5><label for="location">Location:</label></h5>
    <div class="m-2">
        <input class="form-control"type="text" name="location" id="location" value="">
    </div>
    <h5><label for="city">City:</label></h5>
    <div class="m-2">
        <input class="form-control" type="text" name="city" id="city" value="">
    </div>

    <h5><label for="district">District:</label></h5>
    <div class="m-2">
        <input class="form-control" type="text" name="district" id="district" value="">
    </div>

    <h5><label for="email">Email:</label></h5>
    <div class="m-2">
        <input class="form-control" type="email" name="email" id="email" value="">
    </div>

    <h5><label for="phone">Phone:</label></h5>
    <div class="m-2">
        <input class="form-control" type="text" name="phone" id="phone" value="">
    </div>

    <button type="submit" class="btn btn-primary mr-2">save</button>

</form>

@endsection

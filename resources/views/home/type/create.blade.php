@extends('adminv2.adminv2master')
@section('content')
<form action="{{route('type.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

 <h5>Type</h5>

    <label>Add Type</label>
<div class="p-3">
    <input class="form-control" name="types" id="types" type="text" placeholder="Enter the Type">
</div>






    <button type="submit" class="btn btn-primary mr-2">save</button>






</form>

@endsection


@extends('adminv2.adminv2master')
@section('content')
<form action="{{route('price.store')}}" method="POST" enctype="multipart/form-data">
    @csrf










    <label>Price</label>
    <div class="p-3">
        <input class="form-control"  type="text" name="price" id="price" placeholder="Enter the Price">
    </div>





    <button type="submit" class="btn btn-primary mr-2">save</button>






</form>

@endsection


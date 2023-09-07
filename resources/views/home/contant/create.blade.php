@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($contant)? route ('contant.update',$contant->id) :route ('contant.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf


    <button type="submit" class="btn btn-primary mr-2">save</button>

</form>

@endsection

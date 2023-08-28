@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($Category)? route ('sta.update',$Category->id) :route ('sta.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <h4>City</h4>
    <p class="card-description">
        Add City
    </p>
    <div class="form-group">

        <input class="form-control" type="text" value="{{isset($Category)?$Category->name:''}}" name="name"
            placeholder="Enter the name">
        <br>

        <select name="state_id" id="state_id" class="form-control @error('type') is-invalid @enderror" required>
            <option value="">Select State</option>
            @foreach ($state as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach

        </select>
        <br>
    </div>
    <p class="card-description">
        Add City Image
    </p>
    <div class="form-control  m-2">
        <input type="file" name="image" id="image" accept="image/*" multiple required>
    </div>
    <br>
    <button type="submit" class="btn btn-primary mr-2">save</button>


</form>


@endsection

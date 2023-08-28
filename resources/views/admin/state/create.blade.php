@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($Category)? route ('sa.update',$Category->id) :route ('sa.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf

    <h4>State Form</h4>

    <p class="card-description">
        Add State
    </p>

    <div class="form-group">
        <input class="form-control" type="text" value="{{isset($Category)?$Category->name:''}}" name="name"
            placeholder="Enter the name">
        <br>

        <select name="country_id" id="country_id" class="form-control @error('type') is-invalid @enderror" required>
            <option value="">Select Country</option>
            @foreach ($country as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

    </div>
    <br>
    <button type="submit" class="btn btn-primary mr-2">save</button>


</form>


@endsection
{{-- <select class="form-control" name="category_id" class="form-select" id="inlineFormSelectPref">
                @foreach ($category as $category )

                <option {{$sub_categories->category_id==$category->id?'selected':''}} value="{{$category->id}}">
{{$category->name}}</option>

@endforeach

</select> --}}

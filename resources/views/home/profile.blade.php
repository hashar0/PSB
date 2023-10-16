@extends('home.master')
@section('content')
@if(session('message'))
<div class="alert alert-success">{{ session('message')}}</div>
@endif
<div class="col-md-12 bg-dark p-4">

    <div class="text-center text-white">
        <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>
<br>
<div class="container ">
    <form action="{{ route('profile.update') }}" method="POST" id="profile_setup_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 bg-dark p-2">
                <div class="text-white text-center">
                    <h4>Profile Update</h4>
                </div>
            </div>

        </div>

        {{-- make listing --}}
        <div class="p-2 text-end">
            <a type="submit" class="btn btn-primary" href="{{ route('add_listing')}}">listing Create</a>
        </div>

        {{-- image --}}
        <div class="row">
            <div class="col-md-5 p-4">
                <div class="form-group">
                    <div class="p-3 container">
                        {{-- profile image --}}
                        @if (Auth::user()->profile_image)
                        <img src="{{asset('uploads/profile/'.Auth::user()->profile_image)}}"
                            class="rounded-circle shadow-6-strong" width="200px" height="200px" alt="Image">
                        @else
                        <img src="{{asset("uploads/profile/admin.png")}}" class="rounded-circle shadow-4-strong"
                            width="160px" height="160px" id="image_preview_container" alt="Image">
                        @endif

                    </div>
                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                </div>
            </div>
            <div class="col-md-7 p-4">
                <div class=" shadow card bg-light">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" id="name" class="form-control"
                                value="{{ Auth::user()->last_name }}" required>

                        </div>
                        {{-- phone number --}}
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="number" name="phone" id="phone" class="form-control"
                                value="{{ Auth::user()->phone }}" required>
                        </div>
                        {{-- Address --}}
                        {{-- <div class="form-group">
                            <label for="text">Address:</label>
                            <textarea type="address" name="address" id="address" class="form-control"
                                value="{{ Auth::user()->address }}" cols="3" rows="5" required
                        placeholder="Enter the Address"></textarea>
                    </div> --}}
                </div>
                <div class="m-4">
                    <button type="submit" id="btn" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

{{-- listing list --}}

<div class="container">
    <h2 class="p-3 text-center bg-dark text-white"><b>Your Listing List</h2>
    <div class="p-2 row">

        @foreach ($products as $product)
        <div class="p-3 col-md-4">
            <div class="card p-3 shadow" style="width: 20rem;">
                <img href="#" src="{{$product->image}}" class="card-img-top" alt="Arrow Picture" alt="" height="200px">
                <div class="row">
                    <div class="coltext-">
                        <h4 class="fw-bold card-title text-info">{{$product->name}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="card-text text-dark" title="Name">Price</h5>
                    </div>
                    <div class="col">
                        <h6 class="text-dark">{{$product->price}}month</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="text-dark"> Age</h5>

                    </div>
                    <div class="col">
                        <h6 class="text-dark">
                            {{$product->age}}month</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="text-danger" title="location">
                            {{$product->country_name}},{{$product->state_name}},{{$product->city_name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('edit.profile', ['id' => $product->id]) }}" class="btn btn-primary">Edit
                            Listing</a>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('del.profile', ['id' => $product->id]) }}" type="submit"
                            class="btn btn-danger">Delete</a>
                    </div>

                </div>

            </div>

        </div>
        @endforeach
    </div>
    @endsection

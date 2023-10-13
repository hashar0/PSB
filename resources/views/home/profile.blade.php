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
</div>
</form>
</div>

{{-- listing list --}}


<h2 class="text-center"><b>Your Listing List</h2>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-3 mt-3  m-2 card shadow">

            <a class="nav-link" href="{{url('details'.'/'.$product->id)}}">
                {{-- <span class="badge bg-warning image-text text-black">Featured</span> --}}
                <img href="#" src="{{$product->image}}" width="253px" height="253px" class="card-arrow"
                    alt="Arrow Picture" alt="" height="200px">
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-md-10 col-10 mt-1">
                        <h5 class="fw-bold" data-toggle="tooltip" data-placement="right" title="Name">
                            {{$product->name}}</h5>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">
                        <h5 class="" data-toggle="tooltip" data-placement="right" title="Name">
                            Price</h5>

                    </div>
                    <div class="col-lg-6 ">
                        <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                            {{$product->price}}month</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">
                        <h5 class="" data-toggle="tooltip" data-placement="right" title="Name">
                            Age</h5>

                    </div>
                    <div class="col-lg-6 ">
                        <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                            {{$product->age}}month</h6>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-10 col-12 col-md-12 col-sm-12">
                        <p data-toggle="tooltip" data-placement="right" title="location">
                            {{$product->country_name}},{{$product->state_name}},{{$product->city_name}}</p>
                    </div>
                </div>

            </a>

        </div>
        @endforeach
    </div>
</div>
<br>
@endsection

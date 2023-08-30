@extends('home.master')
@section('content')
<div class="col-md-12 bg-dark">
    <div class="card-header p-4 text-center text-white">
        <h2>Detail</h2>
    </div>
</div>
{{--image detail --}}
<div class="p-4">
    <div class="row">
        <div class="col-lg-8 ">
            <div id="image-slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($products as $key => $product)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{$product->image}}" class="d-block w-100 h-90" alt="">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#image-slider" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#image-slider" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card shadow ">
                <div class="form-group">

                    <div class="p-3">
                        @if ($product->user_image)
                        <img src="{{ asset('uploads/profile/' . $product->user_image) }}"
                            class="rounded shadow-4-strong" width="50px" height="50px" alt="'User's Image">
                        @else
                        <img src="{{asset("uploads/profile/admin.png")}}" class="rounded-circle shadow-4-strong"
                            width="50px" height="50px" id="image_preview_container" alt="Image">
                        @endif
                        <span class="p-2">{{$product->user_name}}</span>
                        <hr>
                        <h6>Product Name:</h6>
                        <span class="text-muted p-5">{{$product->name}}</span>
                        <h6>Product Price:</h6>
                        <span class="text-muted p-5">{{$product->price_name}}</span>


                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-lg-8 p-4">
    <div class="card p-3 shadow">
        <div class="row">
            <div class="col-lg-3 col-4">
                <h5>FROM:</h5>
            </div>
            <div class="col-lg-7 col-6"></div>
            <div class="col-lg-2 col-2">
                <span class="float-end badge bg-success">{{$product->created_at}}</span></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                <h5 class="mt-3">LOCATION:</h5>
                <h6 class="text-black-50">
                    {{$product->country_name}},{{$product->state_name}},{{$product->city_name}}
                </h6>
            </div>
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                <h5 class="mt-3">COUNTRY:</h5>
                <h6 class="text-black-50">{{$product->country_name}}</h6>
            </div>
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                <h5 class="mt-3">PROVINCE:</h5>
                <h6 class="text-black-50">{{$product->state_name}}</h6>
            </div>
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                <h5 class="mt-3">CITY:</h5>
                <h6 class="text-black-50">{{$product->city_name}}</h6>
            </div>
        </div>
    </div>
</div>




<div class="col-lg-8 p-4">
    <div class="card  p-4 shadow">
        <div class="row">
            <div class="col-lg-3 col-4">
                <h5>DESCRIPTION:</h5>
            </div>
            <div class="col-lg-7 col-6"></div>
            <div class="col-lg-2 col-2">
                <span class="float-end badge bg-success">{{$product->created_at}}</span></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                <h5 class="mt-3">LOCATION:</h5>
                <h6 class="text-black-50">
                    {{$product->description}}
                </h6>
            </div>
        </div>
    </div>
</div>
{{-- related --}}
<div class="col-lg-8 p-4">
    <div class="card  p-4 shadow">
        <div class="row">
            <div class="col-lg-3 col-4">
                <h5>Related Ads:</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-6 col-md-6 col-sm-6">
                {{-- @foreach ($category as $product)
                <div>
                    <h2>{{ $product->name }}</h2>
                <p>Price: {{ $product->price_name }}</p>
                <!-- Other product details you want to display -->
            </div>
            @endforeach --}}
        </div>
    </div>
</div>
</div>

<br>
@endsection

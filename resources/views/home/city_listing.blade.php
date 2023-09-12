@extends('home.master')
@section('content')
<div class="col-md-12 bg-dark">
    <div class="card-header p-4 text-center text-white">
        <h2>User Listings</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($listings as $product)
        <div class="col-lg-3 mt-3  m-2 card shadow">
            <a class="nav-link" href="{{url('details'.'/'.$product->id)}}">
                <img href="#" src="{{$product->image}}" class="card-img-top"
                alt="Arrow Picture" alt="" height="200px" width="300px">

                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-md-10 col-10 mt-1">
                        <h5 class="fw-bold" data-toggle="tooltip" data-placement="right" title="Name">
                            {{$product->name}}</h5>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-10 col-sm-6 col-6">
                        <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                            {{$product->price_name}}</h6>
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
                            {{$product->country_name}}</p>
                    </div>
                </div>

            </a>

        </div>
        @endforeach

    </div>

</div>
<br>

@endsection

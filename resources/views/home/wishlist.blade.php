@extends('home.master')
@section('content')


<div class="col-md-12 bg-dark my-4">
    <div class="card-header p-4 text-center text-white">
        <h2>My Wishlist</h2>
    </div>
</div>

<div class="container my-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                @if($wishlist->count() > 0)

                @foreach ($wishlist as $item)
                <div class="col-lg-3 mt-3  m-2 card shadow">

                    <a class="nav-link">
                        <img href="#" src="{{$item->product->image}}" class="card-img-top" alt="Arrow Picture" alt=""
                            height="200px" width="300px">

                        <div class="row">
                            <div class="col-lg-10 col-sm-9 col-md-10 col-10 mt-1">
                                <h5 class="fw-bold text-primary" data-toggle="tooltip" data-placement="right" title="Name">
                                    {{$item->product->name}}</h5>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">
                                <h5 class="text-danger" data-toggle="tooltip" data-placement="right" title="Name">
                                    Price</h5>

                            </div>
                            <div class="col-lg-6 ">
                                <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                                    {{$item->product->price}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">
                                <h5 class="text-danger" data-toggle="tooltip" data-placement="right" title="Name">
                                    Age</h5>

                            </div>
                            <div class="col-lg-6 ">
                                <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                                    {{$item->product->age}}month</h6>
                            </div>
                        </div>

                        {{-- <div class="row">

                            <div class="col-lg-10 col-12 col-md-12 col-sm-12">
                                <p data-toggle="tooltip" data-placement="right" title="location">
                                    {{$item->product->country_name}},{{$item->product->state_name}},{{$item->product->city_name}}
                                </p>
                            </div>
                        </div> --}}

                    </a>

                </div>
                @endforeach


                @else
                <p>Your wishlist is empty.</p>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection

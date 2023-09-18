@extends('home.master')
@section('content')
<div class="col-md-12 bg-dark">
    <div class="card-header p-4 text-center text-white">
        <h2>Filter Data</h2>
    </div>
</div>
<div class="container py-4 ">
    <div class="card p-4 shadow">
        <form action="{{ route('/filter') }}" method="GET">

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="product_name">Product Name</label>

                    <input type="text" class="form-control" id="product_name" name="product_name"
                        value="{{ request('search') }}" placeholder="Enter Product Name">

                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="subcategory">Subcategory</label>
                    <select class="form-control" id="subcategory" name="subcategory">
                        <option value="">Select Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="state">State</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="street">Street</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Select Street</option>
                        @foreach ($streets as $street)
                        <option value="{{ $street->id }}">{{ $street->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Apply Filters</button>
        </form>
    </div>


    <hr>

    @if ($products->isEmpty())
    <p>No matching products found.</p>
    @else

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
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
                                {{$product->country_name}},{{$product->state_id}},{{$product->city_name}}</p>
                        </div>
                    </div>

                </a>

            </div>
            @endforeach

        </div>

    </div>


    @endif
</div>
@endsection

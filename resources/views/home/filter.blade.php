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
    {{-- <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-4 card shadow" style="height: 350px">

            <a class="nav-link" href="{{url('details'.'/'.$product->id)}}">

                <img href="#" src="{{$product->image}}" class="badge bg-dark image-text text-black card-img-top"
                    alt="Arrow Picture" alt="" height="200px" width="300px">
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-md-10 col-10 mt-1">
                        <h5 class="fw-bold" data-toggle="tooltip" data-placement="right" title="Name">
                            {{$product->name}}</h5>

                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-2 col-2">


                        <form method="POST" action="{{ route('wishlist.add', $product) }}">
                            @csrf
                            <button type="submit" data-toggle="tooltip" data-placement="right" title="Add To Favourites"
                                class="mt-1 float-end btn btn-sm btn-white"><i class="fa fa-heart"
                                    style="font-size:18px; color: red;"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">

                        <h5 class="text-dark" data-toggle="tooltip" data-placement="right" title="Name"><i
                                class="fa-solid fa-tag"></i><span class="text-danger"> Price</span></h5>
                    </div>
                    <div class="col-lg-6 ">
                        <h6 data-toggle="tooltip" data-placement="right" title="" name="price" class="text-dark">
                            {{$product->price}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-9 col-md-10 col-10 ">
                        <h5 class="text-danger" data-toggle="tooltip" data-placement="right" title="Name"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                <path
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0Zm2 4a2 2 0 1 0-2.95 1.76 1.87 1.87 0 0 0-.32.24H3.75a.75.75 0 0 0 0 1.5h2.363l-.607 5.67a.75.75 0 1 0 1.49.16l.25-2.33h1.508l.25 2.33a.75.75 0 0 0 1.492-.16L9.888 7.5h2.362a.75.75 0 0 0 0-1.5H9.27a1.98 1.98 0 0 0-.32-.24A2 2 0 0 0 10 4Z">
                                </path>
                            </svg>
                            Age</h5>

                    </div>
                    <div class="col-lg-6 ">
                        <h6 data-toggle="tooltip" data-placement="right" title="" class="text-dark">
                            {{$product->age}}month</h6>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-10 col-12 col-md-12 col-sm-12">
                        <p data-toggle="tooltip" data-placement="right" title="location "><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                <path
                                    d="m12.596 11.596-3.535 3.536a1.5 1.5 0 0 1-2.122 0l-3.535-3.536a6.5 6.5 0 1 1 9.192-9.193 6.5 6.5 0 0 1 0 9.193Zm-1.06-8.132v-.001a5 5 0 1 0-7.072 7.072L8 14.07l3.536-3.534a5 5 0 0 0 0-7.072ZM8 9a2 2 0 1 1-.001-3.999A2 2 0 0 1 8 9Z">
                                </path>
                            </svg>
                            {{$product->state_name}},{{$product->city_name}}</p>
                    </div>
                </div>

            </a>

        </div>
        @endforeach
    </div> --}}
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

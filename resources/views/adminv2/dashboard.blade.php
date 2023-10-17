@extends('adminv2.adminv2master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{Auth::user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col grid-margin transparent">
            <div class="row">
                <div class="col mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">UAll User's</p>
                            <p class="fs-30 mb-2">{{Auth::user()->count()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">All Categories</p>
                            <p class="fs-30 mb-2">{{$category->count()}}</p>

                        </div>
                    </div>
                </div>

                <div class="col mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">All Sub_Categories</p>
                            <p class="fs-30 mb-2">{{$sub_categories->count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">All City</p>
                            <p class="fs-30 mb-2">{{$city->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Top Products</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key=> $product)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td><img src="{{$product->image}}" alt="image"></td>

                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->description}}</td>




                                </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

@endsection

@extends('home.master')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($listings as $product)
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
                    <div class="col-lg-2 col-sm-3 col-md-2 col-2">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="HKyQhvtxEHWiqQ7X1tWj0Rhi37gi5tHu6Wkb0n2W">
                            <button type="submit" data-toggle="tooltip" data-placement="right" title="Add To Favourites"
                                class="mt-1 float-end btn btn-sm btn-white"><i class="fa fa-heart"
                                    style="font-size:18px; color: red;"></i></button>

                        </form>
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
{{-- <div class="container">
    <div class="row">
        @foreach ($listings as $product)
        <div class="col-lg-3 mt-3">
            <div class="card shadow">
                <div class="item ">
                    <img href="#" src="{{$product->image}}" width="253px" height="253px" class="card-arrow"
alt="Arrow Picture" alt="" height="200px">
<div class="card-body">
    <a href="">{{$product->name}}</a>
    <a href="#">
        <span class="custom-spacing"></span>
        <i class="fa-sharp fa-solid fa-heart" style="color: #e64141; "></i></a>

    <i> <span class="text-dark" href="#" class=" text-muted ">Age</span></i><span
        class="ml-5">{{$product->age}}month</span>
    <br>
    <span class="text-danger">
        <td>{{$product->price_name}}</td>
    </span>

    <br>
    <span class="text-muted"><i class="fa-solid fa-location-arrow"></i>{{$product->country_name}}</span>

</div>
<div class="card-footer">
    <small class="text-muted">

    </small>
</div>

</div>
</div>





</div>
@endforeach

</div>
<br><br>

</div> --}}
@endsection

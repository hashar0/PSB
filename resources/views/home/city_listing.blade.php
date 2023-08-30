@extends('home.master')
@section('content')
<div class="container">
    <div class="container">
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


</div>
<br><br>

</div>
@endsection

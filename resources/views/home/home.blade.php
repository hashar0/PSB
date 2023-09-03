@extends('home.master')
@section('content')

{{-- body --}}
{{--bg color card and text  --}}
<div class="container-fluid">
    <div class="row justify-content-center align-items-center  bg-secondary bg-darken-xs  text-white"
        style="height: 100vh;  ">
        <div class="">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-6 p-5">
                        <div class="mt-5 ">
                            @foreach ($header as $head)
                            <h1 class="font-weight-bold text-danger p-1">{{$head->heading}}</h1>
                            <p class="p-2 fount-size-5">{{$head->paragraph}} </p>
                            @endforeach
                        </div>
                        {{-- Search button --}}
                        <a class="btn btn-danger btn-lg" href="">Get Search</a> &emsp;&emsp;

                    </div>
                    {{-- card  --}}
                    <div class="col-lg-6 ">
                        <div class="card mt-4 p-5">
                            <h3 class="text-dark ">More Than 60K Live Listings <br><span
                                    class="text-dark font-weight-bold ">
                                    From</span><span class="text-danger font-weight-bold"> Categories Items</span></h3>
                            <div class="row">

                                <div class="col-lg-12">
                                    <form action="">
                                        <input type="search" name="search" class="form-control"
                                            placeholder="SEARCH HERE...." name="" id="">
                                    </form>
                                </div>


                                <div class="col-lg-12">

                                    <select name="" class="form-control mt-3" id="">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                        <option value="">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-3">
                                    <a class="btn btn-danger"  type="search" href="">Search </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- scroll images --}}

<div class="col-12 col-md-12 ">
    <div class=" card container shadow">
        <div class="owl-carousel owl-theme " id="slider1">
            @foreach ($sub_category as $sub_category)
            <div class="card container" style="height: 9.3rem">
                <div class="item">
                    <img src="{{ $sub_category->image}}" height="120px" width="120px">
                    <span class="text-center ml-5 p-5 ">{{$sub_category->name}}</span>
                </div>
                <div class="card-footer">

                </div>

            </div>
            @endforeach

        </div>
    </div>

</div>
<br><br><br><br><br><br>
{{-- slider --}}

<div class="container p-2">
    <h6 class="display-6">Advertising</h6>
</div>

<div class="col-12 col-md-12 ">

    <div class="owl-carousel owl-theme" id="slider10">
        @foreach ($sliders as $slider)
        <div class="item">
            <img src="{{$slider->image}}" height="350px" width="350px">
        </div>
        @endforeach


    </div>
</div>
<br><br>
{{-- featuer add --}}
<div class="container">
    <h6 class="display-6 p-3">Featured Ads </h6>
    {{-- <div class="text-end p-2">
        <a href="#"><i>All View</i> </a>
    </div> --}}
</div>

<div class="container">
    <div class="owl-carousel owl-height" id="slider2">
        @foreach ($products as $product)
        <div class="col-lg-12 card shadow" style="height: 350px">

            <a class="nav-link" href="{{url('details'.'/'.$product->id)}}">
                {{-- <span class="badge bg-warning image-text text-black">Featured</span> --}}
                <img href="#" src="{{$product->image}}" class="badge bg-dark image-text text-black card-img-top"
                    alt="Arrow Picture" alt="" height="200px" width="300px">
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
                            {{$product->country_name}},{{$product->state_name}},{{$product->city_name}}</p>
                    </div>
                </div>

            </a>

        </div>
        @endforeach
    </div>
</div>
<br>
<br>
<br>
{{-- RECent add --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h5 class="display-6">Recent Add</h5>
                <hr class="hr-light">
            </div>
        </div>
    </div>
    <div class="row ">

        @foreach($products as $product)
        <div class="col-lg-6 ">
            <a href="{{url('details'.'/'.$product->id)}}" class="nav-link">
                <div class="card flex-row flex-wrap  mt-4 shadow ">

                    <div class="col-lg-4 ">
                        <img src="{{$product->image}}" height="130px" width="130px" alt="">
                    </div>
                    <div class="card-block px-1 col-md-8 ">
                        <h6 class="text-dark">{{$product->name}}<h5>
                                <h6 class="text-danger">{{$product->price_name}}</h6>
                                <p class="text-dark">{{$product->description}} </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <br><br>
    </div>
    <br>
    {{-- add by location --}}
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <h5 class="display-6">Add By Location</h5>
            </div>
            <hr class="hr-light">
            <div class="row">
                @foreach ($city as $category)
                <div class="col-lg-4">
                    <a href="{{url('/city_listing'.'/'.$category->city_id)}}" class="nav-link">
                        <div class="card shadow mb-3">
                            <img src="{{$category->city_image}}" class="card-img-center" alt="country image"
                                height="180px">
                            <div class="card-body">
                                <h6 class="card-title text-center text-dark ">{{$category->city_name}}</h6>
                                <div class="text-center">

                                    <small class="text-muted text-center">({{$category->product_count}}&nbspAds)</small>
                                </div>
                            </div>

                        </div>
                    </a>

                </div>
                @endforeach
            </div>
        </div>

        {{-- Top Categories --}}



        <div class="col-lg-4">
            <div class="container">
                <h5 class="display-6">Top Categories</h5>
            </div>
            <div class="container">
                <hr class="hr-light">
                <div class="card">
                    @foreach ($categories as $key => $category )
                    <div class="d-flex px-4 justify-content-start align-items-center shadow">
                        <img class="card" src="{{$category->category_image}}" height="50px" width="50px"
                            alt="category_image">

                        <div class="col-md-4 ">
                            <div class="card-body d-flex ">

                                <i> <span><a href="#"
                                            class="text-dark px-2 nav-link">{{$category->category_name}}</a></span></i>

                                <div class="p-2 ">
                                    <small class="text-muted  px-5">(11&nbspAds)</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- hahshs --}}






{{-- js --}}
<script>
    $(document).ready(function () {


        $('#slider1').owlCarousel({
            dots: false,
            loop: true,
            margin: 0,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

    })


    $(document).ready(function () {
        $('#slider2').owlCarousel({
            nav: true,
            items: 3,
            margin: 30,
            loop: true,
            dots: true,

            autoplay: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }

        });

    })



    $(document).ready(function () {
        $('#slider4').owlCarousel({
            items: 1,
            dots: true,
            loop: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });


    })

    $(document).ready(function () {
        $('#slider10').owlCarousel({
            dots: true,
            loop: true,
            autoplay: true,
            margin: 0,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })



    })

</script>

@endsection

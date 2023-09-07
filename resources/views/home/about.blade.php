@extends('home.master')
@section('content')

<div class="col-md-12 bg-dark">
    <div class="card-header p-4 text-center text-white">
        <h2>About Us</h2>

    </div>


</div>

<div class="container">
    <div class="row p-3" >

        <div class="col-lg-12">
            @foreach ($about as $us)
            <div class="row">
                <div class="col-lg-6 ">
                    <h2 class="text-primary">{{$us->name}}</h2>
                    <p>{{$us->paragraph}}</p>
                </div>
                <div class="col-lg-6 p-2">
                    <img src="{{$us->image}}" class="img-fluid" alt="About Us Image">
                </div>

            </div>

            @endforeach
        </div>

    </div>
</div>
<br><br>

@endsection

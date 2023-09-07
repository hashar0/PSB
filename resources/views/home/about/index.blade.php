@extends('adminv2.adminv2master')
@section('content')

<div class=" py-2">
    <div class="row">
        <div class="col-12">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ml-1 ">Add About Us</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table table-bordered">
                            <div class="container">
                                <a class="btn btn-primary" href="{{route('about.create')}}">Create</a>

                    </div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>

                            <th>Heading</th>
                            <th>Paragraph</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($about as $key=> $us)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td><img src="{{$us->image}}" alt="About Image" class="rounded float-left"
                                    style="width: 100px ; height:100px"></td>
                            <td>{{$us->name}}
                            <td>
                                {{$us->paragraph}}
                            <td>
                                <a class="btn btn-info" href="{{route('about.edit',$us->id)}}">Edit
                                </a>
                                <a class="btn btn-danger" href="{{route('about.delete',$us->id)}}">Delete</a>
                            </td>
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


@endsection

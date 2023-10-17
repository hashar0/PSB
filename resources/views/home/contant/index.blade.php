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
                    <div class="bg-gradient-primary shadow-primary border-radius-lg p-4">
                        <h4 class="text-white text-capitalize">Contact Detail</h4>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table table-bordered">
                            {{-- <div class="container">
                                <a class="btn btn-primary" href="{{route('contant.create')}}">Create</a>

                            </div> --}}
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contants as $key=> $contant)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{$contant->location}}</td>
                                    <td>{{$contant->city}}</td>
                                    <td>{{$contant->district}}</td>
                                    <td>{{$contant->email}}</td>
                                    <td>{{$contant->phone}}</td>


                                    <td>
                                        <a class="btn btn-info" href="{{route('contant.edit',$contant->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true">
                                        </a>
                                        <a class="btn btn-danger"
                                            href="{{route('contant.delete',$contant->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

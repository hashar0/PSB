@extends('adminv2.adminv2master')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ml-1 ">Add Price</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <div class="container">
                                <a class="btn btn-primary" href="{{route('price.create')}}">Create</a>

                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($price as $key=> $pri)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{$pri->price}}</td>


                                    <td>


                                        <a class="btn btn-danger" href="{{route('price.delete',$pri->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

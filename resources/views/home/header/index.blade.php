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
                        <h6 class="text-white text-capitalize ml-1 ">Add Header</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            {{-- <div class="container">
                                <a class="btn btn-primary" href="{{route('head.create')}}">Create</a>

                            </div> --}}
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Paragraph</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    @foreach ($header as $key=> $head)
                                    <td>{{ ++$key}}</td>
                                    <td>{{$head->heading}}
                                    <td>
                                    <td>{{$head->paragraph}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('head.edit',$head->id)}}">Edit
                                        </a>
                                        {{-- <a class="btn btn-danger" href="{{route('head.delete',$head->id)}}">Delete</a> --}}
                                    </td>
                                    @endforeach
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection

@extends('adminv2.adminv2master')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg p-4">
                        <h4 class="text-white text-capitalize">Address Detail</h4>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <div class="container">
                                <a class="btn btn-primary" href="{{route('address.create')}}">Create</a>

                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>street_id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key=> $category)
                                <tr>
                                    <td>{{ ++$key}}</td>

                                    <td>{{ $category->name}}</td>
                                    <td>{{ $category->street_id}}</td>
                                    <td><a class="btn btn-info"
                                            href="{{route('address.edit',$category->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger"
                                            href="{{route('address.delete',$category->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>

                                @endforeach



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('adminv2.adminv2master')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">&nbsp User Data</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            {{-- <div class="container">
                                <a class="btn btn-primary" href="{{route('sub_cat.create')}}">Create</a>

                    </div> --}}
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th>Profile_Image</th> --}}
                            <th>Name</th>
                            <th>Last_Name</th>
                            <th>E-Mail</th>
                            <th>Date_of_Birth</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Role</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $key=> $user)
                        <tr>
                            <td>{{ ++$key}}</td>
                            {{-- <td><img src="{{$user->profile_image}}" alt=""></td> --}}
                            <td>{{ $user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->date_of_birth}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td><button type="submit" class="btn btn-primary">Demote to User</button></td>
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

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
                                <a class="btn btn-primary" href="{{route('footer.create')}}">Create</a>

                    </div>
                    <thead>
                        <tr>
                            <th>#</th>

                        </tr>
                    </thead>
                    <tbody>




                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



</div>


@endsection

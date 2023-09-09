@extends('adminv2.adminv2master')
@section('content')
<form action="{{ isset($footer)? route ('footer.update',$footer->id) :route ('footer.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="icon">Icon:</label>
        <input type="file" name="icon" id="icon" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="link">Link:</label>
        <input type="url" name="link" id="link" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mr-2">save</button>

</form>

@endsection

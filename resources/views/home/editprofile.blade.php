@extends('home.master')
@section('content')
<form method="post" action="{{ route('lis.update', $products->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="col-lg-12 bg-dark">

        <div class="card-header p-4 text-center text-white">
            <h2>{{ __('Update Listing Data') }}</h2>
        </div>
    </div>


    <p class="card-description">
        Add Product Name
    </p>

    <div class="form-group">
        <input class="form-control" type="text" value="{{$products->name}}" name="name" placeholder="Enter the name"
            required>
    </div>

    <p class="card-description">
        Add Image
    </p>
    <div>
        <div class="form-group">
            <input class="form-control" type="file" id="image" name="image" >
        </div>

    </div>
    <p class="card-description">
        Multi Image
    </p>
    <div>
        <div class="form-group">
            <input class="form-control" type="file" name="images[]" multiple >
        </div>

    </div>
    <p class="card-description">
        Add Age
    </p>
    <div>
        <div class="form-group">
            <input class="form-control" type="number" id="age" name="age" value="{{ $products->age}}"
                placeholder="Enter the Age" >
        </div>
    </div>


    <div class="form-group">
        <label for="">Choose Type</label>
        <select name="type_id" id="type_id" class="form-control @error('types') is-invalid @enderror" >
            <option value="">Select Type</option>
            @foreach ($types as $type )
            <option {{$products->type_id==$type->id?'selected':'' }}  value="{{ $type->id }}">{{ $type->types }}</option>
            @endforeach

        </select>

        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>
    <p class="card-description">
        Add Price
    </p>

    <div class="form-group">
        <input class="form-control" type="number" name="price" id="price" value="{{$products->price}}"
            placeholder="Enter the Price">
    </div>



    {{-- category and sub_category --}}
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="cat_id" id="sub_categories_name" class="form-control @error('category') is-invalid @enderror"
            >
            <option value="">select Category</option>
            @foreach ($category as $category )

            <option {{$products->cat_id==$category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach

    </select>

    @error('category')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    </div>

    <div class="form-group">
        <label for="">Choose Sub-Category</label>
        <select name="subcat_id" id="sub_categories"
            class="form-control @error('sub_categories') is-invalid @enderror">
            @if ($products->subcat_id !=null)
            <option value="{{$products->subcat_id}}">{{$products->sub_category_name}}</option>
            @endif
            <option value="">select</option>
        </select>

        @error('sub_categories')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>



    <p class="card-description">
        Add Country
    </p>

    <div class="form-group">
        <select id="country" name="country_id" required class="form-control  ">
            <option value="" selected>Choose country</option>
            @if(!empty($data['country']))
            @foreach($data['country'] as $country)
            <option {{$products->country_id==$country->id?'selected':''}} value="{{ $country->id }} ">{{ $country->name }}</option>
            @endforeach
            @endif
        </select>
    </div>

    <p class="card-description">
        Add State
    </p>

    <div class="form-group">
        <select id="state" name="state_id" required class="form-control">
            <option value="{{ $products->state_id }} ">{{ $products->state_name }}</option>
            <option value="" >Choose State</option>

        </select>
    </div>

    <p class="card-description">
        Add City
    </p>
    <div class="form-group">
        <select id="city" name="city" required class="form-control">
            <option value="{{ $products->city_id }} ">{{ $products->city_name }}</option>
            <option value="">Choose City</option>

        </select>
    </div>

    <p class="card-description">
        Add Street
    </p>
    <div class="form-group">
        <select id="street" required name="street_id" class="form-control">
            <option value="{{ $products->street_id }} ">{{ $products->street_name }}</option>
            <option value="" >Choose Street</option>

        </select>
    </div>

    <br>
    <p class="card-description">
        Add Description
    </p>
    <div>
        <div class="form-group">
        <textarea class="form-control"  value="" id="description" name="description">{{$products->description}}</textarea>
        </div>

    </div>


    <div><button type="submit" class="btn btn-primary mr-2">Update listing</button></div>
    <br>
</form>






<br>

{{-- js country cities and state --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- country state city and street jquery --}}
<script>
    // token generate
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $("#country").change(function () {
            var country_id = $(this).val();

            if (country_id == "") {
                var country_id = 0;
            }

            $.ajax({
                url: '{{ url("/fetch-states/") }}/' + country_id,
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $('#state').find('option:not(:first)').remove();
                    $('#city').find('option:not(:first)').remove();

                    if (response['states'].length > 0) {
                        $.each(response['states'], function (key, value) {
                            $("#state").append("<option value='" + value['id'] +
                                "'>" + value['name'] + "</option>")
                        });
                    }
                }
            });
        });


        $("#state").change(function () {
            var state_id = $(this).val();

            console.log(state_id);

            if (state_id == "") {
                var state_id = 0;
            }

            $.ajax({
                url: '{{ url("/fetch-cities/") }}/' + state_id,
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $('#city').find('option:not(:first)').remove();

                    if (response['cities'].length > 0) {
                        $.each(response['cities'], function (key, value) {
                            $("#city").append("<option value='" + value['id'] +
                                "'>" + value['name'] + "</option>")
                        });
                    }
                }
            });
        });

        $("#city").change(function () {
            var city_id = $(this).val();

            console.log(city_id);

            if (city_id == "") {
                var city_id = 0;
            }

            $.ajax({
                url: '{{ url("/fetch-streets/") }}/' + city_id,
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $('#street').find('option:not(:first)').remove();

                    if (response['streets'].length > 0) {
                        $.each(response['streets'], function (key, value) {
                            $("#street").append("<option value='" + value['id'] +
                                "'>" + value['name'] + "</option>")
                        });
                    }
                }
            });
        });
        //category
        $('#sub_categories_name').on('change', function () {
            let id = $(this).val();
            $('#sub_categories').empty();
            $('#sub_categories').append(`<option value="0" disabled selected>Processing...</option>`);

            $.ajax({
                type: 'GET',
                url: '/admin/sub_categories/GetSubCatAgainstMainCatEdit/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#sub_categories').empty();
                    $('#sub_categories').append(
                        `<option value="0" disabled selected>Select Sub Categories*</option>`
                    );
                    response.forEach(element => {
                        $('#sub_categories').append(
                            `<option value="${element['id']}">${element['name']}</option>`
                        );
                    });
                }
            });
        });
    })

</script>

@endsection

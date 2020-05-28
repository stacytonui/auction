@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            @if(session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success_msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <form action="/store" method="post" enctype="multipart/form-data">

                @csrf
                <h6 class="text-uppercase">Product Details</h6>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Product Category</label>
                        <select id="category" name="category_id" class="form-control" required>
                            <option disabled>Choose Category...</option>

                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach


                        </select>
                    </div>
                </div>
                <div class="form-row">

                    <label for="image">Upload an image of the product</label>

                        <input type="file" class="form-control-file" id="image" name="image" required>
                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif

                </div>
                <h6 class="text-uppercase mt-3">AUCTION DETAILS</h6>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location of the auction" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date</label>
                        <input id="datepicker" class="form-control" type="date" name="date" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection

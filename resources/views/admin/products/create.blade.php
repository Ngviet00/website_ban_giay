@extends('admin.layouts.app')
@section('content')
    <h2>Create New Product</h2>
    <div class="row">
        <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label> <br>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mt-2">
                <label for="price">Price:</label> <br>
                <input type="text" name="price" class="form-control" id="price" placeholder="Price">
            </div>
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mt-2">
                <label for="">Status:</label> <br>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" checked="checked" name="status" id="status-show" value="1">
                    <label class="form-check-label" for="status-show">Show</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-hide" value="0">
                    <label class="form-check-label" for="status-hide">Hide</label>
                </div>
            </div>
            @error('status')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mt-3">
                <label for="parent_category">Category</label> <br>
                <select class="form-control" id="parent_category" name="category_id">
                    <option value="">--Choose--</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mt-3">
                <label for="file">Image</label> <br>
                <input type="file" accept='image/*' name="image" class="form-control-file" id="file-image" onchange="readURL(this)">

                <div class="wr-image">
                    <img style="max-width: 50%" src="" alt="" id="preview-image">
                </div>
            </div>
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="my-5 btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector("#preview-image").setAttribute("src",e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

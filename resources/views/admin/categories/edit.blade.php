@extends('admin.layouts.app')
@section('content')
    <h2>Edit Category</h2>
    <div class="row">
        <form method="post" action="{{ route('admin.category.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label> <br>
                <input type="text" name="name" value={{ $category->name ?? '' }} class="form-control" id="name" placeholder="Name">
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
{{--            <div class="form-group mt-3">--}}
{{--                <label for="parent_category">Parent Category:</label> <br>--}}
{{--                <select class="form-control" id="parent_category" name="parent_id">--}}
{{--                    <option value="">--Choose--</option>--}}
{{--                    <option value="1">1</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <button type="submit" class="my-5 btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

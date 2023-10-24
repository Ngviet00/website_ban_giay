@extends('admin.layouts.app')
@section('content')
    @if(session()->has('success'))
        <h3 class="bg-success text-dark p-3">
            {{session()->get('success')}}
        </h3>
    @endif

    @if(session()->has('error'))
        <h3 class="bg-success text-dark p-3">
            {{session()->get('error')}}
        </h3>
    @endif
    <div class="d-flex justify-content-between">
        <h2>Category</h2>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="row text-center">
        @if(count($categories) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @foreach($categories as $key => $category)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d') }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('admin.category.edit', $category->id) }}" style="margin-right:5px"
                                   class="btn btn-primary d-inline-block mr-3">Edit</a>
                                <form method="post" action="{{ route('admin.category.destroy', $category) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div>Not Found</div>
        @endif
    </div>
@endsection

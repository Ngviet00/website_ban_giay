@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h2>History Purchase</h2>
    </div>
    <div class="row text-center">
        @if(count($results) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Money</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $key => $result)
                    <tr style="vertical-align: middle">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->address }}</td>
                        <td>{{ $result->phone }}</td>
                        <td>
                            <img style="width: 50px;" src="{{ asset($result->image) }}" alt="">
                        </td>
                        <td>{{ number_format($result->price) }}</td>
                        <td>{{ number_format($result->quantity) }}</td>
                        <td>{{ number_format($result->total_money) }}</td>
                        <td>
                            <div class="d-flex">
                                @if($result->status == 1)
                                    <a href="{{ route('admin.purchase-history.confirm', $result->id) }}" class="btn btn-primary">Giao hàng</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-success">Đã giao hàng</a>
                                @endif
                                <a href="{{ route('admin.purchase-history.destroy', $result->id) }}" style="margin-left: 5px" class="btn btn-danger">Xoá</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div>Not Found</div>
        @endif
    </div>
@endsection

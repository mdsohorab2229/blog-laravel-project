@extends('backend.layouts.master')
@section('page_title', 'Category')
@section('page_sub_title','Details')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Category Details</h4>
                        <a href="{{ route('category.index') }}">
                            <button class="btn btn-success btn-sm mt-2">Back</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $category->slug }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $category->status == \App\Models\Category::ACTIVE ? 'Active': 'InActive' }}</td>
                        </tr>
                        <tr>
                            <th>Order By</th>
                            <td>{{ $category->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not Updated' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

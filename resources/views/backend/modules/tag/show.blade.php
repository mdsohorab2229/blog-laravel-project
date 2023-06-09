@extends('backend.layouts.master')
@section('page_title', 'Tag')
@section('page_sub_title','Details')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Tag Details</h4>
                        <a href="{{ route('tag.index') }}">
                            <button class="btn btn-success btn-sm mt-2">Back</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $tag->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $tag->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $tag->slug }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $tag->status == \App\Models\Category::ACTIVE ? 'Active': 'InActive' }}</td>
                        </tr>
                        <tr>
                            <th>Order By</th>
                            <td>{{ $tag->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $tag->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $tag->created_at != $tag->updated_at ? $tag->updated_at->toDayDateTimeString() : 'Not Updated' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

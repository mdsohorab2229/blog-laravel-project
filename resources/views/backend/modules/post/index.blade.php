@extends('backend.layouts.master')
@section('page_title', 'Category')
@section('page_sub_title','List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Category List</h4>
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-success btn-sm">Add Category</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Order By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->status == \App\Models\Category::ACTIVE ? 'Active' : 'InActive' }}</td>
                                <td>{{ $category->order_by }}</td>
                                <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                                <td>{{ $category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not Updated' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-info btn-sm"
                                           href="{{ route('category.show', $category->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm mx-1"
                                           href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['method'=>'delete', 'id'=>'form_'.$category->id, 'route'=>['category.destroy', $category->id]]) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'button', 'data-id'=>$category->id, 'class'=>'delete btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(session('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{  session('cls') == 'danger' ? 'error' : session('cls') }}',
                    toast: true,
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endpush
    @endif
    @push('js')
        <script>
            $('.delete').on('click', function () {
                let id = $(this).attr('data-id')
                console.log(id)
                Swal.fire({
                    title: 'Are you sure to delete it?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form_${id}`).submit()
                    }
                })
            });

        </script>
    @endpush
@endsection

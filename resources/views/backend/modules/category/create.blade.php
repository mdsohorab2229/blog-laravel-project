@extends('backend.layouts.master')
@section('page_title', 'Category')
@section('page_sub_title','Create Category')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Create Category</h4>
                        <a href="{{ route('category.index') }}">
                            <button class="btn btn-success btn-sm">Back</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['method'=>'post', 'route'=>'category.store']) !!}
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null,['id'=>'name','class'=>'form-control', 'placeholder'=>'Enter Category Name']) !!}
                    {!! Form::label('slug', 'Slug',['class'=>'mt-2']) !!}
                    {!! Form::text('slug', null, ['id'=>'slug','class'=>'form-control', 'placeholder'=>'Enter Category Slug']) !!}
                    {!! Form::label('order_by', 'Category Serial',['class'=>'mt-2']) !!}
                    {!! Form::number('order_by', null, ['class'=>'form-control', 'placeholder'=>'Enter Category Serial']) !!}
                    {!! Form::label('status', 'Category Status',['class'=>'mt-2']) !!}
                    {!! Form::select('status', [1=>'Active', 0=>'InActive'],null, ['class'=>'form-select', 'placeholder'=>'Select  Category Status']) !!}
                    {!! Form::button('Create Category', ['type'=>'submit', 'class'=>'btn btn-success mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $('#name').on('input', function () {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase())
            })
        </script>
    @endpush
@endsection

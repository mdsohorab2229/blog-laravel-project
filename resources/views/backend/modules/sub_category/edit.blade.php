@extends('backend.layouts.master')
@section('page_title', 'Sub ategory')
@section('page_sub_title','Edit Sub Category')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Edit Sub Category</h4>
                        <a href="{{ route('sub-category.index') }}">
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

                    {!! Form::model($subCategory, ['method'=>'put', 'route'=>['sub-category.update', $subCategory->id]]) !!}

                    @include('backend.modules.sub_category.form')
                    {!! Form::button('Update Sub Category', ['type'=>'submit', 'class'=>'btn btn-success mt-2']) !!}
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

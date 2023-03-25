@extends('backend.layouts.master')
@section('page_title', 'Tag')
@section('page_sub_title','Create Category')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>{{ __('Create Tag') }}</h4>
                        <a href="{{ route('tag.index') }}">
                            <button class="btn btn-success btn-sm">{{ __('Back') }}</button>
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

                    {!! Form::open(['method'=>'post', 'route'=>'tag.store']) !!}
                   @include('backend.modules.tag.form')
                    {!! Form::button('Create Tag', ['type'=>'submit', 'class'=>'btn btn-success mt-2']) !!}
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

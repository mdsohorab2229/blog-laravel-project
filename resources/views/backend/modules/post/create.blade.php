@extends('backend.layouts.master')
@section('page_title', 'Post')
@section('page_sub_title','Create Post')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Create Post</h4>
                        <a href="{{ route('post.index') }}">
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

                    {!! Form::open(['method'=>'post', 'route'=>'post.store','files'=>true]) !!}
                    @include('backend.modules.post.form')
                    {!! Form::button('Create Post', ['type'=>'submit', 'class'=>'btn btn-success mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

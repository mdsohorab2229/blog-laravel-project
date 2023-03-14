@extends('backend.auth.layouts.master')
@section('page_title', 'Register')

@section('content')

    {!! Form::open(['route'=>'register', 'method'=>'post']) !!}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>$errors->has('name')?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!! Form::label('email', 'Email') !!}
    {!!  Form::email('email', null, ['class'=>$errors->has('email')?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!!  Form::label('password','Password',['class'=>'mt-2']) !!}
    {!! Form::password('password',['class'=>$errors->has('password')?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('password')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!! Form::label('password_confirmation','Password Confirmation',['class'=>'mt-2']) !!}
    {!! Form::password('password_confirmation',['class'=>'form-control form-control-sm']) !!}
    <div class="d-grid">
        {!! Form::button('Login',['type'=>'submit', 'class'=>'btn btn-info bnt-sm mt-2']) !!}
    </div>
    {!! Form::close() !!}

    <p class="mt-2">Already Registered? <a href="{{ route('login') }}">Login Here</a></p>
@endsection

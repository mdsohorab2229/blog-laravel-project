@extends('backend.auth.layouts.master')
@section('page_title', 'Login')

@section('content')

    {!! Form::open(['method'=>'post', 'route'=>'login']) !!}
    {!! Form::label('email', 'Email') !!}
    {!!  Form::email('email', null, ['class'=>$errors->has('email') ? 'is-invalid form-control form-control-sm': 'form-control form-control-sm']) !!}

    @error('email')
    <p class="text-danger">{{ $message }}</p>
    @enderror

    {!!  Form::label('password','Password',['class'=>'mt-2']) !!}
    {!! Form::password('password',['class'=>$errors->has('password')? 'is-invalid form-control form-control-sm': 'form-control form-control-sm']) !!}

    @error('password')
    <p class="text-danger">{{ $message }}</p>
    @enderror

    <div class="d-grid">
    {!! Form::button('Login',['type'=>'submit', 'class'=>'btn btn-info bnt-sm mt-2']) !!}
    </div>
    {!! Form::close() !!}

    <p class="mt-2">Forget Password? <a href="{{ route('password.request') }}">Reset Here</a></p>
    <p>Not Registered? <a href="{{ route('register') }}">Register Here</a></p>
@endsection

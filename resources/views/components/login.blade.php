@props(['title','action','to'])

@extends('layout.form_layout')

@section('title', 'Login')
@section('content')
<h1>Login As {{$title}}</h1>
<form action="{{ route($action) }}" method="post">
    @csrf
    <input type="text" name="email" placeholder="email" value="{{old('email')}}" class="border-2 border-gray-300 @error('email') border-red-400 @enderror">
    @error('email')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    <input type="password" name="password" placeholder="password" class="border-2 border-gray-300 @error('password') border-red-400 @enderror">
    @error('password')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    @error('failed')
        <p class="text-xsm text-red-500">{{ $message }}</p>
    @enderror
    <div class="agreement">
        <input type="checkbox" name="remember">
        <p>Remember me</p>
    </div>
    @include('components.sign-button', ["text"=>"Login"])
    <div class="sign-bottom">
        <p>Don't have an account? </p>
        <a href="{{route($to)}}">Sign up</a>
    </div>

</form>

@endsection

@props(['title', 'action', 'to'])

@extends('layout.form_layout')

@section('title', 'Sign Up')
@section('content')
<h1>Sign Up As {{$title}}</h1>
<form action="{{ route($action)}} " method="post">
    @csrf
    <input type="text" name="email" placeholder="Email" value="{{old('email')}}" class="border-2 border-gray-300 @error('email') border-red-400 @enderror">
    @error('email')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    <input type="password" name="password" placeholder="Password" class="border-2 border-gray-300 @error('password') border-red-400 @enderror">
    @error('password')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border-2 border-gray-300 @error('password') border-red-400 @enderror">
    <input type="text" name="location" placeholder="Location" value="{{old('location')}}" class="border-2 border-gray-300 @error('location') border-red-400 @enderror">
    @error('location')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    <input type="text" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}" class="border-2 border-gray-300 @error('phone_number') border-red-400 @enderror">
    @error('phone_number')
        <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
    @include('components.sign-button', ["text"=>"Sign Up"])
    <div class="sign-bottom">
        <p>Already have an account? </p>
        <a href="{{route($to)}}">Login</a>
    </div>
</form>

@endsection

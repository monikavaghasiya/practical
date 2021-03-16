@extends('layouts.master')
@section('title')
    {{ 'Create User' }}
@endsection

@section('content')
<h2>User Information Form</h2>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form class="p-5" action="{{route('user.store')}}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email-Id:</label>
        <input type="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email" name="email">
        @if($errors->has('email'))
            <div class="error text-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        @if($errors->has('password'))
            <div class="error text-danger">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>Confirm Password: </label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Enter password">
        @if($errors->has('confirm_password'))
            <div>{{ $errors->first('confirm_password') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="file">Profile pic:</label>
        <input type="file" class="form-control" id="file" placeholder="Enter password" name="profile_pic[]" multiple="multiple">
        @if($errors->has('profile_pic'))
            <div class="error text-danger">{{ $errors->first('profile_pic') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="about_me">About Me:</label>
        <textarea class="form-control" id="about_me" placeholder="Enter About Me" name="about">{{ old('about') }}</textarea>
        @if($errors->has('about'))
            <div class="error text-danger">{{ $errors->first('about') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

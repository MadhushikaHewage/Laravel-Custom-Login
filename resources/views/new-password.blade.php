@extends('layout')
@section('title', 'New Password')
@section('content')
<div class="container mt-5">
    <div class="mt-5">
        @if($errors->all())
        <div class="col-md-6 mx-auto">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <form action="{{route('new-password')}}" method="POST" style="width: 500px;" class="ms-auto me-auto">
        @csrf
        <input type="hidden" value="{{$token}}" name="token">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

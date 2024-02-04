@extends('layout')
@section('title', 'Forget Password')
@section('content')
<main>
    <div style="width: 500px;" class="ms-auto me-auto">

        <form action="{{route('forget-password')}}" method="POST">
            <h1 class="mt-3 mb-3">Forget Password</h1>
            <p>We'll send a link to your email, use that link to reset the password.</p>
            <div class="mt-5">
                @if($errors->all())
                <div class="col-md-12 mx-auto">
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
            @csrf
            <div class="mb-3 ">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection

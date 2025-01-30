@extends('layouts/auth')
@section('content')

<div class="container">
    <div class="row mt-3 pt-5">
        <div class="col-md-12 ">
            <h3>Register for Tracking Management System</h3>
            <div class="card my-2">
                <div class="card-header bg-secondary">
                    <h3 class="text-light">Registration </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="form-group my-1 ">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Enter Name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group my-1 ">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email Address" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group my-1 ">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="Enter Password" autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group  my-1">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" placeholder="Enter Confirm-Password" autocomplete="new-password" required>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3 ">
                                <button type="submit" class="btn btn-warning float-start">Register</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  my-3">
                                <a href="{{route('login')}}" class="btn btn-dark float-end">Go to Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

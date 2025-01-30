@extends('layouts/auth')
@section('content')
    <div class="row mt-3 pt-5">
        <div class="col-md-12">
            <h3 class="mt-5">Login to Tracking Management System</h3>
            <div class="card my-2">
                <div class="card-header bg-secondary">
                    <h3 class="text-center text-light">Login</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group my-1">
                            <label for="">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{old('email')}}" placeholder="Email Address" required>
                            @error('email')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                           </span>

                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="Password" name="password" autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                            </span>

                             @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group my-1">
                                  <a href="{{route('password.request')}}">Forgot Password</a>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <button type="submit" class="float-start btn btn-warning">Login</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group my-1">
                                <a href="{{route('register')}}" class="btn btn-dark float-end">Go to register</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts/auth')
@section('content')
    <div class="row mt-3 pt-5">
        <div class="col-md-12">
            <h3 class="mt-5">Reset Your Password</h3>
            @if (session('status'))
                <div class="text-success">
                    {{session('status')}}
                </div>
            @endif


            <div class="card my-2">
                <div class="card-header bg-secondary">
                    <h3 class="text-center text-light">Reset Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('password.email')}}" method="POST">
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



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <button type="submit" class="float-start btn btn-warning">Reset Password</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group my-1">
                                <a href="{{route('login')}}" class="btn btn-dark float-end">Go to Login</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

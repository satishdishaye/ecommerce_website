@extends('website.layouts.app')

@section('content')
    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login__form__title text-center">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('login-post')}}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}" placeholder="Enter your email" required>
                            @error('email')
                            <div  class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            @error('password')
                            <div  class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="site-btn">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="" class="text-muted">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <p>Don't have an account? <a href="{{route('user-register')}}">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Login Section End -->
@endsection

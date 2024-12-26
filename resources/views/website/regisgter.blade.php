@extends('website.layouts.app')

@section('content')
    <!-- Register Section Begin -->
    <section class="register spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register__form__title text-center">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('register-post')}}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Enter your full name" >

                            @error('name')
                                <div  class="text-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Enter your email" required>
                            @error('email')
                            <div  class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no"  value="{{old('mobile_no')}}" name="mobile_no" placeholder="Enter your mobile number" required>
                            @error('mobile_no')
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
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                            @error('password_confirmation')
                            <div  class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="site-btn">Register</button>
                        </div>
                        <div class="form-group text-center">
                            <p>Already have an account? <a href="{{route('user-login')}}">Login</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Register Section End -->
@endsection

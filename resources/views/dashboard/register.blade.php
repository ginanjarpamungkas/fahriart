@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
            <div class="login-form">
                                <h4>Register</h4>
                                <form action="{{ route('auth.store') }}" method="POST">
                                @csrf
                                    <div class="form-group{{$errors->has('name') ? ' error' : ''}}">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}"  placeholder="User Name">
                                    </div>
                                    <div class="form-group{{$errors->has('email') ? ' error' : ''}}">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}"  placeholder="Email">
                                    </div>
                                    <div class="form-group{{$errors->has('password') ? ' error' : ''}}">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="{{old('password')}}"  placeholder="Password">
                                    </div>
                                    <div class="form-group{{$errors->has('password_confirmation') ? ' error' : ''}}">
                                        <label>Password Confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}"  placeholder="Password Confirmation">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                </form>
                            </div>
                </div>
            </div>
        </div>
   </div>
@endsection
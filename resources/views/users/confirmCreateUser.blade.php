@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User Confirmation') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('saveUser')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="create_user_id" type="text"  name="create_user_id" value="{{ Auth::user()->id }}" hidden="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                                <div class="col-md-7" style="margin-left:auto">
                                <img src="{{ asset('storage/images/'.trim($user['profile'], '"')) }}" height="100px" width="100px" alt="">
                                </div>
                            </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user['name']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{$user['email']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"value="{{$user['password']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6">
                        @if($user['type'] =='0')
                            <input id="type" type="text" class="form-control" name="type"value="Admin" readonly>
                        @else
                            <input id="type" type="text" class="form-control" name="type"value="User" readonly>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <input id="phone" type="text"  class="form-control" name="phone" value="{{$user['phone']}}" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address"value="{{$user['address']}}" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                        <div class="col-md-6">
                            <input id="dob" type="text" class="form-control"  name="dob" value="{{$user['dob']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="profile" type="text" class="form-control"  name="profile" value="{{$user['profile']}}" hidden="hidden">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                            <a class="btn btn-danger" href="{{ route('users.create') }}"> Back</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
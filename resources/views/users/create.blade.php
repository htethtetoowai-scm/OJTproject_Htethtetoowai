@extends('Layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('confirmCreateUser') }}"enctype="multipart/form-data">
                        @csrf
                        @foreach ($errors->all() as $error)
                           <p class="text-danger">{{ $error }}</p>
                         @endforeach 
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password">
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control" required>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text"  class="form-control" name="phone" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="address" name="address"></textarea>
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control"  name="dob" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="profile" id="profile" required>
                            </div>
                            <div class="col-md-1 col-form-label">
                                <label style="color:red">{{ __('*') }}</label>                               
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                                <a class="btn btn-danger" href="{{ route('users.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
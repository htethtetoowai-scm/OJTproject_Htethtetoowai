@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>
                    <div class="card-body">
                        <form action="{{ route('confirmUpdateUser')}}" method="POST"enctype="multipart/form-data">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach 
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="id" name="id" type="hidden" value="{{Auth::user()->id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-7" style="margin-left:auto">
                                <img src="{{ asset('storage/images/'.trim(Auth::user()->profile, '"')) }}" height="100px" width="100px" alt="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly autocomplete="email">
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control"required>
                                   @if(Auth::user()->type==0)
                                    <option value="Admin" selected>Admin</option>
                                    <option value="User">User</option>
                                    @else
                                    <option value="Admin">Admin</option>
                                    <option value="User" selected>User</option>
                                    @endif
                                    </select>
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"  class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"   class="form-control" name="address" value="{{Auth::user()->address}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control" value="{{Auth::user()->dob}}" name="dob">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>
                                <div class="col-md-6">
                                    <p><input type="file" name="profile" id="profile" onchange="previewFile(this);"/></p>
                                    <img id="previewImg" style="height:100px;width:100px">
                                    </br>
                                    </br>
                                     <a href="{{route('changePass')}}">Change Password?</a>
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('showUserProfile',$user['id'])  }}"> Back</a>
                                </div>
                            </div>
                            </br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

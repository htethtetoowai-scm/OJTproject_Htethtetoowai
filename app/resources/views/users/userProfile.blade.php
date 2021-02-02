@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}
                    <a class="pull-right" href="{{route('users.edit',Auth::user()->id)}}">Edit</a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <label for="name" class=" col-form-label text-md-right">{{Auth::user()->name}}</label>
                            <p><img src="<?php echo asset('resources\views\users\2.png')?>"width="500" /></p>
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <label for="email" class=" col-form-label text-md-right">{{Auth::user()->email}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6">
                            @if (Auth::user()->type == 1)
                            <label for="type" class=" col-form-label text-md-right">Admin</label>
                            @else
                            <label for="type" class=" col-form-label text-md-right">User</label>
                            @endif
                         </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <label for="phone" class=" col-form-label text-md-right">{{Auth::user()->phone}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                        <div class="col-md-6">
                            <label for="dob" class=" col-form-label text-md-right">{{Auth::user()->dob}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <label for="address" class=" col-form-label text-md-right">{{Auth::user()->address}}</label>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a class="btn btn-danger" href="{{ route('posts.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
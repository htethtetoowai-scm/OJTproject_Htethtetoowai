@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete User Confirmation') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('del')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="id" name="id" type="hidden" value="{{$user['id']}}">                                </div>
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
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                            @if($user['type'] =='0')
                            
                                <input id="type" type="text" class="form-control" name="type"value="admin" readonly>
                            
                            @else
                                <input id="type" type="text" class="form-control" name="type"value="user" readonly>
                            
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
                                <input id="address" type="text"   class="form-control" name="address"value="{{$user['address']}}" readonly >
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control"  name="dob"value="{{$user['dob']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Delete') }}
                                </button>
                                <a href="{{route('users.index')}}" class="btn btn-danger">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Post Confirmation') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('delPost')}}">
                        @csrf
                        <div class="form-group row">
                            <input id="id" name="id" type="hidden" value="{{$post['id']}}">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$post['title']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="description" type="text"class="form-control" name="description" value="{{$post['description']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{$post['status']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create_user_id" class="col-md-4 col-form-label text-md-right">{{ __('Created_user_id') }}</label>
                            <div class="col-md-6">
                                <input id="create_user_id" type="text" class="form-control" name="create_user_id" value="{{$post['create_user_id']}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Delete') }}
                                </button>
                                <a class="btn btn-danger" href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
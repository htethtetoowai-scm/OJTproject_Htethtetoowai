@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>
                    <div class="card-body">
                        <form action="{{ route('confirmCreatePost')}}" method="GET">
                        @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="col-md-1 col-form-label">
                                    <label style="color:red">{{ __('*') }}</label>                               
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <a class="btn btn-danger" href="{{ route('posts.index') }}"> Back</a>
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
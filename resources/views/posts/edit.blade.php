@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Post') }}</div>
                    <div class="card-body">
                        <form action="{{ route('confirmUpdatePost')}}" method="GET">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="id" name="id" type="hidden" value="{{$post->id}}">                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}">
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
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$post->description }}" >
                                        @error('description')
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
                                <label for="status" class="col-md-4 text-md-right">Status</label>
                                <div class="col-md-6">
                                    <input type="radio" name="status" id="status" value="1" checked="checked">
                                    <label for="Active">Active</label>
                                    <input type="radio"name="status" id="status" value="0">
                                    <label for="Offline">OffLine</label>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
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
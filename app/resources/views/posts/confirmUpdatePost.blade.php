@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Post Confirmation') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updating')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="id" name="id" type="hidden" value="{{$post['id']}}">                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
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
                                @if($post['status'] =='1')
                                <input id="status" type="text"class="form-control" name="status" value="Active" readonly>
                                @else
                                <input id="status" type="text"class="form-control" name="status" value="Offline" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a class="btn btn-danger" href="{{ route('posts.index') }}"> Back</a>
                            </div>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
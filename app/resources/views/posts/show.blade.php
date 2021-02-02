@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post Details Information') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <input id="id" name="id" type="hidden" value="{{$post->id}}">   
                            <label for="title" class="col-md-4 text-md-right">Title:</label>
                            <div class="col-md-6">
                                <label>{{$post->title}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 text-md-right">Description:</label>
                            <div class="col-md-6">
                                <label>{{$post->description}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                @if($post->status==1)
                                <label>Active</label>
                                @else
                                <label>Offline</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create_user_id" class="col-md-4 text-md-right">{{ __('Created User') }}</label>
                            <div class="col-md-6">
                                <label><?php echo app\Http\Controllers\Post\PostController::userName($post['create_user_id']);?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updated_user_id" class="col-md-4 text-md-right">{{ __('Created_at') }}</label>
                            <div class="col-md-6">
                                <label>{{$post->created_at}}</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                             <a class="btn btn-danger" href="{{ route('posts.index') }}"> Back</a>
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('Layouts.layout')

@section('content')
<div class="container"> 
    <h3 style="margin-top:20px;margin-bottom:20px;text-align:center;color:#1589FF">Post List</h3>
    <div class="pull-left"> 
        <form action="{{ route('searchPost')}}" method="GET">
            <input type="text" placeholder="Search.." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">Add Post </a>
            <a class="btn btn-primary" href="{{ route('uploadCSV') }}">Upload CSV</a>
            <a class="btn btn-primary" href="{{ route('exportByAdmin') }}">Download</a>
        </form>  
    </div> 
    <div class="pull-right"></div> 
</div>  
</br>   
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Post Title</th>
        <th>Post Description</th>
        <th>Post Use</th>
        <th>Posted Date</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->title}}</td>
        <td>{{ $post->description}}</td>
        <td><?php echo app\Http\Controllers\Post\PostController::userName($post->create_user_id);?> </td>
        <td>{{$post->created_at}}</td>
        <td>
            <button type="button" id="show" class="btn btn-primary" data-id="{{$post->id}}"data-title="{{$post->title}}"data-description="{{$post->description}}"data-status="{{$post->status}}"
            data-create_user="<?php echo app\Http\Controllers\Post\PostController::userName($post->create_user_id);?>"data-created_at="{{$post->created_at}}"data-toggle="modal" 
            data-updated_user="<?php echo app\Http\Controllers\Post\PostController::userName($post->updated_user_id);?>"data-updated_at="{{$post->updated_at}}"data-target="#showModal"data-attr="$post->id">
            Show  
            </button> 
            <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            <button type="button" id="del" class="btn btn-danger" data-id="{{$post->id}}"data-title="{{$post->title}}"data-description="{{$post->description}}"data-status="{{$post->status}}"
            data-create_user="<?php echo app\Http\Controllers\Post\PostController::userName($post->create_user_id);?>"data-toggle="modal" 
            data-target="#delModal"data-attr="$post->id">
            Delete  
            </button>
        </td>
    </tr>
    @endforeach
</table>
{!! $posts->links() !!}
<!-- Show Modal -->
<div class="modal" id="showModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Post Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group row">
                    <input id="show_id" name="id" type="hidden" value="">
                    <label for="show_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input id="show_title" type="text" class="form-control" name="show_title" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                    <div class="col-md-6">
                        <input id="show_description" type="text"class="form-control" name="show_description" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                    <div class="col-md-6">
                        <input id="show_status" type="text" class="form-control" name="show_status" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="create_user_id" class="col-md-4 col-form-label text-md-right">{{ __('Created User') }}</label>
                    <div class="col-md-6">
                        <input id="show_create_user" type="text" class="form-control" name="show_create_user" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show_created_at" class="col-md-4 col-form-label text-md-right">{{ __('Created at') }}</label>
                    <div class="col-md-6">
                        <input id="show_created_at" type="text" class="form-control" name="show_created_at" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show_updated_user" class="col-md-4 col-form-label text-md-right">{{ __('Updated User') }}</label>
                    <div class="col-md-6">
                        <input id="show_updated_user" type="text" class="form-control" name="show_updated_user" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show_updated_at" class="col-md-4 col-form-label text-md-right">{{ __('Updated at') }}</label>
                    <div class="col-md-6">
                        <input id="show_updated_at" type="text" class="form-control" name="show_updated_at" value="" readonly>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 <!-- Delete Modal -->
 <div class="modal" id="delModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('delPost')}}">
            @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="id" name="id" type="hidden" value="">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <input id="description" type="text"class="form-control" name="description" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <input id="status" type="text" class="form-control" name="status" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="create_user" class="col-md-4 col-form-label text-md-right">{{ __('Created User') }}</label>
                        <div class="col-md-6">
                            <input id="create_user" type="text" class="form-control" name="create_user" value="" readonly>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> {{ __('Delete') }}    </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

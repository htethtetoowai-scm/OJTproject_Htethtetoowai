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
        <th>ID</th>
        <th>Post Title</th>
        <th>Post Description</th>
        <th>Post Use</th>
        <th>Posted Date</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->id}}</td>
        <td>{{ $post->title}}</td>
        <td>{{ $post->description}}</td>
        <td><?php echo app\Http\Controllers\Post\PostController::userName($post->create_user_id);?> </td>
        <td>{{$post->created_at}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('posts.show',$post->id) }}">Show</a>
            <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('showDelPost',$post->id) }}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
{!! $posts->links() !!}
@endsection

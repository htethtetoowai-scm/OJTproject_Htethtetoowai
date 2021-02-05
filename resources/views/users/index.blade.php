@extends('Layouts.layout')
 
@section('content')
<div class="container"> 
    <h3 style="margin-top:20px;margin-bottom:20px;text-align:center;color:#1589FF">User List</h3>
    <form action="{{ route('searchUser')}}" method="GET">
        <div class="row">
            <div class="col-2">
                <div>
                    <input class="form-control" type="text" placeholder="Name.." name="searchName" id="searchName">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input class="form-control" type="text" placeholder="Email.." name="searchEmail" id="searchEmail">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input  class="form-control" type="date" placeholder="Created to.." name="searchCreated_at" id="searchCreated_at">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input  class="form-control" type="date" placeholder="Created From.." name="searchCreated_from" id="searchCreated_from">
                </div>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
    </form>
            <div class="col-1">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Refresh</a>
            </div>
            <div class="col-1">
                <div>
                    <a class="btn btn-primary" href="{{ route('users.create') }}">Add New User</a>
                </div>
            </div>
        </div>
</div>
</br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created Use</th>
        <th>Birth Date</th>
        <th>Address</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone}}</td>
        
        @if($user->create_user_id==NULL)
        <td>-</td>
        @else
        <td><?php echo app\Http\Controllers\User\UserController::getCreateUser($user->create_user_id);?></td>
        @endif
        <td>{{$user->dob}}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td>
        <a class="btn btn-danger" href="{{ route('showDel',$user->id) }}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
{!! $users->links() !!}
@endsection